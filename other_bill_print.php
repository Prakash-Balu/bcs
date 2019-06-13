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
    
    <p style="font-size:20px; font-family:'Trebuchet MS';">Bill Print</p>
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
          <th width="14%" align="center" scope="col">Invoice No</th>  
          <th width="12%" align="center" scope="col">Order No</th>  
          <th width="11%" align="center" scope="col">Order Date</th>    
           <th width="12%" align="center" scope="col">Grand Total</th>      
          <th width="9%" align="center" scope="col">Company</th>
          <th width="9%" align="center" scope="col">Buyer's</th>
          <th width="9%" align="center" scope="col">Transport</th>
        </tr>
        <?php
			include "db.php";
			
			$sqlSubject="SELECT * FROM `tbl_other_invoice`  GROUP BY `oiv_ivno` ORDER BY `oiv_id` DESC";
			//print $sqlSubject; 
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
				$iv_buydet=$res["oiv_buydet"];
				$iv_ivno=$res["oiv_ivno"];
				$iv_ordno=$res["oiv_ordno"];
				$iv_orddate=$res["oiv_orddate"];
				$iv_grdtot=$res["oiv_grdtot"];
				
				?>
        <tr <?php if(($i%2)==0){ ?> class="alternate" <?php } ?>>
          <td height="67" align="center"><?php print $i; ?></td>
          <td align="center"><?php print $iv_buydet; ?></td>
          <td align="center"><?php print $iv_ivno; ?></td>
          <td align="center"><?php print $iv_ordno; ?></td>
          <td align="center"><?php print $iv_orddate; ?></td>
          <td align="center"><?php print $iv_grdtot; ?></td>
          <td align="center"><a href="otherbill_company_print.php?sid=<?php print $iv_ivno; ?>" title="Print">Print</a></td>
          <td align="center"><a href="otherbill_buyers_print.php?sid=<?php print $iv_ivno; ?>" title="Print">Print</a></td>
          <td align="center"><a href="otherbill_transport_print.php?sid=<?php print $iv_ivno; ?>" title="Print">Print</a></td>
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