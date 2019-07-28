 <?php
 error_reporting(0);
 session_start();
 $id=$_SESSION["cellu_id"]
  ?>
<?php
include "db.php"; 
include "currentdate.php"; 
if(isset($_GET["sid"]))
				  {
					$invoice=$_GET["sid"]; 
				  }

$sql="DELETE FROM `tbl_invoice` WHERE `iv_ivno`='$invoice'";

print $sql;

if(mysql_query($sql))
{
	//$status = 4; 
	//$invoice=$hdn_invoice +1;
	$autoInvoice = str_replace("BCS","", $invoice);
	$hdn_invoice = $autoInvoice + 1;
	$sql="UPDATE `auto_id` SET `auto_invoice` ='$autoInvoice'  WHERE `auto_invoice`='$hdn_invoice'";
	$rst=mysql_query($sql);
}
else
{
	//$status = 5; 
}

header("location:bill_print.php");

?>
