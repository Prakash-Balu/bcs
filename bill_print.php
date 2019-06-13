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
          <th width="14%" align="center" scope="col">Other State</th>
          <th width="14%" align="center" scope="col">Invoice No</th>  
          <th width="12%" align="center" scope="col">Order No</th>  
          <th width="11%" align="center" scope="col">Order Date</th>    
           <th width="12%" align="center" scope="col">Grand Total</th>
           <th width="9%" align="center" scope="col">Option</th>      
          <th width="9%" align="center" scope="col">Company</th>
          <th width="9%" align="center" scope="col">Buyer's</th>
          <th width="9%" align="center" scope="col">Transport</th>
        </tr>
        <?php
			include "db.php";
			
			$sqlSubject="SELECT * FROM `tbl_invoice`  GROUP BY `iv_ivno` ORDER BY `iv_id` DESC";
			//print $sqlSubject; 
			$rstSubject=mysql_query($sqlSubject);
			$rowcount= mysql_num_rows($rstSubject);
			if($rowcount==0)
			{
				?>
        <tr>
          <td colspan="10" align="center" style="font-family:'Trebuchet MS';">No Bills Found...!</td>
        </tr>
        <?php
			}
			else
			{
				for($i=1;$i<=$rowcount;$i++)
				{	
//`iv_ivno``iv_ivdate``iv_ordno``iv_orddate``iv_buydet` iv_grdtot
				$res=mysql_fetch_array($rstSubject);
        // echo "<pre>"; print_r($res); exit;
				$iv_buydet=$res["iv_buydet"];
				$iv_ivno=$res["iv_ivno"];
				$iv_ordno=$res["iv_ordno"];
				$iv_orddate=$res["iv_orddate"];
				$iv_grdtot=$res["iv_grdtot"];
        $iv_sgst = $res["iv_sgst"];
				
				?>
        <tr <?php if(($i%2)==0){ ?> class="alternate" <?php } ?>>
          <td height="67" align="center"><?php print $i; ?></td>
          <td align="center"><?php print $iv_buydet; ?></td>
          <td align="center"><?php print !empty($iv_sgst) ? 'No' : 'Yes'; ?></td>
          <td align="center"><?php print $iv_ivno; ?></td>
          <td align="center"><?php print $iv_ordno; ?></td>
          <td align="center"><?php print $iv_orddate; ?></td>
          <td align="center"><?php print $iv_grdtot; ?></td>
          <td align="center"><a href="bill_generate.php?sid=<?php print $iv_ivno; ?>" title="Edit">Edit</a>
          <a href="bill_delete.php?sid=<?php print $iv_ivno; ?>" title="Delete">Delete</a></td>
          <td align="center"><a href="bill_company_print.php?sid=<?php print $iv_ivno; ?>&prType=company" title="Print" target="_blank">Print</a></td>
          <td align="center"><a href="bill_company_print.php?sid=<?php print $iv_ivno; ?>&prType=buyer" title="Print" target="_blank">Print</a></td>
          <td align="center"><a href="bill_company_print.php?sid=<?php print $iv_ivno; ?>&prType=transport" title="Print" target="_blank">Print</a></td>
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