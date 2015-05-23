<?php
session_start();
if($_SESSION['name']&&$_SESSION['pass']&&$_SESSION['snum'])
{
$name=$_SESSION['name'];
$pass=$_SESSION['pass'];
$snum=$_SESSION['snum'];
}
else{
	header("location:error.php");
	}

 ?>
 <!DOCTYPE html>

<html>
<head>
<title>Welcome</title>
<link rel="shortcut icon" href="http://www.bel-india.com/sites/all/themes/bel/images/bel.ico" type="image/x-icon" value='Anuroop' />
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
       a.logout{
             position:right;
       }
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
		<td ><p class="user1">WELCOME: <?php echo $_SESSION['name']; ?></p></td>
	</tr>
  	<tr><td class='user'>
          <ul>
              <li><a href='query2.php'>
                 <form action='query2.php' method='post'>
                 <input type='hidden' name='snum' value=<?php echo "$snum";?>>
                <button type='send' value='send'>Keep A Query</button>
                </form></a></li>
              <li><a href='changepassword.html'>
                    <button type='send' value='send'>Change Password</button>
                    </form></li>
              <li><a href='queriesbyme1.php'>
                    <form action='queriesbyme1.php' method='post'>
                    <input type='hidden' name='name' value='<?php echo $name; ?>'/>
                    <input type='hidden' name='pass' value='<?php echo $pass; ?>'/>
                    <input type='hidden'  name='snum' value='<?php echo $snum;?>'/>
                    <button type='send' value='send'>Queries By Me</button>
                    </form></a></li>
              <li><a href='allqueries1.php'>
                     <form action='allqueries1.php' method='post'>
                    <input type='hidden' name='name' value='<?php echo $name; ?>'/>
                    <input type='hidden' name='pass' value='<?php echo $pass; ?>'/>
                    <input type='hidden'  name='snum' value='<?php echo $snum;?>'/>
                    <button type='send' value='send'>See All Queries</button>
                    </form></a></li>
                <li><a href='logout.php' class='logout'>
                    <button type='send' value='send'>Logout</button>
                    </form></a></li>    

          </ul></td>
    </tr>

	<tr>
	<td class="footer">Copyright &copy;  Anuroop Kakkirala IIT JODHPUR 3rd Year</td>
	</tr>
</table>

</body>
</html>

