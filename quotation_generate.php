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

<?php
			include "db.php";
			
			$sqlDept="SELECT `comp_cgst`,`comp_sgst` FROM `tbl_setting`";
			$rstDept=mysql_query($sqlDept);
			$res=mysql_fetch_array($rstDept);
			
			    $cgst=$res["comp_cgst"];
				$sgst=$res["comp_sgst"];
				?>

<script src="js/jquery.min.js"></script> 

<script type="text/javascript"> 

//total price calculation 
function calculateTotal(){
	
	subTotal = 0 ; total = 0; 
	$('.totalLinePrice').each(function(){
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});

		total = subTotal;
	//}
	$('#totalamount').val( total.toFixed(2) );
	var cgst = parseFloat(document.getElementById('cgst').value);
	var sgst =parseFloat(document.getElementById('sgst').value);
	cgst=isNaN(cgst)?0:cgst;
	sgst=isNaN(sgst)?0:sgst;
	var gtot;
	var cgsttot=(cgst/100)*total;
	var sgsttot=(sgst/100)*total;
	$('#txt_cgst').val( cgsttot.toFixed(2) );
	$('#txt_sgst').val( sgsttot.toFixed(2) );
	gtot=total+cgsttot+sgsttot;
	$('#txt_grdtot').val( gtot.toFixed(2) );
	 
	 var word=RsPaise(gtot);
	$('#inwords').html(word);
	$('#aiw').val(word);
	 
}

function Rs(amount){
var words = new Array();
words[0] = 'Zero';words[1] = 'One';words[2] = 'Two';words[3] = 'Three';words[4] = 'Four';words[5] = 'Five';words[6] = 'Six';words[7] = 'Seven';words[8] = 'Eight';words[9] = 'Nine';words[10] = 'Ten';words[11] = 'Eleven';words[12] = 'Twelve';words[13] = 'Thirteen';words[14] = 'Fourteen';words[15] = 'Fifteen';words[16] = 'Sixteen';words[17] = 'Seventeen';words[18] = 'Eighteen';words[19] = 'Nineteen';words[20] = 'Twenty';words[30] = 'Thirty';words[40] = 'Forty';words[50] = 'Fifty';words[60] = 'Sixty';words[70] = 'Seventy';words[80] = 'Eighty';words[90] = 'Ninety';var op;
amount = amount.toString();
var atemp = amount.split(".");
var number = atemp[0].split(",").join("");
var n_length = number.length;
var words_string = "";
if(n_length <= 9){
var n_array = new Array(0, 0, 0, 0, 0, 0, 0, 0, 0);
var received_n_array = new Array();
for (var i = 0; i < n_length; i++){
received_n_array[i] = number.substr(i, 1);}
for (var i = 9 - n_length, j = 0; i < 9; i++, j++){
n_array[i] = received_n_array[j];}
for (var i = 0, j = 1; i < 9; i++, j++){
if(i == 0 || i == 2 || i == 4 || i == 7){
if(n_array[i] == 1){
n_array[j] = 10 + parseInt(n_array[j]);
n_array[i] = 0;}}}
value = "";
for (var i = 0; i < 9; i++){
if(i == 0 || i == 2 || i == 4 || i == 7){
value = n_array[i] * 10;} else {
value = n_array[i];}
if(value != 0){
words_string += words[value] + " ";}
if((i == 1 && value != 0) || (i == 0 && value != 0 && n_array[i + 1] == 0)){
words_string += "Crores ";}
if((i == 3 && value != 0) || (i == 2 && value != 0 && n_array[i + 1] == 0)){
words_string += "Lakhs ";}
if((i == 5 && value != 0) || (i == 4 && value != 0 && n_array[i + 1] == 0)){
words_string += "Thousand ";}
if(i == 6 && value != 0 && (n_array[i + 1] != 0 && n_array[i + 2] != 0)){
words_string += "Hundred and ";} else if(i == 6 && value != 0){
words_string += "Hundred ";}}
words_string = words_string.split(" ").join(" ");}
return words_string;}
function RsPaise(n){
nums = n.toString().split('.')
var whole = Rs(nums[0])
if(nums[1]==null)nums[1]=0;
if(nums[1].length == 1 )nums[1]=nums[1]+'0';
if(nums[1].length> 2){nums[1]=nums[1].substring(2,length - 1)}
if(nums.length == 2){
if(nums[0]<=9){nums[0]=nums[0]*10} else {nums[0]=nums[0]};
var fraction = Rs(nums[1])
if(whole=='' && fraction==''){op= 'Zero only';}
if(whole=='' && fraction!=''){op= fraction + 'paise only';}
if(whole!='' && fraction==''){op= whole + 'Rupees only';} 
if(whole!='' && fraction!=''){op= whole + 'Rupees and ' + fraction + 'paise only';}
if(n > 999999999.99){op='Oops!!! The amount is too big to convert';}
if(isNaN(n) == true ){op='Error : Amount in number appears to be incorrect. Please Check.';}
return op; }}
var amount=RsPaise(10.50);
console.log(amount)
$(document).on('change keyup blur','.totalLinePrice',function()
{
	calculateTotal();
});


