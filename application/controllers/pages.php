<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {
	public function view($page = '') {
		if(!file_exists('application/views/pages/'.$page.'.php')) {
			show_404();
		}
		$data['page'] = 'pages/view/'.$page;
		$data['logged_in'] = $this->ion_auth->logged_in();
		$data['user'] = $this->ion_auth->user()->row();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/menu', $data);
		$this->load->view('pages/' . $page, $data);
		$this->load->view('templates/footer', $data);
	}
}
