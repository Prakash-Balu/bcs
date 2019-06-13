<?php 
session_start();

//Connect to database from here
include "db.php";

//get the posted values
$txt_id=trim($_POST["txt_id"]);
$txt_pswd=$_POST["txt_pswd"];


if($txt_id=='admin')
{
	$sql="SELECT * FROM ec_logindetails WHERE login_name='$txt_id'";
	//print $sql;
	$ses_result=mysql_query($sql);
	$row=mysql_fetch_array($ses_result);
	$login_id=$row["login_id"];
	$login_password=$row["login_password"];
	$login_type='A';
}
if($txt_id!='admin')
{
	
	$sql="SELECT * FROM ec_stafflogin WHERE login_loginid='$txt_id'";
	//print $sql;
	$ses_result=mysql_query($sql);
	$row=mysql_fetch_array($ses_result);
	$login_id=$row["login_id"];
	$login_password=$row["login_password"];
	$login_type='S';
}


//if username exists
if(mysql_num_rows($ses_result)>0)
{
	//compare the password
	if(strcmp($txt_pswd,$login_password)==0)
	{
		//now set the session from here if needed
		$_SESSION['cellu_name']=$txt_id;		
		$_SESSION['cellu_id']=$login_id; 	
		$_SESSION['login_type']=$login_type; 	
		
		header("location:inner.php");
	}
	else
	{
	$status = "1"; 
	header("location:index.php?status=".$status);
		
	}
		
}
else
{
 
	$status = "2"; 
	header("location:index.php?status=".$status);
	
}


?>