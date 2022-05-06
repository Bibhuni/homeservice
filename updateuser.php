<?php
session_start();
$connection = mysqli_connect('localhost','root');

mysqli_select_db($connection,"homeservice");
if(isset($_POST['update']))
{
$userid=$_SESSION['UserLoginId'];
$query = "UPDATE userlogin SET fullname='$_POST[fullname]', area='$_POST[area]', city='$_POST[city]', state='$_POST[state]', pin='$_POST[pin]' WHERE userid='$_SESSION[UserLoginId]'";

mysqli_query($connection,$query);

echo"<script>alert('Profile Updated');
window.location.href='userinterface.php';
</script>";
    //session_start();
    //$_SESSION['AdminLoginId']=$_POST['admin_name'];
    //header("location: adminpannelphp.php");

}
else{
    echo "Failed";
}


?>