

<html>
<head>
<title>Query</title>
<link rel="shortcut icon" href="http://www.bel-india.com/sites/all/themes/bel/images/bel.ico" type="image/x-icon" value='Anuroop' />
</head>
</html>
<?php
if((empty($_POST['cnum']))||(empty($_POST['cby']))||(empty($_POST['asto']))||(empty($_POST['priority']))||
(empty($_POST['department']))||(empty($_POST['sdate']))||(empty($_POST['ddate']))||!isset($_POST['description'])){
include('query1.php');
include('anu.html');
}
else{
  global $uploadno;
$uploadno='0';
$cnum=$_POST['cnum'];
$cby=$_POST['cby'];
$asto=$_POST['asto'];
$priority=$_POST['priority'];
$sdate=$_POST['sdate'];
$ddate=$_POST['ddate'];
$description=$_POST['description'];
$dep=$_POST['department'];
$time_now=mktime(date('h')+15,date('i')+31,date('s'));
$time=date('h:i A',$time_now);
$ctime= DATE("H:i", STRTOTIME("$time"));
$conn = mysql_connect('localhost', 'root', '') or die(mysql_error());
mysql_select_db('thedatabase', $conn);
if(isset($_POST['upload'])&&$_FILES['userfile']['size']>0)
{
$fileName = $_FILES['userfile']['name'];
$tmpName  = $_FILES['userfile']['tmp_name'];
$fileSize = $_FILES['userfile']['size'];
$fileType = $_FILES['userfile']['type'];
$fileType=(get_magic_quotes_gpc()==0 ? mysql_real_escape_string(
$_FILES['userfile']['type']) : mysql_real_escape_string(
stripslashes ($_FILES['userfile'])));
$fp      = fopen($tmpName, 'r');
$content = fread($fp, filesize($tmpName));
$content = addslashes($content);
fclose($fp);
if(!get_magic_quotes_gpc())
{
    $fileName = addslashes($fileName);
}
$query2="CREATE TABLE IF NOT EXISTS upload (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(30) NOT NULL,
  type varchar(30) NOT NULL,
  size int(11) NOT NULL,
  content longblob NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB ;
";
mysql_query($query2) or die(mysql_error());
$query = "INSERT INTO upload (name, size, type, content ) ".
"VALUES ('$fileName', '$fileSize', '$fileType', '$content')";
mysql_query($query) or die(mysql_error());
$query1="select * from upload where name='$fileName'";
$resultu=mysql_query($query1) or die(mysql_error());
while($rowu=mysql_fetch_array($resultu,MYSQL_ASSOC)){
$uploadno=$rowu['id'];
}
echo "<br>File $fileName uploaded<br>";
}
$sql="CREATE TABLE IF NOT EXISTS query(
               Id INT NOT NULL PRIMARY KEY auto_increment,
               Controlnum varchar(20),
               Createdby varchar(20),
               Assignedto varchar(20),
               Priority varchar(20),
               Startdate date,
               Duedate date,
               Status text,
               Description text,
               Department text,
               Query text,
               Qtime time,
                Uploadno int )";
  $result=mysql_query($sql,$conn) or die(mysql_error());
   $army='No';
   $navy='No';
   $airforce='No';
if($dep=='Army'){$army='Yes';}
if($dep=='Navy'){$navy='Yes';}
if($dep=='Airforce'){$airforce='Yes';}
  $sql6="select * from allusers where Name='$cby' && QArmy='$army' && QNavy='$navy' && QAirforce='$airforce'";
   $result6=mysql_query($sql6,$conn) or die(mysql_error());
   $rowc=mysql_num_rows($result6);
   $sql7="select * from allusers where Name='$asto' && QArmy='$army' && QNavy='$navy' && QAirforce='$airforce'";
   $result7=mysql_query($sql7,$conn) or die(mysql_error());
   $rowa=mysql_num_rows($result7);
  $sql5="select * from query where Controlnum='$cnum'";
  $result5=mysql_query($sql5,$conn) or die(mysql_error());
  $row=mysql_num_rows($result5);
  if($row<=0){
    if($rowc<=0){
      include('query1.php');
     echo "<script type='text/javascript'>
     alert('Createdby Name doesnot exist in $dep Department');
     </script>";
    }else{
    if($rowa<=0){
       include('query1.php');
    echo "<script type='text/javascript'>
     alert('Assignedto Name doesnot exist in $dep Department');
     </script>";
     }
     else{
  $sql1="INSERT INTO query"."(Id,Controlnum,Createdby,Assignedto,Priority,Startdate,Duedate,Status,Description,Department,Query,Uploadno)".
        "values(Null,'$cnum','$cby','$asto','$priority','$sdate','$ddate','Not Read','$description','$dep','Not Seen','$uploadno')";
  $result1=mysql_query($sql1,$conn) or die(mysql_error());
   $sql3="CREATE TABLE IF NOT EXISTS tquery(
               Id INT NOT NULL PRIMARY KEY auto_increment,
               Controlnum varchar(20),
               Createdby varchar(20),
               Assignedto varchar(20),
               Priority varchar(20),
               Startdate date,
               Duedate date,
               Description text,
               Department text,
               Ctime time )";
    $result3=mysql_query($sql3,$conn) or die(mysql_error());
   $sql4="INSERT INTO tquery"."(Id,Controlnum,Createdby,Assignedto,Priority,Startdate,Duedate,Description,Department,Ctime)".
        "values(Null,'$cnum','$cby','$asto','$priority','$sdate','$ddate','$description','$dep','$ctime')";
    $result4=mysql_query($sql4,$conn) or die(mysql_error());
echo "<script type='text/javascript'>
alert('Sucessfully Posted!')
</script>";
   echo "<form action='userpage.php' method='post'>
      <input type='hidden' name='fname' value='$cby'>
      <input type='hidden'  name='department' value='$dep'/>
      <button type='back' value='back'>Back To Mainpage</button>
      </form>  ";

  }}}else{
     include('query1.php');
echo "<script type='text/javascript'>
alert('Controlnum Already Exists!')
</script>";
  }



@mysql_close($conn);
}



?>