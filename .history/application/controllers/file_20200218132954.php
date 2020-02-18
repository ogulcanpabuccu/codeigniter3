
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class File extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
	}

	public function post($file)
	{

		print_r($file);
	}


}
