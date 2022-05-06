<?php

$connection = mysqli_connect('localhost','root');

mysqli_select_db($connection,"homeservice");

if(isset($_POST['login']))
{
$query ="SELECT * FROM servicelogin WHERE serviceid = '$_POST[serviceid]' AND password ='$_POST[password]'";
$result=mysqli_query($connection,$query);
if(mysqli_num_rows($result)==1)
{
    session_start();
    header("location: serviceinterface.php");
    $_SESSION['ServiceCategory']=$_POST['category'];
    $_SESSION['ServiceLoginId']=$_POST['serviceid'];
}
else
{
    echo"<script>alert('Incorrect User name and Password.');
    window.location.href='servicelogin.html';
    </script>";
}
}


?>