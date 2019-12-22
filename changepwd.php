<?php 
session_start();

//Connect to database from here
include "db.php";

//get the posted values
$new_pwd=$_POST["new_pwd"];
$cnfrm_pwd = $_POST["cnfrm_pwd"];

// if($txt_id=='admin')
// {
// echo $new_pwd; 
// echo $cnfrm_pwd;

if( $new_pwd == $cnfrm_pwd ) {
	$sql="UPDATE ec_logindetails SET login_password='$cnfrm_pwd' WHERE login_name='admin'";
	// print $sql; 
	$ses_result=mysql_query($sql);
	if(mysql_affected_rows()>0)
	{
		$status = "4"; 
		header("location:index.php?status=".$status);
	} else {
		$status = "6"; 
		header("location:index.php?status=".$status);
	}
} else {
	$status = "5"; 
	header("location:index.php?status=".$status);
}
?>