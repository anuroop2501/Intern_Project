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
<strong>DETAILS OF THE RESPONSE :</strong>
<?php
$cnum=$_POST['cnum'];
$status=$_POST['status'];
$remarks=$_POST['remarks'];
$cby=$_POST['cby'];
$sdate=$_POST['sdate'];
 $ddate=$_POST['ddate'];
 $desc=$_POST['desc'];
 $fname=$_POST['fname'];
 $pass=$_POST['pass'];
 $dep=$_POST['department'];
$conn=mysql_connect('localhost','root','');
mysql_select_db('thedatabase');
$sql2="select * from responses where Controlno='$cnum'&&Createdby='$cby'&&Enddate='$ddate'";
$result2=mysql_query($sql2,$conn) or die(mysql_error());
$row=mysql_num_rows($result2);
if($row>0){
$sql6= "update responses set Remarks='$remarks',Status='$status'where Controlno='$cnum'&&Createdby='$cby'&&Enddate='$ddate'";
$result6=mysql_query($sql6,$conn) or die(mysql_error());
$sql10= "update query set Status='$status'where Controlnum='$cnum'&&Createdby='$cby'&&Duedate='$ddate'";
$result10=mysql_query($sql10,$conn) or die(mysql_error());
}else{
$sql="INSERT INTO responses(Controlno,Createdby,Assignedto,Startdate,Enddate,QueryDescription,Status,Remarks) values('$cnum','$cby','$fname','$sdate','$ddate','$desc','$status','$remarks')";
$result=mysql_query($sql,$conn) or die(mysql_error());
}
if($status=='Completed'){
$sql1="delete from tquery where Controlnum='$cnum'";
$result1=mysql_query($sql1,$conn) or die(mysql_error());
$sql3="update query set Status='Completed' where Controlnum='$cnum'&&Createdby='$cby'&&Startdate='$sdate'&& Duedate='$ddate' ";
$result3=mysql_query($sql3,$conn) or die(mysql_error());
echo "<script>
alert('Sucessfully Completed Query!')
</script>";
echo "<form action='userpage1.php' method='post'>
      <input type='hidden' name='fname' value='$fname'>
      <input type='hidden' name='pass' value='$pass'/>
      <input type='hidden'  name='department' value='$dep'/>
      </form>  ";
include('userpage1.php');
}else{
  $day=60*60*24;
  $target=strtotime($ddate)-strtotime($sdate);
  $diff=round($target / $day);
  if($diff<0){
    $currdate=date('Y-m-d');
  $sql4="update query set Status='Pending' where Controlnum='$cnum'&&Createdby='$cby'&&Startdate='$sdate'&& Duedate='$ddate' ";
$result4=mysql_query($sql4,$conn) or die(mysql_error());
 $sql5="update responses set Status='Pending'where Controlno='$cnum'&&Createdby='$cby'&&Enddate='$ddate'";
 $result5=mysql_query($sql5,$conn) or die(mysql_error());
 $sql7="delete from tquery where Controlnum='$cnum'";
 $result7=mysql_query($sql7,$conn) or die(mysql_error());
 include('timediff.html');
  }else{
     echo "<script>
alert('Still You Have $diff Days To Complete The Query!')
</script>";
  }
   echo "<div id='link'>
       <form action='userpage1.php' method='post'>
      <input type='hidden' name='fname' value='$fname'>
      <input type='hidden' name='pass' value='$pass'/>
      <input type='hidden'  name='department' value='$dep'/>
      </form></div>";
      include('userpage1.php');


}
@mysql_close($conn);
?>
</div>




</body>
</html>
