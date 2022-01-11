<?php
require("config.php");
?>
<!DOCTYPE html>
<html>
      <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Wandering Wheels | Admin Dashboard </title>
        <link rel="stylesheet" href="Styling/style.css">
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel='stylesheet'>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap.min.css" rel='stylesheet'>
        <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.9/css/fixedHeader.bootstrap.min.css" rel='stylesheet'>
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel='stylesheet'>

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
            <a href="http://localhost/Admin/Admin_login/Admin_Panel/subscribers.php">
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

  <div class="container">
      <br>
      <div class="title">Manage Bookings</div> 
    <br>
    <table id="example" class="table table-striped table-bordered nowrap action" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Customer</th>
                <th>Vehicle</th>
                <th>From Date</th>
                <th>To Date</th>
                <th>Price</th>
                <th>Location</th>
                <th>Status</th>
                

                
            </tr>
        </thead>
        <tbody>
        <tbody>
          
          <?php
          $query="SELECT * FROM `client_bookings`";
          $result=mysqli_query($con,$query);
          $rent=4000;
          if($result)
          { 
            $ap="Not Approved";
          while($row_fetch=mysqli_fetch_assoc($result))
         
        

          { $rent=$rent+500;
              ?>

              
            <tr>
            <td><?php echo $row_fetch['ID']?></td>
            <td><i class='bx bxs-user-circle col'></i><?php echo $row_fetch['first_name']?></td>
            <td><i class='bx bxs-car col1'></i> <?php echo $row_fetch['car_model']?></td>
            <td><?php echo $row_fetch['pickup']?></td>
            <td><?php echo $row_fetch['return']?></td>
            <td><?php echo $rent;?></td>
            <td><?php echo $row_fetch['location']?></td>
            <td><?php echo $ap;?></td>
            
            
            
            
            </tr>
            <?php
          }
        }
        else{
            echo"
      <script>
        alert('error');
        
      </script>
    ";
        }
          ?>
         
            
        </tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th>Customer</th>
                <th>Vehicle</th>
                <th>From Date</th>
                <th>To Date</th>
                <th>Price</th>
                <th>Penality</th>
                <th>Status</th>
                
                
            </tr>
        </tfoot>
    </table>
  </div>
</section>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.9/js/dataTables.fixedHeader.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap.min.js"></script>
  <script src="script.js"></script> 
    <script>
          $(document).ready(function() {
             var table = $('#example').DataTable( {
             responsive: true,
             paging: false
    
              } );
 
           new $.fn.dataTable.FixedHeader( table );
            } );
    </script>
</body>
</html>
