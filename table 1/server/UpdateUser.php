<?php
include_once('Models/UserModel.php');
include_once('ServiceFunctions.php');
$User=User::GetUserById($_POST['Id']);
if($User){
	$User->SetFirstName($_POST['FirstName']);
	$User->SetLastName($_POST['LastName']);
	$User->SetEmail($_POST['Email']);
	if($User->UpdateInformation()){  
	 echo '<div class="text-success">User was Updated Successfull back to the list and you will see it</div>';
    }	

	
}


?> 