<?php 
$vote=$_REQUEST['vote'];
//connecting to database
$con=mysqli_connect("localhost","root","","poll");
//updating vote
if($vote==0)
{
	$query1=mysqli_query($con,"INSERT INTO vote(modi,rahul) VALUES('0','1')");
}
else
{
	$query2=mysqli_query($con,"INSERT INTO vote(modi,rahul) VALUES('1','0')");
}
$query3=mysqli_query($con,"SELECT * FROM vote WHERE modi='1'");
$query4=mysqli_query($con,"SELECT * FROM vote WHERE rahul='1'");
$rows1=mysqli_num_rows($query3);
$rows2=mysqli_num_rows($query4);
$modi=0;
$rahul=0;
if($rows1==0&&$rows2==0)
{
	$modi=0;
	$rahul=0;
}
else
{
	$modi=100*round($rows1/($rows1+$rows2),2);
	$rahul=100*round($rows2/($rows2+$rows1),2);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Result</title>
</head>
<body>
<h3>Result : </h3>
<table>	
<tr>
	<td>Narendra Modi : </td>
	<td>
		<?php echo $modi; ?>%
	</td>
</tr>
<tr>
	<td>Rahul Gandhi :</td>
	<td>
		<?php echo $rahul; ?>%
	</td>
</tr>
</body>
</html>