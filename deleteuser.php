
<html>
<head>
<title>Delete User</title>
<link rel="shortcut icon" href="http://www.bel-india.com/sites/all/themes/bel/images/bel.ico" type="image/x-icon" value='Anuroop' />
</head>
</html>
<?php
global $id;
if(empty($_POST['name'])||empty($_POST['userid'])){
include('deleteuser.html');
include('anu.html');
}else{
  $name=$_POST['name'];
  $userid=$_POST['userid'];
  $conn=mysql_connect('localhost','root','');
  mysql_select_db('thedatabase');
  $sql="select * from allusers where Name='$name'&&Staffno='$userid'";
  $result=mysql_query($sql,$conn) or die(mysql_error());
  $row=mysql_num_rows($result);
   if($row>0){
  echo "Details of the user";
    while($row=mysql_fetch_array($result,MYSQL_NUM)){
    echo "<fieldset>"."Name:".$row[1]."<br>"."Staffno:".$row[2]."<br>"."Privilages:"."<br>".$row[4]."<br>".$row[5]."<br>".$row[6].
               "<form action='deleteuser.html' method='post'>
                 <button type='back' value='back' name='back'>Reset</button></form>"."</fieldset>";
    $id=$row[0];
     }
     echo  "
           <form action='condelete.php' method='post'>
           <input type='hidden' value='$id' name='id'/>
           <input type='hidden' value='$name' name='name'/>
           <input type='hidden' value='$userid' name='userid'/>
           <button type='delete' value='delete'>Confirm Delete</button></form>";
   mysql_close($conn);
   }
else{
echo "Name:".$name."<br>"."Staffno: ".$userid."<h3>"."doesnot exist in the records"."</h3>";
include('deleteuser.html');
}
}
 ?>




