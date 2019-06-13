<?php 
$timezone = new DateTimeZone("Asia/Kolkata");
$date = new DateTime();
$date->setTimezone($timezone );
$crdt=$date->format( 'Y-m-d/h:i:s A' );
$datetime=$date->format( 'd-M-Y/h:i:s A' );
$today=$date->format( 'd/m/Y' );

$currentmonth=$date->format( 'm' );
$currentday=$date->format( 'd' );

$explode_date=explode("/", $crdt);

$currentdatetime=$crdt;
$currentdate=$explode_date[0];
$currenttime=$explode_date[1];

?>