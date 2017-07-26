<?php
	class Users extends CI_Controller{
		public function register(){
			$data['title'] = 'Sign Up';

			$this->form_validation->set_rules('name', 'Name', 'required');

			$this->form_validation->set_rules(
		        'username', 'Username', 'required|min_length[5]|max_length[12]|is_unique[users.username]'
			        // array(
			        //         'is_unique' => 'This username already exists in our records. Please choose a different one.',
			        // )﻿
		        );
			$this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]'
			        // array(
			        //         'is_unique' => 'This email address already exists in our records. Please choose a different one.',
			        // )
		        );
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('password2', 'Confirm Password', 'required|matches[password]');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('users/register', $data);
				$this->load->view('templates/footer');
			} else {
				// Encrypt password
				$enc_password = md5($this->input->post('password'));

				$this->user_model->register($enc_password);

				// Get username
				$username = $this->input->post('username');
				// Get and encrypt the password.
				$password = md5($this->input->post('password'));
				$email = $this->input->post('email');

				// Login user
				$user_id = $this->user_model->login($username, $password);
				// Create session
				$user_data = array(
					'user_id' => $user_id,
					'username' => $username,
					'logged_in' => true
				);
				// Send an email confirming their registration.
				$this->load->library('email');

				$this->email->from('danielllerena1994@gmail.com', 'Daniel Llerena');
				$this->email->to($email);

				$this->email->subject("Welcome to Dan's Guitars!");
				$this->email->message("<p>Hi <strong>".$username."</strong>, thank you for registering!</p><p>If you'd like to find out more about the Dan's Guitars project, checkout my GitHub <a href='https://github.com/SecretDan1994/DansGuitars'>here</a>.</p><p>Happy Travels,</p><p>Daniel Llerena</p></br></br><p><span style='font: italic 13px Georgia,serif; color: rgb(102, 102, 102);'>Owner of Dan's Guitars</span></p>"
				);
				$this->email->set_mailtype('html');
				$this->email->send();

				$this->session->set_userdata($user_data);
				$this->session->set_flashdata('user_registered', 'You are now registered and are logged in.');

				redirect(base_url());
			}
		}
		public function login(){
			$data['title'] = 'Sign in';

			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('users/login', $data);
				$this->load->view('templates/footer');
			} else {
				// Get username
				$username = $this->input->post('username');
				// Get and encrypt the password.
				$password = md5($this->input->post('password'));

				// Login user
				$user_id = $this->user_model->login($username, $password);

				if($user_id){
					// Create session
					$user_data = array(
						'user_id' => $user_id,
						'username' => $username,
						'logged_in' => true
					);

					$this->session->set_userdata($user_data);

					// Set message
					$this->session->set_flashdata('login_success', 'You are now logged in.');
					redirect(base_url());
				} else {
					// Set message
					$this->session->set_flashdata('login_failed', 'Login is invalid.');
					redirect('users/login');					
				}
			}
		}
		// Log user out
		public function logout(){
			// Unset user data
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('username');
			// Set Message
			$this->session->set_flashdata('logout', 'You are now logged out.');
			redirect('users/login');	
		}
	}
?>