<?PHP 
$link=mysql_connect("localhost","root","") or die ("couldnot connect to server");


if (!$link) {
die('Could not connect: ' . mysql_error());
}
$dbname="student_elog";
mysql_select_db('student_elog_test');

?>