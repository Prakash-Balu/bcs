 <?php
 error_reporting(0);
 session_start();
 $id=$_SESSION["cellu_id"]
  ?>
<?php
include "db.php"; 
include "currentdate.php"; 

$hdn_quotation = $_POST["hdn_quotation"];
$txt_qtno = $_POST["txt_qtno"];
$date1 = $_POST["date1"];
$buyer_Address = $_POST["buyer_Address"];
$date2 = $_POST["date2"];
$product = $_POST["product"];
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
print $txt_aiw;


$sqlSubject="SELECT `qt_qtno` FROM `tbl_quatation` WHERE `qt_qtno`='$hdn_quotation'";
				//print $sqlSubject; 
				$rstSubject=mysql_query($sqlSubject);
				$rowcount= mysql_num_rows($rstSubject);
				//echo "<pre>"; print_r($rowcount); exit;

if( $rowcount > 0 ) {
	$sql="DELETE FROM `tbl_quatation` WHERE `qt_qtno`='$hdn_quotation'";
	mysql_query($sql);
}
$i=1;
foreach($product as $prdid=>$prd)
	{
		if($prd!='' && $price[$prdid]!='' && $qty[$prdid]!='' &&$feeamount[$prdid]!=0 ) {
		$prdna=$prd;
		$price1=$price[$prdid];
		$qty1=$qty[$prdid];
		$feeamount1=$feeamount[$prdid];
		//print $prdna."**".$price1."**".$qty1."**".$feeamount1.'<br>';
	$i++;
//`tbl_quatation`  `qt_qtno`,`qt_qtdate`,`qt_expdate`,`qt_buydet`,`qt_prdname`,`qt_prdprice`,`qt_prdqty`,`qt_prdamount`,`qt_tot`,`qt_cgst`,`qt_cgstv`,`qt_sgst`,`qt_sgstv`,`qt_grdtot`,`qt_crtid`,`qt_crtdate`

if( $other_state == 'yes' ) {
	$cgst = $igst;
	$txt_cgst = $txt_igst;
	$sgst = '';
	$txt_sgst = '';
}

$Insertquery = "INSERT INTO tbl_quatation(`qt_qtno`,`qt_qtdate`,`qt_expdate`,`qt_buydet`,`qt_prdname`,`qt_prdprice`,`qt_prdqty`,`qt_prdamount`,`qt_tot`,`qt_cgst`,`qt_cgstv`,`qt_sgst`,`qt_sgstv`,`qt_grdtot`,`qt_aiw`,`qt_crtid`,`qt_crtdate`)VALUES('$txt_qtno','$date1','$date2','$buyer_Address','$prdna','$price1','$qty1','$feeamount1','$totalamount','$cgst','$txt_cgst','$sgst','$txt_sgst','$txt_grdtot','$txt_aiw','$id','$datetime')";
//print $Insertquery;


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
}
	
	
	$quotation=$hdn_quotation +1;
		$sql="UPDATE `auto_id` SET `auto_quotation` ='$quotation' WHERE `auto_quotation`='$hdn_quotation'";
		$rst=mysql_query($sql);
		
header("location:quotation_generate.php?status=".$status);

?>
