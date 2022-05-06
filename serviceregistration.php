<?php

$connection = mysqli_connect('localhost','root');

mysqli_select_db($connection,"homeservice");

if(isset($_POST['register']))
{
    $user_exist_query="SELECT * FROM servicelogin WHERE serviceid='$_POST[serviceid]' OR email='$_POST[email]'";
    $result=mysqli_query($connection,$user_exist_query);

    if($result)
    {
        if(mysqli_num_rows($result)>0)
        {
            $result_fetch=mysqli_fetch_assoc($result);
            if($result_fetch['serviceid']==$_POST['serviceid'])
            {
                echo"
                <script>
                alert('$result_fetch[serviceid] - Serviceid already taken');
                window.location.href='servicelogin.html';
                </script>
                ";        
            }
            else
            {
                echo"
                <script>
                alert('$result_fetch[email] - email already registered');
                window.location.href='servicelogin.html';
                </script>
                ";        
            }
        }
        else
        {
            $serviceid = $_POST['serviceid'];
            $category = $_POST['category'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $query = "INSERT INTO servicelogin(serviceid, category, email, password) VALUES ('$serviceid','$category','$email','$password')";
            if(mysqli_query($connection,$query))
            {
                echo"
                <script>
                alert('Registration sucessfull');
                window.location.href='servicelogin.html';
                </script>
                ";
            }
            else
            {
                echo"
                <script>
                alert('can not run query');
                window.location.href='servicelogin.html';
                </script>
                ";        
            }
        }
    }
    else
    {
        echo"
        <script>
        alert('can not run query');
        window.location.href='servicelogin.html';
        </script>
        ";
    }
}


?>