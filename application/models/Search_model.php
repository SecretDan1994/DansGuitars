<?php
	class Search_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function search_guitar_by_title($keyword, $limit = FALSE, $offset = FALSE){
			if($limit){
				$this->db->limit($limit, $offset);
			}
			
			$this->db->order_by('guitars.id','DESC');
			$this->db->like('title', $keyword);
			$this->db->join('categories', 'categories.id = guitars.category_id');
			$query = $this->db->get('guitars');
			$results = $query->result_array();
			return $results;
		}
	}
?>