<html>
<head>
<title>Download File From MySQL Database</title>
<meta http-equiv="Content-Type" content="text/html; 
charset=iso-8859-1">
</head>
<body>
<?php
//database connection
$con = mysql_connect('localhost', 'root', '') or die(mysql_error());
//select database
$db = mysql_select_db('thedatabase', $con);
$uploadno=$_POST['uploadno'];
$query = "SELECT id, name FROM upload where id='$uploadno'";
$result = mysql_query($query) or die('Error, query failed');
if(mysql_num_rows($result) == 0)
{
echo "No attachments for this Query"."<br>";
}
else
{
while(list($id, $name) = mysql_fetch_array($result))
{
?>
<a href="download.php?id=<?php echo urlencode($id);?>"
><?php echo urlencode($name);?></a> <br>
<?php
}
}
mysql_close();
?>
</body>
</html>
<?php
if(isset($_GET['id']))
{
// if id is set then get the file with the id from database
$con = mysql_connect('localhost', 'root', '') or die(mysql_error());
$db = mysql_select_db('thedatabase', $conn);
$id    = $_GET['id'];
$query = "SELECT name, type, size, content " .
         "FROM upload WHERE id = '$id'";
$result = mysql_query($query) or die('Error, query failed');
list($name, $type, $size, $content) = mysql_fetch_array($result);
header("Content-length: $size");
header("Content-type: $type");
header("Content-Disposition: attachment; filename=$name");
ob_clean();
flush();
echo $content;
mysql_close();
exit;
}
?>