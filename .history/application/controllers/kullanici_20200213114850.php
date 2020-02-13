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


			$alici = $this->input->post('alici');
			$soran = $this->input->post('soran');
			$onem = $this->input->post('onem');
			$day = $this->input->post('day');
			$sorukonu = $this->input->post('sorukonu');
			$sorudetay = $this->input->post('sorudetay');

			$err = 0;
			$success = false;
			if (empty($alici)) {
				$err++;
				$hataMesaji = 'Alıcı Seçin';
			}
			if (empty($soran)) {
				$err++;
				$hataMesaji = 'Tekrar Giriş Yapın.';
			}
			if (empty($onem)) {
				$err++;
				$hataMesaji = 'Önem Derecesini Seçin';
			}
			if (empty($sorukonu)) {
				$err++;
				$hataMesaji = 'Konu Belirtin';
			}
			if (empty($day)) {
				$err++;
				$hataMesaji = 'Tarih Saat Seçin';
			}

			if (!empty($day) && (2 != strpos($day, "/") || 5 != strpos($day, "/", 4) || 13 != strpos($day, ":"))) {
				$err++;
				$hataMesaji = 'Tarih Saat Formatıyla oynaşma';
			}

			if (empty($sorudetay)) {
				$err++;
				$hataMesaji = 'Sorunuzu Girin';
			}

			if ($err > 0) {
				//echo $hataMesaji;
			} else {
				$hataMesaji = "bekleme yapma devam et";
				$success = true;
				//

				$sorudata = array(
					"soran" => $soran,
					"alici" => $alici,
					"onem" => $onem,
					"soru_zaman" => $day,
					"soru_konu" => $sorukonu,
					"soru_detay" => $sorudetay
				);

				$sorukaydet = $this->kullanici_model->sorukaydet($sorudata);

				if ($sorukaydet) {
					$success = true;
					$hataMesaji = 'Soru eklendi';
					$arr['soruId'] = $sorukaydet;
				} else {
					$hataMesaji = 'Soru EKlenemedi';
				}
			}


			$arr['success'] = $success;
			$arr['hataMesaji'] = $hataMesaji;


			echo json_encode($arr);
		}
	}


	public function sorugonder()
	{
		$sorular = [];
		$sorular = $this->kullanici_model->sorular();
		echo json_encode($sorular);
	}


	public function sorudetay($id)
	{


		$sorudetay = $this->kullanici_model->sorudetay($id);
		$viewData['sorudetay'] = $sorudetay;
		$this->load->view("soru", $viewData);
	}

	public function cevapkaydet($id=0)
	{

		$cevapdetay = $this->input->post('cevapdetay');
		$err=0;
		if($id > 0){

		} else {
			$err++;
			$hataMesaji = 'Soru Seçilmeli';
		}

		if($err == 0 && empty($cevapdetay)){
				$hataMesaji = 'Cevap Giriniz.';
		}
		


		if (empty($cevaplayanid)) {

			$hataMesaji = 'Tekrar Giriş Yapın';
		} else {
			$cevapdata = array(
				"soru_id" => $id,
				"cevaplayan_id" => $this->session->get_userdata()['kullanici_id'],
				"cevap_detay" => $cevapdetay
			);
			//$success = true;
			$cevapkaydet = $this->kullanici_model->cevapkaydet($cevapdata);
		}
		//$arr['success'] = $success;
		$arr['hataMesaji'] = $hataMesaji;
		echo json_encode($arr);
	}
}
