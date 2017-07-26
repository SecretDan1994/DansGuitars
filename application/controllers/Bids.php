<?php
	class Bids extends CI_Controller{
		public function create_bid($guitar_id){
			// Check login
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}
			
			$slug = $this->input->post('slug');
			$poster_name = $this->input->post('poster_name');
			$data['bids'] = $this->bid_model->get_bids($guitar_id);

			$this->form_validation->set_rules('quantity', 'Quantity', 'required');
			$this->form_validation->set_rules('amount', 'Amount', 'required');
			$this->form_validation->set_rules('comment', 'Comment', 'required');

			if($this->form_validation->run() === FALSE){
				/*$this->load->view('templates/header');
				$this->load->view('guitars/view', $data);
				$this->load->view('templates/footer');*/
				// Set message
				$this->session->set_flashdata('bid_error', 'Please fill in all the bid fields.');
				redirect('guitars/'.$poster_name.'/'.$slug);

			} else {
				$this->bid_model->create_bid($guitar_id);

				// Set message
				$this->session->set_flashdata('bid_created', 'Your bid has been created.');

				redirect('guitars/'.$poster_name.'/'.$slug);
			}
		}
	}
?>