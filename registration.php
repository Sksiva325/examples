<?php
require 'config.php';
if(!empty($_SESSION["id"])){
    header("location:index.php");
}
if(isset($_POST["reg"])){
$uname=$_POST["username"];
$mail=$_POST["mail"];
$pw=$_POST["password"];
$cpw=$_POST["confirmpassword"];
$duplicate=mysqli_query($conn,"select * from reg where username='$uname' OR mail='$mail'");
if(mysqli_num_rows($duplicate)>0){
    echo
    "<script>alert('Username Already taken');</script>";
}
else{
    if($pw==$cpw){
        $query="insert into reg values('".$uname."','".$mail."','".$pw."','".$cpw."')";
        mysqli_query($conn,$query);
        echo
        "<script>alert('Registraion succesfull');</script>";
    }
    else{
        echo "<script>alert('password doesnot match');</script>";
    }
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
<form class="" action="" method="post" autocomplete="off">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="email">Email:</label>
        <input type="email" id="mail" name="mail" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <label for="password">confirmPassword:</label>
        <input type="password" id="confirmpassword" name="confirmpassword" required><br><br>
        <button type="submit" name="reg">Register</button>
    </form>
    <br><br>
    <a href="login.php" >Login</a>
</body>
</html>
