<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class taskdetail extends CI_Controller {
	
	function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }
	
	public function index($id)
	{		
		$this->load->library('Curl');
		
		$taskDetail_url = base_url().'index.php/example_api/getTaskInformation/'.$id;				
		$data['task'] = $this->curl->simple_get($taskDetail_url);
		
		$taskNotes_url = base_url().'index.php/example_api/getTaskNotes/'.$id;				
		$data['notes'] = $this->curl->simple_get($taskNotes_url);
						
		$this->load->view('taskdetail',$data);
	}
}	
?>