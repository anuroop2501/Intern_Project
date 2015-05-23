<html>
<head>
<title>Change Password</title>
<link rel="shortcut icon" href="http://www.bel-india.com/sites/all/themes/bel/images/bel.ico" type="image/x-icon" value='Anuroop' />
</head>
</html>
<?php
if(empty($_POST['name'])|| empty($_POST['oldpass'])||empty($_POST['newpass'])||empty($_POST['repass'])){
include('changepassword.html');
include('anu.html');
}else{
$conn=mysql_connect('localhost','root','') or die(mysql_error());
mysql_select_db('thedatabase');
$name=$_POST['name'];
$oldpass=$_POST['oldpass'];
$newpass=$_POST['newpass'];
$repass=$_POST['repass'];
$dep=$_POST['department'];
$sql="select * from allusers where Name='$name'&& Password='$oldpass'";
$result=mysql_query($sql,$conn) or die(mysql_error());
$rows=mysql_num_rows($result);
if($rows>0){
  if($oldpass==$newpass){
  include('changepassword.html');
    echo "<script type='text/javascript'>
alert('Please choose a different password as the New password is same as the old one!')
</script>";
  }else{
if($newpass==$repass){
$sql2="update allusers set Password='$newpass' where Password='$oldpass'";
$result2=mysql_query($sql2,$conn) or die(mysql_error());
echo "Updated sucessfully!";
echo"<form action='userpage.php' method='post'>
        <input type='hidden' name='fname' value='$name'/>
        <input type='hidden' name='pass' value='$newpass'/>
        <input type='hidden' name='department' value='$dep'/>
        <button type='submit' value='submit'>Back To Mainpage</button>
        </form> ";
}else
{
  include('changepassword.html');
echo"<script type='text/javascript'>
         alert('New password mismatch')
         </script>";
}
}}else
{ include('changepassword.html');
  echo"<script type='text/javascript'>
         alert('Old password wrong!')
         </script>";
}
}

?>