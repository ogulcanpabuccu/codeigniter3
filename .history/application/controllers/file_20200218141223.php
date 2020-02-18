
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class File extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
	}

	public function upload()
	{

		$config["allowed_types"] = "jpg|png";
		$config["upload_path"] = "images/upload/";

		$this->load->library("upload", $config);


		if ($this->upload->do_upload("file")) {
			

			$data=$this->upload->data();
			

		}else {


			echo "dosya türü sadece jpg ve png olabilir.";


		}

		//print_r($_FILES);
	}
}
