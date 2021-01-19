
 <?php 

class User
{
static function connectToDb(
	$dbHost="localhost",
	$dbUser="root",
	$dbPass="root",
	$dbName="test_encomage_db",
	$dbTable="users")
	{
		$cs='mysql:host='.$dBHost.';dbname='.$dbName.';charset=utf8;';
		$options=array(
			PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,  PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,  PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES UTF8'  );  
		try {
			$pdo=new PDO($cs,$dbUser,$dbPass,$options); 
			return $pdo;  
		   } 
		catch(PDOException $e)
		{  
		 echo $e->getMessage();
		 return false;  
		}
	}
	
protected $firstname;
protected $lastname;
protected $email;
protected $createDate;
protected $updateDate;
protected $error;
protected $id;

public function SetFirstName($firstName)
{
	    if(strlen($firstName)<1||strlen($firstName)>25)
		{
			$this->error.="FistName cannot be more than 25 and less than 1 <br>";
		}
       if (!preg_match('/^[A-Za-z]+$/', $firstName)) 
		{
			$this->error.="FistName can contain only english letters <br>";
		}
	$this->firstname=$firstName;
}

	public function SetLastName($lastName)
{
	    if(strlen($lastName)<1||strlen($lastName)>25)
		{
			$this->error.="LastName cannot be more than 25 and less than 1 <br>";
		}
		if (!preg_match('/^[A-Za-z]+$/', $lastName)) 
		{
			$this->error.="LastName can contain only english letters <br>";
		}
  	$this->lastname =$lastName;
}	

	public function SetEmail($email)
{
	   $this->email=$email;
	   if (!preg_match('/^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/', $email)) 
		{
			$this->error.="incorrect email<br>";
		    return;
 
	    }
	if( $this->IschackEmail)
	{
		if(!$pdo=User::connectToDb())
				   {
					   return "error connection";
				   }
		$list=$pdo->query('SELECT * FROM users where Email="'.$email.'"');
		if($row=$list->fetch())
		{
			if($this->id!=$row[id])
			{
			$this->error.="This Email Is Already Taken!<br>";
			}
		}		
	}
  
}
public function setCreatedate ($createDate)
{
	  if(!(bool)strtotime($createDate))
		{
		$this->error.="error date format create date<br>";
		}
  $this->createDate=$createDate;
}
public function setUpdatedate ($UpdateDate)
{
	  if(!(bool)strtotime($UpdateDate))
		{
		$this->error.="error date format update date<br>";
		}
       $this->updateDate=$UpdateDate;
}	
public function GetUpdatedate ()
{
	 
     return  $this->updateDate;
}
public function GetCreatedate ()
{
	
    return  $this->createDate;
}	
public function GetEmail()
{
	 return  $this->email;	 
}	
public function GetLastName()
{
 return   	$this->lastname; 
}	
public function GetFirstName()
{
 return 	$this->firstname;
}	
public function GetId()
{
 return 	$this->id;
}
function __construct($firstName ,$lastName, $email,$createDate,$UpdateDate,$id=0 ) 
{      $this->id=$id;
	   $this->error="";
	   $this->SetFirstName($firstName);
	   $this->SetLastName($lastName);
	   $this->SetEmail($email);
	   $this->setCreatedate($createDate);
       $this->setUpdatedate($UpdateDate);
	  
	   
}
static function GetUserById($Id){
	$User;
	try
	{
	if(!$pdo=User::connectToDb()){     
		echo "Error connection";		  
		return false;
			   }
	$list=$pdo->query('SELECT  * FROM users where Id="'.$Id.'"');
	$i=0;
	if($row=$list->fetch()) 
	 {
	return $Users=new User($row['Firstname'], $row['Lastname'], $row['Email'], $row['CreateDate'], $row['UpdateDate'],$row['Id']); 
    
	 }
	}
	catch(PDOException $e)
		{ 
		$err=$e->getMessage();
		echo "$err";
		return false;  
		}
	return false;
	
}
	
public function UpdateInformation(){
	if(strlen($this->error)>0)
		{
		   $err=$this->error;
		   echo"$err";
			return false;
		}
	try
	{
		
	if(!$pdo=User::connectToDb()) {
				  echo "Error connection";
				   return false;
			   }
		
		if($pdo->prepare("UPDATE  Users SET Firstname=?, Lastname=?,Email=?,UpdateDate=? where Id=?")->execute( array($this->firstname,$this->lastname,$this->email, date("Y/m/d"), $this->id))){
			return true;
		}
	return false;
	}
	
	catch(PDOException $e)
		{
		$err=$e->getMessage();
		echo "$err";  
		return false;  
		}
	
	
}	
    function IntoDb() 
	{
		if(strlen($this->error)>0)
		{
			return $this->error;
		}
		try{ 
			
			if(!$pdo=User::connectToDb())
			   {
				   return "error connection";
			   }
			$ps=$pdo->prepare("INSERT INTO                       Users(Firstname ,Lastname, Email,CreateDate,UpdateDate)
			VALUES (:Firstname,:Lastname,:Email,:CreateDate, :UpdateDate)");			
			$ps->execute(array(Firstname=>$this->firstname, Lastname=>$this->lastname,Email=>$this->email, CreateDate=>$this->createDate,             UpdateDate=>$this->updateDate));			              
		}
		catch(PDOException $e)
		{					
			return $e->getMessage();  
		}
	}
	private static function ShowUsers($list){
	$Users=[];	
	$i=0;
	    while($row=$list->fetch())
				{  
					$Users[$i]=new User($row['Firstname'], $row['Lastname'], $row['Email'], $row['CreateDate'], $row['UpdateDate'],$row['Id']);
					$i++;
				}
		return $Users; 
	}
	static function GetUserInformationfromDb($query)
	{
		
		try
		{
				$pdo=User::connectToDb();
				$list=$pdo->query($query);
			     return	User::ShowUsers($list);	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();  
			return false;
		}
	
    }
	
}
?>