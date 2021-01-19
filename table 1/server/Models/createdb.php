<?php 
include_once('UserModel.php');
if(!$pdo=User::connectToDb())
{
	echo "we cannot connect to database";
	return false;
} 
$Users='create table users(
Id            int not null  auto_increment primary key, 
Firstname     varchar(25)not null,
Lastname      varchar(25)not null,
Email         varchar(100)not null unique,
CreateDate    varchar(15)not null,
UpdateDate    varchar(15)not null)
default charset="utf8"';
$pdo->exec($Users); 
?>

