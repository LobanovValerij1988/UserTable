 ao = createAjaxObject(); //ao is global variable function
function createAjaxObject(){  ao=null;
 try{
	 ao = new XMLHttpRequest(); //for modern    browsers 
 }
  catch(e) {
	  try {
		  //for new IE  
		  ao = new ActiveXObject("Msxml2.XMLHTTP");
	  }
	  catch(e){
		  try { //for old browsers 
			  ao = new   ActiveXObject("Microsoft.XMLHTTP");   
		  }
		  catch(e) {
			  alert("AJAX is not supported by your browser!");
			  return false;   
		  }
	  }
  }
return ao; 
}

function isCorrectValue(elementValue,elementName){
	if(elementValue.length<1||elementValue.length>25){
		return elementName+" is incorrect length <br>";
	}
	return "";
}

function isCorrectUserInformation(ElementsName,...ListElments){
	let error  ="";
	for (var i = 0; i < ListElments.length; i++){
		error+=isCorrectValue(ListElments[i],ElementsName[i]);
	}
	if(error.length>0){
			document.getElementById("error").innerHTML=error;
			return false;
		}
	return true;
}
function NewUserAdd(){
	SendRequest("../server/ADDnewUser.php");
}
function UpdateUser(){
	SendRequest("../server/UpdateUser.php");
}


function SendRequest(pathToFile){
	if(ao.readyState === 4 || ao.readyState === 0){ 
	let FirstName = document.getElementById("FirstName");
	let LastName = document.getElementById("LastName");
	let Email = document.getElementById("email");
	let ListId=[FirstName.id,LastName.id,Email.id];
    if(isCorrectUserInformation(ListId,FirstName.value,LastName.value, Email.value)){	
	let UserId=document.getElementById("UserId").getAttribute('value');
   	let connString="FirstName="+FirstName.value+"&LastName="+ LastName.value+"&Email="+Email.value+"&Id="+UserId;
	ao.open("POST",pathToFile, true);
	ao.setRequestHeader("Content-type","application/x-www-form-urlencoded"); 
	ao.onreadystatechange = getData;
    ao.send(connString);
	}
}
}

function getData() 
{ 
	if(ao.readyState === 4  && ao.status === 200 ){    			document.getElementById("error").innerHTML=ao.responseText;
	}
}
function deleteAllCookies() {
   	var cookies = document.cookie.split(";");
	for (var i = 0; i < cookies.length; i++) {
		var cookie = cookies[i];
		var eqPos = cookie.indexOf("=");
		var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
		document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT;";
		document.cookie = name + '=; path=/; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
	}
}


function EditUser(btn){
 	deleteAllCookies();
	if(ao.readyState === 4 || ao.readyState === 0){ 
	var elId =btn.id;
	document.cookie='Id='+elId;
	document.cookie='FirstName='+ document.getElementById("Firstname "                                +elId).getAttribute('value');
	document.cookie='LastName='+document.getElementById("Lastname "                                +elId).getAttribute('value');	
	document.cookie='Email='+ document.getElementById("Email "                                +elId).getAttribute('value');	
  }
}
	
function FillTable(){ 
	if(ao.readyState === 4  && ao.status === 200 ){    
		if(ao.responseText){		
			document.getElementById("UsersTable").innerHTML =ao.responseText;
		}
	}
}


function GetUserInformation(){
    var id;
	if(document.cookie.length>0){
	var  listCookie= document.cookie.split(';');
    for(var i=0;i < listCookie.length;i++) {
     var KeyValue=listCookie[i].split('=');
	var Key=KeyValue[0];
	var Value=KeyValue[1];
	
		switch(Key)
	{
			case "Id": document.getElementById("UserId").setAttribute('value',Value);
			id=Value;
			break;
			case " FirstName": 
			document.getElementById("FirstName").value=Value;
			break;
			case " LastName": 
			
			document.getElementById("LastName").value=Value;
			break;
			case " Email": document.getElementById("email").value=Value;
			break;
	} 
}
			
	    var newDiv = document.createElement("div");
        newDiv.innerHTML = "<input type='button' class='btn btn-info'   value='Update User with id "+id+"' onclick='UpdateUser()'>";
		document.getElementById("body").append(newDiv);
}
	
}

function FindUsers(){
	let rates=document.getElementsByName("Filter");
	let filterType;
	for(var i = 0; i < rates.length; i++){
       if(rates[i].checked){
       filterType= rates[i].value;
			   break;
	    }
}
	
if(isCorrectUserInformation([document.getElementById("FilterText").Id],document.getElementById("FilterText").value)){
	ao.open("POST","./server/ShowUserByFilter.php", true);
	ao.setRequestHeader("Content-type","application/x-www-form-urlencoded"); 
	ao.onreadystatechange = FillTable;
  ao.send("TypeFilter="+filterType+"&Value="+document.getElementById("FilterText").value);
}
}


