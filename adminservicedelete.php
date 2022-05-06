<?php

$connection = mysqli_connect('localhost','root');

mysqli_select_db($connection,"homeservice");
$id = $_GET['id'];

$query="DELETE FROM servicebook WHERE id = '$id'";

mysqli_query($connection, $query);

header('location:adminpannel.php');

?>
