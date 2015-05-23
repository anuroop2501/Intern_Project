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

<strong>DETAILS OF ALLUSERS :</strong>
<?php
$conn=mysql_connect('localhost','root','');
mysql_select_db('thedatabase');
$sql="select * from allusers";
$result=mysql_query($sql,$conn) or die(mysql_error());
while($row=mysql_fetch_array($result,MYSQL_ASSOC)){
echo "<fieldset>";
echo "Name:". $row['Name']." <br>";
echo"Staffno:".$row['Staffno']."<br>";
echo "Privilages"."<br>";
echo"Army:".$row['QArmy']."<br>";
echo"Navy:".$row['QNavy']."<br>";
echo"Airforce:".$row['QAirforce']."<br>";
$id=$row['Id'];
$name=$row['Name'];
$userid=$row['Staffno'];
   echo   "<form action='updateuser.php' method='post'>
          <input type='hidden' value='$name' name='name'/>
         <input type='hidden' value='$userid' name='userid'/>
         <button type='update' class='but' value='update'>Update</button>
         </form> "."<form action='condelete.php' method='post'>
         <input type='hidden' value='$id' name='id'/>
         <input type='hidden' value='$name' name='name'/>
         <input type='hidden' value='$userid' name='userid'/>
         <button type='delete' class='but' value='delete'>Delete</button>
         </form></fieldset>";}
 mysql_close($conn);
?>
<hr>

<div id="link">
	<form action='adminpage1.php' method='post'>
       <button type='back' value='back' class='but1' name='back'>Back To Mainpage</button></form>
</div>

</div>




</body> 
</html>





