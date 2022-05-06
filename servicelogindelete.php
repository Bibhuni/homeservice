<?php

$connection = mysqli_connect('localhost','root');

mysqli_select_db($connection,"homeservice");
$serviceid = $_GET['serviceid'];

$query="DELETE FROM servicelogin WHERE serviceid = '$serviceid'";

mysqli_query($connection, $query);

header('location:adminpannel.php');



?>
