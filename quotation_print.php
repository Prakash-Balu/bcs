<?php
session_start();

if(isset($_SESSION["cellu_id"]))
{

}
else
{
	
	header("location:index.php");
}
?>
<?php include "header.php"; ?>
<style>


#btnExport {
	color: #fff;
	font-size: 0;
	width: 37px;
	height: 35px;
	border: none;
	margin: 0;
	padding: 0;
	cursor: pointer;
	background: url(export/excel-icon.jpg) 0 0 no-repeat;
}
</style>
<div id="content" class="container_12"> 
  
  <!--END NOTIFICATIONS  --> 
  
  <!--START ELEMENT EXAMPLES  -->
  <div class="grid_12"> 
    
    <!--START FORMS EXAMPLE -->
    
    <p style="font-size:20px; font-family:'Trebuchet MS';">Quotation Print</p>
    <p id="error" style="font-size:14px; font-family:'Trebuchet MS'; color:#F00; height:5px;">
	<?php 
	 include "db.php";
	 ?></p>
      <div style="min-height:350px;">
    <script src="export/excel/jquery.battatech.excelexport.js"></script>
                 <div align="right" style="padding-right:65px;">
                  <button id="btnExport">Export</button>
                </div>
    <table width="100%" align="left" class="listtbl" id="tblExport" cellpadding="10" border="1" cellspacing="0" >
        <tr >
          <th width="6%" align="center" scope="col">S.No</th>
          <th width="18%" align="center" scope="col">Buyer's Details</th>
          <th width="14%" align="center" scope="col">Quotation No</th>  
          <th width="15%" align="center" scope="col">Expected Date</th>    
           <th width="12%" align="center" scope="col">Grand Total</th>      
          <th width="9%" align="center" scope="col">Print</th>
        </tr>
        <?php
			include "db.php";
			
			$sqlSubject="SELECT * FROM `tbl_quatation`  GROUP BY `qt_qtno` ORDER BY `qt_id` DESC";
			//print $sqlSubject; `qt_qtno``qt_qtdate``qt_expdate``qt_buydet``qt_prdname``qt_prdprice``qt_prdqty``qt_prdamount``qt_tot``qt_cgst``qt_cgstv``qt_sgst``qt_sgstv``qt_grdtot``qt_aiw`
			$rstSubject=mysql_query($sqlSubject);
			$rowcount= mysql_num_rows($rstSubject);
			if($rowcount==0)
			{
				?>
        <tr>
          <td colspan="9" align="center" style="font-family:'Trebuchet MS';">No Bills Found...!</td>
        </tr>
        <?php
			}
			else
			{
				for($i=1;$i<=$rowcount;$i++)
				{	
//`iv_ivno``iv_ivdate``iv_ordno``iv_orddate``iv_buydet` iv_grdtot
				$res=mysql_fetch_array($rstSubject);
				$qt_buydet=$res["qt_buydet"];
				$qt_qtno=$res["qt_qtno"];
				$qt_expdate=$res["qt_expdate"];
				$qt_grdtot=$res["qt_grdtot"];
				
				?>
        <tr <?php if(($i%2)==0){ ?> class="alternate" <?php } ?>>
          <td height="67" align="center"><?php print $i; ?></td>
          <td align="center"><?php print $qt_buydet; ?></td>
          <td align="center"><?php print $qt_qtno; ?></td>
          <td align="center"><?php print $qt_expdate; ?></td>
          <td align="center"><?php print $qt_grdtot; ?></td>
          <td align="center"><a href="quotation_bill_print.php?sid=<?php print $qt_qtno; ?>" title="Print">Print</a></td>
        </tr>
        <?php
  				}
  	}
  ?>
      </table>
   
    <script type="text/javascript">
    $(document).ready(function () {

        $("#btnExport").click(function () {
            $("#tblExport").btechco_excelexport({
                containerid: "tblExport"
               , datatype: $datatype.Table
            });
        });
    });	
</script> 
    </div>
    <!-- END TABS --> 
    
  </div>
  <!-- END CONTENT --> 
  
  <!-- START FOOTER -->
  <?php include "footer.php"; ?>