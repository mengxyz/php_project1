<?php
include "connect.php";
$sql = "SELECT t.t_name,t.t_tel,t.t_address,p.po_name,d.d_name FROM department d,position p,teacher t WHERE t.t_id = '1' and t.d_id = d.d_id and t.po_id = p.po_id ";
//echo $sql;
$result = mysql_query($sql,$conn);
$rs = mysql_fetch_array($result);

echo $rs['t_name'];
?>