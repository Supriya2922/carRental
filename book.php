<?php
require("config.php");
?>
<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="Styling/book.css">
    <script src="https://kit.fontawesome.com/5a6b9e5fad.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Car Collections</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
                aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a class="navbar-brand" href="#">Wandering Wheels</a>
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Collection</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact Us</a>
                    </li>
                    
                </ul>
                
            </div>
        </div>
    </nav>
    <?php
    
    $query = "SELECT * FROM `car_list` WHERE  Serial_no = '$_GET[id]'";
    $result=mysqli_query($con,$query);
    if($result)
    { 
    while($row_fetch=mysqli_fetch_assoc($result))
    {
        ?>
        <div class="card" style="width:400;">
        <img class="rounded mx-auto d-block"  style=" background-color: white;" src="<?php echo $row_fetch['image'] ;?>" alt=""  class="rounded" width="400">
                <div class="card-body" style=" background-color: white;">
                    <h2 class="text-center" style=" background-color: white;"><?php echo $row_fetch['vehicle_name']?></h2>
                    <p class="text-center" style=" background-color: white;"><?php echo $row_fetch['brand_name']  ?> <br><i class="fa fa-car" style=" background-color: white;">> <?php echo $row_fetch['seat']?> Seats</i></p>
                    <h1 class="text-center" style="font-weight:700; background-color: white;">Proceed to rent <?php echo $row_fetch['vehicle_name']?> </h1>
                   
                </div>
        </div>
       
        <?php
    }
}

    ?>
    
    <div class="yt">
    <h2 class="text-center" style="font-weight:800;color:#00d9d9;"  >Enter your details Here.</h2>
    <div class="details">
        <form action="" method="POST">
            <div id="name">
                <h2 class="name">Name</h2>
                <input type="text" class="firstname" name="first_name"><br>
                <label for="" class="first">First name</label>
                <input type="text" class="lastname" name="last_name"><br>
                <label for="" class="last">Last name</label>
                
            </div>
            <h2 class="name">Email</h2>
            <input type="email" class="email" name="email">
            <h2 class="name">Car model</h2>
            <input type="text" class="cars" name="car_model">

            <h2 class="name">Phone Number</h2>
            <input type="tel" class="phone" name="phone">
            <h2 class="name">Gender</h2>
            <select name="gender" id="" class="option">
                <option disabled="disabled" selected="selected">--Choose Option--</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Others">Others</option>
            </select>
            <h2 class="name" >Pickup Date</h2>
            <input type="date" class="pickup" name="pickup">
            <h2 class="name">Return Date</h2>
            <input type="date" class="Return" name="Return">
            <h2 class="name">Location</h2>
            <input type="text" class="location" name="location">

            <button  type="submit" name="submit" class="btn btn-outline-light">Submit</button>

        </form>
    </div>
    </div>
    
   <?php
   if(isset($_POST['submit']))
   {
    $fname=$_POST['first_name'];
    $lname=$_POST['last_name'];
    $email=$_POST['email'];
    $car_mod=$_POST['car_model'];
    $pn=$_POST['phone'];
    $gender=$_POST['gender'];
    $pdate=$_POST['pickup'];
    $rdate=$_POST['Return'];
    $loc=$_POST['location'];
    $q="INSERT INTO `client_bookings`(`first_name`, `last_name`, `email`, `car_model`, `phone_no`, `gender`, `pickup`, `return`, `location`, `approval`) VALUES ('$fname','$lname','$email','$car_mod','$pn','$gender','$pdate','$rdate','$loc','0')";
    if( mysqli_query($con,$q))
      {
        
        echo"<script>
        alert('Successful');
        window.location.href='pay.php';
        </script>";
      }
      else{
        echo"<script>
        alert('Failed to upload');
        </script>";
      }
    
   }
   ?>

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
                    <a href="#" style="text-decoration: none;">
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

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
</body>
</html>