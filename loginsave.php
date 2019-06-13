<?php
include "db.php";


$dId = trim($_POST["did"]);

$staffId = $_POST["dd_staff"];

$exploded=explode("*",$staffId);

$sId=trim($exploded[0]);

$txt_username = trim($_POST["txt_username"]);
$txt_password = trim($_POST["txt_password"]);



$Insertquery = "insert into ec_stafflogin(login_did,`login_staffid`,`login_loginid`,`login_password`,`login_status`)values($dId,$sId,'$txt_username','$txt_password','Active')";
//print $Insertquery;
if(mysql_query($Insertquery))
{
	$status = 1; 
}
else
{
	$status = 2; 
}

header("location:createlogin.php?status=$status+&did=$dId");
?>