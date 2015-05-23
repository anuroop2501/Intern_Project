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
global $army;
global $navy;
global $airforce;
$name=$_POST['name'];
$userid=$_POST['userid'];
$pass=$_POST['pass'];
$conn=mysql_connect('localhost','root','');
mysql_select_db('thedatabase');
$sql="select * from allusers where Password='$pass'";
$result=mysql_query($sql,$conn) or die(mysql_error());
$rownum=mysql_num_rows($result);
if($rownum>0){
  mysql_free_result($result);
 $army= 'No';
 $navy=  'No';
 $airforce= 'No';
 if(empty($_POST['privilage'])){
   echo "Privilages are to be filled";
   include ('updateuser.php');
 } else{
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
$sql2="select * from allusers where Name='$name'&&Staffno='$userid' ";
$result2=mysql_query($sql2,$conn) or die(mysql_error());
$row_num=mysql_num_rows($result2);
if($row_num>0){
$sql1="update allusers set Name='$name',Staffno='$userid',QArmy='$army',QNavy='$navy',QAirforce='$airforce' where Name='$name'&&Staffno='$userid'";
$result1=mysql_query($sql1,$conn) or die(mysql_error());
echo "<strong>Updated Sucessfully!</strong>";
$sql3="select * from allusers where Name='$name'&&Staffno='$userid' ";
$result3=mysql_query($sql2,$conn) or die(mysql_error());
while($row=mysql_fetch_array($result3,MYSQL_NUM)){
  echo "<fieldset>"."Name:".$row[1]."<br>"."Staffno:".$row[2].
  "<br>"."Privilages:"."<br>"."Army:".$row[4]."<br>"."Navy:".$row[5]."<br>"."Airforce:".$row[6]."<br>"."</fieldset>";
 }
 }else{
 echo "Name and Staffno cannot be changed!";
 include('updateuser.php');
 }
}
 }else{
    echo "entered password is wrong";
    include('updateuser.php');
     }
mysql_close ($conn);
?><hr>

<div id="link">
	<form action='adminpage1.php' method='post'>
       <button type='back' value='back' class='but1' name='back'>Back To Mainpage</button></form>
</div>

</div>




</body> 
</html>
