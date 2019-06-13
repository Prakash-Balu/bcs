<?php 

		$rstSubject=mysql_select_db($dbname) or die(mysql_error());

		$sqlSubject="Select * from ec_subjects where sub_depid=$did and sub_yearid=$yid and sub_lab='Yes' order by sub_id";
		//print $sqlSubject;
		$rstSubject=mysql_query($sqlSubject);
		$rowcountsubj= mysql_num_rows($rstSubject);
		$subcode=array();
		$subId=array();
		for($subj=1;$subj<=$rowcountsubj;$subj++)
		{	
			$ressubj=mysql_fetch_array($rstSubject);
			$sub_code=$ressubj["sub_code"];
			$sub_name=$ressubj["sub_name"];
			$sub_id=$ressubj["sub_id"];
			$sub_lab=$ressubj["sub_lab"];
			$subcode[]=$sub_code;
			$subId[]=$sub_id;
			$lab[]=$sub_lab;
		}
		$subcount=0;
		for($i=1;$i<=count($array);$i++)
		{
			//$k=1;
			for($h=1;$h<=$tHours;$h++)
			{	
						
				
				/*print $i."-".$h."-".$subcode[$subcount]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
				if($h==8)
				{
					print "<br/>";
				}
				if($subcount==6)
				{
					$subcount=0;
				}
				else
				{
					$subcount++;
					/*if($lab[$subcount]=='No')
					{
						$subcount++;
					}*/
				//}
				
			}
		}

?>