<?php

class people_model extends CI_Model {
	
	// Default constructor for class people_model
	public function __construct() {			
		parent::__construct();
		$this->load->database();
	}
	
	
	// This function add users to database in table 'people'
	public function addPeople($email)
	{
		// Checking if email already exist or not
		$sql = "SELECT * from people WHERE peopleEmail = '".$email."'";
		$query = $this->db->query($sql);
		
		if( $query->num_rows() == 0 )
		{
			// Inserting email to table people
			$sql = "INSERT INTO people(peopleEmail) VALUES('".$email."')";
		
			$query = $this->db->query($sql);
			
			if( $this->db->affected_rows() > 0 )
				return true;
			else {
				return false;
			}
		}
		else {
			return $sql;
		}		
	}
	
	
	// This function set current user of the mobile device in table 'currentuser'
	public function setCurrentUser($userId)
	{
		// Deleting existing record from table currentuser
		$sql = "TRUNCATE TABLE currentuser";		
		$query = $this->db->query($sql);
		
		if( $this->db->affected_rows() >= 0 ) {
			// Inserting user to table currentuser
			$sql = "INSERT INTO currentuser(people_peopleId) VALUES('".$userId."')";		
			$query = $this->db->query($sql);
			
			if( $this->db->affected_rows() > 0 )
				return true;
			else {
				return false;
			}
		}
		
		else {
			return false;
		}
	}
	
	
	// This function get the current user of the device from table 'currentuser'
	public function getCurrentUser()
	{
		$sql = "SELECT peopleEmail FROM people WHERE peopleId = (SELECT people_peopleId FROM currentuser)";
		
		$query = $this->db->query($sql);
		
		if( $query->num_rows() > 0 ) {
			return $query->result();
		}
		else {
			return array();
		}
	}
	
	
	// This function get a specific user's information from table 'people'
	public function getPerson($userId)
	{
		// Getting specific user's information
		$sql = "SELECT * from people WHERE peopleId = ".$userId."";
		
		$query = $this->db->query($sql);
		
		if( $query->num_rows() > 0 ) {
			return $query->result();
		}
		else {
			return array();
		}
	}
	
	
	// This function gets all the users from table 'people'
	public function showPersonsList()
	{
		// Getting all users from table people
		$sql = "SELECT * from people ORDER BY peopleId DESC";
		
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