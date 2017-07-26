<?php
	class Guitars extends CI_Controller{
		public function index($offset = 0){
			// Pagination Config
			$config['base_url'] = base_url().'guitars/index/';
			$config['total_rows'] = $this->db->count_all('guitars');
			$config['per_page'] = 3;
			$config['uri_segment'] = 3;
			$config['attributes'] = array('class' => 'pagination-link');

			// Init Pagination
			$this->pagination->initialize($config);

			$data['title'] = 'Latest Guitars';

			$data['guitars'] = $this->guitar_model->get_guitars('',FALSE,$config['per_page'], $offset);

			$this->load->view('templates/header');
			$this->load->view('guitars/index', $data);
			$this->load->view('templates/footer');
		}

		public function view($poster,$slug = NULL){
			$data['guitar'] = $this->guitar_model->get_guitars($poster,$slug);
			$guitar_id = $data['guitar']['id'];

			$data['bids'] = $this->bid_model->get_bids($guitar_id);

			if(empty($data['guitar'])){
				show_404();
			}

			$data['title'] = $data['guitar']['title'];
			$this->load->view('templates/header');
			$this->load->view('guitars/view', $data);
			$this->load->view('templates/footer');
		}

		public function create(){

			// Check login
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

			$data['title'] = 'Create Guitar';

			$data['categories'] = $this->guitar_model->get_categories();

			$this->form_validation->set_rules('title','Title', 'required');
			$this->form_validation->set_rules('price','Price', 'required');
			$this->form_validation->set_rules('quantity','Quantity', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('guitars/create', $data);
				$this->load->view('templates/footer');					
			} else {
				//Upload Image
				$config['upload_path'] = './static/img/guitars';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '2048';
				$config['max_width'] = '2000';
				$config['max_height'] = '2000';

				$this->load->library('upload', $config);

				if(!$this->upload->do_upload()){
					$errors = array('error' => $this->upload->display_errors());
					$guitar_image = 'noimage.png';
				} else {
					$data = array('upload_data' => $this->upload->data());
					$guitar_image = $_FILES['userfile']['name'];
				}

				$this->guitar_model->create_guitar($guitar_image);
				redirect('guitars');
			}
		}

		public function delete($poster, $slug){
			// Check login
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

			$this->guitar_model->delete_guitar($poster, $slug);
			// Set message
			$this->session->set_flashdata('guitar_deleted', 'Your guitar has been deleted.');
			redirect('guitars');
		}
		public function edit($poster,$slug){
			// Check login
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

			$data['guitar'] = $this->guitar_model->get_guitars($poster,$slug);

			// Check user
			if($this->session->userdata('user_id') != $this->guitar_model->get_guitars($poster,$slug)['user_id']){
				redirect('guitars');
			}

			//Upload Image
			$config['upload_path'] = './static/img/guitars';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '2048';
			$config['max_width'] = '2000';
			$config['max_height'] = '2000';

			$this->load->library('upload', $config);

			if(!$this->upload->do_upload()){
				$errors = array('error' => $this->upload->display_errors());
				$guitar_image = 'noimage.png';
			} else {
				$data = array('upload_data' => $this->upload->data());
				$guitar_image = $_FILES['userfile']['name'];
			}

			$data['categories'] = $this->guitar_model->get_categories();

			if(empty($data['guitar'])){
				show_404();
			}

			$data['title'] = 'Edit guitar';
			$this->load->view('templates/header');
			$this->load->view('guitars/edit', $data);
			$this->load->view('templates/footer');			
		}
		public function update(){
			// Check login
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

			$this->guitar_model->update_guitar();

			// Set message
			$this->session->set_flashdata('guitar_updated', 'Your guitar has been updated.');

			redirect('guitars');
		}
	}
?>