<?php
use PHPMailer\PHPMailer\PHPMailer;
   
    if(isset($_POST['submit']))
    {
        require ("PHPMailer/PHPMailer.php");
    require ("PHPMailer/SMTP.php");
    require ("PHPMailer/Exception.php");
        
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->Port       = 465;
        $mail->SMTPAuth   = true; 
        $mail->SMTPSecure ='ssl';
        $mail->Username   = 'wanderingwheels23@gmail.com';                     //SMTP username
        $mail->Password   = 'hello123!!'; 

        $mail->setFrom($_POST['email'],$_POST['name']);
        $mail->addAddress('wanderingwheels23@gmail.com');
        $mail->addReplyTo($_POST['email'],$_POST['name']);

        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Form Submission :'.$_POST['name'];
        $mail->Body    ='<h1 align=center>Name :'.$_POST['name'].'<br>Email: '.$_POST['email'].'<br>Message: '.$_POST['message'].'</h1>';

        if(!$mail->send())
        {
          
          echo"
          <script>
            alert('Something went wrong. Please try again later!');
            window.location.href='contact.php';
          </script>
        ";
        }
        else{
            echo"
          <script>
            alert('Thanks  for contacting us. We'll get back to you soon!');
            window.location.href='contact.php';
          </script>
        ";
            
        }

    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Form</title>
    <link rel="stylesheet" href="Styling/contact.css" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
</head>

<body>
   
    <div class="container">
        <span class="big-circle"></span>
        <img src="images/shape.png" class="square" alt="" />
        <div class="form">
            <div class="contact-info">
                <h3 class="title">Let's get in touch</h3>
                <br>
                <br>


                <div class="info">
                    <div class="information">
                        <img src="images/location.png" class="icon" alt="" />
                        <p>12 MG Road , Bangalore -560008</p>
                    </div>
                    <div class="information">
                        <img src="images/email.png" class="icon" alt="" />
                        <p>info@wheels.com</p>
                    </div>
                    <div class="information">
                        <img src="images/phone.png" class="icon" alt="" />
                        <p>123-456-789</p>
                    </div>
                </div>

                <div class="social-media">
                    <p>Connect with us :</p>
                    <div class="social-icons">
                        <a href="#">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="contact-form">
                <span class="circle one"></span>
                <span class="circle two"></span>

                <form action="" autocomplete="off" method="POST">
                    <h3 class="title">Contact us</h3>
                    <div class="input-container">
                        <input type="text" name="name" class="input" />
                        <label for="">Username</label>
                        <span>Username</span>
                    </div>
                    <div class="input-container">
                        <input type="email" name="email" class="input" />
                        <label for="">Email</label>
                        <span>Email</span>
                    </div>
                    <div class="input-container">
                        <input type="tel" name="phone" class="input" />
                        <label for="">Phone</label>
                        <span>Phone</span>
                    </div>
                    <div class="input-container textarea">
                        <textarea name="message" class="input"></textarea>
                        <label for="">Message</label>
                        <span>Message</span>
                    </div>
                    <input type="submit" name="submit" value="Send" class="btn" />
                </form>
            </div>
        </div>
    </div>

    <script>
        const inputs = document.querySelectorAll(".input");

        function focusFunc() {
            let parent = this.parentNode;
            parent.classList.add("focus");
        }

        function blurFunc() {
            let parent = this.parentNode;
            if (this.value == "") {
                parent.classList.remove("focus");
            }
        }

        inputs.forEach((input) => {
            input.addEventListener("focus", focusFunc);
            input.addEventListener("blur", blurFunc);
        });
    </script>
</body>

</html>