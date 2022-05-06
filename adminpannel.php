<?php
session_start();
if(!isset($_SESSION['AdminLoginId']))
{
   header("location: login.html");
}

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/adminpannel.css">
  </head>


<body>
<header>
    <nav id="navbar">
      <div class="heading">
    <a>Welcome to Admin Panel- <?php echo $_SESSION['AdminLoginId']?></a>
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
    $query="SELECT serviceid,category,email FROM servicelogin";
    $resultn=mysqli_query($connection,$query); 

  ?>
<div class="hero">
<div class="text"><h2>Service Providers</h2></div>
<div class="slide" id="time-table-service">
<table class="table table-border" id="dataTable"  width="95%" cellspacing="10px" >
<thead>
    <tr>
        <th>ServiceId</th>
        <th>Category</th>
        <th>Email</th>
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
        <td><?php echo $row['serviceid'];?></td>
        <td><?php echo $row['category'];?></td>
        <td><?php echo $row['email'];?></td>
        <td><button type="submit" value="update" ><a  href="adminmanage.php?serviceid=<?php echo $row['serviceid'];?>" >Manage </a></button>
        <button type="submit" value="delete" ><a  href="servicelogindelete.php?serviceid=<?php echo $row['serviceid'];?>" >Delete </a></button></td>
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





<?php
    $connection = mysqli_connect('localhost','root');

    mysqli_select_db($connection,"homeservice");
    $query="SELECT userid,email,fullname,area,city,state,pin FROM userlogin";
    $resultn=mysqli_query($connection,$query); 

  ?>






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
        <td><?php echo $row['fullname'];?></td>
        <td><?php echo $row['area'];?></td>
        <td><?php echo $row['city'];?></td>
        <td><?php echo $row['state'];?></td>
        <td><?php echo $row['pin'];?></td>
        <td><button type="submit" value="update" ><a  href="adminusermanage.php?userid=<?php echo $row['userid'];?>" >Manage </a></button>
        <button type="submit" value="delete" ><a  href="adminuserdelete.php?userid=<?php echo $row['userid'];?>" >Delete </a></button></td>
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







<?php
    $connection = mysqli_connect('localhost','root');

    mysqli_select_db($connection,"homeservice");
    $query="SELECT id,date,time,category,fullname,status FROM  userlogin LEFT JOIN servicebook ON userlogin.userid=servicebook.userid";
    $result=mysqli_query($connection,$query); 

  ?>




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
        <th>status</th>
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
        <td><button type="submit" value="update" ><a  href="adminservicemanage.php?id=<?php echo $row['id'];?>" >Manage </a></button>
        <button type="submit" value="delete" ><a  href="adminservicedelete.php?id=<?php echo $row['id'];?>" >Delete </a></button></td>
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
<?php
    if(isset($_POST['Logout']))
    {
    session_destroy();
    header("location: login.html");
    }
?>

</body>
</html>
