
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

		$this->load->library("upload", $config);


		if ($this->upload->do_upload("file")) {

			$dosya_adi = $this->upload->data("file_name");
			$data = array(

				"resim_ad" => $dosya_adi,
				"resim_yol" => $dosya_adi,

			);


			$fotoinsert = $this->kullanici_model->fotokaydet();
		} else {


			echo "dosya türü sadece jpg ve png olabilir.";
		}

		//print_r($_FILES);
	}
}
