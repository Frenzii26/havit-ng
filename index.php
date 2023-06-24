<?php
require "assets/config/db_con.php";
require "assets/includes/sessions.php";

?>
<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home | Havit Nigeria</title>
  <link rel="icon" href="assets/img/geevic logo.jpg">

  <!--icons -->
  <link rel="stylesheet" href="../fontawsome/css/all.css">
  <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap" rel="stylesheet">

  <!-- Icon Font Stylesheet -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Libraries Stylesheet -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <!-- owl carousel-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Customized Bootstrap Stylesheet -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">

  <!-- Template Stylesheet -->
  <link rel="stylesheet" href="assets/css/C.I PINNACLE.css">
</head>
<style>
  .search {
    width: 100px;
  }

  .btn-outline-primary {
    background-color: #1d1d1d;
    color: aliceblue;
    border-radius: 0px;
  }

  .btn-outline-primary:hover {
    background-color: #575555;
  }

  .fa-search {
    color: aliceblue;

  }
</style>

<body class="body">

  <!--NAVIGATION-->
  <?php require "assets/includes/headers.php";
  echo errorMessage();
  echo successMessage(); ?>

  <!--HOME-->
  <section id="home" style="background-image: url(assets/img/home/gadgets.jpg);">
    <!--SEARCH-->
    <form action="shop" method="get" class="d-flex search">
      <input type="text" name="q" class="form-control  rounded-0" placeholder="Search">
      <button class="btn btn-outline-primary border-0">
        <i class="fa fa-search"></i>
      </button>
    </form>
    <!-- <h5 class="pt-3" style="color: grey;">NEW ARRIVALS</h5> -->
    <h1> <span>Let's get shopping!</span></h1>
    <!-- <p style="color:rgb(177, 18, 18);">Buy your healthy and delicious snacks and food ingredients here.</p> -->
    <a href="shop"><button>Shop Now</button></a>
  </section>
  <!-- <style>
        @media (min-width: 992.2px) {
          h2.h22{
            padding-left: 420px;
          }
        }
      </style> -->
  <!--Categories-->
  <section class="my-3 text-center container">
    <h3 class="h22">Shop by Category</h3>
  </section>
  <!--NEW-->
  <section id="new" class="w-100">
    <div class="row p-0 m-0">
      <?php
      $sql = "SELECT * FROM categories ORDER BY _id DESC";
      $query = mysqli_query($connectDB, $sql);
      while ($row = mysqli_fetch_assoc($query)) {
      ?>
        <div class="col-lg-4 col-md-6 col-12" id="catIndex">
          <div class="position-relative">
            <img class="img-fluid h-100" src="assets/img/category/<?php echo $row['category_image'] ?>" alt="">
            <div class="position-absolute w-100 text-center top-50 p-2" style="background-color: rgba(0,0,0,.3);">
              <h2 class="text-white"><?php echo ucwords($row['category_name']); ?></h2>
              <a href="shop?q=<?php echo $row['cat_id']; ?>"><button class="text-uppercase text-white">Shop Now</button></a>
            </div>
          </div>

        </div>
      <?php } ?>
    </div>
    <style>
      #catIndex img {
        height: 300px !important;
      }
    </style>
  </section>

  <!--FEATURED-->
  <section id="featured-p" class="my-5 pb-5">
    <div class="container text-center mt-5 py-5">
      <a href="shop">
        <h3>Explore some of our products</h3>
      </a>
    </div>
    <div class="row mx-auto container-fluid">
      <?php
      $sql = "SELECT * FROM tbl_products ORDER BY _id DESC LIMIT 0,50";
      $query = mysqli_query($connectDB, $sql);
      while ($row = mysqli_fetch_assoc($query)) {
      ?>
        <div class="product text-center col-lg-3 col-md-6 col-12">
          <img onclick="window.location.href='sproduct?q=<?php echo $row['product_id']; ?>';" class="img-fluid mb-3" src="assets/img/products/<?php echo getName($connectDB, "product_image", "product_image", "product_id", $row['product_id']); ?>" alt="">
          <!--
                <div class="star">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                </div>
-->
          <h5 class="p-name"><?php echo substr(ucwords($row['product_name']), 0, 40) . ''; ?></h5>
          <h4 class="p-price">$<?php echo number_format($row['price'], 2, '.', ',') ?></h4>
          <!-- <a href="checkout?q=<?php echo $row['product_id'] ?>">
                    <button class="buy-btn"> Buy Now </button> 
                </a> -->
          <a href="assets/config/order_process?addCart=<?php echo $row['product_id'] ?>">
            <button class="buy-btn"> Add to Cart </button>
          </a>
        </div>
      <?php } ?>
    </div>
  </section>

  <!--FOOTER-->
  <?php include_once "assets/includes/footer.php"; ?>

  <!-- JavaScript Libraries -->
  <script src="assets/js/C.I PINNACLE.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>

</html>