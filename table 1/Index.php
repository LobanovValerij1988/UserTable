
<!DOCTYPE html>
<html lang="en">
 
<head>    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link  rel="stylesheet" href="CSS/Bootstrap/css/bootstrap.min.css">
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
 <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="js/script.js"></script>   
   <script src="js/jquery-1.6.4.min.js"></script>   
     <title>Cite</title>
</head>
 
<body>
  	<div>
	   <h2>
	     Filter user
		</h2>
		<div class="form-group">
			<input type="text" placeholder="Enter filter world" class="form-control" maxlength="25"  id="FilterText">  
		</div>
		<h4 >
		 Type of filter
		</h4>
		 <input checked type="radio" id="filterChoice1"
    	 	name="Filter" value="Email">
    		<label for="cfilterChoice1">Email</label>
   		  <input type="radio" id="filterChoice2"
     	 name="Filter" value="LastName">
    	<label for="filterChoice2">LastName</label>

    	 <input type="radio" id="filterChoice3"
    		 name="Filter" value="FirstName">
   			<label for="filterChoice3">FirstName</label>
   		<input type="radio" id="cfilterChoice4"
    		 name="Filter" value="CreateDate">
   		<label for="filterChoice4">Create date</label>	
   	  		<input type="radio" id="filterChoice5"
    		 name="Filter" value="UpdateDate">
   		<label for="filterChoice5">Update date</label>	
        	<input type="radio" id="filterChoice6"
    		 name="Filter" value="Id">
   		<label for="filterChoice">Id</label>	
        <br>
        <input type="button" class="btn btn-primary" value="Find"  onclick="FindUsers()">
  </div>														
 		
	
	<table class='table' id='UsersTable'>
	<?php 
	include_once('./server/ShowAllUsers.php');
?>
	</table>
	 <a href="pages/RegisterUpdate.php">Register new  user</a>
</body>

</html>