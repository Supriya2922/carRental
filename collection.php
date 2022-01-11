<?php
require("config.php");
?>
<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="collection.css">
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
                        <a class="nav-link" href="contact.php">Contact Us</a>
                    </li>
                    
                </ul>
                
            </div>
        </div>
    </nav>
    <div class="poster">
    <h2>We have more than thousand cars for you to choose</h2>
    <h1>FIND THE RIGHT CAR FOR YOU</h1>
    <br>
    
    </div>
    

   

   <div class="container mb-5 mt-5">
       <div class="row">
       <?php
        $query="SELECT * FROM `car_list`";
        $result=mysqli_query($con,$query);

        if($result)
              { 
              while($row_fetch=mysqli_fetch_assoc($result))
              {
                ?>
                    <div class="col-md-4">
                 <form action="book.php"  method="POST" >      
               <div class="card mt-3">
                   <div class="product-1 align-items-centre- p-2 text-center">
                       <img src="<?php echo $row_fetch['image'] ;?> "   alt="" class="rounded" width="400">
                       
                       <h3><?php echo $row_fetch['vehicle_name']?></h3>
                       <div class="mt-3 info">
                           <span class="text1 d-block"> <?php echo $row_fetch['brand_name']?></span>
                           <span class="text1"><i class="fa fa-car"> <?php echo $row_fetch['seat']?> Seats</i></span>
                       </div>
                       <div class="cost mt-3 text-dark">
                           <span>Rs.<?php echo $row_fetch['price']?>/day</span>
                           <div class="star mt-3 align-items-center">
                               <i class="fa fa-star"></i>
                               <i class="fa fa-star"></i>
                               <i class="fa fa-star"></i>
                               <i class="fa fa-star"></i>
                               <i class="fa fa-star"></i>
                           </div>
                       </div>
                   </div>
                   <div class="p-3 car text-center text-white mt-3 cursor">
                
                   <a href="book.php?id=<?php echo $row_fetch['Serial_no']?>">
                   <button type="button" name="book" class="btn btn-outline-light">BOOK NOW</button>
                <input type="hidden" name="car_name" value="<?php echo $row_fetch['vehicle_name']?>">
                <input type="hidden" name="price" value="<?php echo $row_fetch['price']?>">
                <input type="hidden" name="id" value="<?php echo $row_fetch['Serial_no']?>">
              </a>
                   </div>
               </div>
            
              </form>
           </div>
             
         <?php
              }
            }

         ?>

           



       </div>
   </div>

    
   <div class="page-wrapper"></div>





































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
