<?php 

		$rstSubject=mysql_select_db($dbname) or die(mysql_error());

		$sqlSubject="Select * from ec_subjects where sub_depid=$did and sub_yearid=$yid order by sub_id";
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
			$order1=$array[$i-1];
			//print $order1;
			for($h=1;$h<=$tHours;$h++)
			{			
				
				$sid=$subId[$subcount];
				//print $i."-".$h."-".$subcode[$subcount]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
				
				if($subcount==6)
				{
					$subcount=0;
				}
				else
				{
					$subcount++;
					
				}
				$insert="insert into tbl_timetable(`tt_did`,`tt_yearid`,`tt_day`,`tt_hour`,`tt_subject`)values($did,$yid,'$order1',$h,$sid)";
				mysql_query($insert);
				//$sqlSubject1="Select * from tbl_timetable where tt_did=$did and tt_yearid=$yid and tt_day='$order1' and tt_hour=$h  and tt_subject=$sid";
//				print $sqlSubject1."<br/>";
//				$rstSubject1=mysql_query($sqlSubject1);
//				$rowcountsubj1= mysql_num_rows($rstSubject1);
//				//print $rowcountsubj1;
//				if(count($subId)>$subcount)
//				{
//					$subcount++;
//				}
//				else
//				{
//					$subcount=0;
//				}
						
			}
		}

?>