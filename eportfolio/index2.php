<?php 
include "connect.php";
$sql = "SELECT s.std_id,std_name,pa_name,c_name FROM student s LEFT JOIN classroom c ON s.c_id = c.c_id LEFT JOIN parent p ON s.pa_id = p.pa_id";
$result = mysql_query($sql,$conn);
mysql_close();
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>หน้าหลัก</title>
</head>

<body>
    <table width="832" height="544" border="1" align="center">
        <tbody>
            <?php 
              include "head.php";
              include "none_menu.php"; 
	          ?>
            <tr>
                <td height="485">
                    <div align="center">
                        <table width="645" border="0">
                            <tr>
                                <td width="639">รายงานข้อมูลนักเรียน</td>
                            </tr>
                        </table>
                        <table width="645" border="1">
                            <tr>
                                <td>ชื่อ</td>
                                <td>ชั้นเรียน</td>
                                <td>ผู้ปกครอง</td>
                                <td>&nbsp;</td>
                            </tr>
                            <?php
                              while($rs = mysql_fetch_array($result)){
		                        ?>
                            <tr>
                                <td width="144"><?php echo "$rs[std_name]"; ?></td>
                                <td width="179"><?php echo "$rs[c_name]"; ?></td>
                                <td width="123"><?php echo "$rs[pa_name]"; ?></td>
                                <td width="171">
                                   <?php echo "<a href=\"frm_showdetail2.php?std_id=$rs[std_id]\">รายละเอียด</a>"; ?>
                                </td>
                            </tr>
                            <?php } ?>
                        </table>
                    </div>
                </td>
            </tr>
            <?php include "foot.php"; ?>
        </tbody>
    </table>
</body>

</html>