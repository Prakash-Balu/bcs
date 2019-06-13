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
<!--START CONTENT  --> 
<link rel="stylesheet" href="mydatepicker/themes/base/jquery.ui.all.css">
<script src="mydatepicker/jquery-1.10.2.js"></script>
<script src="mydatepicker/ui/jquery.ui.core.js"></script>
<script src="mydatepicker/ui/jquery.ui.widget.js"></script>
<script src="mydatepicker/ui/jquery.ui.datepicker.js"></script>

<script>
$(function() 
{
	$("#date1,#date2").datepicker
	({
		/*minDate: -20, maxDate: "+1M +10D",*/
		maxDate: "D",
		dateFormat: "dd-mm-yy",
		changeMonth: true,
		changeYear: true,
		beforeShow: function (input, inst) 
		{
			setTimeout(function () 
			{
				//inst.dpDiv.css
//					({
//						top: 250,
//						left: 880
//					});
			}, 0);
		}
		
	});
	
});
</script>

 
<div id="content" class="container_12"> 
  
  <!--END NOTIFICATIONS  --> 
  
  <!--START ELEMENT EXAMPLES  -->
  <div class="grid_12"> 
    
    <!--START FORMS EXAMPLE -->
    
    <p style="font-size:20px; font-family:'Trebuchet MS';">Quotation Report</p>
    <p id="error" style="font-size:14px; font-family:'Trebuchet MS'; color:#F00; height:5px;"><?php 
	
	 include "db.php";
	if(isset($_GET["status"]))
	{
		$status=$_GET["status"];
		if($status==1)
		{
			print "Updated successfully....!";
		}
		if($status==2)
		{
			print "Update failed...!";
		}
		if($status==4)
		{
			print "Deleted successfully....!";
		}
		if($status==5)
		{
			print "Delete failed...!";
		}
		
	}
	$start='';
	$end='';
	if(isset($_POST["date1"]))
	{
			$start=trim($_POST["date1"]);
	
	}
	if(isset($_POST["date2"]))
	{
	
	
		$end=trim($_POST["date2"]);
	
	}
	 ?></p>
      <div style="min-height:350px;">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" >
      <tr>
        <td><form id="frm" name="frm" action="quotation_report.php" method="post">
        <fieldset>
        <legend>Report Details</legend>
        <br/>
            <table width="100%" align="left" cellpadding="10" cellspacing="0" style="font-family:'Trebuchet MS';color:#000;">
              
              
              <tr>
                <td width="126" valign="top" style="">Start Date:</td>
                <td colspan="2"><input id="date1" name="date1" type="text" class="inputs" autocomplete="off" tabindex="" value="<?php print $start; ?>"  /></td>
              
                <td width="150" valign="top" style="">End Date:</td>
                <td colspan="2"><input id="date2" name="date2" type="text" class="inputs" autocomplete="off" tabindex="" value="<?php print $end; ?>"  /></td>
             
                <td width="110" colspan="2" valign="top">
                  <input type='submit' name='submit' id="submit" value='submit' class="myButton" onclick="return validate();" />
                 </td>
              </tr>
            </table>
            </fieldset>
            
          </form></td>
      </tr>
    </table>
    <?php
	if($start!='' && $end!='')
	{
	 include "lightbox.php"; 
	?>
    <script src="export/excel/jquery.battatech.excelexport.js"></script>
                 <div align="right" style="padding-right:65px;">
                  <button id="btnExport">Export</button>
                </div>
    <table width="100%" align="left" class="listtbl" id="listtbl" cellpadding="10" border="1" cellspacing="0" >
        <tr >
          <th width="5%" align="center" scope="col">S.No</th>
          <th width="20%" align="center" scope="col">Buyer's Details</th>
          <th width="15%" align="center" scope="col">Quotation No</th>  
          <th width="15%" align="center" scope="col">Expected Date</th>    
           <th width="17%" align="center" scope="col">Grand Total</th>      
          <th width="11%" align="center" scope="col">detail</th>
        </tr>
        <?php
			include "db.php";
			//`tbl_quatation`  `qt_id``qt_qtno``qt_qtdate``qt_expdate``qt_buydet``qt_prdname``qt_prdprice``qt_prdqty``qt_prdamount``qt_tot``qt_cgst``qt_cgstv``qt_sgst``qt_sgstv``qt_grdtot``qt_crtid``qt_crtdate`
			$sqlSubject="SELECT * FROM `tbl_quatation` WHERE `qt_qtdate` BETWEEN '$start' AND '$end' GROUP BY `qt_qtno`";
			//print $sqlSubject; 
			$rstSubject=mysql_query($sqlSubject);
			$rowcount= mysql_num_rows($rstSubject);
			if($rowcount==0)
			{
				?>
        <tr>
          <td colspan="7" align="center" style="font-family:'Trebuchet MS';">No Bills Found...!</td>
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
          <td align="center"><a class="fancybox fancybox.iframe" href="qreport.php?sid=<?php print $qt_qtno; ?>" title="View Details">View</a></td>
        </tr>
        <?php
  				}
  	}
  ?>
      </table>
      <?php
	}
	?>
    <script type="text/javascript">
    $(document).ready(function () {

        $("#btnExport").click(function () {
            $("#listtbl").btechco_excelexport({
                containerid: "listtbl"
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