<?php
session_start();
$connection = mysqli_connect('localhost','root');

mysqli_select_db($connection,"homeservice");
if(isset($_POST['service']))
{
    $userid=$_SESSION['UserLoginId'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $category = $_POST['category'];
    $query = "INSERT INTO servicebook(date, time, category, userid) VALUES ('$date','$time','$category','$userid')";
    if(mysqli_query($connection,$query))
    {
        echo"
        <script>
        alert('Service Booked sucessfully');
        window.location.href='userinterface.php';
        </script>
        ";
    }
    else
    {
        echo"
        <script>alert('Failed');
        </script>
        ";
    }

}