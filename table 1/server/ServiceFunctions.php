<?php 
function showUser($Users){
showHeader();
	for($i=0;$i<count($Users);$i++) 
	{
		$User=$Users[$i];
	 	echo "<tr id='tr {$User->GetId()}'>
				 <td > {$User->GetId()}</td>
				 <td id='Firstname {$User->GetId()}' value='{$User->GetFirstName()}'>  {$User->GetFirstName()} 
				 </td>
				 <td id='Lastname {$User->GetId()}' value='{$User->GetLastName()}'> {$User->GetLastName()}</td>
				 <td id='Email {$User->GetId()}' value='{$User->GetEmail()}'> {$User->GetEmail()}</td>
				 <td> {$User->GetCreatedate()}</td>
				 <td> {$User->GetUpdatedate()}</td>
		    	 <td> <a href='pages/RegisterUpdate.php' onclick='EditUser(this)' id='{$User->GetId()}'> Edit </a></td>
		   </tr>";
}
}

function showHeader(){
		echo "  <tr>
			<th>Id          </th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
			<th>Data Created</th>
			<th>Last Modified</th>
			<th>Edit</th>
   		</tr>";
}

?>