<?php
    class Searches extends CI_Controller{
        public function index($offset = 0)
        {
            $keyword = $this->input->post('keyword');
            $data['keyword'] = $keyword;
            $data['results'] = $this->search_model->search_guitar_by_title($keyword);

            $this->load->view('templates/header');
            $this->load->view('searches/index', $data);
            $this->load->view('templates/footer');
        }

    }
?>