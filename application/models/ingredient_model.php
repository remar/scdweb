<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ingredient_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}

	public function get_ingredients() {
		$query = $this->db->get('ingredient');
		return $query->result_array();
	}

	public function get_ingredients_grouped_by_initial() {
		$ingredients = $this->get_ingredients();
		$ingredients_grouped_by_initial = array();
		
		foreach($ingredients as $ingredient) {
			$initial = $ingredient['name'][0];
			$ingredients_grouped_by_initial[$initial][] = $ingredient;
		}
		
		ksort($ingredients_grouped_by_initial);
		
		return $ingredients_grouped_by_initial;
	}

	public function add($ingredient, $comment) {
		$data = array('name' => $ingredient,
				      'comment' => $comment);
		return $this->db->insert('ingredient', $data);
	}

	public function add_category($category) {
		$data = array('name' => $category);
		return $this->db->insert('ingredient_category', $data);
	}

	public function get_ingredient($id) {
		$query = $this->db->get_where('ingredient', array('id' => $id));
		$result = $query->result_array();
		return count($result) >= 1 ? $result[0] : $result;
	}

	public function edit_ingredient($id, $ingredient) {
		$this->db->where('id', $id);
		$this->db->update('ingredient', $ingredient);
	}
}
