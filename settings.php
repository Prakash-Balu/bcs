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

<!--START CONTENT  --> 
<script type="application/javascript">

function isnumeric(evt)
{
 var CharacterCode = (evt.which) ? evt.which : event.keyCode

 if (CharacterCode > 31 && (CharacterCode < 48 || CharacterCode > 57))
 {
	
	 //document.getElementById("error").style.display='block';
	 document.getElementById("lbl_txt_duration").innerHTML="Please type only numbers...!";
	return false;
 }
 else
 {
	  document.getElementById("lbl_txt_duration").innerHTML="";
 }
 return true;
}

function validate()
{
	if(document.getElementById("txt_code").value=='')
	{
		document.getElementById("lbl_txt_code").innerHTML='Enter the department code like Mca, Mba, etc....';
		document.getElementById("txt_code").focus();
		return false;		
	}
	else
	{
		document.getElementById("lbl_txt_code").innerHTML='';
	}
	if(document.getElementById("txt_name").value=='')
	{
		document.getElementById("lbl_txt_name").innerHTML='Enter the department name....';
		document.getElementById("txt_name").focus();
		return false;		
	}
	else
	{
		document.getElementById("lbl_txt_name").innerHTML='';
	}
	if(document.getElementById("txt_duration").value=='')
	{
		document.getElementById("lbl_txt_duration").innerHTML='Enter the course duration....';
		document.getElementById("txt_duration").focus();
		return false;		
	}
	else
	{
		document.getElementById("lbl_txt_duration").innerHTML='';
		return true;
	}
}

</script> 
<div id="content" class="container_12"> 
  
  <!--END NOTIFICATIONS  --> 
  
  <!--START ELEMENT EXAMPLES  -->
  <div class="grid_12"> 
    
    <!--START FORMS EXAMPLE -->
    
    <p style="font-size:20px; font-family:'Trebuchet MS';"> Settings</p>
    <p id="error" style="font-size:14px; font-family:'Trebuchet MS'; color:#F00; height:5px;"><?php 
	
	 include "db.php";
	 
	if(isset($_GET["status"]))
	{
		$status=$_GET["status"];
		if($status==1)
		{
			print "Update successfully....!";
		}
		if($status==2)
		{
			print "Update failed...!";
		}
	
		
	}
	
	 ?></p>
      <div style="min-height:350px;">
      <?php
				//`tbl_setting` comp_id `comp_name``comp_address``comp_vattin``comp_cstno``comp_panno``comp_gstno` `comp_cgst``comp_sgst`
		 		$sql="SELECT * FROM tbl_setting";
			
				//print $sql;
				$ses_result=mysql_query($sql);				
				$rowcount= mysql_num_rows($ses_result);
				
				$res=mysql_fetch_array($ses_result);
				
				$comp_id=$res["comp_id"];
				$comp_name=$res["comp_name"];
				$comp_add1=$res["comp_add1"];
				$comp_add2=$res["comp_add2"];
				$comp_add3=$res["comp_add3"];
				$comp_phno=$res["comp_phno"];
				$comp_vattin=$res["comp_vattin"];
				$comp_cstno=$res["comp_cstno"];
				$comp_panno=$res["comp_panno"];
				$comp_gstno=$res["comp_gstno"];
				$comp_cgst=$res["comp_cgst"];
				$comp_sgst=$res["comp_sgst"];
				$comp_igst=$res["comp_igst"];
			?>
            
    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="">
      <tr>
        <td><form id="frm" name="frm" action="settings_update.php" method="post" enctype="multipart/form-data">
            <table width="100%" align="left" cellpadding="10" cellspacing="0" class="tbll">
              <tr>
                <td valign="top" style="padding-left:20px;">Company Name:</td>
                <td colspan="2"><input id="comp_name" name="comp_name" type="text" class="inputs-medium" tabindex="" value="<?php print $comp_name; ?>"  /></td>
              </tr>
               <tr>
                <td valign="top" style="padding-left:20px;">Address Line 1:</td>
                <td colspan="2"><input id="comp_add1" name="comp_add1" type="text" class="inputs-medium" tabindex="" value="<?php print $comp_add1; ?>"  /></td>
              </tr>
              <tr>
                <td valign="top" style="padding-left:20px;">Address Line 2:</td>
                <td colspan="2"><input id="comp_add2" name="comp_add2" type="text" class="inputs-medium" tabindex="" value="<?php print $comp_add2; ?>"  /></td>
              </tr>
              <tr>
                <td valign="top" style="padding-left:20px;">Address Line 3:</td>
                <td colspan="2"><input id="comp_add3" name="comp_add3" type="text" class="inputs-medium" tabindex="" value="<?php print $comp_add3; ?>"  /></td>
              </tr>
              <tr>
                <td valign="top" style="padding-left:20px;">Phone No:</td>
                <td colspan="2"><input id="comp_phno" name="comp_phno" type="text" class="inputs-medium" tabindex="" value="<?php print $comp_phno; ?>"  /></td>
              </tr>
               <tr>
                <td valign="top" style="padding-left:20px;">VAT TIN:</td>
                <td colspan="2"><input id="comp_vattin" name="comp_vattin" type="text" class="inputs-medium" tabindex="" value="<?php print $comp_vattin; ?>"  /></td>
              </tr>
               <tr>
                <td valign="top" style="padding-left:20px;">CST No:</td>
                <td colspan="2"><input id="comp_cstno" name="comp_cstno" type="text" class="inputs-medium" tabindex="" value="<?php print $comp_cstno; ?>"  /></td>
              </tr>
               <tr>
                <td valign="top" style="padding-left:20px;">PAN No:</td>
                <td colspan="2"><input id="comp_panno" name="comp_panno" type="text" class="inputs-medium" tabindex="" value="<?php print $comp_panno; ?>"  /></td>
              </tr>
               <tr>
                <td valign="top" style="padding-left:20px;">GST No:</td>
                <td colspan="2"><input id="comp_gstno" name="comp_gstno" type="text" class="inputs-medium" tabindex="" value="<?php print $comp_gstno; ?>"  /></td>
              </tr>
              <tr>
                <td valign="top" style="padding-left:20px;">CGST %:</td>
                <td colspan="2"><input id="comp_cgstper" name="comp_cgstper" type="text" class="inputs-medium" tabindex="" value="<?php print $comp_cgst; ?>"  /></td>
              </tr>
              <tr>
                <td valign="top" style="padding-left:20px;">SGST %:</td>
                <td colspan="2"><input id="comp_sgstper" name="comp_sgstper" type="text" class="inputs-medium" tabindex="" value="<?php print $comp_sgst; ?>"  /></td>
              </tr>
              <tr>
                <td valign="top" style="padding-left:20px;">IGST %:</td>
                <td colspan="2"><input id="comp_sgstper" name="comp_igstper" type="text" class="inputs-medium" tabindex="" value="<?php print $comp_igst; ?>"  /></td>
              </tr>
              
               <tr>
                <td><input type="hidden" name="comp_id" value="<?php print $comp_id; ?>" /></td>
                <td colspan="2" valign="top">
                  <input type='submit' name='submit' id="submit" value='Update' class="myButton" />
                 </td>
              </tr>
            </table>
          </form></td>
      </tr>
    </table>
    </div>
    <!-- END TABS --> 
    
  </div>
  <!-- END CONTENT --> 
  
  <!-- START FOOTER -->
  <?php include "footer.php"; ?>