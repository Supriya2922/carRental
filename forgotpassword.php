<?php
    require("config.php");
    session_start(); 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
function sendMail($email,$reset_token)
{
    require ("PHPMailer/PHPMailer.php");
    require ("PHPMailer/SMTP.php");
    require ("PHPMailer/Exception.php");

    $mail = new PHPMailer(true); #Creating an object $mail of class PHPMailer;passing `true` enables exceptions
    try {
        //Server settings
                            
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'wanderingwheels23@gmail.com';                     //SMTP username
        $mail->Password   = 'hello123!!';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;      
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::`
    
        //Recipients
        $mail->setFrom('wanderingwheels23@gmail.com', 'Wandering Wheels');
        $mail->addAddress($email);     //Add a recipient
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Password Reset link from Wandering Wheels';
        $mail->Body    = "We got a request from you to reset your password!<br>
        Click the link below:<br>
         <a href='http://localhost/car/updatepassword.php?email=$email&reset_token=$reset_token'>Reset password</a>
         ";
       
    
        $mail->send();
        return true;
    } 
    catch (Exception $e) {
        return false;
    }
}








if(isset($_POST['resetlink']))
{
    $query="SELECT * FROM `registered_users` WHERE `email`='$_POST[email]'";
    $result=mysqli_query($con,$query);
    if($result)
    {
        if(mysqli_num_rows($result)==1)
        {
            $reset_token=bin2hex(random_bytes(16));
            date_default_timezone_set('Asia/kolkata');
            $date=date("Y-m-d");
            $query="UPDATE `registered_users` SET `resetToken`='$reset_token',`resetTokenExpire`='$date' WHERE `email`='$_POST[email]'";
            if(mysqli_query($con,$query) && sendMail($_POST['email'],$reset_token))
            {
                echo"
                    <script>
                    alert('Password reset link sent to mail.');
                    window.location.href='index.php';
                    </script>
                ";

            }
            else
            {
                echo"
            <script>
              alert('Server down!Try again later');
              window.location.href='index.php';
            </script>
          ";
            }
        }
        else{
            echo"
            <script>
              alert('Email not found');
              window.location.href='index.php';
            </script>
          ";
        }
    }
    else{
        echo"
  <script>
    alert('Cannot Run Query');
    window.location.href='index.php';
  </script>
";

    }
}
?>