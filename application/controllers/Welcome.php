<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Welcome extends CI_Controller {	
		 
	function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }
	
	public function index()
	{
		$this->load->library('Curl');
		$getAllUser_url = base_url().'index.php/example_api/getallusers';
		$data['persons'] = $this->curl->simple_get($getAllUser_url);
		
		$currUser_url = base_url().'index.php/example_api/currentuser';
		$data['currUser'] = $this->curl->simple_get($currUser_url);
		
		$getTasksList_url = base_url().'index.php/example_api/showalltasks';
		$data['tasks'] = $this->curl->simple_get($getTasksList_url);
		
		$this->load->view('index',$data);
	}

	
}
