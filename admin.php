<?php

$connection = mysqli_connect('localhost','root');

mysqli_select_db($connection,"homeservice");

if(isset($_POST['adminlogin']))
{
$query ="SELECT * FROM admin_login WHERE admin_name = '$_POST[admin_name]' AND admin_password ='$_POST[admin_password]'";
$result=mysqli_query($connection,$query);
if(mysqli_num_rows($result)==1)
{
    echo"done";
    session_start();
    $_SESSION['AdminLoginId']=$_POST['admin_name'];
    header("location: adminpannel.php");
}
else
{
    echo"<script>alert('Incorrect User name and Password.');</script>";
}
}


?>