<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
    $this->load->model('User');
    if($this->session->userdata('logged_in') != TRUE){
      redirect('/signin');
    }
	}

  public function index()
  {
    $user_id = $this->session->userdata('user_id');
    if($this->User->get_user_level_by_id($user_id) == 9){
      redirect('/dashboard/admin');
    }
    $data['all_users'] = $this->User->get_all_users();
    $this->load->view('dashboard', $data);
  }

  public function add_new_user()
	{
		$this->form_validation->set_rules("first_name", "First Name", "trim|required");
		$this->form_validation->set_rules("last_name", "Last Name", "trim|required");
		$this->form_validation->set_rules("email", "Email", "trim|required|valid_email|is_unique[users.email]");
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|matches[confirm_password]');
		$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'required');

		if($this->form_validation->run() === FALSE)
		{
			$this->session->set_flashdata( 'register_error', validation_errors() );
			redirect("/users/new");
		}
		else
		{

			$user_data=$this->input->post();
			$user_data['password'] = md5($user_data['password']);
			$user_data['id'] = $this->User->add_user($user_data);
			if($this->session->userdata('logged_in') !== TRUE){
				var_dump('dumb');
				die();
				$this->session->set_userdata('logged_in', TRUE);
				$this->session->set_userdata('user_id', $user_data['id']);
			}
			redirect('/dashboard');
		}
	}

	public function admin()
  {
    $data['all_users'] = $this->User->get_all_users();
    $this->load->view('admin', $data);
  }

}

/* End of file welcome.php */
/* Location: ./application/controllers/main.php */
