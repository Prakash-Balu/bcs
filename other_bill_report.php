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
    
    <p style="font-size:20px; font-family:'Trebuchet MS';">Bill Report</p>
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
        <td><form id="frm" name="frm" action="other_bill_report.php" method="post">
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
    <table width="100%" align="left" class="listtbl" id="tblExport" cellpadding="10" border="1" cellspacing="0" >
        <tr >
          <th width="5%" align="center" scope="col">S.No</th>
          <th width="20%" align="center" scope="col">Buyer's Details</th>
          <th width="15%" align="center" scope="col">Invoice No</th>  
          <th width="17%" align="center" scope="col">Order No</th>  
          <th width="15%" align="center" scope="col">Order Date</th>    
           <th width="17%" align="center" scope="col">Grand Total</th>      
          <th width="11%" align="center" scope="col">detail</th>
        </tr>
        <?php
			include "db.php";
			
			$sqlSubject="SELECT * FROM `tbl_other_invoice` WHERE `oiv_ivdate` BETWEEN '$start' AND '$end' GROUP BY `oiv_ivno`";
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
//`oiv_ivno``oiv_ivdate``oiv_ordno``oiv_orddate``oiv_buydet``oiv_tod``oiv_prdname``oiv_prdprice``oiv_prdqty``oiv_prdamount``oiv_tot``oiv_igst``oiv_igstv``oiv_grdtot``oiv_aiw`
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
          <td align="center"><a class="fancybox fancybox.iframe" href="other_report.php?sid=<?php print $iv_ivno; ?>" title="View Details">View</a></td>
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