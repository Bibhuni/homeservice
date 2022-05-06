<?php
session_start();
$userid= $_GET['userid'];
if(!isset($_SESSION['AdminLoginId']))
{
   header("location: login.html");
}
?>
<?php
$connection = mysqli_connect('localhost','root');

mysqli_select_db($connection,"homeservice");
$userid= $_GET['userid'];
if(isset($_POST['update']))
{
$query = "UPDATE userlogin SET fullname='$_POST[fullname]' WHERE userlogin.userid='$userid'";

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
    $userid=$_GET['userid'];
    $query="SELECT userid,email,fullname,area,city,state,pin FROM userlogin WHERE userid='$userid'";
    $resultn=mysqli_query($connection,$query); 

  ?>
  <?php
    if(isset($_POST['Logout']))
    {
    session_destroy();
    header("location:login.html");
    }
?>
<div class="hero">
<div class="text"><h2>User</h2></div>
<div class="slide" id="time-table-service">
<table class="table table-border" id="dataTable"  width="95%" cellspacing="10px" >
<thead>
    <tr>
        <th>UserID</th>
        <th>email</th>
        <th>Fullname</th>
        <th>Area</th>
        <th>City</th>
        <th>State</th>
        <th>Pin</th>
        <th>Action</th>

    </tr>

  </thead>
  <tbody>
  <?php
if(mysqli_num_rows($resultn)>0)
{
    while($row = mysqli_fetch_assoc($resultn))
    {
        ?>
        
    <tr>
        <td><?php echo $row['userid'];?></td>
        <td><?php echo $row['email'];?></td>
        <td><form method="post" name="category" ><input type="text" name="fullname" value="<?=$row['fullname'];?>" class="form-control">
        <button type="submit" name="update" id="update" class="update-btn">Update</button></form></td>
        <td><?php echo $row['area'];?></td>
        <td><?php echo $row['city'];?></td>
        <td><?php echo $row['state'];?></td>
        <td><?php echo $row['pin'];?></td>
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


