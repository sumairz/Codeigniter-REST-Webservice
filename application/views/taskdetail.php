<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$task = json_decode($task);
$tk = $task[0];

$notes = json_decode($notes);

?>

<!DOCTYPE html>
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
	<a href="<?php echo base_url(); ?>" class="btn btn-info" role="button">Back</a>
	<h2 style="background-color: #5bc0de;">View Task</h2>	
	
	<h4>Description</h4>
	<p><?php echo $tk->taskDesc; ?></p>
	
	<p><b>Due Date: </b><?php echo $tk->taskDueDate; ?></p>
	
	<p><b>Assigned To: </b><?php echo $tk->peopleEmail; ?></p>
	
	<h3 align="center">History</h3>
	<?php
	
	function time_elapsed_string($datetime, $full = false) {
	    $now = new DateTime;
	    $ago = new DateTime($datetime);
	    $diff = $now->diff($ago);
	
	    $diff->w = floor($diff->d / 7);
	    $diff->d -= $diff->w * 7;
	
	    $string = array(
	        'y' => 'year',
	        'm' => 'month',
	        'w' => 'week',
	        'd' => 'day',
	        'h' => 'hour',
	        'i' => 'minute',
	        's' => 'second',
	    );
	    foreach ($string as $k => &$v) {
	        if ($diff->$k) {
	            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
	        } else {
	            unset($string[$k]);
	        }
	    }
	
	    if (!$full) $string = array_slice($string, 0, 1);
	    return $string ? implode(', ', $string) . ' ago' : 'just now';
	}
	
	
	foreach($notes as $nt)
	{
		echo "<p>".time_elapsed_string($nt->date)."</p>";
		echo "<p>".$nt->taskNote."</p>";
	}
	?>
	
	<form role="form" name="addTaskForm" ng-app>
		<div class="form-group">			        		
		<label for="ex2">Add Task Note:</label>
        <textarea class="form-control" rows="5" cols="40" ng-model="desc" id="desc" required></textarea>       					
	    <span class="help-inline" ng-show="submitted && addTaskForm.desc.$error.required">Required</span>
	   </div>
	   <button type="button" class="btn-lg btn-default" data-dismiss="modal">Add Note</button>
	</form>            				
					 
	
</body>

