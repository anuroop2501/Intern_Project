
<html>
<head>
<title>Welcome</title>
<link rel="shortcut icon" href="http://www.bel-india.com/sites/all/themes/bel/images/bel.ico" type="image/x-icon" value='Anuroop' />
</head>
</html>

<?php
session_start();
global $lastlogin;
if(empty($_POST['fname'])||empty($_POST['pass'])||empty($_POST['department'])){
include('index.html');
include('anu.html');
}else{
$fname=$_POST['fname'];
$pass=$_POST['pass'];
$dep=$_POST['department'];
$army='No';
$navy='No';
$airforce='No';
if($dep=='Army'){$army='Yes';}
if($dep=='Navy'){$navy='Yes';}
if($dep=='Airforce'){$airforce='Yes';}
$conn=mysql_connect('localhost','root','') or die(mysql_error());
$sql="select * from allusers where Name='$fname' && Password='$pass'&& QArmy='$army' && QNavy='$navy' && QAirforce='$airforce'";
mysql_select_db('thedatabase');
$result=mysql_query($sql,$conn) or die(mysql_error());
$rownum=mysql_num_rows($result);
if($rownum>0){
  	header("location:userpage.php");

			$_SESSION['fname'] = $fname;
                        $_SESSION['pass'] = $pass;
                        $_SESSION['department'] = $dep;
}else{
  include('index.html');
echo "<script type='text/javascript'>
alert('Try again!')
</script>";
}
}
?>