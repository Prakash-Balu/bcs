<style>
table {
    border-collapse: collapse;
	border: 1px solid black;
}
 tr.hide_right > td, td.hide_right{
        border-right-style:hidden;
      }
	  tr.hide_left > td, td.hide_left{
        border-left-style:hidden;
		border-bottom-style:hidden;
		border-top-style:hidden;
      }
	  tr.hide_top > td, td.hide_top{
		border-bottom-style:hidden;
		border-top-style:hidden;
      }
	  tr.hide_bottom > td, td.hide_bottom{
		border-top-style:hidden;
      }
	  tr.hide_bot > td, td.hide_bot{
		border-bottom-style:hidden;
      }
      tr.hide_all > td, td.hide_all{
        border-style:hidden;
      }

tr.noBorder td {
  border: 0;
}
</style><script>
  window.print();
</script><?php
include "db.php";
 if(isset($_GET["prType"]))
          {
            if( $_GET["prType"] == 'company' )
                $printTypeName = "Original-Company Copy";
            if( $_GET["prType"] == 'buyer' )
                $printTypeName = "Original-Buyer's Copy";
            if( $_GET["prType"] == 'transport' )
                $printTypeName = "Original-Transport Copy";
            }
 if(isset($_GET["sid"]))
				  {
					$invoice=$_GET["sid"]; 
				  }
			$sqlSubject="SELECT * FROM `tbl_invoice` WHERE `iv_ivno`='$invoice' GROUP BY `iv_ivno`;";
			//print $sqlSubject; 
			$rstSubject=mysql_query($sqlSubject);
			$rowcount= mysql_num_rows($rstSubject);
			
				for($i=1;$i<=$rowcount;$i++)
				{	
//`tbl_invoice` `iv_ivno``iv_ivdate``iv_ordno``iv_orddate``iv_buydet``iv_tod``iv_prdname``iv_prdprice``iv_prdqty``iv_prdamount``iv_tot``iv_cgst``iv_sgst``iv_grdtot``iv_crtid``iv_crtdate`		`iv_cgstv``iv_sgstv`		
                $res=mysql_fetch_array($rstSubject);
				$iv_ivno=$res["iv_ivno"];
				$iv_ivdate=$res["iv_ivdate"];
				$iv_ordno=$res["iv_ordno"];
				$iv_orddate=$res["iv_orddate"];
				$iv_buydet=$res["iv_buydet"];
				$iv_tod=$res["iv_tod"];
				$iv_tot=$res["iv_tot"];
				$iv_cgst=$res["iv_cgst"];
				$iv_cgstv=$res["iv_cgstv"];
				$iv_sgst=$res["iv_sgst"];
				$iv_sgstv=$res["iv_sgstv"];
				$iv_grdtot=$res["iv_grdtot"];
				$iv_aiw=$res["iv_aiw"];
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
<td ><?php print $printTypeName;?></td>
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
<table width="100%" height="306" border="1">
  <tr class="hide_bottom" >
    <td width="7%" align="center">S.No</td>
    <td width="53%" align="center">Description of Goods</td>
    <td width="13%" align="center">HSN/SAC</td>
    <td width="7%" align="center">Qty</td>
    <td width="13%" align="center"> Rate</td>
    <td width="20%" align="center">Amount</td>
  </tr>
    <tr class="hide_bottom">
    <td height="1" colspan="5" ></td>
  </tr>
  <tr class="hide_bot" >
    <td height="1" colspan="5" ></td>
  </tr>
  <tr class="hide_bottom">
    <td height="1" colspan="4" ></td>
    <td ></td>
  </tr>
  <?php
  $inv="SELECT * FROM `tbl_invoice` WHERE `iv_ivno`='$invoice'";
			//print $inv;    
			$resinv=mysql_query($inv);
			$rowcount= mysql_num_rows($resinv);
      for($i=1;$i<=$rowcount;$i++)
			{
    		$datainv=mysql_fetch_array($resinv);
    		$name=$datainv['iv_prdname'];
    		$price=$datainv['iv_prdprice'];
    		$qty=$datainv['iv_prdqty'];
    		$amount=$datainv['iv_prdamount'];
    		//print $name;
        if(!empty($name)) {
	 ?>
    <tr class="hide_top">
      <td align="center"><?php print $i;  ?></td>
      <td style="padding-left:15px;" ><?php print $name;  ?></td>
      <td align="center"></td>
      <td align="center"><?php print $qty;  ?></td>
      <td align="center"><?php print $price;  ?></td>
      <td align="center"><?php print $amount;  ?></td>
    </tr>
   <?php
    }
	}
  ?>
  <tr class="hide_bottom">
    <td height="1" colspan="6" ></td>
  </tr>
  <tr class="hide_bot" >
    <td height="1" colspan="6" ></td>
  </tr>
  <tr class="hide_bottom">
    <td height="1" colspan="5" ></td>
    <td ></td>
  </tr>
   <tr class="hide_bottom" >
    <td colspan="5" align="right">Total</td>
    <td align="center"><strong><?php print $iv_tot;  ?></strong></td>
  </tr>
  <tr class="<?php print !empty($iv_sgst)? 'hide_top':'hide_bottom'; ?>">
    <td colspan="5" align="right"><?php print !empty($iv_sgst)? 'CGST':'IGST';?> <strong><?php print $iv_cgst;  ?></strong>%</td>
    <td align="center"><?php print $iv_cgstv;  ?></td>
  </tr>
  <?php if(!empty($iv_sgst) ){?>
   <tr >
    <td colspan="5" align="right">SGST <strong><?php print $iv_sgst;  ?></strong>%</td>
    <td align="center"><?php print $iv_sgstv;  ?></td>
  </tr>
<?php }?>
     <tr>
    <td colspan="4" align="left"><?php print $iv_aiw; ?></td>
    <td align="right">Grand Total</td>
    <td align="center"><strong><?php print $iv_grdtot;  ?></strong></td>
  </tr>
</table>
<!-- <table style="border: none;">
 <tr class="noBorder">
    <td height="44" colspan="8"><u></u></td>
    <td width="14%" height="44" valign="bottom"><strong>Company Bank Details</strong></td>
  </tr>
</table> -->
<div style="margin-top: 6px;position: absolute; width:100%">
  <div style="margin-left: 67%;">
    <p><strong>Company Bank Details</strong></p>
  </div>
  <div style="margin-left: 65%;">
    <p><strong>Bank Name:</strong>CITY UNION BANK</p>
    <p><strong>A/C No:</strong>510909010104647</p>
    <p>Branch & IFSC Code:</strong>CIUB0000510</p>
  </div>
</div>
<table style="margin-top:200px;" width="100%" border="0">
 <tr class="noBorder">
    <td height="44" colspan="4"><u>Declaration:</u></td>
    <td width="44%" height="44" valign="top"><strong>for <?php print $comp_name;  ?></strong></td>
  </tr>
 <tr class="noBorder">
   <td height="57" colspan="4"><p align="justify">We declare that this invoice shows the actual price of the goods
described and that all particulars are true and correct.</p></td>
   <td height="57" valign="bottom" align="center">Authorized Signature</td>
 </tr>
</table>
  