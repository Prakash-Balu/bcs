<style>
table {
    border-collapse: collapse;
	border: 1px solid black;
}


tr.noBorder td {
  border: 0;
}
</style><script>
  window.print();
</script><?php
include "db.php";
 if(isset($_GET["sid"]))
				  {
					$invoice=$_GET["sid"]; 
				  }
			$sqlSubject="SELECT * FROM `tbl_other_invoice` WHERE `oiv_ivno`='$invoice' GROUP BY `oiv_ivno`;";
			//print $sqlSubject; 
			$rstSubject=mysql_query($sqlSubject);
			$rowcount= mysql_num_rows($rstSubject);
			
				for($i=1;$i<=$rowcount;$i++)
				{	
//`tbl_invoice` `iv_ivno``iv_ivdate``iv_ordno``iv_orddate``iv_buydet``iv_tod``iv_prdname``iv_prdprice``iv_prdqty``iv_prdamount``iv_tot``iv_cgst``iv_sgst``iv_grdtot``iv_crtid``iv_crtdate`		`iv_cgstv``iv_sgstv`		
                $res=mysql_fetch_array($rstSubject);
				$iv_ivno=$res["oiv_ivno"];
				$iv_ivdate=$res["oiv_ivdate"];
				$iv_ordno=$res["oiv_ordno"];
				$iv_orddate=$res["oiv_orddate"];
				$iv_buydet=$res["oiv_buydet"];
				$iv_tod=$res["oiv_tod"];
				$iv_tot=$res["oiv_tot"];
				$iv_igst=$res["oiv_igst"];
				$iv_igstv=$res["oiv_igstv"];
				$iv_grdtot=$res["oiv_grdtot"];
				$iv_aiw=$res["oiv_aiw"];
				}
				?>
<?php
$sqlDept="SELECT * FROM `tbl_setting`";
					$rstDept=mysql_query($sqlDept);
					$rowcount= mysql_num_rows($rstDept);
					for($i=1;$i<=$rowcount;$i++)
					{	//`comp_name``comp_add1``comp_add2``comp_add3``comp_gstno`
						$res=mysql_fetch_array($rstDept);
						
						$comp_name=$res["comp_name"];
						$comp_add1=$res["comp_add1"];
						$comp_add2=$res["comp_add2"];
						$comp_add3=$res["comp_add3"];
						$comp_gstno=$res["comp_gstno"];
						$comp_phno=$res["comp_phno"];
						}

?>

<table width="100%" border="1">
<tr class="noBorder">
<td colspan="2" style="padding-left:300px;">TAX INVOICE</td>
<td >Original-Buyer's Copy</td>
</tr>
  <tr>
    <td width="50%" rowspan="2"><strong><?php print $comp_name;  ?></strong><br /><br /><?php print $comp_add1;  ?><br /><?php print $comp_add2;  ?><br /><?php print $comp_add3;  ?><br />GST NO: <strong><?php print $comp_gstno;  ?></strong><br />PHONE NO: <strong><?php print $comp_phno;  ?></strong></td>
    <td width="25%" height="68">Invoice No: <strong><?php print $iv_ivno;  ?></strong></td>
    <td width="25%">Date: <strong><?php print $iv_ivdate;  ?></strong></td>
  </tr>
  <tr>
    <td height="56">Buyer's Order No: <strong><?php print $iv_ordno;  ?></strong></td>
    <td>Order Date: <strong><?php print $iv_orddate;  ?></strong></td>
  </tr>
  <tr>
    <td height="98"><strong>Buyer's Details:</strong><br /><?php print $iv_buydet;  ?></td>
    <td colspan="2" valign="top">Terms of Delivery: <strong><?php print $iv_tod;  ?></strong></td>
  </tr>
</table>
<table width="100%" height="315" border="1">
  <tr>
    <td width="7%" align="center">S.No</td>
    <td width="53%" align="center">Description of Goods</td>
    <td width="7%" align="center">Qty</td>
    <td width="13%" align="center"> Rate</td>
    <td width="20%" align="center">Amount</td>
  </tr>
  <?php
  $inv="SELECT * FROM `tbl_other_invoice` WHERE `oiv_ivno`='$invoice'";
			//print $inv;    
			$resinv=mysql_query($inv);
			$rowcount= mysql_num_rows($resinv);
for($i=1;$i<=$rowcount;$i++)
				{
		$datainv=mysql_fetch_array($resinv);
		$name=$datainv['oiv_prdname'];
		$price=$datainv['oiv_prdprice'];
		$qty=$datainv['oiv_prdqty'];
		$amount=$datainv['oiv_prdamount'];
		//print $name;
	?>
  <tr class="noBorder">
    <td align="center"><?php print $i;  ?></td>
    <td style="padding-left:115px;" ><?php print $name;  ?></td>
    <td align="center"><?php print $qty;  ?></td>
    <td align="center"><?php print $price;  ?></td>
    <td align="center"><?php print $amount;  ?></td>
  </tr>
   <?php
	}
  ?>
   <tr class="noBorder">
    <td colspan="4" align="right">Total</td>
    <td align="center"><strong><?php print $iv_tot;  ?></strong></td>
  </tr>
  <tr class="noBorder">
    <td colspan="4" align="right">IGST <strong><?php print $iv_igst;  ?></strong>%</td>
    <td align="center"><?php print $iv_igstv;  ?></td>
  </tr>
     <tr>
    <td colspan="3" align="left"><?php print $iv_aiw; ?></td>
    <td align="right">Grand Total</td>
    <td align="center"><strong><?php print $iv_grdtot;  ?></strong></td>
  </tr>
</table>
<table style="margin-top:340px;" width="100%" border="0">
 <tr class="noBorder">
    <td height="44" colspan="4"><u>Declaration:</u></td>
    <td width="44%" height="44" valign="top"><strong>for <?php print $comp_name;  ?></strong></td>
  </tr>
 <tr class="noBorder">
   <td height="57" colspan="4"><p align="justify">We Declare That This Invoice Shows The Actual Price Of The Goods
Described And That All Particulars Are True And Correct.</p></td>
   <td height="57" valign="bottom" align="center">Authorized Signature</td>
 </tr>
</table>
  