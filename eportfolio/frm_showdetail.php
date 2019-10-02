<?php
include "connect.php";
$t_id = $_GET['t_id'];
$sql = "SELECT t.t_pic,t.t_name,t.t_tel,t.t_address,p.po_name,t.t_username,t.t_password,d.d_name FROM department d,position p,teacher t WHERE t.t_id = '$t_id' and t.d_id = d.d_id and t.po_id = p.po_id ";
$result = mysql_query($sql,$conn)
	or die("3. ไม่สามารถประมวลผลคำสั่งได้").mysql_error();
$rs = mysql_fetch_array($result);	
mysql_close();
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>รายละเอียด</title>
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
        <p>&nbsp;</p>
        <table width="404" border="1" align="center">
          <tr>
            <td colspan="2" bgcolor="#FFAD00"><div align="center">ข้อมูลอาจารย์</div></td>
            </tr>
          <tr>
            <td height="146" colspan="2">
              <div align="center">
                <?php 
				if("$rs[t_pic]" != ""){
			?>
                <img src="<?php echo "./picture/$rs[t_pic]" ?>" width="100" height="130">
                <?php } ?>
              </div></td>
            </tr>
          <tr>
            <td width="92">ชื่อ - สกุล</td>
            <td width="296"><?php echo "$rs[t_name]"; ?></td>
            </tr>
          <tr>
            <td>ที่อยู่</td>
            <td><?php echo "$rs[t_address]"; ?></td>
            </tr>
          <tr>
            <td>เบอร์โทร</td>
            <td><?php echo "$rs[t_tel]"; ?></td>
            </tr>
          <tr>
            <td>ตำเเหน่ง</td>
            <td><?php echo "$rs[po_name]"; ?></td>
            </tr>
          <tr>
            <td>กลุ่มสาระ</td>
            <td><?php echo "$rs[d_name]"; ?></td>
            </tr>
        </table>
        <p>&nbsp;</p>
        <table width="404" border="0">
          <tr>
            <td>ผลงาน</td>
            </tr>
        </table>
        
        <table width="404" border="1">
          <tr>
            <td width="140">ชือผลงาน</td>
            <td width="72">ปีที่ได้รับ</td>
            <td width="170">หน่วยงานที่มอบ</td>
            </tr>
          <?php 
			$sql = "SELECT w.w_id,w.w_name,w_year,w_org FROM work w,work_detail wd WHERE wd.t_id = $t_id AND wd.w_id = w.w_id";
			$result2 = mysql_query($sql,$conn);
			while($rs2 = mysql_fetch_array($result2)){
		?>
        <tr>
          <td><?php echo "$rs2[w_name]"; ?></td>
          <td><?php echo "$rs2[w_year]"; ?></td>
          <td><?php echo "$rs2[w_org]"; ?></td>
        </tr>
    <?php } ?>
        </table>
        <p>&nbsp;</p>
      </div></td>
    </tr>
<?php include "foot.php"; ?>
  </tbody>
</table>
</body>
</html>
