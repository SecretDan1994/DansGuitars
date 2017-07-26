<?php
	class Bid_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function create_bid($guitar_id){
			$data = array(
				'guitar_id' => $guitar_id,
				'user_id' => $this->session->userdata('user_id'),
				'bidder' => $this->session->userdata('username'),
				'quantity' => $this->input->post('quantity'),
				'amount' => $this->input->post('amount'),
				'comment' => $this->input->post('comment')
			);

			return $this->db->insert('bids', $data);
		}

		public function get_bids($guitar_id){
			$query = $this->db->get_where('bids', array('guitar_id' => $guitar_id));
			return $query->result_array();
		}
	}
?>