<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
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
		$data['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();
		
		$data['untuktabel'] = $this->M_data->get_satudata();
		//mengambil data untuk grafik
		$data['report'] = $this->M_data->report();
		//end grafik
		$data['home'] = 'user/index';
		$data['title'] = 'My Profile';
		$data['page'] = 'UAS IOT';
		
		$this->load->view('mainpage', $data);
	}
	public function tabel()
	{
		$data['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $this->load->library('pagination');

        //ambil keyword
        if($this->input->post('submit')){
        	$data['keyword'] = $this->input->post('keyword');
        	$this->session->set_userdata('keyword', $data['keyword']);
        } else{
        	$data['keyword'] = $this->session->userdata('keyword');
        }

        //config
        $this->db->like('tanah', $data['keyword']);
        $this->db->or_like('date', $data['keyword']);
        $this->db->from('tb_tanah');
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 7;
        $data['start'] = $this->uri->segment(3);
		$data['isitabel'] = $this->M_data->getdataTabel($config['per_page'], $data['start'], $data['keyword']);

		//initialize
		$this->pagination->initialize($config);

		$data['home'] = 'user/tabel';
		$data['title'] = 'Tabel';
		$data['page'] = 'UAS IOT';
		
		$this->load->view('mainpage', $data);
	}

	function chart()
	{
		$datas = $this->M_data->get_data()->result();
      	$x['datas'] = json_encode($datas);
		$this->load->view('chart', $x);
	}

	

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */