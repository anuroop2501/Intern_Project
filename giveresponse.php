<?php
$conn=mysql_connect('localhost','root','');
mysql_select_db('thedatabase');
$sql2="CREATE TABLE IF NOT EXISTS responses(
              Controlno text,
              Createdby text,
              Assignedto text,
              Startdate date,
              Enddate date,
              QueryDescription text,
              Status text,
              Remarks text)";

$result2=mysql_query($sql2,$conn) or die(mysql_error());
$cby=$_POST['cby'];
$cnum=$_POST['cnum'];
$fname=$_POST['fname'];
$dep=$_POST['department'];
$pass=$_POST['pass'];
$sql="select * from tquery where Controlnum='$cnum'&& Assignedto='$fname'&& Createdby='$cby'";
$result=mysql_query($sql,$conn) or die(mysql_error());
while($row=mysql_fetch_array($result,MYSQL_ASSOC))
{$sdate=$row['Startdate'];
 $ddate=$row['Duedate'];
 $desc=$row['Description'];
}
$sql3="select * from responses where Controlno='$cnum'&&Createdby='$cby'&&Enddate='$ddate'";
$result3=mysql_query($sql3,$conn) or die(mysql_error());
$rows=mysql_num_rows($result3);
if($rows>0){
  while($rowdata=mysql_fetch_array($result3,MYSQL_ASSOC)){
  $remarks=$rowdata['Remarks'];
  $status=$rowdata['Status'];
  }
echo "<fieldset>
      <legend>Fill The Details To Give Response</legend>
      <form action=response.php method='post'>
      Controlno:<input type='text' name='cnum' value='$cnum'/><br>
      Createdby:<input type='text' name='cby' value='$cby'/><br>
      Assignedto:<input type='text' name='asto' value='$fname'/><br>
      Startdate:<input type='text' name='sdate' value='$sdate'/><br>
      Duedate:<input type='text' name='ddate' value='$ddate'/><br>
      Description:<input type='text' name='desc' value='$desc'/><br>
      <input type='hidden' name='fname' value='$fname'/>
      <input type='hidden' value='$dep' name='department'/>
      <input type='hidden' name='pass' value='$pass'/>
      Status<select name='status'><br>
             <option  value='Not Started'>Not Started</option>
             <option  value='In Progress'>In Progress</option>
             <option  value='Completed'>Completed</option>
             </select><br>
      Remarks:<input type='text' name='remarks' value='$remarks'/><br>
      <button type='submit' value='send'>Save</button>
      </form></fieldset> ";
}else{
echo "<html>
      <body>
      <fieldset>
      <legend>Fill The Details To Give Response</legend>
      <form action=response.php method='post'>
      Controlno:<input type='text' name='cnum' value='$cnum'/><br>
      Createdby:<input type='text' name='cby' value='$cby'/><br>
      Assignedto:<input type='text' name='asto' value='$fname'/><br>
      Startdate:<input type='text' name='sdate' value='$sdate'/><br>
      Duedate:<input type='text' name='ddate' value='$ddate'/><br>
      Description:<input type='text' name='desc' value='$desc'/><br>
      <input type='hidden' name='fname' value='$fname'/>
      <input type='hidden' value='$dep' name='department'/>
      <input type='hidden' name='pass' value='$pass'/>
      Status<select name='status'>
             <option  value='Not Started'>Not Started</option>
             <option  value='In Progress'>In Progress</option>
             <option  value='Completed'>Completed</option>
             </select><br>
      Remarks:<input type='text' name='remarks'/><br>
      <button type='submit' value='send'>Save</button>
      </form></fieldset></body></html> ";
      }
$currtime=date('h:i:s');
$sql1="update query set Query='Seen',Qtime='$currtime' where Controlnum='$cnum'&& Assignedto='$fname'&& Createdby='$cby'";
$result1=mysql_query($sql1,$conn) or die(mysql_error());

mysql_close($conn);
?>
