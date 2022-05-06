<?php
session_start();
if(!isset($_SESSION['UserLoginId']))
{
   header("location: userlogin.html");
}

?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/serviceinterface.css">
  </head>


<body>
<header>
    <nav id="navbar">
      <div class="heading">
    <a>Welcome to Service Provider Panel- <?php echo $_SESSION['UserLoginId']?></a>
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
    $userid=$_SESSION['UserLoginId'];
    $query="SELECT id,date,time,category,fullname,status FROM  userlogin LEFT JOIN servicebook ON userlogin.userid=servicebook.userid WHERE servicebook.userid='$userid'";
    $result=mysqli_query($connection,$query); 

  ?>
  <?php
    if(isset($_POST['Logout']))
    {
    session_destroy();
    header("location: login.html");
    }
?>
<div class="hero">
<div class="text"><h2>All Booked time Slots.</h2></div>
<div class="slide" id="time-table-service">
<table class="table table-border" id="dataTable"  width="95%" cellspacing="10px" >
<thead>
    <tr>
        <th>ID</th>
        <th>Full name</th>
        <th>date</th>
        <th>time</th>
        <th>category</th>
        <th>Status</th>
        <th>Action</th>
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
        <td><?php echo $row['status'];?></td>
        <td><button type="submit" value="delete" ><a  href="userstatusdelete.php?id=<?php echo $row['id'];?>" >Cancel Booking </a></button></td>
        </td>

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


