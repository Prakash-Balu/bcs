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
$hsn = $_POST["hsn"];
$price = $_POST["price"];
$qty = $_POST["qty"];
$feeamount = $_POST["feeamount"];
$totalamount = $_POST["totalamount"];
$cgst = $_POST["cgst"];
$txt_cgst = $_POST["txt_cgst"];
$sgst = $_POST["sgst"];
$txt_sgst = $_POST["txt_sgst"];
$igst = $_POST["igst"];
$txt_igst = $_POST["txt_igst"];
$txt_grdtot = $_POST["txt_grdtot"];
$txt_aiw = $_POST["aiw"];
$other_state = $_POST["othrst"];
//print $txt_aiw;

//echo "<pre>"; print_r($_POST); exit;

$sqlSubject="SELECT `iv_ivno` FROM `tbl_invoice` WHERE `iv_ivno`='$hdn_invoice'";
				//print $sqlSubject; 
				$rstSubject=mysql_query($sqlSubject);
				$rowcount= mysql_num_rows($rstSubject);
				//echo "<pre>"; print_r($rowcount); exit;

if( $rowcount > 0 ) {
	$sql="DELETE FROM `tbl_invoice` WHERE `iv_ivno`='$hdn_invoice'";
	mysql_query($sql);
}
$i=1;
foreach($product as $prdid=>$prd)
	{
		
		$prdna=$prd;
		$price1=$price[$prdid];
		$hsn1=$hsn[$prdid];
		$qty1=$qty[$prdid];
		$feeamount1=$feeamount[$prdid];
		//print $prdna."**".$price1."**".$qty1."**".$feeamount1.'<br>';
	$i++;
//`tbl_invoice` `iv_ivno``iv_ivdate``iv_ordno``iv_orddate``iv_buydet``iv_tod``iv_prdname``iv_prdprice``iv_prdqty``iv_prdamount``iv_tot``iv_cgst``iv_sgst``iv_grdtot``iv_crtid``iv_crtdate`

if( $other_state == 'yes' ) {
	$cgst = $igst;
	$txt_cgst = $txt_igst;
	$sgst = '';
	$txt_sgst = '';
}

$Insertquery = "INSERT INTO tbl_invoice(`iv_ivno`,`iv_ivdate`,`iv_ordno`,`iv_orddate`,`iv_buydet`,`iv_tod`,`iv_prdname`,`iv_hsn`,`iv_prdprice`,`iv_prdqty`,`iv_prdamount`,`iv_tot`,`iv_cgst`,`iv_cgstv`,`iv_sgst`,`iv_sgstv`,`iv_grdtot`,`iv_aiw`,`iv_crtid`,`iv_crtdate`)VALUES('$txt_ivno','$date1','$txt_ordno','$date2','$buyer_Address','$term_delivery','$prdna','$hsn1','$price1','$qty1','$feeamount1','$totalamount','$cgst','$txt_cgst','$sgst','$txt_sgst','$txt_grdtot','$txt_aiw','$id','$datetime')";

print $Insertquery;

	//print $Insertquery;   `auto_id`  `auto_invoice`
if(mysql_query($Insertquery))
{
	if( $rowcount > 0 ) {
		$status=3;
	} else {
		$status=1;
	}
}
else
{
$status=2;	
	
	}
	}
	
	
	$invoice=$hdn_invoice +1;
		$sql="UPDATE `auto_id` SET `auto_invoice` ='$invoice' WHERE `auto_invoice`='$hdn_invoice'";
		$rst=mysql_query($sql);
		
header("location:bill_generate.php?status=".$status);

?>
