
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

		$this->load->library("upload", $config);


		if ($this->upload->do_upload("file")) {

			$dosya_adi = $this->upload->data("file_name");
			$data = array(


				"resim_ad" => $dosya_adi,
				"resim_yol" => base_url("images/upload/$dosya_adi")

			);
			$this->kullanici_model->fotokaydet($data);
		}
		//print_r($_FILES);
	}
}
