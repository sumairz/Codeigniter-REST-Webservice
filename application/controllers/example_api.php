<?php
require(APPPATH.'libraries/REST_Controller.php');
 
class Example_api extends REST_Controller {
	
	function user_get($id)
	{
		$this->load->model('people_model');
		$ppl = $this->people_model;
						
		$data = $ppl->getPerson($id);		
		$this->response($data[0]);
	}
	
	
	function getallusers_get()
	{
		$this->load->model('people_model');
		$ppl = $this->people_model;
		
		$data = $ppl->showPersonsList();
		$this->response($data);
	}
	
	function currentuser_get()
	{
		$this->load->model('people_model');
		$ppl = $this->people_model;
		
		$data = $ppl->getCurrentUser();
		$this->response($data);
	}
	
	function setcurrentuser_post()
	{
		$this->load->model('people_model');
		$ppl = $this->people_model;
		
		$currUserId = $this->post('currUserId');
		
		$data = $ppl->setCurrentUser($currUserId);
		$this->response($data);
	}
		
	function adduser_post()
	{
		$this->load->model('people_model');
		$ppl = $this->people_model;
		 
		$email = $this->post('email');
				
		$data = $ppl->addPeople($email);
		$this->response($data); 
	}
 
 
 	function showalltasks_get()
	{
		$this->load->model('task_model');
		$task = $this->task_model;
		
		$data = $task->showTaskList();		
		$this->response($data);
	}
	
	
	function addtask_post()
	{
		$this->load->model('task_model');
		$task = $this->task_model;
		
		$desc = $this->post('desc');		
		$date = $this->post('date');
		$assignto = $this->post('assignto');
		
		$data = $task->addTask($desc,$date,$assignto);		
		$this->response($data);
	}
	
	function getTaskInformation_get($tid)
	{
		$this->load->model('task_model');
		$task = $this->task_model;
		
		$data = $task->getTaskInformation($tid);		
		$this->response($data);
	}
	
	function getTaskNotes_get($tid)
	{
		$this->load->model('task_model');
		$task = $this->task_model;
		
		$data = $task->getTaskNote($tid);		
		$this->response($data);
	}
}