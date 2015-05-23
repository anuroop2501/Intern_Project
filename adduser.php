<?php
global $army;
global $navy;
global $airforce;
if((!isset($_POST['name']))||(!isset($_POST['userid']))||(empty($_POST['createpass']))||(empty($_POST['repass']))||(!isset($_POST['privilage']))){
 include('adduser.html');
 include('anu.html');
}
else{
  $conn=mysql_connect('localhost','root','');
$sql1="CREATE DATABASE IF NOT EXISTS thedatabase ";
$result1=mysql_query($sql1,$conn) or die(mysql_error());
  $sql2="CREATE TABLE IF NOT EXISTS allusers(
              Id INT NOT NULL PRIMARY KEY auto_increment,
              Name varchar(100),
              Staffno text,
              Password text,
              QArmy varchar(10),
              QNavy varchar(10),
              QAirforce varchar(10),
              RArmy varchar(10),
              RNavy varchar(10),
              RAirforce varchar(10),
              Lastlogin time
              )ENGINE INNODB";
mysql_select_db('thedatabase');
$result2=mysql_query($sql2,$conn) or die(mysql_error());
 $army= 'No';
 $navy=  'No';
 $airforce= 'No';
foreach($_POST['privilage'] as $value)
{
switch($value)
  {
    case 'army':
    if($value=='army'){
       $army='Yes';
    }else{
    $army='No';
    }
    continue;
    case 'navy':
    if($value=='navy'){
       $navy='Yes';
    }else{
    $navy='No';
    }
    continue;
    case 'airforce':
    if($value=='airforce'){
     $airforce='Yes';
    }else{
    $airforce='No';
    }
    break;
    default :
    echo "none are selected!";
  }
}
$time=date('h:i:s');
$name=$_POST['name'];
$userid=$_POST['userid'];
$sql5="SELECT * FROM allusers where Name='$name'||Staffno='$userid'";
$result5=mysql_query($sql5,$conn);
$row5=mysql_num_rows($result5);
if($row5>0){
include('adduser.html');
 echo "<script type='text/javascript'>
         alert('The user with Name:  $name OR Staffno: $userid Already exists please keep different one!')
         </script>";
echo "";

}else{
$createpass=$_POST['createpass'];
$repass=$_POST['repass'];
if($createpass!=$repass){
  include('adduser.html');
  echo "<script type='text/javascript'>
         alert('Entered password mismatch!')
         </script>";
    }
    else{
      ?>
 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html> 
<head> 
   <title>All Users</title>
   <link rel="shortcut icon" href="http://www.bel-india.com/sites/all/themes/bel/images/bel.ico" type="image/x-icon" value='Anuroop' />
   <style type = "text/css">
		body{
				background:url(images/back2.jpg);
		}
		a{
			color:black;
			text-decoration:none;
		}
		a:hover{
			color:rgba(255,255,255,0.8);
			
			}
		table{
			border-radius:10px;
			padding-top:10px;
			padding-bottom:10px;
			background:rgba(255,250,205,0.3);
		}
		th{
			background:white;
			text-align:center;
			padding-left:10px;
			padding-right:10px;
			
		}
		td{
			text-align:center;
			background:blue;
			padding-left:10px;
			padding-right:10px;
		}
		#php{
				position:center;
				top:30px;
				left:230px;
				padding:50px;
				border-radius:50px;
				background:rgba(255,255,2,0.3);
				box-shadow:0 0 15px 10px white;
		}
 		#link {
position:relative;
left:43%;
background:rgba(0,255,0,0);
width:180px;
text-align:center;
border-radius:10px;
}
.but{
	color:blue; }
.but1{
	color:red; }
		.button{
				position:relative;
				top:25px;
				left:30px;
				width:150px;
				background:rgba(234,78,21,0.9);
				padding:5px;
				border-radius:60px;
				text-align:center;
		}


   </style>



</head>
<body style='font-family:arial;font-size:13pt;'>
<div id="php">

<?php
$sql3="INSERT INTO allusers"."(Id,Name,Staffno,Password,QArmy,QNavy,QAirforce,RArmy,RNavy,RAirforce,Lastlogin)".
"values (NULL,'$name','$userid','$createpass','$army','$navy','$airforce','Yes','Yes','Yes','$time')";
$result3=mysql_query($sql3,$conn) or die(mysql_error());
echo "<strong><i>ENTERED SUCCESFULLY!</i> DETAILS OF USER </strong>";
$sql4="SELECT * FROM allusers where Name='$name'&& Password='$createpass'";
$result4=mysql_query($sql4,$conn);
 while($row=mysql_fetch_array($result4,MYSQL_NUM)){
  echo "<fieldset>"."Name:".$row[1]."<br>"."Staffno:".$row[2]."<br>"."Privilages:"."<br>"."Army:".$row[4]."<br>"."Navy:".$row[5]."<br>"."Airforce:".$row[6]."<br>"."</fieldset>";
 }
echo"<div id='link'>
	<form action='adminpage1.php' method='post'>
       <button type='back' value='back' class='but1' name='back'>Back To Mainpage</button></form>
    </div>";
}
}}
?>


</div>
</body>
</html>




