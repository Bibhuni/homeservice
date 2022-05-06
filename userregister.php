<?php

$connection = mysqli_connect('localhost','root');

mysqli_select_db($connection,"homeservice");

if(isset($_POST['register']))
{
    $user_exist_query="SELECT * FROM userlogin WHERE userid='$_POST[userid]' OR email='$_POST[email]'";
    $result=mysqli_query($connection,$user_exist_query);

    if($result)
    {
        if(mysqli_num_rows($result)>0)
        {
            $result_fetch=mysqli_fetch_assoc($result);
            if($result_fetch['userid']==$_POST['userid'])
            {
                echo"
                <script>
                alert('$result_fetch[userid] - Userid already taken');
                window.location.href='login.html';
                </script>
                ";        
            }
            else
            {
                echo"
                <script>
                alert('$result_fetch[email] - email already registered');
                window.location.href='login.html';
                </script>
                ";        
            }
        }
        else
        {
            $userid = $_POST['userid'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $query = "INSERT INTO userlogin(userid, email, password) VALUES ('$userid','$email','$password')";
            if(mysqli_query($connection,$query))
            {
                echo"
                <script>
                alert('Registration sucessfull');
                window.location.href='login.html';

                </script>
                ";
            }
            else
            {
                echo"
                <script>
                alert('can not run query');
                window.location.href='login.html';
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
        window.location.href='login.html';
        </script>
        ";
    }
}


?>