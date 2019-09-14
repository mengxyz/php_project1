<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, origin");
include "connect.php";
$std_name = $_GET['std_name'];
$data = array();

$sql = "SELECT * FROM student WHERE std_name LIKE '%$std_name%'";

$result = mysql_query($sql,$conn);
while($rs = mysql_fetch_array($result)){
	$data[] = $rs;
}

echo json_encode($data);
?>