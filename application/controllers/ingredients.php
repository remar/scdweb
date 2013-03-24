<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ingredients extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('ingredient_model');
	}

	public function index() {
		$data['page'] = 'ingredients';
		$data['logged_in'] = $this->ion_auth->logged_in();
		$data['user'] = $this->ion_auth->user()->row();
		$data['ingredients_grouped_by_initial'] = $this->ingredient_model->get_ingredients_grouped_by_initial();
		$data['can_add_ingredient'] = $this->ion_auth->in_group('editor');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/menu', $data);
		$this->load->view('ingredients', $data);
		$this->load->view('templates/footer', $data);
	}

	public function add() {
		if($this->ion_auth->logged_in() && $this->ion_auth->in_group('editor')) {
			$ingredient = $this->input->post('ingredient');
			$comment = $this->input->post('comment');
			$this->ingredient_model->add($ingredient, $comment);
		}
		$this->index();
	}

	public function add_category() {
		if($this->ion_auth->logged_in() && $this->ion_auth->in_group('editor')) {
			$category = $this->input->post('category');
			$this->ingredient_model->add_category($category);
		}
		$this->index();
	}

	public function edit_ingredient($id = null) {
		if($id === null) {
			$ingredient_id = $this->input->post('ingredient_id');
			if($ingredient_id) {
				$ingredient = array('name' => $this->input->post('ingredient'),
								    'comment' => $this->input->post('comment'));
				$this->ingredient_model->edit_ingredient($ingredient_id, $ingredient);
			}
			$this->index();
			return;
		}
		$data['page'] = 'ingredients';
		$data['logged_in'] = $this->ion_auth->logged_in();
		$data['user'] = $this->ion_auth->user()->row();
		$data['ingredient'] = $this->ingredient_model->get_ingredient($id);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/menu', $data);
		$this->load->view('edit_ingredient', $data);
		$this->load->view('templates/footer', $data);
	}
}
