 <?php
 error_reporting(0);
 session_start();
 $id=$_SESSION["cellu_id"]
  ?>
<?php
include "db.php"; 
include "currentdate.php"; 

$hdn_invoice = $_POST["hdn_invoice"];
$txt_ivno = $_POST["txt_ivno"];
$date1 = $_POST["date1"];
$txt_ordno = $_POST["txt_ordno"];
$date2 = $_POST["date2"];
$txt_delno = $_POST["txt_delno"];
$txt_top = $_POST["txt_top"];
$txt_refby = $_POST["txt_refby"];
$txt_desti = $_POST["txt_desti"];
$buyer_Address = $_POST["buyer_Address"];
$term_delivery = $_POST["term_delivery"];
$product = $_POST["product"];
$price = $_POST["price"];
$qty = $_POST["qty"];
$feeamount = $_POST["feeamount"];
$totalamount = $_POST["totalamount"];
$cgst = $_POST["cgst"];
$txt_cgst = $_POST["txt_cgst"];
$txt_grdtot = $_POST["txt_grdtot"];
$txt_aiw = $_POST["aiw"];
//print $txt_aiw;
echo "<pre>"; print_r($_POST); exit;
$i=1;
foreach($product as $prdid=>$prd)
	{
		
		$prdna=$prd;
		$price1=$price[$prdid];
		$qty1=$qty[$prdid];
		$feeamount1=$feeamount[$prdid];
		//print $prdna."**".$price1."**".$qty1."**".$feeamount1.'<br>';
	$i++;
//`tbl_invoice` `iv_ivno``iv_ivdate``iv_ordno``iv_orddate``iv_buydet``iv_tod``iv_prdname``iv_prdprice``iv_prdqty``iv_prdamount``iv_tot``iv_cgst``iv_sgst``iv_grdtot``iv_crtid``iv_crtdate`

$Insertquery = "INSERT INTO tbl_other_invoice(`oiv_ivno`,`oiv_ivdate`,`oiv_ordno`,`oiv_orddate`,`oiv_buydet`,`oiv_tod`,`oiv_prdname`,`oiv_prdprice`,`oiv_prdqty`,`oiv_prdamount`,`oiv_tot`,`oiv_igst`,`oiv_igstv`,`oiv_grdtot`,`oiv_aiw`,`oiv_crtid`,`oiv_crtdate`)VALUES('$txt_ivno','$date1','$txt_ordno','$date2','$buyer_Address','$term_delivery','$prdna','$price1','$qty1','$feeamount1','$totalamount','$cgst','$txt_cgst','$txt_grdtot','$txt_aiw','$id','$datetime')";
print $Insertquery;


	//print $Insertquery;   `auto_id`  `auto_invoice`
if(mysql_query($Insertquery))
{
$status=1;
}
else
{
$status=2;	
	
	}
	}
	
	
	$invoice=$hdn_invoice +1;
		$sql="UPDATE `auto_id` SET `auto_oinvoice` ='$invoice' WHERE `auto_oinvoice`='$hdn_invoice'";
		$rst=mysql_query($sql);
		
header("location:other_bill_generate.php?status=".$status);

?>
