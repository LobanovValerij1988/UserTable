<?php
include_once('Models/UserModel.php');
include_once('ServiceFunctions.php');
$query="SELECT Id,Firstname,Lastname,Email,  CreateDate, UpdateDate FROM users where ";
switch ($_POST['TypeFilter']) {
    case "Email":
		$query.="Email='".$_POST['Value']."';";
	 	break;     
    case "Id":
         $query.="Id='".$_POST['Value']."';";
        break;
    case "FirstName":
        $query.="Firstname='".$_POST['Value']."';";
        break;
    case "LastName":
        $query.="Lastname='".$_POST['Value']."';";
        break;
	case "CreateDate":
        $query.="CreateDate='".$_POST['Value']."';";
        break;
	case "UpdateDate":
        $query.="UpdateDate='".$_POST['Value']."';";
        break;
    default:
       echo "unknown filter something was wrong";
}
if($Users=User::GetUserInformationfromDb($query)){	 			
			ShowUser($Users);
}
else{
		ShowHeader();
}

?> 