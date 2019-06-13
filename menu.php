<?php
$login_type=trim($_SESSION['login_type']);	

?>
<ul class="sf-menu">

  
  <!-- class "current" defines this as current page -->
  <li><a href="inner.php">Dashboard</a></li>
  
  <!-- Example of an item with nested list, this will display as a drop down menu --> 
  <!-- <li><a href="#" class="current">Master</a>-->
  <?php
if($login_type=='A')
{

?>
       <li><a href="#">Bill</a>
          <ul>
            <li><a href="bill_generate.php">Bill Generate</a></li>
            <li><a href="bill_print.php">Bill Print</a></li>
          </ul>
        </li>
        <!-- <li><a href="#">Report</a>
          <ul>
            <li><a href="bill_report.php">Bill Report</a></li>
            <li><a href="bill_invoiceno_report.php">Bill Invoice Report</a></li>
          </ul>
        </li> -->
        <!-- <li><a href="#">Other State</a>
          <ul>
            <li><a href="other_bill_generate.php">Bill Generate</a></li>
            <li><a href="other_bill_print.php">Bill Print</a></li>
            <li><a href="other_bill_report.php">Bill Report</a></li>
          </ul>
        </li> -->
        <li><a href="#">Quotation</a>
          <ul>
            <li><a href="quotation_generate.php">Quotation Generate</a></li>
            <li><a href="quotation_print.php">Quotation Print</a></li>
            <li><a href="quotation_report.php">Quotation Report</a></li>
          </ul>
        </li>
      <li><a href="settings.php">Settings</a>
 	<?php
}

?>
</ul>
