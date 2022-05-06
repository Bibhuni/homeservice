<?php
session_start();
$serviceid= $_GET['serviceid'];
if(!isset($_SESSION['AdminLoginId']))
{
   header("location: login.html");
}
?>
<?php
$connection = mysqli_connect('localhost','root');

mysqli_select_db($connection,"homeservice");
$serviceid= $_GET['serviceid'];
if(isset($_POST['update']))
{
$query = "UPDATE servicelogin SET category='$_POST[category]' WHERE servicelogin.serviceid='$serviceid'";

mysqli_query($connection,$query);

echo"<script>alert('Status Updated');
window.location.href='adminpannel.php';
</script>";
    //session_start();
    //$_SESSION['AdminLoginId']=$_POST['admin_name'];
    //header("location: adminpannelphp.php");

}
else{
    echo "Failed";
}


?>








<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/servicemanage.css">
  </head>


<body>
<header>
    <nav id="navbar">
      <div class="heading">
    <a>Admin management Panel- <?php echo $_SESSION['AdminLoginId']?></a>
    </div>
      <a href="#about"><h2>HOME SERVICE</h2></a>
      <ul>
      <li><a href="login.html">Login Page</a></li>
        <li><a href="servicelogin.html">Services Login</a></li>
        <form method="post">
        <button name="Logout">Logout</button>
        </form>

      </ul>
    </nav>
  </header>

  <?php
    $connection = mysqli_connect('localhost','root');

    mysqli_select_db($connection,"homeservice");
    $serviceid=$_GET['serviceid'];
    $query="SELECT serviceid,email FROM servicelogin WHERE serviceid='$serviceid'";
    $result=mysqli_query($connection,$query);


  ?>
  <?php
    if(isset($_POST['Logout']))
    {
    session_destroy();
    header("location:login.html");
    }
?>
<div class="hero">
<div class="text"><h2>Update Service Provider</h2></div>
<div class="slide" id="time-table-service">
<table class="table table-border" id="dataTable"  width="95%" cellspacing="10px" >
<thead>
    <tr>
        <th>ServiceID</th>
        <th>Category</th>
        <th>Email</th>
    </tr>

  </thead>
  <tbody>
<?php
if(mysqli_num_rows($result)>0)
{
    while($row = mysqli_fetch_assoc($result))
    {
        ?>
        
    <tr>
        <td><?php echo $row['serviceid'];?></td>
        <td><form method="post"name="category"  class="category" ><select class="category" type="text" name="category" id="category">
            <option value="Electrician">Electrician</option>
            <option value="Plumber">Plumber</option>
            <option value="House Cleansing">House Cleansing</option>
            <option value="Parlour">Parlour</option>
        </select>
        <button type="submit" name="update" id="update" class="update-btn">Update</button>
      </form></td>
      <td><?php echo $row['email'];?></td>


    </tr>
    <?php
    }
}
else{
    echo "No Record Found";
}
?>

</tbody>
</table>
</div>

</div>
</body>
</html>


