
<html>
<head>
<title>Deleted!</title>
<link rel="shortcut icon" href="http://www.bel-india.com/sites/all/themes/bel/images/bel.ico" type="image/x-icon" value='Anuroop' />
</head>
</html>

<?php
$name=$_POST['name'];
$userid=$_POST['userid'];
$id=$_POST['id'];
$conn=mysql_connect('localhost','root','');
mysql_select_db('thedatabase');
$sql="select * from allusers where Name='$name'&& Staffno='$userid'";
$result=mysql_query($sql,$conn);
$sql1="delete from allusers where Name='$name'&& Staffno='$userid'";
$result1=mysql_query($sql1,$conn);
if(!$result){
echo "error".mysql_error();
}
else{
echo "Succesfuly deleted!";
$sql2="update allusers set id=id-1 where id>$id";
$result2=mysql_query($sql2,$conn) or die(mysql_error());
echo "<form action='adminpage1.php' method='post'>
             <button type='back' name='back' value='back'>Back To Mainpage</button></form>";
mysql_close($conn);
}



?>