<?php 
include "connect.php";
$sql = "SELECT t.t_id,t.t_name,d.d_name,p.po_name FROM teacher t,department d,position p WHERE t.d_id = d.d_id AND t.po_id = p.po_id";
$result = mysql_query($sql,$conn);
mysql_close();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<body>
<table width="832" height="544" border="1" align="center">
  <tbody>
    <?php 
		include "head.php";
		include "none_menu.php"; 
	?>
    <tr>
      <td height="485"><div align="center">
      <table width="645" border="0">
          <tr>
            <td width="639">รายงานข้อมูลครู</td>
            </tr>
        </table>
        <table width="645" border="1">
          <tr>
            <td>ชื่อ</td>
            <td>ตำเเหน่ง</td>
            <td>กลุ่มสาระ</td>
            <td>&nbsp;</td>
          </tr>
          <?php
          while($rs = mysql_fetch_array($result)){
		  ?>
          <tr>
            <td width="144"><?php echo "$rs[t_name]"; ?></td>
            <td width="179"><?php echo "$rs[po_name]"; ?></td>
            <td width="123"><?php echo "$rs[d_name]"; ?></td>
            <td width="171"><?php 
			echo "<a href=\"frm_showdetail.php?t_id=$rs[t_id]\">รายละเอียด</option>"; 
			?></td>
          </tr>
          <?php } ?>
        </table>
      </div></td>
    </tr>
<?php include "foot.php"; ?>
  </tbody>
</table>
</body>
</html>
