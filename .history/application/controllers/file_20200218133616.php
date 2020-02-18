
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

		$config["allowed_types"]="gif|jpg|png";



		print_r($_FILES);
	}


}
