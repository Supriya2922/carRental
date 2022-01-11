<?php
  session_start();
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
  <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.9/css/fixedHeader.bootstrap.min.css"
    rel='stylesheet'>
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css"
    rel='stylesheet'>

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
        <i class='bx bx-search'></i>
      </div>
      <div class="profile-details">
        <img src="profile.png" alt="">
        <span class="admin_name">Administator</span>
        <i class='bx bx-chevron-down'></i>
      </div>
    </nav>




    <div class="container">
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="row">
          <div class="col-25">
            <label for="fname">Vehicle Title</label>
          </div>
          <div class="col-75">
            <input type="text" id="fname" name="vehicle_name" placeholder="Enter vehicle name..">
          </div>
        </div>
        <div class="row">
          <div class="col-25">
            <label for="fname">Brand Name</label>
          </div>
          <div class="col-75">
            <input type="text" id="fname" name="brand_name" placeholder="Enter Brand name..">
          </div>
        </div>
        <div class="row">
          <div class="col-25">
            <label for="options">Category</label>
          </div>
          <div class="col-75">
            <select id="options" name="category">
              <option value="automatic">Automatic</option>
              <option value="best mileage">Best Mileage</option>
              <option value="Electric">Electric</option>
              <option value="Electric">None</option>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-25">
            <label for="lname">Model Year</label>
          </div>
          <div class="col-75">
            <input type="text" id="fname" name="year" placeholder="Enter model year..">
          </div>
        </div>
        <div class="row">
          <div class="col-25">
            <label for="options">Fuel type</label>
          </div>
          <div class="col-75">
            <select id="options" name="fuel">
              <option value="Petrol">Petrol</option>
              <option value="Diesel">Diesel</option>
            </select>
          </div>
        </div>

        <div class="row">
          <div class="col-25">
            <label for="lname">Price Per Day</label>
          </div>
          <div class="col-75">
            <input type="text" id="pwd" name="price" placeholder="Enter Price...">

          </div>
        </div>
        <div class="row">
          <div class="col-25">
            <label for="lname">Seating Capacity</label>
          </div>
          <div class="col-75">
            <input type="text" id="pwd" name="seat" placeholder="Enter total seating capacity..">

          </div>
        </div>
        <div class="row">
          <div class="col-25">
            <label for="lname">Upload Images</label>
          </div>
          <div class="col-75">
            <input type="file" name="profile" id="actual-btn" hidden />

          </div>
        </div>
        <div class="row">
          &emsp;&emsp;
          <button class="saveb" type="submit" name="save">Save</button>

        </div>
    </div>
    </form>
    </div>
<?php
    if(isset($_POST['save']))
    {
      $img_loc=$_FILES['profile']['tmp_name'];
      $img_name=$_FILES['profile']['name'];
      $vname=$_POST['vehicle_name'];
      $bname=$_POST['brand_name'];
      $cname=$_POST['category'];
      $yname=$_POST['year'];
      $fname=$_POST['fuel'];
      $pname=$_POST['price'];
      $sname=$_POST['seat'];
      $img_ext=pathinfo($img_name,PATHINFO_EXTENSION);
      $img_des="uploadimg/".$vname.".".$img_ext;
      
     
     
    
      $query="INSERT INTO `car_list`( `vehicle_name`, `brand_name`, `category`, `year`, `fuel`, `price`, `seat`, `image`) VALUES ('$vname','$bname','$cname','$yname','$fname','$pname','$sname',' $img_des')";
      if( mysqli_query($con,$query))
      {
        move_uploaded_file($img_loc,$img_des);
        echo"<script>
        alert('Successful');
        </script>";
      }
      else{
        echo"<script>
        alert('Failed to upload');
        </script>";
      }


    }
?>

</body>

</html>