<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kullanici extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		$this->load->model("kullanici_model");
	}

	public function index()
	{
		$data = [];
		$data['kullanicilar'] = $this->kullanici_model->kullanicilar();
		$this->load->view('main', $data);
	}


	public function giris()
	{


		if ($_POST) {
			$email = $this->input->post('email');
			$sifre = $this->input->post('sifre');
			$kullanici = $this->kullanici_model->userCheck($email, $sifre);


			if (count($kullanici) > 0) {

				$sessionData = array('kullanici_id' => $kullanici[0]->kullanici_id, 'kullanici_mail' => $kullanici[0]->kullanici_mail, 'sifre' => $kullanici[0]->kullanici_password);

				//print_r ($sessionData);
				//exit;
				$this->session->set_userdata($sessionData);

				/*echo "<pre>";
				print_r($this->session->get_userdata());*/

				redirect("Kullanici/index");
			} else {

				echo "giriş başarısız";
			}
		}
	}

	public function cikis()
	{
		session_destroy();

		redirect("Kullanici/index");
	}

	public function dbdeneme()
	{
		$query = $this->db->get('kullanici');

		foreach ($query->result() as $row) {
			echo $row->kullanici_mail . " ";
		}
	}

	public function surum()
	{
		$this->load->view('surum');
	}

	public function kaydet()
	{
		
		if ($_POST) {


			$alici= $this->input->post('alici');
		
			$alici=$_POST["alici"];
			$soran=$_POST["soran"];
			$onem=$_POST["onem"];
			$day=$_POST["day"];
			$sorudetay=$_POST["sorudetay"];

			if (!$alici || !$soran || !$onem || !$day || !$sorudetay ) {
				
				$array["hata"]= "Eksik Alan Bırakmaydsaın";
			} elseif () {
				# code...
			} 
			
			else {
				$array["ok"]= "tamamdır";
			}
		
			echo json_encode($array);
		}
		
	}
}
