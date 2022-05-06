<?php
session_start();
$id= $_GET['id'];
if(!isset($_SESSION['AdminLoginId']))
{
   header("location: login.html");
}
?>
<?php
$connection = mysqli_connect('localhost','root');

mysqli_select_db($connection,"homeservice");
if(isset($_POST['update']))
{
$id= $_GET['id'];
$query = "UPDATE servicebook SET status='$_POST[status]' WHERE servicebook.id='$id'";

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
    $query="SELECT id,date,time,category,fullname,area,city,state,pin FROM  userlogin LEFT JOIN servicebook ON userlogin.userid=servicebook.userid WHERE id=$id";
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
<div class="text"><h2>Update Service Status</h2></div>
<div class="slide" id="time-table-service">
<table class="table table-border" id="dataTable"  width="95%" cellspacing="10px" >
<thead>
    <tr>
        <th>ID</th>
        <th>Full name</th>
        <th>date</th>
        <th>time</th>
        <th>category</th>
        <th>area</th>
        <th>city</th>
        <th>state</th>
        <th>pin</th>
        <th>Update status</th>
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
        <td><?php echo $row['id'];?></td>
        <td><?php echo $row['fullname'];?></td>
        <td><?php echo $row['date'];?></td>
        <td><?php echo $row['time'];?></td>
        <td><?php echo $row['category'];?></td>
        <td><?php echo $row['area'];?></td>
        <td><?php echo $row['city'];?></td>
        <td><?php echo $row['state'];?></td>
        <td><?php echo $row['pin'];?></td>
        <td><form method="post" class="status" ><select class="status" type="text" name="status" id="status">
            <option value="Service Booked">Service Booked</option>
            <option value="On Way">On Way</option>
            <option value="completed">Completed</option>
        </select>
        <button type="submit" name="update" class="update-btn">Update</button>
      </form></td>

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


