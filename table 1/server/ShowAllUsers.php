 <?php
include_once('Models/UserModel.php');
include_once('ServiceFunctions.php');
$query ="SELECT Id,Firstname,Lastname,Email,  CreateDate, UpdateDate FROM users";
if($Users=User::GetUserInformationfromDb($query)){
     ShowUser($Users);			
}
?>
