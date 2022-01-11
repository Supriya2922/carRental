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

<body style="min-height:100vh">
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
                        <a class="nav-link" href="contact.php">Contact Us</a>
                    </li>
                    
                </ul>
                
            </div>
        </div>
    </nav>

    <div class="yt"   style="margin-bottom 20px;">
    <h2 class="text-center" style="font-weight:800;color:#00d9d9;"  >Upload liscence</h2>
    <div class="details"  style="margin-bottom 20px;">
        <form action="" method="POST" enctype="multipart/form-data">
           
                <h2 class="name">Name</h2>
                <input type="text" class="firstname" name="full_name">
               
           
            <h2 class="name">Phone Number</h2>
            <input type="tel" class="phone" name="phone">
            <h2 class="name">Aadaar Number</h2>
            <input type="text" class="email" name="aadar">
            <h2 class="name">License Number</h2>
            <input type="text" class="email" name="liscence">
            <label for="upload" style="margin-right: 500px;font-size: 18px;
    font-weight:700 ;margin-left:25px ;" >Upload License here</label>
            <input type="file" class="form-control-file" id="upload" name="profile" style="margin-left: 100px;margin-top:25px;">
            <button  type="submit" name="lsubmit" class="btn btn-outline-light" style="margin-left: 650px;">Submit</button>
                 
        </form>
    </div>
    </div>
    <div class="page" style="min-height:100%; background:black;">
    <br>
    <br>
</div>
<?php
    if(isset($_POST['lsubmit']))
    {
        $img_loc=$_FILES['profile']['tmp_name'];
        $img_name=$_FILES['profile']['name'];

        $fname=$_POST['full_name'];
        $pname=$_POST['phone'];
        $aname=$_POST['aadar'];
        $lname=$_POST['liscence'];

        $img_ext=pathinfo($img_name,PATHINFO_EXTENSION);
        $img_des="lisenceUpload/".$fname.".".$img_ext;
        $que="INSERT INTO `lisence`(`Full_Name`, `Phone_no`, `Aadaar_no`, `Lisence_no`, `File`) VALUES ('$fname','$pname','$aname','$lname','$img_des')";
        if( mysqli_query($con,$que))
        {
            move_uploaded_file($img_loc,$img_des);
            echo"<script>
            alert('Successful');
            window.location.href='makepayment.php';
            </script>";
        }
      else
        {
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