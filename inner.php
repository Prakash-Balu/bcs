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
<div id="content" class="container_12"> 
  
  <!--END NOTIFICATIONS  --> 
  
  <!--START ELEMENT EXAMPLES  -->
  <div class="grid_12"> 
    
    <!--START FORMS EXAMPLE -->
    
    <div style="min-height:450px;">
      <table width="100%" border="0" cellspacing="0" cellpadding="0" style="">
        <tr>
          <td align="center"><br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <h1><strong>BEST COMMERCIAL SYSTEMS</strong> </h1></td>
        </tr>
      </table>
    </div>
    <!-- END TABS --> 
    
  </div>
  <!-- END CONTENT --> 
  
  <!-- START FOOTER -->
  <?php include "footer.php"; ?>