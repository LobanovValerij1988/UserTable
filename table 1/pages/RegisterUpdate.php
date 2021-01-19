
<!DOCTYPE html>
<html lang="en">
 
<head>    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link  rel="stylesheet" href="../CSS/Bootstrap/css/bootstrap.min.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
 <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="../js/script.js"></script>   
 

  <script>  
	  window.onload = GetUserInformation;     
	</script> 
    
</head>
 
<body id="body" >
   	<h3>add/edit User</h3>
	<form  id="form1" method="post">
		<div class="form-group">
			<label for="FirstName">First Name:</label>
			<input type="text" class="form-control form-control-sm" maxlength="25" id="FirstName">  
		</div>
   		<div class="form-group">
			<label for="LastName">Last Name:</label>
			<input type="text" class="form-control" maxlength="25"  id="LastName">  
		</div>
	    <div class="form-group">
			<label for="Login">email </label>
			<input type="email"  class="form-control" id="email" maxlength="50">		
       </div>
       <p><input type="button" class="btn btn-warning" id='btn1' value="add New User"  onclick="NewUserAdd()"></p>
	</form>
	<div id="error" class="text-danger"></div>
	 <a href="../Index.php">Back to the list</a>
	 <div  id="UserId" value='-1' >
	</div>
</body>

</html>