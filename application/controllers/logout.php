<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller {
	public function index()
	{
		$success = $this->ion_auth->logout();
		redirect('');
	}
}
