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
<div class="container">
    <br>
    <div class="title">Registered Users</div> 
  <br>
  <table id="example" class="table table-striped table-bordered nowrap action" style="width:100%">
      <thead>
          <tr>
              <th>#</th>
              <th>Full Name</th>
              <th>Username</th>
              <th>Email</th>
              <th>Verification</th>
              
              <th>Reg Date</th>
              
          </tr>
      </thead>
      <tbody>
          
              <?php
              $query="SELECT * FROM `registered_users`";
              $result=mysqli_query($con,$query);
              $sn=0;
              if($result)
              { 
              while($row_fetch=mysqli_fetch_assoc($result))

              {$sn=$sn+1;

                  echo"
                <tr>
                <td>$sn</td>
                <td><i class='bx bxs-user-circle col'></i>$row_fetch[full_name]</td>
                <td>$row_fetch[username]</td>
                
                <td>$row_fetch[email]</td>
                <td>$row_fetch[is_verified]</td>
                <td>$row_fetch[Registered_date]</td>
                
                </tr>";

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
              <th>Full Name</th>
              <th>Username</th>
              <th>Email</th>
              <th>Verification</th>
              
              <th>Reg Date</th>
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