//adds extra table rows


$(document).on('change keyup blur','.feestext',function(){

	empty = 0 ;
	
	var i=$('.listtbl tr').length-2;
	$('.feestext').each(function()
	{
		if($(this).val() == '' )empty ++;
	});
	
	if(empty==0)
	{
			html = '<tr id="tr_'+i+'" >';
		html += '<td align="center"><input type="text" name="product['+i+']" id="product_'+i+'" class="feestext"  autocomplete="off" autofocus="autofocus"   /></td>';
		html += '<td align="center"><input type="text" name="price['+i+']" id="price_'+i+'" autocomplete="off" onkeyup="sum();"  ;"  /></td>';
		html += '<td align="center"><input type="text" name="qty['+i+']" id="qty_'+i+'" autocomplete="off" onkeyup="sum();" /></td>';
		html += '<td align="center"><input type="text" name="feeamount['+i+']" id="feeamount_'+i+'" autocomplete="off"  onKeyPress="return IsNumeric(event);"  class="totalLinePrice"  /></td>';
		html += '</tr>';
		$('.listtbl').append(html);
		i++;
	}
	});


//It restrict the non-numbers
var specialKeys = new Array();
specialKeys.push(8,46); //Backspace
function IsNumeric(e) 
{
    var keyCode = e.which ? e.which : e.keyCode;
    console.log( keyCode );
    var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
    return ret;
}

</script> 
<script>
 function sum() {
    totalItems = ($('.listtbl tr').length - 3);console.log(totalItems);
    for(i = 1; i <= totalItems; i++){
      var v1 = parseFloat($('#price_'+i).val());
      var v2 = parseFloat($('#qty_'+i).val());
      total = v1 * v2;
      if(isNaN(total)){
        total = 0;
      }
      $('#feeamount_'+i).val(total);
	  calculateTotal();
    }
   }

</script>
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

<!--START CONTENT  --> 

