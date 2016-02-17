<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

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
		$this->load->library("form_validation");
	}

	public function index()
	{
		$this->load->view('index');
	}

	public function signin()
	{
		$this->load->view('signin');
	}

	public function login_check(){
		$user_input=$this->input->post();
		$user_input['password'] = md5($user_input['password']);
		$user_data = $this->User->check_login_credentials($user_input);
		if($user_data){
			$this->session->set_userdata('logged_in', TRUE);
			$this->session->set_userdata('user_id', $user_data['id']);
			redirect('/dashboard');
		}else{
			redirect('/signin');
		}
	}

	public function register()
	{
		$this->load->view('register');
	}

	public function process_registration()
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
			$this->session->set_userdata('logged_in', TRUE);
			$this->session->set_userdata('user_id', $user_data['id']);
			redirect('/dashboard');
		}
	}

	public function logoff(){
		$this->session->sess_destroy();
		redirect('/signin');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/main.php */
