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
    <title>About - Geevic</title>
    <link rel="icon" href="assets/img/geevic logo.jpg">

    <!--icons -->
    <link rel="stylesheet" href="../fontawsome/css/all.css">
    <link rel="stylesheet" href="../fontawsome/webfonts/">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap" rel="stylesheet">
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" 
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- owl carousel-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Customized Bootstrap Stylesheet -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Template Stylesheet -->
    <link rel="stylesheet" href="assets/css/C.I PINNACLE.css">
</head>

<style>
  body {
    margin: 0;
    font-family: "Heebo",sans-serif;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #d6d3d3;
    background-color: #F3F6F9;
    -webkit-text-size-adjust: 100%;
    -webkit-tap-highlight-color: rgba(0,0,0,0);
}
</style>

<body class="body">
    <!--NAVIGATION-->
    <?php require "assets/includes/headers.php"; echo errorMessage(); echo successMessage(); ?>

    <!--ABOUT-HEAD-->
    <section id="about-head" class="section-p1">
    <img src="assets/img/geevic main logo.png" alt="">
    <div>
      <h2>Who Are We?</h2>
      <p>
        Geevic Foods is an international food & food ingredients shop. We launched January 2022 and 
        our aim ever since has been to serve you with the best quality of products and services, and to someday become your go-to mall for food & food ingredients. <br>
        We offer quality products that ranges across spices, baked and fried foods, local Nigerian foods, grains and many more.
        Our range of services is designed to make sure you have the best shopping experience with us, regardless of you shopping
        online or offline, which is why we deliver our products to our customers first-hand, anywhere in the world. With services like speedy delivery, frequent promos and top-notch security systems, you are in the
        best shopping hands when you shop with us. <br>
        As we continue to expand our branches and upgrade our services, we hope that you stick with us and keep shopping with us for 
        as long as you can.

      </p>

        <br><br>
        <p class=" btshopb">Alright then, ready to keep shopping?</p> <br><br>
        <a href="shop"> <button style="color: white;"> Shop Now</button> </a>
    </div>
    
    </section>

    <!--FEATURES
    <section id="features" class="section-p1">
  <div class="fe-box">
    <img src="assets/img/feature/feature1.png" alt="">
    <div id="feature-speedy"><h6>Speedy Delivery</h6></div>
  </div>
  <div class="fe-box">
    <img src="assets/img/feature/feature2.png" alt="">
    <div id="feature-speedy"><h6>Order Online</h6></div>
  </div>
  <div class="fe-box">
    <img src="assets/img/feature/feature3.png" alt="">
    <div id="feature-speedy"><h6>Save Money</h6></div>
  </div>
  <div class="fe-box">
    <img src="assets/img/feature/feature4.png" alt="">
    <div id="feature-h6"><h6>Promotions</h6></div>
  </div>
  <div class="fe-box">
    <img src="assets/img/feature/feature6.png" alt="">
    <div id="feature-speedy"><h6>Best Quality</h6></div>
  </div>
  <div class="fe-box">
    <img src="assets/img/feature/feature5.png" alt="">
    <div id="feature-security"><h6>Security</h6></div>
  </div> -->
  
    </section>

    <!--FOOTER-->
    <?php include_once "assets/includes/footer.php"; ?>

<script src="assets/js/C.I PINNACLE.js"></script>    
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk"
crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" 
crossorigin="anonymous"></script>
</body>
</html>