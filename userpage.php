
<!DOCTYPE html>

<html>
<head>
<title>Welcome</title>
<link rel="shortcut icon" href="http://www.bel-india.com/sites/all/themes/bel/images/bel.ico" type="image/x-icon" value='Anuroop' />
<?php
session_start();
if($_SESSION['fname']&&$_SESSION['pass']&&$_SESSION['department'])
{
$fname=$_SESSION['fname'];
$pass=$_SESSION['pass'];
$dep=$_SESSION['department'];
$time_now=mktime(date('h')+15,date('i')+31,date('s'));
$ctime=date('h:i A',$time_now);
$currtime= DATE("H:i", STRTOTIME("$ctime"));
$pdate=date('Y-m-d');
}
else{
	header("location:error.php");
	}
?>
<style type="text/css">
	body {
			background-color: grey;
			background-image:url('images/bg1.gif');
			
		}
		
	table {
				border:0px red solid;
				background-color:white;
				padding-top:0px;
				margin-top:0px;
				cellspacing:0px; 
				cellpadding:0px;
	}
	td {
		border: 0px green dotted;
		background-color:#F8F8FF;
	}
	
	
	a {
		font-family:Arial, Helvetica, sans-serif;
		color:#999933;
		text-decoration:none;
		
		
	}
	a:hover {
	
		
		text-decoration:underline;
		color:#00CC66;
		background-color:yellow;
	}
	p.user1 {
		font-family:Georgia, "Times New Roman", Times, serif;
		color:#00F;
		font-size:12pt;
		font-style:oblique;
		padding-left:30px;
		text-decoration:none
	}
	td.user {
			position:left;
			height:50px;
			font-size:18pt;
			padding-left:30px;
	}
	td.footer {
		background-color:#2952A3;
		background-image:url('images/tdback1.gif');
		font-weight:bold;
		color:#999933;
		text-align:center;
		font-size:8pt;
		padding-bottom:5px;
		padding-top:5px;
	}
	
	p.link {
		font-size:12pt;
		text-decoration:underline;
		padding-left:10px;
		}
	ul {
		font-size:10pt;
		text-decoration:none;
		color:#999933;
		list-style-image: url('images/link.png');
	}
	#links {
			border-left:1px #999933 solid;
			padding-left:5px;
			position:absolute;
			top:290px;
			left:970px
			
	}
	td.php{
				position:center;
				top:30px;
				left:23px;

				padding:50px;
				border-radius:50px;
				background:rgba(255,255,2,0.3);
				box-shadow:0 0 15px 10px white;
		}
        ul{
                       float:center;
                       width:100%;
                       padding:0;
                       margin:0;
                       list-style-type:none;
                       }
       li {display:inline;}
</style>
</head>
<body>
<table align='center' class='main_tab' cellspacing= "0" cellpadding= "0">
	<tr>
		<td colspan="2"><img src="images/b4.jpg" /></td>
	</tr>
