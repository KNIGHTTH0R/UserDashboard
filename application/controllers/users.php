<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/main
	 *	- or -
	 * 		http://example.com/index.php/main/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct(){
		parent::__construct();
		$this->output->enable_profiler();
    date_default_timezone_set ( 'America/Los_Angeles' );
    $this->load->model('User');
    $this->load->model('Message');
    if($this->session->userdata('logged_in') != TRUE){
      redirect('/signin');
    }
	}

	public function index()
	{
		$this->load->view('index');
	}

  public function new()
  {
    $this->load->view('new');
  }

  public function show($profile_id)
  {
    //get the profile information
    $data['profile'] = $this->User->get_user_data_by_id($profile_id);

    //get all the messages
    $data['messages'] = $this->Message->get_messages_by_profile_id($profile_id);

    //use messages to envelope comment information into each message
    for($i=0; $i<count($data['messages']); $i++){
      $message_id=$data['messages'][$i]['id'];
      $data['messages'][$i]['created_at'] = date('F dS Y', strtotime($data['messages'][$i]['created_at']));
      $data['messages'][$i]['comments'] = $this->Message->get_comments_by_message_id($message_id);
      //format and fill in missing comment data (author first name and last name, creation date)
      for($j=0; $j<count($data['messages'][$i]['comments']); $j++){
        $comment_userdata = $this->User->get_user_data_by_id($data['messages'][$i]['comments'][$j]['user_id']);
        $data['messages'][$i]['comments'][$j]['first_name'] = $comment_userdata['first_name'];
        $data['messages'][$i]['comments'][$j]['last_name'] = $comment_userdata['last_name'];
        $date = strtotime($data['messages'][$i]['comments'][$j]['created_at']);
        $data['messages'][$i]['comments'][$j]['created_at'] = $this->date_conversion($date);
      }
    }
    $this->load->view('show', $data);
  }

  public function date_conversion($date){

    if( date('Ymd', time()) == date('Ymd', $date) ){
			if( date('H', time()) == date('d', $date) ){
			}else{
				$date = (date('H', time()) - date('H', $date)).' hours ago';
				echo $date;
			}
		}else{
			$date = date('F dS Y', $date );
		}

    return $date.' ';
  }

  public function edit($profile_id)
  {
    $user_id=$this->session->userdata('user_id');
    if($this->User->get_user_level_by_id($user_id) != '9' && $profile_id != $user_id){
      redirect('/');
    }
    $data = $this->User->get_user_data_by_id($profile_id);
    $data['profile_id'] = $profile_id;
    $this->load->view('edit', $data);
  }

  public function remove($profile_id){
    $user_id = $this->session->userdata('user_id');
    if($this->User->get_user_level_by_id($user_id) == '9'){
      $this->User->remove_user_by_id($profile_id);
    }
    redirect("/dashboard");
  }

  public function process_user_changes($user_id)
  {
    $user_data=$this->input->post();
    $this->User->update_user_info($user_id, $user_data);
    redirect("/dashboard");
  }

  public function change_password($user_id)
  {
    $post=$this->input->post();
    $this->User->update_password($user_id, md5($post['password']));
    redirect("/users/edit/".$user_id);
  }

}

/* End of file welcome.php */
/* Location: ./application/controllers/main.php */
