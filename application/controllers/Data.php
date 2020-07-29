<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(empty($this->session->userdata('email'))){
			redirect('Auth','refresh');
		}
		$this->load->model('M_data');
	}
	public function index()
	{
		$this->load->view('tabel/index');
	}
	function data_tabel(){
        $data=$this->M_data->get_satudata();
        echo json_encode($data);
    }

}

/* End of file Data.php */
/* Location: ./application/controllers/Data.php */