</table>
<table align="center" width="960px"  class='main_tab' cellspacing= "0" cellpadding= "0">
	<tr>
		<td ><p class="user1">WELCOME: <?php echo $_SESSION['fname']; ?></p></td>
	</tr>
  	<tr><td class='user'>
          <ul>
              <li><a href='query1.php'>
                <button type='send' value='send'>Keep A Query</button>
                </form></a></li>
              <li><a href='changepassword.html'>
                    <button type='send' value='send'>Change Password</button>
                    </form></li>
              <li><a href='logout.php'>
                    <button type='send' value='send'>Logout</button>
                    </form></a></li>
              <li><a href='queriesbyme.php'>
                    <form action='queriesbyme.php' method='post'>
                    <input type='hidden' name='name' value='<?php echo $fname; ?>'/>
                    <input type='hidden' name='pass' value='<?php echo $pass; ?>'/>
                    <input type='hidden'  name='department' value='<?php echo $dep;?>'/>
                    <button type='send' value='send'>Queries By Me</button>
                    </form></a></li>
              <li><a href='allqueries.php'>
                     <form action='allqueries.php' method='post'>
                    <input type='hidden' name='name' value='<?php echo $fname; ?>'/>
                    <input type='hidden' name='pass' value='<?php echo $pass; ?>'/>
                    <input type='hidden'  name='department' value='<?php echo $dep;?>'/>
                    <button type='send' value='send'>See All Queries</button>
                    </form></a></li>

          </ul></td>
    </tr>
         <tr>
         <td class="php">
         <?php
         $conn=mysql_connect('localhost','root','') or die(mysql_error);
         mysql_select_db('thedatabase');
         $link2 = mysql_connect('localhost','root',''); // resource id 1 is given again
         mysql_close($link2);
         $sql3="select * from allusers where Name='$fname' && Password='$pass'";
         $result3=mysql_query($sql3,$conn) or die(mysql_error());
         while($row2=mysql_fetch_array($result3,MYSQL_ASSOC)){
         $lastlogin=$row2['Lastlogin'];
         }
         $sql1="select * from tquery where Assignedto='$fname' && Department='$dep' && Startdate='$pdate' && Ctime >='$lastlogin'";
         $result1=mysql_query($sql1,$conn) or die(mysql_error());
         $rownums=mysql_num_rows($result1);
         global $ctime;
         while($row3=mysql_fetch_array($result1,MYSQL_ASSOC)){
         $ctime=$row3['Ctime'];
         }
         if($rownums>0){
         echo "<script type='text/javascript'>
         alert('You have $rownums New Queries')
        </script>";
        }
        else{echo"<script type='text/javascript'>
        alert('You Have No New Queries!')
        </script>";}
        global $uploadno;

        $sql2="select Controlnum,Createdby,Priority,Startdate,Duedate,Description from tquery where Assignedto='$fname'&& Department='$dep'";
        $result2=mysql_query($sql2,$conn) or die(mysql_error());
        while($row=mysql_fetch_array($result2,MYSQL_NUM)){
        $cnum=$row[0];
        $conn=mysql_connect('localhost','root','') or die(mysql_error);
        mysql_select_db('thedatabase');
         $sql6="select * from query where Controlnum='$cnum'";
         $result6=mysql_query($sql6,$conn) or die(mysql_error());
         while($rowu=mysql_fetch_array($result6,MYSQL_ASSOC)){
        $uploadno=$rowu['Uploadno'];
        }
        echo "<fieldset>"."Controlnum:".$row[0]."<br>"."Createdby:".$row[1]."<br>"."Priority:".$row[2]."<br>"."Startdate:".$row[3]."<br>"."Duedate:".$row[4].
       "<br>"."Description:".$row[5]."<br>"."<form action='download.php' method='post'>
                                               <input type='hidden' value='$uploadno' name='uploadno'/>
                                                <button type='submit' value='send'>Download Attachments</button></form>"."<form action='giveresponse.php' method='post'>
                                                                                                    <input type='hidden' value='$fname' name='fname'/>
                                                                                                    <input type='hidden' value='$row[0]' name='cnum' />
                                                                                                    <input type='hidden' value='$row[1]' name='cby'/>
                                                                                                     <input type='hidden' value='$dep' name='department'/>
                                                                                                     <input type='hidden' name='pass' value='$pass'/>
                                                                                                      <button type='submit' value='send'>Give Response</button></form>"."</fieldset>";
       $sql4="update allusers set Lastlogin='$currtime' where Name='$fname' && Password='$pass'";
       $result4=mysql_query($sql4,$conn) or die(mysql_error());
       mysql_close($conn);
	}


       ?>
    </td>
         </tr>
	<tr>
	<td class="footer">Copyright &copy;  Anuroop Kakkirala IIT JODHPUR 3rd Year</td>
	</tr>
</table>

</body>
</html>


