
<?php 
setcookie("user", "Alex Porter", time()+3600);
?>

<?php
$con = mysql_connect("localhost","root","wangjiexia");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("mushroom");
mysql_query("set character set 'utf8'");
mysql_query("set names 'utf8'");


$sql = "SELECT * FROM mushroom_yh where 性别='女'";

$a2=mysql_query($sql,$con)or die("对不起，读入数据时出错了！". mysql_error());
while($row2=mysql_fetch_array($a2))
{
$arr = array ('YHID'=>$row2["YHID"],'真实姓名'=>$row2['真实姓名'],'性别'=>$row2['性别']);
echo json_encode($arr);
echo "<br>";
echo $arr['真实姓名'];
echo "<br>";
echo sha1($arr['真实姓名']);
echo "<br>";
echo openssl_digest($arr['真实姓名'],'sha512');
echo "<br>";
//echo($row2["YHID"]."--".$row2['真实姓名'].'--'.$row2['性别']."<br>") ;
}

mysql_close($con);
?>


<?php 
$link = mysql_connect("localhost","root","wangjiexia");
$fields = mysql_list_fields("mushroom", "mushroom_yh", $link); 
$columns = mysql_num_fields($fields); 
for ($i = 0; $i < $columns; $i++) { 
echo mysql_field_name($fields, $i) . "\n"; 
};
echo $_COOKIE["user"];
mysql_close($con);
?> 