<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
   <title>All Queries</title>
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
			background:white;
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
	color:red;
}

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

<strong>All Queries In   </strong>

<?php
global $uploadno2;
$conn=mysql_connect('localhost','root','');
mysql_select_db('thedatabase');
$name=$_POST['name'];
$pass=$_POST['pass'];
$dep=$_POST['department'];
echo "<strong>$dep Department</strong>";
echo "<table border='1' width='100%' >
       <tr>
       <th width='2%'>Controlno</th>
       <th width='8%'>Createdby</th>
       <th width='8%'>Assignedto</th>
       <th width='8%'>Startdate</th>
       <th width='8%'>Enddate</th>
       <th width='30%'>Description</th>
       <th width='5%'>Department</th>
        <th width='10%'>Attachments</th>
       <th width='5%'>Status</th>
       <th width='5%'>Action</th>
       </tr>";
$sql="select * from query where Department='$dep'";
$result=mysql_query($sql,$conn) or die(mysql_error());
$rows=mysql_num_rows($result);
if($rows<=0){echo "No Queries by this Department";}
else{
while($row=mysql_fetch_array($result,MYSQL_ASSOC)){
echo "<tr>";
$cnum=$row['Controlnum'];
$query2="select * from query where Controlnum='$cnum'";
$results2=mysql_query($query2,$conn) or die(mysql_error());
while($rowu2=mysql_fetch_array($results2,MYSQL_ASSOC)){$uploadno2=$rowu2['Uploadno'];}
$cby=$row['Createdby'];
$sdate=$row['Startdate'];
$query=$row['Query'];
echo "<td>".$row['Controlnum']."</td>";
echo "<td>".$row['Createdby']."</td>";
echo "<td>".$row['Assignedto']."</td>";
echo "<td>".$row['Startdate']."</td>";
echo "<td>".$row['Duedate']."</td>";
echo "<td>".$row['Description']."</td>";
echo "<td>".$row['Department']."</td>";
echo "<td>"."<form action='download.php' method='post'>
       <input type='hidden' name='uploadno' value='$uploadno2'>
       <button type='submit' value='send'>"."Download Attachments"."</button></form></td>";

switch($row['Status']){
case 'Not Read':
if($query=='Seen'){
echo"<td style='color:rgb(240,0,0)'>"."Read & Notstarted"."</td>";
}else{echo"<td style='color:rgb(0,255,255)'>"."Not Read"."</td>";}
break;
case 'In Progress':
echo"<td style='color:rgb(255,0,255)'>".$row['Status']."</td>";
break;
case 'Pending':
echo"<td style='color:rgb(255,0,0)'>".$row['Status']."</td>";
break;
case 'Completed':
echo"<td style='color:rgb(0,255,0)'>".$row['Status']."</td>";
echo "<td>"."<form action='viewresponse.php' method='post'>
        <input type='hidden' name='dep' value='$dep'/>
       <input type='hidden' name='pass' value='$pass'/>
       <input type='hidden' name='cnum' value='$cnum'/>
       <button type='submit' value='send'>"."View Report"."</button></form></a></td>";
break;
default:
echo "Sry Something Wrong";
}
echo "</tr>";}
echo "</table>";
}   
?>
<hr>

<div id="link">

</div>
        <a href='userpage.php'>
        <input type='hidden' name='fname' value=<?php echo"$name";?>/>
        <input type='hidden' name='pass' value=<?php echo"$pass";?>/>
        <input type='hidden' name='department' value=<?php echo"$dep";?>/>
        <button type='submit' value='submit' class='but'>Back To Mainpage</button>
        </a>
</div>




</body>
</html>