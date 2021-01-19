<?php
include_once('Models/UserModel.php');
$User=new User($_POST['FirstName'],$_POST['LastName'],$_POST['Email'], date("Y/m/d"),date("Y/m/d"));
$err=$User->intoDb();
			if($err)
			{
			  echo "<h3/><span style='color:red;'> Error code:".$err."!</span><h3/>"; 
		   }
	else
{
	echo'<div class="text-success">User was added Successfull </div>';

}

?> 
