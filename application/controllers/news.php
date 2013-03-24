<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {
	public function index()
	{
		if($this->session->flashdata('login_attempt')) {
			if(!$this->session->flashdata('login_success')) {
				$data['login_failed'] = true;
			}
		}
		
		$data['page'] = 'news';
		$data['logged_in'] = $this->ion_auth->logged_in();
		$data['user'] = $this->ion_auth->user()->row();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/menu', $data);
		$this->load->view('welcome_message', $data);
		$this->load->view('templates/footer', $data);
	}
}
