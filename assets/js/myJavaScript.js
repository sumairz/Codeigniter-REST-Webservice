/**
 * @author SyedSumair
 */
var url = "http://localhost:8080/inrentory";

// This function shows person information when click on a person name
$(document).ready( function () {
	
$('#viewpersonmodal').on('show.bs.modal', function(e) {
	
	var userId = $(e.relatedTarget).data('id');
    
    $.ajax({
    	cache: false,
        type: 'GET',
        url: url+'/index.php/example_api/user/'+userId,
        success: function(data) {        	
        	$(e.currentTarget).find('#user_data').html(data['peopleEmail']);
        	$(e.currentTarget).find('#userID').val(data['peopleId']);                
        }
    });
});

   
// This function is adding user to database 
$('#submit_user').on('click', function() {	
	
	var email = $("#ex2").val();	
    
    if(isEmail(email)) {
	    $.ajax({
	    	cache: false,
	        type: 'POST',
	        url: url+'/index.php/example_api/adduser',
	        data: {'email':email},
	        datatype: "json",
	        success: function(data) {
	        	if(data == true)
	        		location.reload();
	        	else
	        		alert("User not added");               
	        }
	    });
    }
});


// This function set a user as current device owner
$('#submit_curruser').on('click', function() {	
	
	var currUserId = $("#userID").val();	
    
    if(currUserId != "" || currUserId != null) {
	    $.ajax({
	    	cache: false,
	        type: 'POST',
	        url: url+'/index.php/example_api/setcurrentuser',
	        data: {'currUserId':currUserId},
	        datatype: "json",
	        success: function(data) {
	        	if(data == true)
	        		location.reload();
	        	else
	        		alert("User not set as current user");               
	        }
	    });
    }
});


// This function set a user as current device owner
$('#btnAddTask').on('click', function() {	
	
	var desc = $("#desc").val();	
	var date = $("#dp2").val();	
	var assignto = $("#sel1").val();    
    
    if(desc.length != 0) {    	
	    $.ajax({
	    	cache: false,
	        type: 'POST',
	        url: url+'/index.php/example_api/addtask',
	        data: {'desc':desc ,'date': date ,'assignto':assignto},
	        datatype: "json",
	        success: function(data) {
	        	console.log(data);
	        	if(data == true)
	        		location.reload();
	        	else
	        		alert("Task not added");               
	        }
	    });
    }
    else
    	$("#descWarning").show();
});

$('#addtaskmodal').on('show.bs.modal', function(e) {
	$("#descWarning").hide();	
});

// Email validation regular expression
function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}


});