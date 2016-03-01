<?php

class task_model extends CI_model {
	
	// Default constructor for class task_model
	public function __construct() {			
		parent::__construct();
		$this->load->database();
	}
	
	
	// This function add a task in the table 'tasks' and 'tasksnote'
	public function addTask($desc,$dueDate,$personAssigned)
	{
		$sql = "INSERT INTO tasks(taskDesc,taskDueDate,taskAssignedTo,people_peopleId) 
					VALUES('".$desc."','".$dueDate."',".$personAssigned.",".$personAssigned.")";
		
		$query = $this->db->query($sql);
		
		if( $this->db->affected_rows() > 0 )
			return true;
		else {
			return false;
		}		
	}
	
	// Get a specific task's notes
	public function getTaskNote($taskId)
	{
		$sql = "SELECT *
				FROM tasksnote		
				WHERE tasks_taskId = ".$taskId." ORDER BY date DESC";			
		
		$query = $this->db->query($sql);
		
		if( $query->num_rows() > 0 ) {
			return $query->result();
		}
		else {
			return array();
		}
	}
	
	// This function get a specific task's information from table 'tasks' and 'tasksnote'
	public function getTaskInformation($taskId)
	{			
		$sql = "SELECT *
				FROM tasks t				
				LEFT JOIN people p
				ON t.taskAssignedTo = p.peopleId
				WHERE t.taskId = ".$taskId."";			
		
		$query = $this->db->query($sql);
		
		if( $query->num_rows() > 0 ) {
			return $query->result();
		}
		else {
			return array();
		}
	}
	
	
	// This function gets all the tasks from the table 'tasks'
	public function showTaskList()
	{
		$sql = "SELECT taskId,LEFT(taskDesc , 10) 'desc' FROM tasks";
		
		$query = $this->db->query($sql);
		
		if( $query->num_rows() > 0 ) {
			return $query->result();			
		}
		else {
			return array();
		}
	}
	
}
?>