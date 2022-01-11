<?php
require('config.php');
session_start();
?>


<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Wandering Wheels</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="Styling/styles.css">

    <script src="https://kit.fontawesome.com/5a6b9e5fad.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>

</head>

<body>
    <header>
        <div class="bar" style="background-color:black">
            <img style=" float:left;width:10%;" src="images/logo.PNG">
            <div class="wrapper">

                <a href="index.php">Home</a>
                <a href="collection.php">Collection</a>

                <a href="contact.php">Contact Us</a>
                <?php 
    
      if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)
      {
        echo"
        <a href=\"logout.php\">Logout</a>
        ";
      }
      else
      {
        echo"
          
          <button  class=\"button1\" type='button' onclick=\"popup('login-popup')\">LOGIN</button>
          <button  class=\"button1\" type='button' onclick=\"popup('register-popup')\">REGISTER</button>
         
        ";

      }
    
?>
          </div>

       
            
        </div>

    </header>
    <section>
        <div class="car">

            <div class="image" style="display:inline;"><img style="float: right;width: 1200px; margin-top: 60px;"
                    src="images/car.PNG" alt="">
            </div>
            <div class="typing">


                <h2>Eat.Sleep.<span>Drive</span>.Repeat</h2>
                <h3>Enjoy your holidays <br>With our Wheels! </h3>
                <div class="button"><a href="">Choose your package</a></div>
            </div>
            <div class="wave" id="wave1" style="--i:1"></div>
            <div class="wave" id="wave2" style="--i:2"></div>
            <div class="wave" id="wave3" style="--i:3"></div>
            <div class="wave" id="wave4" style="--i:4"></div>



        </div>
    </section>
    <div class="popup-container" id="login-popup">
        <div class="popup">
            <form method="POST" action="login_register.php">
                <h2>
                    <span>USER LOGIN</span>
                    <button type="reset" onclick="popup('login-popup')">X</button>
                </h2>
                <input type="text" placeholder="E-mail or Username" name="email_username">
                <input type="password" placeholder="Password" name="password">
                <button type="submit" class="login-btn" name="login">LOGIN</button>
            </form>
            <div class="forgot-btn">
                <button type="button" onclick="forgotPopup()">Forgot password?</button>

            </div>
        </div>
    </div>

    <div class="popup-container" id="register-popup">
        <div class="register popup">
            <form method="POST" action="login_register.php">
                <h2>
                    <span>USER REGISTER</span>
                    <button type="reset" onclick="popup('register-popup')">X</button>
                </h2>
                <input type="text" placeholder="Full Name" name="fullname">
                <input type="text" placeholder="Username" name="username">
                <input type="email" placeholder="E-mail" name="email">
                <input type="password" placeholder="Password" name="password">
                <button type="submit" class="register-btn" name="register">REGISTER</button>
            </form>
        </div>
    </div>
   
    <div class="popup-container" id="forgot-popup">
        <div class="forgot popup">
            <form method="POST" action="forgotpassword.php">
                <h2>
                    <span>RESET PASSWORD</span>
                    <button type="reset" onclick="popup('forgot-popup')">X</button>
                </h2>
                <input type="email" placeholder="E-mail " name="email">
                <button type="submit" class="reset-btn" name="resetlink">SEND LINK</button>
            </form>
            
        </div>
    </div>


    <section>
        <div class="new" style="background-color:white ;">
            <div class="sub">
                <h1>Why choose us?</h1>
            </div>
            <div class="final">

                <div class="container">
                    <div class="card">
                        <div class="imgBx" data-text="Fuel Cost Included">
                            <img src="images/fuel.png" alt="">
                        </div>
                        <div class="content">
                            <div>
                                <h3 style="margin-left: 0;color: #00d9d9;padding-left:30%;">Fuel Cost Included</h3><br>
                                <p style="padding-left: 60px;padding-top: 10px;">Don't worry about mileage! All fuel
                                    costs are included. If you refill fuel, we'll pay you
                                    back!
                                </p>
                            </div>


                        </div>
                    </div>
                    <div class="card">
                        <div class="imgBx" data-text="Flexible Pricing Packages">
                            <img src="images/handmoney1.png" alt="">
                        </div>
                        <div class="content">
                            <div>
                                <h3 style="margin-left: 0;color: #00d9d9;padding-left:20%;">Flexible Pricing Packages
                                </h3><br>

                                <p style="padding-left: 60px;padding-top: 10px;">One size never fits all! Choose a
                                    balance of time and kilometers that works best for you.
                                </p>
                            </div>


                        </div>
                    </div>
                    <div class="card">

                        <div class="imgBx" data-text="Go Anywhere!">
                            <img src="images/loc.png" alt="">
                        </div>
                        <div class="content">
                            <div>
                                <h3 style="margin-left: 0;color: #00d9d9;padding-left: 30%;">Go Anywhere!</h3><br>
                                <p style="padding-left: 60px;padding-top: 10px;">Our cars have all-India permits.Just
                                    remember to pay state tolls and entry taxes.</p>
                            </div>


                        </div>
                    </div>
                    <div class="card">
                        <div class="imgBx" data-text="Damage Insurance">
                            <img src="images/damage1.png" alt="">
                        </div>
                        <div class="content">
                            <div>
                                <h3 style="margin-left: 0;color: #00d9d9;padding-left: 30%;">Damage Insurance</h3><br>

                                <p style="padding-left: 60px;padding-top: 10px;">All your bookings include damage
                                    insurance! Drive safe, but don’t worry!</p>
                            </div>


                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <div class="counter-up" style="background-color: black; height: 300px;">
        <div class="content">
            <div class="box">
                <div class="icon"><i class="fas fa-smile-beam" aria-hidden="true"></i></div>
                <div class="counter">234</div>
                <div class="text">Happy Clients</div>
            </div>
            <div class="box">
                <div class="icon"><i class="fas fa-car" aria-hidden="true"></i></div>
                <div class="counter">105</div>
                <div class="text">Cars in Stock</div>
            </div>
            <div class="box">
                <div class="icon"><i class="far fa-building" aria-hidden="true"></i></div>
                <div class="counter">23</div>
                <div class="text">Office in Cities</div>
            </div>
            <div class="box">
                <div class="icon"><i class="fas fa-route" aria-hidden="true"></i></div>
                <div class="counter">48169</div>
                <div class="text">Km Travelled</div>
            </div>
        </div>


    </div>

    <div class="end" style="background-color: black; height:655px;">
        <div class="pic-container">
            <img src="images/carS.png" alt="" style="width:80%; padding-left: 150px;">

        </div>
    </div>
    <div class="footer">
        <div class="footer-content">

            <div class="footer-section about">
                <h1 class="logo"><span>Wander</span>ing Wheels</h1>
                <p>
                    Wandering Wheels is our new website for online car rental. From our new website, you can book online
                    your rental car in the best possible prices.
                    Choose the car type that you like and enjoy your holidays in India.
                </p>
                <div class="contact">
                    <span><i class="fas fa-phone"></i> &nbsp; 123-456-789</span>
                    <span><i class="fas fa-envelope"></i> &nbsp; info@wheels.com</span>

                </div>
                <div class="socials">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div class="footer-section links">
                <h2>Quick Links</h2>
                <br>
                <ul>
                    <a href="#" style="text-decoration: none;">
                        <li>Collection</li>
                    </a>
                    <a href="#" style="text-decoration: none;">
                        <li>FAQs</li>
                    </a>
                    <a href="#" style="text-decoration: none;">
                        <li>Privacy</li>
                    </a>
                    <a href="#" style="text-decoration: none;">
                        <li>Terms and Condition</li>
                    </a>
                    <a href="Adminlogin.php" style="text-decoration: none;">
                        <li>Admin login</li>
                    </a>
                </ul>
            </div>
            <div class="footer-section subscribe">
                <h2>Subscribe</h2>
                <br>
                <form action="index.html" method="post">

                    <input type="email" name="email" class="text-input" placeholder="Your email address...">
                    <br>
                    <button class="custom-btn btn-5"><span>Subscribe</span></button>
                </form>
            </div>
        </div>


        <div class="footer-bottom">
            &copy;wanderingwheels.com | Designed by Supriya
        </div>

    </div>






    <script>
        let wave1 = document.getElementById('wave1');
        let wave2 = document.getElementById('wave2');
        let wave3 = document.getElementById('wave3');
        let wave4 = document.getElementById('wave4');
        window.addEventListener('scroll', function () {
            let value = window.scrollY;

            wave1.style.backgroundPositionX = 400 + value * 4 + 'px';
            wave2.style.backgroundPositionX = 300 + value * -4 + 'px';
            wave3.style.backgroundPositionX = 200 + value * 2 + 'px';
            wave4.style.backgroundPositionX = 100 + value * -2 + 'px';
        })
        $(document).ready(function () {
            $(".counter").counterUp({
                delay: 10,
                time: 1200
            })

        });
        function popup(popup_name) {
            get_popup = document.getElementById(popup_name);
            if (get_popup.style.display == "flex") {
                get_popup.style.display = "none";
            }
            else {
                get_popup.style.display = "flex";
            }
        }
        function forgotPopup(){
            document.getElementById('login-popup').style.display="none";
            document.getElementById('forgot-popup').style.display="flex";
            
        }
    </script>
</body>

</html>