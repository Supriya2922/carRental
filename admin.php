<?php
require("config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wandering Wheels | Admin Dashboard </title>
    <link rel="stylesheet" href="Styling/style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>
 <div class="sidebar">
     <div class="logo-details">
        <i class='bx bxs-user'></i>
        <span class="logo_name">Wandering Wheels </span>
     </div>
    <ul class="nav-links">
        <li>
            <a href="admin.php">
                <i class='bx bxs-dashboard'></i>
                <span class="link-name">Dashboard </span>
            </a>

        </li>
        <li>
            <a href="brands.php">
                <i class='bx bx-minus-back'></i>
                <span class="link-name">Brands </span>
            </a>

        </li>
        <li>
            <a href="vehicle.php">
                <i class='bx bxs-car'></i>
                <span class="link-name">Vehicles </span>
            </a>

        </li>
        <li>
            <a href="license.php">
                <i class='bx bxs-id-card'></i>
                <span class="link-name">License </span>
            </a>

        </li>
        <li>
            <a href="booking.php">
                <i class='bx bx-book-content'></i>
                <span class="link-name">Booking</span>
            </a>

        </li>
        <li>
            <a href="users.php">
                <i class='bx bxs-user-account'></i>
                <span class="link-name">Reg Users</span>
            </a>

        </li>
        <li>
            <a href="#">
                <i class='bx bxs-map'></i>
                <span class="link-name">GPS</span>
            </a>

        </li>
        

        <li>
            <a href="subscribers.php">
                <i class='bx bxs-add-to-queue'></i>
                <span class="link-name">Subscribers</span>
            </a>

        </li>
        <li>
            <a href="#">
                <i class='bx bx-log-out'></i>
                <span class="link-name">Logout</span>
            </a>

        </li>
    </ul> 
 </div>
 
 
  
<section class="home-section">
<nav>
    <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn '></i>
        <span class="dashboard">Dashboard</span>
    </div>
   <div class="search-box">
       <input type="text" placeholder="Search..">
       <i class='bx bx-search' ></i>
   </div>
    <div class="profile-details">
        <img src="profile.png" alt="">
        <span class="admin_name">Administator</span>
        <i class='bx bx-chevron-down' ></i>
    </div>
</nav>
<div class="home-content">
    <div class="overview-boxes">
        <div class="box">
            <div class="left-side">
                <div class="box_topic">Avaliable  Rental Cars</div>
                <div class="number">10/12</div>
                <div class="indicator">
                    <!-- <i class='bx bx-up-arrow-alt '></i> -->
                    <!-- <span class="text">Up from yesterday</span> -->
                </div>
            </div>
            <i class='bx bxs-car cart'></i>
        </div>
        <div class="box">
            <div class="left-side">
            <?php
              $query="SELECT * FROM `registered_users`";
              $result=mysqli_query($con,$query);
              
              if($result)
              { $reg=mysqli_num_rows($result);}
                ?>
                <div class="box_topic">Registered Customers</div>
                <div class="number"><?php echo $reg?></div>
                <div class="indicator">
                    <!-- <i class='bx bx-up-arrow-alt '></i> -->
                    <!-- <span class="text">Up from yesterday</span> -->
                </div>
            </div>
            <i class='bx bxs-group cart two'></i>
        </div>
        <div class="box">
            <div class="left-side">
                <div class="box_topic">Finalized Transactions</div>
                <div class="number">Rs.40660</div>
                <div class="indicator">
                    <!-- <i class='bx bx-up-arrow-alt '></i> -->
                    <!-- <span class="text">Up from yesterday</span> -->
                </div>
            </div>
            <i class='bx bxs-wallet cart three'></i>
        </div>
        <div class="box">
            <div class="left-side">
                <div class="box_topic">Completed Rentals</div>
                <div class="number">6</div>
                <div class="indicator">
                    <!-- <i class='bx bx-up-arrow-alt '></i> -->
                    <!-- <span class="text">Up from yesterday</span> -->
                </div>
            </div>
            <i class='bx bxs-select-multiple cart four'></i>
        </div>
    </div>
    <div class="sales-boxes">
            <div class="recent-sale box">
                <div class="title">Recent Transactions</div>
                <div class="sales-details">
                    <ul class="details">
                        <li class="topic">Date</li>
                        <li><a href="#">17-06-2021</a></li>
                        <li><a href="#">17-06-2021</a></li>
                        <li><a href="#">17-06-2021</a></li>
                        <li><a href="#">17-06-2021</a></li>
                        <li><a href="#">17-06-2021</a></li>
                        <li><a href="#">17-06-2021</a></li>
                        <li><a href="#">6-05-2021</a></li>
                    </ul>
                    <ul class="details">
                        <li class="topic">Customer</li>
                        <li><a href="#"><i class='bx bxs-user-circle col'></i>  Saanvi</a></li>
                        <li><a href="#"><i class='bx bxs-user-circle col'></i>  Aarav kaur</a></li>
                        <li><a href="#"><i class='bx bxs-user-circle col'></i>  Zara</a></li>
                        <li><a href="#"><i class='bx bxs-user-circle col'></i>  Shanya</a></li>
                        <li><a href="#"><i class='bx bxs-user-circle col'></i>  Darsh Singh</a></li>
                        <li><a href="#"><i class='bx bxs-user-circle col'></i>  Chandran Menon</a></li>
                        <li><a href="#"><i class='bx bxs-user-circle col'></i>  Advik Pandey</a></li>
                    </ul>
                    <ul class="details">
                        <li class="topic">Car</li>
                        <li><a href="#"><i class='bx bxs-car col1'></i>  Audi Q7</a></li>
                        <li><a href="#"><i class='bx bxs-car col1'></i>  Hyundai Creta</a></li>
                        <li><a href="#"><i class='bx bxs-car col1'></i>  Toyota Prius</a></li>
                        <li><a href="#"><i class='bx bxs-car col1'></i>  Toyota Prius</a></li>
                        <li><a href="#"><i class='bx bxs-car col1'></i>  Hyundai Kona</a></li>
                        <li><a href="#"><i class='bx bxs-car col1'></i>  MG Hector</a></li>
                        <li><a href="#"><i class='bx bxs-car col1'></i>  Hyundai Creta</a></li>
                    </ul>
                    <ul class="details">
                        <li class="topic">Rent</li>
                        <li><a href="#">07-06-2021</a></li>
                        <li><a href="#">04-06-2021</a></li>
                        <li><a href="#">01-06-2021</a></li>
                        <li><a href="#">01-06-2021</a></li>
                        <li><a href="#">20-06-2021</a></li>
                        <li><a href="#">04-06-2021</a></li>
                        <li><a href="#">13-05-2021</a></li>
                    </ul>
                    <ul class="details">
                        <li class="topic">Return</li>
                        <li><a href="#">09-06-2021</a></li>
                        <li><a href="#">05-06-2021</a></li>
                        <li><a href="#">02-06-2021</a></li>
                        <li><a href="#">03-06-2021</a></li>
                        <li><a href="#">03-06-2021</a></li>
                        <li><a href="#">03-06-2021</a></li>
                        <li><a href="#">15-05-2021</a></li>
                    </ul>
                    <ul class="details">
                        <li class="topic">Total</li>
                        <li><a href="#">Rs.12,560</a></li>
                        <li><a href="#">Rs.2,000</a></li>
                        <li><a href="#">Rs.2,900</a></li>
                        <li><a href="#">Rs.2,900</a></li>
                        <li><a href="#">Rs.4,100</a></li>
                        <li><a href="#">Rs.13,450</a></li>
                        <li><a href="#">Rs.4,000</a></li>
                    </ul>
                    <ul class="details">
                       <ul class= "bxs-ul">
                        <li class="topic">Status</li>
                        <li><a href="#"><span class="bxs-li"><i class='bx bxs-message-square-x tick'></i></span>Not Finished</a></li>
                        <li><a href="#"><span class="bxs-li"><i class='bx bxs-message-square-x tick'></i></span>Not Finished</a></li>
                        <li><a href="#"><span class="bxs-li"><i class='bx bxs-message-square-check tick two'></i></span> Finished</a></li>
                        <li><a href="#"><span class="bxs-li"><i class='bx bxs-message-square-check tick two'></i></span> Finished</a></li>
                        <li><a href="#"><span class="bxs-li"><i class='bx bxs-message-square-check tick two'></i></span> Finished</a></li>
                        <li><a href="#"><span class="bxs-li"><i class='bx bxs-message-square-check tick two'></i></span> Finished</a></li>
                        <li><a href="#"><span class="bxs-li"><i class='bx bxs-message-square-check tick two'></i></span> Finished</a></li>
                        
                        </ul>
                    </ul>
                    
                </div>
            </div>
        </div>
    </div>
</section>
 <script src="script.js"></script> 
</div>
</body>
</html>