<?php
session_start();
if(!isset($_SESSION['UserLoginId']))
{
    header("location: login.html");
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/logininterface.css">
    <link rel="stylesheet" href="css/datepicker.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
  </head>

    <body>

        <header>
            <nav id="navbar">
              <div class="heading">
            <a>Welcome to User Panel- <?php echo $_SESSION['UserLoginId']?></a>
            </div>
              <a href="#about"><h2>HOME SERVICE</h2></a>
              <ul>
              <li><a href="login.html">Login Page</a></li>
              <li><a href="servicelogin.html">Services Login</a></li>
              <li><a href="userservicestatus.php">Status</a></li>
                <form method="post">
                <button name="Logout">Logout</button>
                </form>

              </ul>
            </nav>
          </header>
      
      <div class="inner-layer">
          <div class="container">
            <div class="row no-margin">
                <div class="col-sm-7">
                    <div class="content">
                        <h1>Complete your Profile.</h1>
                        <form action="updateuser.php" method="post">
                        <div class="row form-row">
                        <input type="text" name="fullname" placeholder="Enter Full name" class="form-control">
                        </div>
                        <div class="row form-row">
                                <div class="col-sm-6">
                                   <input type="text" name="area" placeholder="Enter Area" class="form-control">
                                </div>
                                <div class="col-sm-6">
                                   <input type="text" name="city" placeholder="Enter City" class="form-control">
                                </div>
                            </div>
                            <div class="row form-row">
                                <div class="col-sm-6">
                                   <input type="text" name="state" placeholder="Enter State" class="form-control">
                                </div>
                                <div class="col-sm-6">
                                   <input type="text" name="pin" placeholder="Postal Code" class="form-control">
                                </div>
                            </div>
                        <div class="row form-row">
                        <button class="btn btn-success btn-appointment" name="update">
                        Update Profile
                        </button>
                        </div>
                        </form>
                        <h3><img src="services.jpg" alt=""> </h3>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="form-data">
                        <div class="form-head">
                            <h2>Book Service Appointemnt Now</h2>
                        </div>
                        <form action="servicebook.php" method="post">
                        <div class="form-body">
                           <div class="row form-row">
                            <div class="col-sm-6">
                              <input id="date" name="date" type="date" placeholder="Service Date" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                <input id="time" name="time" type="time" placeholder="Service Time" class="form-control">
                              </div>
                            </div>
                            <div class="row form-row">
                                <select id="category" name="category" type="text" placeholder="Service Time" class="form-control">
                                    <option value="electrician">Electrician</option>
                                    <option value="plumber">Plumber</option>
                                    <option value="house cleansing">House Cleansing</option>
                                    <option value="parlour">Parlour</option>                
                            </select>
                            </div>
                             <div class="row form-row">
                               <button class="btn btn-success btn-appointment" name="service">
                                 Book Service Appointment
                               </button>
                               
                            </div>

                        </div>
                        </form>
                    </div>
                </div>
            </div>
          </div>
      </div>
      
    </body>
  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/bootstrap-datepicker.js"></script>

    <script>
      $(document).ready(function(){
          $("#dat").datepicker();
      })
    </script>

    <?php
    if(isset($_POST['Logout']))
    {
    session_destroy();
    header("location: admin.html");
    }

?>

  </body>
</html>