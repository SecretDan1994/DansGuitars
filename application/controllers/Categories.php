<?php
	class Categories extends CI_Controller{

		public function index(){
			$data['title'] = 'Categories';		
			$data['categories'] = $this->category_model->get_categories();	

			$this->load->view('templates/header');
			$this->load->view('categories/index', $data);
			$this->load->view('templates/footer');
		}

		public function create(){
			// Check login
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}
			
			$data['title'] = 'Create Category';

			$this->form_validation->set_rules('name', 'Name', 'required');
			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('categories/create', $data);
				$this->load->view('templates/footer');
			} else {
				$this->category_model->create_category();

				// Set message
				$this->session->set_flashdata('category_created', 'Your category has been created.');

				redirect('categories');
			}
		}

		public function delete($id){
			// Check login
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

			$this->category_model->delete_category($id);
			// Set message
			$this->session->set_flashdata('category_deleted', 'Your category has been deleted.');
			redirect('categories');
		}

		public function guitars($id){
			$data['title'] = $this->category_model->get_category($id)->name;
			$data['guitars'] = $this->guitar_model->get_guitars_by_category($id);
			$this->load->view('templates/header');
			$this->load->view('guitars/index', $data);
			$this->load->view('templates/footer');
		}
	}
?>