

<html>
<head>
<title>Welcome</title>
<link rel="shortcut icon" href="http://www.bel-india.com/sites/all/themes/bel/images/bel.ico" type="image/x-icon" value='Anuroop' />
</head>
</html>

<?php
session_start();
if(empty($_POST['name'])||empty($_POST['pass'])||empty($_POST['snum'])){
  include('superuser.html');
  include('anu.html');
}else{
$name=$_POST['name'];
$snum=$_POST['snum'];
$pass=$_POST['pass'];
$conn=mysql_connect('localhost','root','');
mysql_select_db('thedatabase');
$sql="select * from allusers where Name='$name'&&Staffno='$snum'&&Password='$pass'&&QArmy='Yes'&&QNavy='Yes'&&QAirforce='Yes'";
$result=mysql_query($sql,$conn) or die(mysql_error());
$row=mysql_num_rows($result);
if($row>0){
header("location:superuser1.php");

			$_SESSION['name'] = $name;
                        $_SESSION['pass'] = $pass;
                        $_SESSION['snum'] = $snum;
}else{
  include('superuser.html');
echo "<script type='text/javascript'>
alert('Try again!')
</script>";
}
}
?>