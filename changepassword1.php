
<html>
<head>
<title>Change Password</title>
<link rel="shortcut icon" href="http://www.bel-india.com/sites/all/themes/bel/images/bel.ico" type="image/x-icon" value='Anuroop' />
</head>
</html>

<?php
$name=$_POST['name'];
$dep=$_POST['department'];
echo"<html>
<body>
<form action='changepassword.php' method='post'>
<input type='hidden' name='name' value='$name'/>
<input type='hidden'  name='department' value='$dep'/>
Old Password:<input type='password' name='oldpass'/>
New Password:<input type='password' name='newpass'/>
Reenter Password:<input type='password' name='repass'/>
<button type='submit' value='send'>SUBMIT</button>
</form>
</body>
</html>";
 
 ?>