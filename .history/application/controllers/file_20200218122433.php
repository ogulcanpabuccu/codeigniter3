
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class File extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		$this->load->model("kullanici_model");
	}

	public function post()
	{

		pa($_FILES);
		
		$data = [];
		$data['kullanicilar'] = $this->kullanici_model->kullanicilar();
		$this->load->view('main', $data);
	}


}
