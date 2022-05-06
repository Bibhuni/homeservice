<?php

$connection = mysqli_connect('localhost','root');

mysqli_select_db($connection,"homeservice");
$userid = $_GET['userid'];

$query="DELETE FROM userlogin WHERE userid = '$userid'";

mysqli_query($connection, $query);

header('location:adminpannel.php');

?>
