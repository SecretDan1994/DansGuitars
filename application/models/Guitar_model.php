<?php
	class Guitar_model extends CI_model{
		public function __construct(){
			$this->load->database();
		}

		public function get_guitars($poster,$slug = FALSE,$limit = FALSE, $offset = FALSE){
			if($limit){
				$this->db->limit($limit, $offset);
			}
			
			if($slug === FALSE){
				$this->db->order_by('guitars.id','DESC');
				$this->db->join('categories', 'categories.id = guitars.category_id');
				$query = $this->db->get('guitars');
				return $query->result_array();
			}

			$query = $this->db->get_where('guitars', array('poster_name' => $poster ,'slug' => $slug));
			return $query->row_array();
		}

		public function create_guitar($guitar_image){
			$slug = url_title($this->input->post('title'));

			$data = array(
				'title' => $this->input->post('title'),
				'slug' => $slug,
				'category_id' => $this->input->post('category_id'),
				'user_id' => $this->session->userdata('user_id'),
				'price' => $this->input->post('price'),
				'guitar_image' => $guitar_image,
				'quantity' => $this->input->post('quantity'),
				'buyer' => ''
			);
			$user_id = $data['user_id'];
			$poster = $this->guitar_model->get_username_of_guitar($user_id);
			$data['poster_name'] = $poster;
			if($this->guitar_model->check_unique($poster, $slug) == false){
				// Set message
				$this->session->set_flashdata('guitar_taken', 'You have already made a guitar with this title.');
				return false;
			}
			else {
				// Set message
				$this->session->set_flashdata('guitar_created', 'Your guitar has been created.');
				return $this->db->insert('guitars', $data);
			}
		}

		public function delete_guitar($poster, $slug){
			$this->db->where(array('poster_name' => $poster,'slug' => $slug));
			$this->db->delete('guitars');
			return true;
		}

		public function update_guitar(){
			$data = array(
				'category_id' => $this->input->post('category_id'),
				'price' => $this->input->post('price'),
				'guitar_image' => $this->input->post('userfile'),
				'quantity' => $this->input->post('quantity'),
			);

			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('guitars', $data);			
		}

		public function get_categories(){
			$this->db->order_by('name');
			$query = $this->db->get('categories');
			return $query->result_array();
		}

		public function get_guitars_by_category($category_id){
			$this->db->order_by('guitars.id', 'DESC');
			$this->db->join('categories', 'categories.id = guitars.category_id');
			$query = $this->db->get_where('guitars', array('category_id' => $category_id));
			return $query->result_array();
		}

		public function get_username_of_guitar($user_id){
			$query = $this->db->get_where('users',array('id' => $user_id));
			$result = $query->result_array();
			return $result[0]['username'];
		}

		public function check_unique($poster, $slug){
			// This function is specifically for checking to see if a person is posting a guitar they've already posted based on its title(slug).
			$query = $this->db->get_where('guitars',array('poster_name' => $poster, 'slug'=> $slug));
			$result = $query->result_array();
			if(count($result) > 0){
				return false;
			} else {
				return true;
			}
		}
	}
?>