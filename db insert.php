<html>  
  <head>
    <title>insert results</title>
    <style>
      form{
        background:aqua;
      }
      body{
        background:skyblue;
      }
    </style>
  </head>
  <body>
    
  
<form name="student" action="<?php echo $_SERVER['PHP_SELF']; ?>"  method="post">
<center>
<h3> Student Results </h3>
<table>
<tr><td>Enter Hallticket No :</td><td><input type="number" name="ht_no"/></td></tr>
<tr><td>Enter Student Name :</td><td><input type="text" name="student_name"/></td></tr>
<tr><td>Enter DMS marks :</td><td><input type="number" name="dms"/></td></tr>
<tr><td>Enter CO marks :</td><td><input type="number" name="co"/></td></tr>
<tr><td>Enter Java marks :</td><td><input type="number" name="java"/></td></tr>
<tr><td>Enter Accounts marks :</td><td><input type="number" name="accounts"/></td></tr>
<tr><td>Enter Operating system marks:</td><td><input type="number" name="os"/></td></tr>
<tr><td>Total marks:</td><td><input type="number" name="total_marks"/></td></tr>
<tr><td>total percentage:</td><td><input type="number" name="percentage"/></td></tr>
<tr><td colspan="2"><input type="submit" name="Submit" Value="Submit"/></td></tr>
</table>
</form>
</body>
</html>
<?php  
if(isset($_POST['Submit'])) 
{

$host = 'localhost:3306';  
$user = 'root';  
$pass = 'sksiva';  
$dbname='sk';
$conn = mysqli_connect($host, $user, $pass,$dbname);  
if(! $conn )  
{  
  die('Could not connect: ' . mysqli_error());  
}  

$htno=$_POST['ht_no'];
$name=$_POST['student_name'];
$dms=$_POST['dms'];
$co=$_POST['co'];
$java=$_POST['java'];
$acc=$_POST['accounts'];
$os=$_POST['os'];
$total=$_POST['total_marks'];
$percentage=$_POST['percentage'];
$sql = "insert into results values(".$htno.",'".$name."',".$dms.",".$co.",".$java.",".$acc.",".$os.",".$total.",".$percentage.")";
echo $sql; 

if(mysqli_query($conn, $sql)){  
  echo "<br>"."inserted student results sucessfully";
}else{  
echo "Could not insert record: ". mysqli_error($conn);  
} 
mysqli_close($conn);  
}
?>  
