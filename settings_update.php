<?php
include "db.php";
//`tbl_setting` comp_id `comp_name``comp_address``comp_vattin``comp_cstno``comp_panno``comp_gstno``comp_cgst``comp_sgst` comp_igstper
$company_id = $_POST["comp_id"];
$company_name = $_POST["comp_name"];
$company_add1 = $_POST["comp_add1"];
$company_add2 = $_POST["comp_add2"];
$company_add3 = $_POST["comp_add3"];
$company_phno = $_POST["comp_phno"];
$company_vattin = $_POST["comp_vattin"];
$company_cstno = $_POST["comp_cstno"];
$company_panno = $_POST["comp_panno"];
$company_gstno = $_POST["comp_gstno"];
$company_cgst = $_POST["comp_cgstper"];
$company_sgst = $_POST["comp_sgstper"];
$company_igst = $_POST["comp_igstper"];

$update="update tbl_setting set `comp_name`='$company_name',`comp_add1`='$company_add1',`comp_add2`='$company_add2',`comp_add3`='$company_add3',`comp_phno`='$company_phno',`comp_vattin`='$company_vattin',`comp_cstno`='$company_cstno',`comp_panno`='$company_panno',`comp_gstno`='$company_gstno',`comp_cgst`='$company_cgst',`comp_sgst`='$company_sgst',`comp_igst`='$company_igst' where comp_id=$company_id";
//print $update;
if(mysql_query($update))
{
	$status = 1; 
}
else
{
	$status = 2; 
}

header("location:settings.php?status=".$status);
	
?>