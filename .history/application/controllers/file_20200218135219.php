
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

		$config["allowed_types"] = "gif|jpg|png";
		$config["upload_path"] = "/images/upload";

		$this->load->library("upload", $config);


		if ($this->upload->do_upload("file")) {
			

			print_r($this->upload->data());
			echo "başarılı";

		}else {
			echo "başarısız";
		}

		//print_r($_FILES);
	}
}
