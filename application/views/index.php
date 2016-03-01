<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/datepicker.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/angular.min.js"></script>	
	<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js"></script>	
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
	
	
</head>
<body ng-app="">

<div id="container">
	<h1 style="background-color: #5bc0de;">Dashboard</h1>
	<br />
	<div id="body">
		<h4>People</h4>
		<div class="list-group">
			
			<?php				
			
				$currUser = json_decode($currUser);	
				$users = json_decode($persons);
				
				if(!empty($users)) {
					foreach($users as $u)
					{	
						if(!empty($currUser) && $u->peopleEmail == $currUser[0]->peopleEmail) {
							echo "<a href='#' class='list-group-item' data-id='".$u->peopleId."' data-toggle='modal' data-target='#viewpersonmodal'><span class='badge'>Set As User</span>".$u->peopleEmail."</a>";
						}				
						else {
							echo "<a href='#' class='list-group-item' data-id='".$u->peopleId."' data-toggle='modal' data-target='#viewpersonmodal'>".$u->peopleEmail."</a>";
						}										
					}
				}
				else {
					echo "No Users";
				}
			?>		  
		</div>
		<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#addpersonmodal">Add Person</button>
		
		<br /><br />
		<h4>Tasks</h4>
		<div class="list-group">
			<?php				
				$tasks = json_decode($tasks);
				foreach($tasks as $t)
				{
					echo "<a href='index.php/taskdetail/index/".$t->taskId."' class='list-group-item' data-id='".$t->taskId."'>".$t->desc."...</a>";										
				}
			?>	
		</div>
		<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#addtaskmodal">Add Task</button>
		
				
		<!-- Person Info modal box -->
		<div id="viewpersonmodal" class="modal fade" role="dialog">
			<div class="modal-dialog modal-sm">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">View Person</h4>
			      </div>
			      <div class="modal-body">			        
			        <form role="form">
			        	<div class="form-group" id="user_data">     					
			        	</div>
			        	<input type="hidden" name="userID" id="userID" value="">
			        </form>
			      </div>
			      <div class="modal-footer">
			      	<button type="button" class="btn btn-success" ng-click="submitted=true" id="submit_curruser">Set as Current User</button>			      			      	
			        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
			      </div>
			    </div>		
		  </div>
		</div>
		<!-- Person Info modal box END -->
		
		<!-- Add Person modal box -->
		<div id="addpersonmodal" class="modal fade" role="dialog">
			<div class="modal-dialog modal-sm">			    
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Add Person</h4>
			      </div>
			      <div class="modal-body">			        
			        <form role="form" name="myForm">
			        	<div class="form-group" >
			        		<label for="ex2">Email</label>
        					<input class="form-control" id="ex2" type="email" ng-model="obj.email" name="email" ng-pattern="/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/" required>        					
			        	</div>			        	
			        </form>
			        			        
			        <div id="addpw1" ng-messages="myForm.email.$error" ng-messages-include="error-messages" ng-show="submitted && myForm.email.$error.email">
					    <div ng-message="pattern" class="alert alert-warning">Please enter a valid email address!</div>
					 </div>
					 
					 <div id="addpw2" ng-messages="myForm.email.$error" ng-messages-include="error-messages" ng-show="submitted && myForm.email.$error.required">
					    <div ng-message="pattern" class="alert alert-warning">Please enter an email address!</div>
					 </div>
					 
			      </div>
			      
			      <div class="modal-footer">
			      	<button type="button" class="btn btn-success" ng-click="submitted=true" id="submit_user">Add Person</button>			      	
			        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
			      </div>
			    </div>		
		  </div>
		</div>
		<!-- Add Person modal box END -->
		
		
		<!-- Add Task modal box -->
		<div id="addtaskmodal" class="modal fade" role="dialog">
			<div class="modal-dialog modal-sm">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Add Task</h4>
			      </div>
			      <div class="modal-body">
			        <form role="form" name="addTaskForm" ng-app>
			        	<div class="form-group">
			        		
			        		<label for="ex2">Description</label>
        					<textarea class="form-control" rows="5" cols="40" ng-model="desc" id="desc" required></textarea>       					
	        				<span class="help-inline" ng-show="submitted && addTaskForm.desc.$error.required">Required</span>            				
					 
        					<label for="ex2">Due Date</label>        					
				            <input type="text" class="form-control" value="<?php echo date("m/d/y"); ?>" data-date-format="mm/dd/yy" id="dp2" >
				            
				            
				            <div class="form-group">
							  <label for="sel1">Assign to</label>
							  <select class="form-control" id="sel1">
							  	<?php
							  	if(!empty($users)) {
									foreach($users as $u)
									{
										echo "<option value='".$u->peopleId."'>".$u->peopleEmail."</option>";																														
									}
								}
								?>
							  </select>
							</div>
				          <div id="descWarning" style="display:none;color:red;">Please enter a description</div>
			        	</div>
			        </form>
			      </div>
			      <div class="modal-footer">
			      	<button type="submit" class="btn btn-success" ng-click="submitted=true" id="btnAddTask">Add Task</button>			      	
			        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
			      </div>
			    </div>		
		  </div>
		</div>
		<!-- Add Task modal box END -->
  
	</div>
	<p class="footer"></p>
</div>
<script src="<?php echo base_url(); ?>assets/js/myJavaScript.js"></script>
<script src="<?php echo base_url(); ?>assets/js/datepicker_include.js"></script>
</body>
</html>