<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Password Update</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            *{
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                text-decoration: none;
                font-family: poppins;
                }
            form{
                position:absolute;
                top:50%;
                left:50%;
                transform:translate(-50%,50%);
                background-color: #f0f0f0;
                width: 350px;
                border-radius: 5px;
                padding: 20px 25px 30px 25px;
            }
            form h3{
                margin-bottom:15px;
                color:#30475e;
            }
            form input{
                width: 100%;
                margin-bottom: 20px;
                background-color: transparent;
                border: none;
                border-bottom: 2px solid #30475e;
                border-radius: 0;
                padding: 5px 0;
                font-weight: 550;
                font-size: 14px;
                outline: none;
            }
            form button{
                font-weight: 550;
                font-style: 15px;
                color: white;
                background-color: #09bfc9c4;
                padding: 4px 10px;
                border: none;
                outline: none;
                
            }
        </style>
    </head>
    <body>
        <?php
        require("config.php");
        if(isset($_GET['email']) && isset($_GET['reset_token']))
        {
            date_default_timezone_set('Asia/kolkata');
            $date=date("Y-m-d");
            $query="SELECT * FROM `registered_users` WHERE `email`='$_GET[email]' AND `resetToken`='$_GET[reset_token]' AND `resetTokenExpire`='$date'";
            $result=mysqli_query($con,$query);
            if($result)
            {
                if(mysqli_num_rows($result)==1)
                {
                    echo"
                    <form method='POST'>
                        <h3>Create New Password</h3>
                        <input type='password' placeholder='New Password' name='Password'>
                        <button type='submit' name='updatepassword'>UPDATE</button>
                        <input type='hidden' name='email' value='$_GET[email]'>
                    </form>
                    ";
                }
                else{
                    echo"
                    <script>
                      alert('Invalid or Expired Link');
                      window.location.href='index.php';
                    </script>
                  ";

                }
            }
            else{
                echo"
                <script>
                  alert('ERROR!Cannnot run query');
                  window.location.href='index.php';
                </script>
              ";
            }
        
        }
        
       



        ?>
         <?php

         if(isset($_POST['updatepassword']))
         {
             $pass=password_hash($_POST['Password'],PASSWORD_BCRYPT);
             $update="UPDATE `registered_users` SET `password`='$pass',`resetToken`=NULL,`resetTokenExpire`=NULL WHERE `email`='$_POST[email]'";
             if(mysqli_query($con,$update))
             {
                echo"
                <script>
                  alert('Password Updated Successfully!');
                  window.location.href='index.php';
                </script>
              ";

             }
             else{
                echo"
                <script>
                  alert('Server down!Try again later');
                  window.location.href='index.php';
                </script>
              ";
             }
         }
          ?>

        
        
        
    </body>
</html>