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
    <title>Contact - Geevic</title>
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
  .i-b {
    padding: 0 7px;
    cursor: pointer;
    transition: 0.3s ease;
    color: #bdbbb9;
}
</style>
<body class="body">
    <!--NAVIGATION-->
    <?php require "assets/includes/headers.php"; echo errorMessage(); echo successMessage(); ?>
    <?php
      $msg = "";
      if(isset($_GET['error']))
      {
        $msg = "Please fill in the blank spaces";
        echo '<div class="alert alert-danger">'.$msg.'</div>';
      }

      if (isset($_GET['success'])) 
      {
        $msg = "Thank you for your feedback";
        echo '<div class="alert alert-success">'.$msg.'</div>';
      }
      ?>

    <!--CONT-DETAILS-->
    <section id="contact-details" class="container">
       <div class="details">
        <span>GET IN TOUCH</span>
        <h2>Visit One Of Our Locations Or Contact Us Today</h2>
        <h3>Head Office</h3>
        <div>
           <li>
            <i class="fas fa-compass i-b"></i>
            <p>5th Avenue 52 Road House 22 festac Town Lagos</p>
          </li>
          <!--<h3>Branch Office</h3>
          <li>
            <i class="fas fa-compass"></i>
            <p>House 34 Zone B, Apo Resettlement quaters Abuja</p>
          </li> -->
          <li>
            <i class="fas fa-envelope i-b"></i>
            <p>Geevichfoods@gmail.com</p>
          </li>
          <li>
            <i class="fas fa-phone-alt i-b"></i>
            <p>08139998229, +1 317-689-9743, +447735344451</p>
          </li>
          <li>
            <i class="fas fa-clock i-b"></i>
            <p>Monday to Saturday : 09:00 am to 06:00 pm WAT</p>
          </li>
        </div>
       </div>
       <div class="map">
        <img id="map" src="assets/img/geevic main logo.png" alt="">
        <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3939.7794028178823!2d7.467260114160945!3d9.083850290630158!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x104e0b724075b90d%3A0x669b9c8d9085c17c!2sC.I.%20PINNACLE%20LIMITED%20(%20phones%26%20accessories)!5e0!3m2!1sen!2sng!4v1655155238099!5m2!1sen!2sng" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>-->
       </div>
    </section>
    
    <!--FORM-DETAILS-->
    <section id="form-details">
    <form class="contact-form" action="contactform.php" method="post">
    <span>LEAVE A MESSAGE</span>
        <h2>We Would Love To Hear From You</h2>
        <input type="text" name="uName" placeholder="Your Name">
        <input type="text" name="email" placeholder="E-mail">
        <input type="text" name="subject" placeholder="Subject">
        <textarea name="msg" id="" cols="30" rows="10" placeholder="Your Message"></textarea>
        <button type="submit" name="btn-send">Send mail</button>
      </form>
      <div class="people">
        <div>
          <img src="assets/img/geevic main logo.png" alt="">
          <p><span>Geevic</span> C.E.O <br>Phone: 08139998229 <br>Email: Geevichfoods@gmail.com</p>
        </div>
        <!-- <div>
          <img src="assets/img/user/users.png" alt="">
          <p><span>Clinton Maduakor</span> Head Of Technicals <br>Phone: +234 810 093 6162 </p>
        </div> -->
      </div>
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