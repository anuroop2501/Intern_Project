<?php
$cnum=$_POST['cnum'];
$pass=$_POST['pass'];
$dep=$_POST['dep'];
$conn=mysql_connect('localhost','root','');
mysql_select_db('thedatabase');
$sql="select * from responses where Controlno='$cnum'";
$result=mysql_query($sql,$conn);
while($row=mysql_fetch_array($result,MYSQL_ASSOC)){
  $fname=$row['Createdby'];
echo "Controlno:".$row['Controlno']."<br>";
echo "Createdby:".$row['Createdby']."<br>";
echo "Assignedto:".$row['Assignedto']."<br>";
echo "Startdate:".$row['Startdate']."<br>";
echo "Enddate:".$row['Enddate']."<br>";
echo "QueryDescription:".$row['QueryDescription']."<br>";
echo "Remarks:".$row['Remarks'];
}
echo "<form action='userpage.php' method='post'>
      <input type='hidden' name='fname' value='$fname'>
      <input type='hidden' name='pass' value='$pass'/>
      <input type='hidden'  name='department' value='$dep'/>
      <button type='back' value='back'>Back To Mainpage</button>
      </form>  ";


?>