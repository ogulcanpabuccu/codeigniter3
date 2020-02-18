
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class File extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model("kullanici_model");
	}

	public function upload()
	{
		$config["allowed_types"] = "jpg|png";
		$config["upload_path"] = "images/upload/";

		$success = false;
		$resim_ad = '';
		$resim_yol = '';

		$this->load->library("upload", $config);


		if ($this->upload->do_upload("file")) {
			$success = true;
			$resim_ad = $this->upload->data("file_name");
			$resim_yol = "/images/upload/".$resim_ad;
		}

		$arr['success'] = $success;
		$arr['resim_ad'] = $resim_ad;
		$arr['resim_yol'] = $resim_yol;
		echo json_encode($arr);

	}
}
