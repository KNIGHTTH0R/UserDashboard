<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Messages extends CI_Controller {

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
		$this->load->model("User");
    $this->load->model("Message");
		$this->load->library("form_validation");
	}

	public function leave_message($wall_id)
	{
    $user_id = $this->session->userdata("user_id");
    $content = $this->input->post('content');
    $this->Message->add_message_by_profile_id($user_id, $wall_id, $content);
		redirect("/users/show/".$wall_id);
	}

  public function leave_comment($message_id, $wall_id)
	{
    $user_id = $this->session->userdata("user_id");
    $content = $this->input->post('content');
    $this->Message->add_comment_by_message_id($user_id, $message_id, $content);
		redirect("/users/show/".$wall_id);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/main.php */
