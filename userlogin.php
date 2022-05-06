<?php

$connection = mysqli_connect('localhost','root');

mysqli_select_db($connection,"homeservice");

if(isset($_POST['login']))
{
$query ="SELECT * FROM userlogin WHERE userid = '$_POST[userid]' AND password ='$_POST[password]'";
$result=mysqli_query($connection,$query);
if(mysqli_num_rows($result)==1)
{
    session_start();
    header("location: userinterface.php");
    $_SESSION['UserLoginId']=$_POST['userid'];

}
else
{
    echo"<script>alert('Incorrect User name and Password.');
    window.location.href='login.html';
    </script>";
}
}


?>