<html>
<head>
<title>Welcome</title>
<link rel="shortcut icon" href="http://www.bel-india.com/sites/all/themes/bel/images/bel.ico" type="image/x-icon" value='Anuroop' />
</head>
</html>


<?php
$conn=mysql_connect('localhost','root','');
$currtime=date('h:i:s');
$pdate=date('Y-m-d');
$fname=$_POST['fname'];
$pass=$_POST['pass'];
$dep=$_POST['department'];
mysql_select_db('thedatabase');
$sql="select Controlnum,Createdby,Priority,Startdate,Duedate,Description from tquery where Assignedto='$fname'&& Department='$dep'";
$result=mysql_query($sql,$conn) or die(mysql_error());
while($row=mysql_fetch_array($result,MYSQL_NUM)){
  echo "<fieldset>"."Controlnum:".$row[0]."<br>"."Createdby:".$row[1]."<br>"."Priority:".$row[2]."<br>"."Startdate:".$row[3]."<br>"."Duedate:".$row[4].
       "<br>"."Description:".$row[5]."<br>"."<form action='giveresponse.php' method='post'>
                                              <input type='hidden' value='$fname' name='fname'/>
                                              <input type='hidden' value='$row[0]' name='cnum' />
                                              <input type='hidden' value='$row[1]' name='cby'/>
                                              <input type='hidden' value='$dep' name='department'/>
                                              <input type='hidden' name='pass' value='$pass'/>
                                              <button type='submit' value='send'>Give Response</button></form>"."</fieldset>";

}
$rows=mysql_num_rows($result);
echo "<script type='text/javascript'>
alert('You Have Still $rows Queries To Complete')
</script>";
echo "<form action='userpage.php' method='post'>
      <input type='hidden' name='fname' value='$fname'>
      <input type='hidden' name='pass' value='$pass'/>
      <input type='hidden'  name='department' value='$dep'/>
      <button type='back' value='back'>Back To Mainpage</button>
      </form>  ";


?>