<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	public function index()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$success = $this->ion_auth->login($username, $password);

		$this->session->set_flashdata('login_attempt', TRUE);
		$this->session->set_flashdata('login_success', $success);

		redirect('');
	}
}
