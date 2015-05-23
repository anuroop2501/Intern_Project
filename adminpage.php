
<?php
session_start();
if(empty($_POST['name'])||empty($_POST['pass'])){
include('adminpage.html');
include('anu.html');
}else{
$name=$_POST['name'];
$pass=$_POST['pass'];

$conn=mysql_connect('localhost','root','');
$sql="select * from allusers where Name='$name' &&Password='$pass'&& QArmy='Yes' && QNavy='Yes' && QAirforce='Yes'";
mysql_select_db('thedatabase');
$result=mysql_query($sql,$conn) or die(mysql_error());
$row=mysql_num_rows($result);
if($row>0){
echo "$pass";
 header("location:adminpage1.php");

			$_SESSION['name'] = $name;
                        $_SESSION['pass'] = $pass;
}
else{
  include('adminpage.html');
  echo "<script type='text/javascript'>
alert('The admin Password Is Wrong!')
</script>";
}
mysql_close($conn);
}
?>

<html>
<head>
<title>Welcome</title>
<link rel="shortcut icon" href="http://www.bel-india.com/sites/all/themes/bel/images/bel.ico" type="image/x-icon" value='Anuroop' />
</head>
</html>