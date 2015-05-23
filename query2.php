<?php
$snum=$_POST['snum'];
$conn = mysql_connect('localhost', 'root', '') or die(mysql_error());
mysql_select_db('thedatabase', $conn);
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
$sql1="select * from query order by Id desc limit 1";
$result1=mysql_query($sql1,$conn) or die(mysql_error());
$row1=mysql_num_rows($result1);
if($row1>0){
while($row=mysql_fetch_array($result1,MYSQL_ASSOC)){
$number=$row['Controlnum'];
}}else{
$number=0;}
mysql_close($conn);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Query Page</title>
<link rel="shortcut icon" href="http://www.bel-india.com/sites/all/themes/bel/images/bel.ico" type="image/x-icon" value='Anuroop' />
<style type="text/css">
	body {
		background:#3A5598;

	}
	table {
			background:rgba(248,248,255, 0.8);
			padding-left:15px;
			padding-right:15px;
			padding-top:15px;
			padding-bottom:15px;
			width:60%;
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
</style>
</head>
<body>
<form name="reg" action='query3.php' onsubmit="return validateForm();" method='post' enctype="multipart/form-data">
<table align="center">
	<tr>
		<td class="hr" colspan="2">Query Page &nbsp;<span>&#40;* fields are Mandatory&#41;</span></td>
	</tr>
<tr>
		<td>Controlnum</td><td><input type="text" name="cnum" size="20" maxlength="20"><span>*<?php echo"The Last Controlno is:".$number."   Please Select Next One";?></span></td>
	</tr>
	<tr>
		<td>Createdby</td><td><input type="text" name="cby" size="30" maxlength="30"><span>*</span></td>
	</tr>
	<tr>
		<td>Assignedto</td><td><input type="text" name="asto" size="30" maxlength="30"><span>*</span></td>
	</tr
	<tr>
		<td>Select Department<br>
                    To Keep A Query</td>
		<td><select name="department">
		<option value='Army'>Army</option>
                <option value='Navy'>Navy</option>
                <option value='Airforce'>Airforce</option>
                </select><span>*</span></td>
	</tr>
	<tr>
	       <td>Priority</td>
               <td><select  name='priority'><br>
               <option value='High'>High</option>
               <option value='Normal'>Normal</option>
               <option value='Low'>Low</option>
               </select><span>*</span></td>
         </tr>
	<tr>
		<td>Start Date</td>
		<td><input type='date' value='dd/mm/yyyy' name='sdate'/><span>*</span></td>
	</tr>
	<tr>
		<td>Due Date</td>
		<td><input type='date' value='dd/mm/yyyy' name='ddate'/><span>*</span></td>
	</tr>
	<tr>
		<td>Description</td>
		<td class='centerbox'><textarea name='description'>resize me, please</textarea><span>*</span></td>
	</tr>
	<tr>
		<td>Attachments</td>
		<td>

		<input type="hidden" name="MAX_FILE_SIZE"
                 value="16000000">
                 <input type='hidden'  name='snum' value=<?php echo "$snum";?>/>
                <input type='file' name="userfile" id="userfile"/>
		</td>
	</tr>
		<td colspan="2" class="last_hr" align="center"><input type="submit" name="upload"  id="upload" value="Submit">&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="reset" name="clear" value="Reset"></td>

	</tr>
</table>
</form>
</body>
</html>
