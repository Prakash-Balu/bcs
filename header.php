<?php 
$pagename=basename($_SERVER['PHP_SELF'], ".php"); 
$pagename=$pagename.'.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<!-- Mirrored from jeffadams.co.uk/themes/visual/blue/index1.html by HTTrack Website Copier/3.x [XR&CO'2013], Mon, 06 Jan 2014 09:46:00 GMT -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin</title>

<!--[if IE 6]>
<script src="js/DD_belatedPNG_0.0.8a-min.js"></script>
<script>
  
  DD_belatedPNG.fix('#header');
  DD_belatedPNG.fix('.notification');
  DD_belatedPNG.fix('.submit');
  DD_belatedPNG.fix('#info');
  DD_belatedPNG.fix('.pngfix');
  
</script>
<![endif]-->

<!-- LOAD JQUERY FROM GOOGLE CDN  -->
<script type="text/javascript" src="1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="Image_Form-Lightbox/fancyapps-fancyBox-e4836f7/lib/jquery-1.11.3.js"></script>

<!-- LOAD CUSTOM SCRIPTS AND JQUERY UI LIBRARY  -->
<script type="text/javascript" src="js/scripts.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.7.2.custom.min.js"></script>

<!-- LOAD FACEBOX -->
<script type="text/javascript" src="js/facebox.js"></script>
<link href="css/facebox.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/iepngfix_tilebg.js"></script>

<!-- MASTER STYLESHEET -->
<link href="css/styles.css" rel="stylesheet" type="text/css" />

<!-- START THE MENU -->
<script type="text/javascript">

// initialise plugins
jQuery(function(){
	jQuery('ul.sf-menu').superfish();
});



</script>
</head>

<body>
<!--START HEADER  -->
<div id="header">
  <div id="head_wrap" class="container_12"> 
    <?php
	include "db.php"; 
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
    <!--START LOGO  -->
    <div id="logo" class="grid_12">
      <h1 style="letter-spacing:-1px; font-family:'Times New Roman';">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><?php print $comp_name;  ?></strong>&nbsp;</h1>
    </div>
    <!-- END LOGO --> 
    
    
    
    <!--START NAVIGATION  -->
    <div id="nav" class="grid_8">
      <?php include "menu.php"; ?>
    </div>
    <!-- END NAV --> 
    <!-- START USERPANEL -->
    <div id="user_panel" class="grid_4">
      <ul>
        <li><a href="#">Welcome <?php print $_SESSION["cellu_name"]; ?></a></li>
      
        <li><a href="logout.php">Log out</a></li>
      </ul>
    </div>
    <!-- END USERPANEL --> 
    <!-- START SEARCH -->
   
    <!-- END SEARCH --> 
    
  </div>
  <!-- END HEAD_WRAP (CONTAINER FOR LOGO AND NAVIGATION --> 
  
</div>
<!--END HEADER (FULLL WIDTH WRAPPER WITH BG) -->