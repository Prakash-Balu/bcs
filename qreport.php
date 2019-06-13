<style>
table {
    border-collapse: collapse;
	border: 1px solid black;
}


tr.noBorder td {
  border: 0;
}
</style><?php
include "db.php";
 if(isset($_GET["sid"]))
				  {
					$quotation=$_GET["sid"]; 
				  }
			$sqlSubject="SELECT * FROM `tbl_quatation` WHERE `qt_qtno`='$quotation' GROUP BY `qt_qtno`;";
			//print $sqlSubject; 
			$rstSubject=mysql_query($sqlSubject);
			$rowcount= mysql_num_rows($rstSubject);
			
				for($i=1;$i<=$rowcount;$i++)
				{	
//`tbl_quatation`  `qt_qtno`,`qt_qtdate`,`qt_expdate`,`qt_buydet`,`qt_prdname`,`qt_prdprice`,`qt_prdqty`,`qt_prdamount`,`qt_tot`,`qt_cgst`,`qt_cgstv`,`qt_sgst`,`qt_sgstv`,`qt_grdtot`,`qt_crtid`,`qt_crtdate`	
                $res=mysql_fetch_array($rstSubject);
				$qt_qtno=$res["qt_qtno"];
				$qt_qtdate=$res["qt_qtdate"];
				$qt_expdate=$res["qt_expdate"];
				$qt_buydet=$res["qt_buydet"];
				$qt_tot=$res["qt_tot"];
				$qt_cgst=$res["qt_cgst"];
				$qt_cgstv=$res["qt_cgstv"];
				$qt_sgst=$res["qt_sgst"];
				$qt_sgstv=$res["qt_sgstv"];
				$qt_grdtot=$res["qt_grdtot"];
				$qt_aiw=$res["qt_aiw"];
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
<td colspan="3" align="center" >QUOTATION</td>
</tr>
  <tr>
    <td width="50%" rowspan="2"><strong><?php print $comp_name;  ?></strong><br /><br /><?php print $comp_add1;  ?><br /><?php print $comp_add2;  ?><br /><?php print $comp_add3;  ?><br />GST NO: <strong><?php print $comp_gstno;  ?></strong><br />PHONE NO: <strong><?php print $comp_phno;  ?></strong></td>
    <td width="25%" height="68">Quotation No: <strong><?php print $qt_qtno;  ?></strong></td>
    <td width="25%">Date: <strong><?php print $qt_qtdate;  ?></strong></td>
  </tr>
  <tr>
    <td height="56" colspan="2">Expected Date: <strong><?php print $qt_expdate;  ?></strong></td>
  </tr>
  <tr>
    <td height="98" colspan="3"><strong>Buyer's Details:</strong><br /><?php print $qt_buydet;  ?></td>
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
  $inv="SELECT * FROM `tbl_quatation` WHERE `qt_qtno`='$quotation'";
			//print $inv;    ,`qt_prdprice`,`qt_prdqty`,`qt_prdamount`,`
			$resinv=mysql_query($inv);
			$rowcount= mysql_num_rows($resinv);
for($i=1;$i<=$rowcount;$i++)
				{
		$datainv=mysql_fetch_array($resinv);
		$name=$datainv['qt_prdname'];
		$price=$datainv['qt_prdprice'];
		$qty=$datainv['qt_prdqty'];
		$amount=$datainv['qt_prdamount'];
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
    <td align="center"><strong><?php print $qt_tot;  ?></strong></td>
  </tr>
  <tr class="noBorder">
    <td colspan="4" align="right">CGST <strong><?php print $qt_cgst;  ?></strong>%</td>
    <td align="center"><?php print $qt_cgstv;  ?></td>
  </tr>
   <tr class="noBorder">
    <td colspan="4" align="right">SGST <strong><?php print $qt_sgst;  ?></strong>%</td>
    <td align="center"><?php print $qt_sgstv;  ?></td>
  </tr>
     <tr>
    <td colspan="3" align="left"><?php print $qt_aiw; ?></td>
    <td align="right">Grand Total</td>
    <td align="center"><strong><?php print $qt_grdtot;  ?></strong></td>
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
  