<div id="content" class="container_12"> 
  
  <!--END NOTIFICATIONS  --> 
  
  <!--START ELEMENT EXAMPLES  -->
  <div class="grid_12"> 
    
    <!--START FORMS EXAMPLE -->
    <p style="font-size:20px; font-family:'Trebuchet MS';">Quotation Generate</p>
    <p id="error" style="font-size:14px; font-family:'Trebuchet MS'; color:#F00; height:5px;">
                  <?php
				  if(isset($_GET["status"]))
	{
		$status=$_GET["status"];
		if($status==1)
		{
			print "Inserted successfully....!";
		}
		if($status==2)
		{
			print "Insert failed...!";
		}
	
		
	}
				
				$select="Select * from auto_id";
				$exe=mysql_query($select);
				$res=mysql_fetch_array($exe);
				$quotation=$res["auto_quotation"];
				$auto_quotation="QUO".$res["auto_quotation"];
				
				?>

      
      </p>
    <div style="min-height:350px;">
    <form id="frm" name="frm" action="quotation_generate_save.php" method="post">
    <table width="100%" align="left" class="listtbl" cellpadding="10" border="1" cellspacing="0" >
        <tr >
        <input type="hidden" name="hdn_quotation" id="hdn_quotation" value="<?php print $quotation;  ?>" />
          <th width="10%" align="left" scope="col">Quotation No</th>
          <td width="12%" align="left" scope="col"><input type="text" name="txt_qtno" id="txt_qtno" value="<?php print $auto_quotation; ?>" /></th>
          <th width="27%" align="left" scope="col">Date</th>
          <td width="12%" align="left" scope="col"><input id="date1" autocomplete="off" name="date1" type="text" tabindex="" value=""  /></th>
        </tr>
        <tr >
          <th width="10%" align="left" scope="col">Buyer's Details</th>
          <td width="12%" align="left" scope="col"><textarea id="buyer_Address" name="buyer_Address" autocomplete="off" rows="3" cols="30"  tabindex="7"></textarea></td>
          <th width="27%" align="left" scope="col">Expecting Date</th>
          <td width="12%" align="left" scope="col"><input id="date2" name="date2" type="text" autocomplete="off" tabindex="" value=""  /></td>
        </tr>
        <tr >
          <th width="25%" align="center" scope="col">Product Name</th>
          <th width="25%" align="center" scope="col">Price</th>
          <th width="25%" align="center" scope="col">Quantity</th>
          <th width="25%" align="center" scope="col">Amount</th>
        </tr>
        <tr id="tr_1">
          <td align="center"><input type="text" name="product[1]" id="product_1" class="feestext"  autocomplete="off" autofocus="autofocus" onKeyUp="cleartext(this.id);"  /></td>
          <td align="center"><input type="text" name="price[1]" id="price_1" onkeyup="sum();" autocomplete="off" onKeyPress="return IsNumeric(event);"  /></td>
          <td align="center"><input type="text" name="qty[1]" id="qty_1" onkeyup="sum();" autocomplete="off" onKeyPress="return IsNumeric(event);"  /></td>
          <td align="center"><input type="text" name="feeamount[1]" id="feeamount_1" autocomplete="off"  onKeyPress="return IsNumeric(event);"  class="totalLinePrice"  /></td>
        </tr>
      </table>
      
      <table width="100%" align="left" class="listtbl1" cellpadding="10" cellspacing="0" >
      <tr>
          <th  align="right" colspan="3" scope="col">Total</th>
          <td width="27%" align="center"><input name="totalamount" type="text"  id="totalamount" placeholder="total amount" onkeyup="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"  readonly="readonly" onKeyPress="cgst();"  /></td>
        </tr>
        <tr>
        <input type="hidden" name="cgst" id="cgst" value="<?php print $cgst; ?>" />
          <th  align="right" colspan="3" scope="col">CGST <?php print $cgst; ?>%:</th>
          <td width="27%" align="center"><input name="txt_cgst" type="text"  id="txt_cgst" onKeyPress="cgst();"  /></td>
        </tr>
        <tr>
        <input type="hidden" name="sgst" id="sgst" value="<?php print $sgst; ?>" />
          <th  align="right" colspan="3" scope="col">SGST <?php print $sgst; ?>%:</th>
          <td width="27%" align="center"><input name="txt_sgst" type="text"  id="txt_sgst"   /></td>
        </tr>
        <tr>
        <input type="hidden" name="aiw" id="aiw"  />
          <th  align="right" colspan="2" scope="col" id="inwords"></th>
          <th  align="right" scope="col">Grand Total</th>
          <td width="27%" align="center"><input name="txt_grdtot" type="text"  id="txt_grdtot"   /></td>
        </tr>
         <tr>
          <th  align="center" colspan="4" scope="col"><input type='submit' name='submit' id="submit" value='Submit' class="myButton" /></th>
        </tr>
      </table>
      </form>
      
    </div>
    
    <!-- END TABS --> 
    
  </div>
  <!-- END CONTENT --> 
  
  <!-- START FOOTER -->
  <?php include "footer.php"; ?>