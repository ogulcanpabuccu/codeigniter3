
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

			$dosya_adi = 

			$resim_ad = $this->upload->data("file_name");
			$resim_yol = "images/upload/".$dosya_adi;
		}
		//print_r($_FILES);
	}
}
