<?php
 $name=$_POST['name'];
 $userid=$_POST['userid'];
 ?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Delete User</title>
<link rel="shortcut icon" href="http://www.bel-india.com/sites/all/themes/bel/images/bel.ico" type="image/x-icon" value='Anuroop' />
<style type="text/css">
	body {
		background-image:url('images/delete.jpg');

	}
	table {
			background:rgba(248,248,255, 0.8);
			padding-left:15px;
			padding-right:15px;
			padding-top:15px;
			padding-bottom:15px;
			width:30%;
			border-radius:10px;
			font-family:Verdana, Geneva, sans-serif;
			cellpadding:5px;
			cellspacing:5px;
	}
	td {
		border-bottom: 1px green dotted;
		height:30px;
	}
	span {
		color:red;
		font-size:8pt;
	}
	td.hr {
		border-bottom: 1px blue solid;
		font-size:15pt;
		color:blue;
		font-weight:bold;
	}
	td.nb {
		border-bottom:0px green dotted;
	}
	td.last_hr {
		border-bottom:1px blue solid;
		border-bottom-left-radius:2em;
		border-bottom-right-radius:2em;
	}
	td.footer {
		background-color:#2952A3;
		background-image:url('images/tdback1.gif');
		border-top: 1px grey solid;
		color:#999933;
		text-align:center;
		font-size:8pt;
		padding-bottom:5px;
		padding-top:5px;
	}

</style>
</head>
<body>

<form name="reg" action='update.php' onsubmit="return validateForm();" method='post'>
<table align="center">
	<tr>
		<td class="hr" colspan="2">Update User &nbsp;<span>&#40;* fields are Mandatory&#41;</span></td>
	</tr>
 	<tr>
		<td>Name</td><td><input type='text' value=<?php echo $name;?> name='name'/></td>
	</tr>
	<tr>
		<td>Staffno</td><td><input type='text' value=<?php echo $userid;?> name='userid'/></td>
	</tr> 
	<tr>
		<td>Privilages<span>*</span></td><td><input type='checkbox' value='army' name='privilage[]'/>ARMY<br>
                                      <input type='checkbox' value='navy' name='privilage[]'/>NAVY<br>
                                      <input type='checkbox' value='airforce' name='privilage[]'/>AIRFORCE</td>
	</tr>
	<tr>
		<td>Admin Password<span>*</span></td><td><input type='password' name='pass'/></td>
	</tr>
         <tr>

		<td colspan="2" class="last_hr" align="center"><input type="submit" name="submit" value="Confirm Update">&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="reset" name="clear" value="Reset"></td>

	</tr>

</table>
</form>
</body>
</html>




















