<?php 

require('config.php');
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
function sendMail($email,$v_code)
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
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;      
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::`
    
        //Recipients
        $mail->setFrom('wanderingwheels23@gmail.com', 'Wandering Wheels');
        $mail->addAddress($email);     //Add a recipient
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Email Verification from Wandering Wheels';
        $mail->Body    = "Thanks for Registration!
         Click the link below to verify the email address 
         <a href='http://localhost/car/verify.php?email=$email&v_code=$v_code'>Verify</a>
         ";
       
    
        $mail->send();
        return true;
    } 
    catch (Exception $e) {
        return false;
    }
}

#for login
if(isset($_POST['login']))
{
  $query="SELECT * FROM `registered_users` WHERE `email`='$_POST[email_username]' OR `username`='$_POST[email_username]'";
  $result=mysqli_query($con,$query);
  
  if($result)
  {
    if(mysqli_num_rows($result)==1)
    {
      $result_fetch=mysqli_fetch_assoc($result);
      if(password_verify($_POST['password'],$result_fetch['password']))
      {
        $_SESSION['logged_in']=true;
        $_SESSION['username']=$result_fetch['username'];
        header("location: collection.php");
      }
      else
      {
        echo"
          <script>
            alert('Incorrect Password');
            window.location.href='index.php';
          </script>
        ";
      }
    }
    else
    {
      echo"
        <script>
          alert('Email or Username Not Registered');
          window.location.href='index.php';
        </script>
      ";
    }
  }
  else
  {
    echo"
      <script>
        alert('Cannot Run Query');
        window.location.href='index.php';
      </script>
    ";
  }
}


#for registration
if(isset($_POST['register']))
{
  date_default_timezone_set('Asia/kolkata');
  $date=date("Y-m-d");
  $user_exist_query="SELECT * FROM `registered_users` WHERE `username`='$_POST[username]' OR `email`='$_POST[email]' ";
  $result=mysqli_query($con,$user_exist_query);

  if($result)
  {
    if(mysqli_num_rows($result)>0) #it will be executed if username or email is already taken
    {
      $result_fetch=mysqli_fetch_assoc($result);
      if($result_fetch['username']==$_POST['username'])
      {
        #error for username already registered
        echo"
          <script>
            alert('$result_fetch[username] - Username already taken');
            window.location.href='index.php';
          </script>
        ";
      }
      else
      {
        #error for email already registered
        echo"
          <script>
            alert('$result_fetch[email] - E-mail already registered');
            window.location.href='index.php';
          </script>
        ";
      }
    }
    else #it will be executed if no one has taken username or email before
    {
      $password=password_hash($_POST['password'],PASSWORD_BCRYPT);
      $v_code=bin2hex(random_bytes(16));
      $query="INSERT INTO `registered_users`(`full_name`, `username`, `email`, `password`,`verification_code`, `is_verified`,`Registered_date`) VALUES ('$_POST[fullname]','$_POST[username]','$_POST[email]','$password','$v_code','0','$date')";
      if(mysqli_query($con,$query) && sendMail($_POST['email'],$v_code))
      {
        #if data inserted successfully
        echo"
          <script>
            alert('Registration Successful');
            window.location.href='index.php';
          </script>
        ";
      }
      else
      {
        #if data cannot be inserted
        echo"
          <script>
            alert('Server down');
            window.location.href='index.php';
          </script>
        ";        
      }
    }
  }
  else
  {
    echo"
      <script>
        alert('Cannot Run Query');
        window.location.href='index.php';
      </script>
    ";
  }
}

?>