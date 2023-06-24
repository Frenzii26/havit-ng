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
    <title>Disclaimer - Geevic</title>
    <link rel="icon" href="assets/img/geevic logo.jpg">

    <!--icons -->
    <link rel="stylesheet" href="../fontawsome/css/all.css">
    <link rel="stylesheet" href="../fontawsome/webfonts/">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

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
  span{
    color: black;
    font-size: 15px;
  }
  .privacy-h{
  
}
.priv-h1{
    padding-left: 10px !important;
}
.privacy-h h1{
    
}
.priv-div{
    
}
#priv-content{
    justify-content: space-between;
    margin: 30px;
    padding: 80px;
    border: 1px solid #e1e1e1;
}
#priv-content a{
    color: black;
}
#priv-content a:hover{
    color: coral;
    text-decoration: none;
}
#priv-content li{
    list-style-type: square;
}
#priv-body .ques{
    color: coral;
}
.privacy-h{
    
  }
  .priv-h1{
      padding-left: 270px;
  }
  .privacy-h h1{
      
  }
  .priv-div{
      
  }
  #priv-content{
      justify-content: space-between;
      margin: 30px;
      padding: 80px;
      border: 1px solid #e1e1e1;
  }
  #priv-content a{
      color: black;
  }
  #priv-content a:hover{
      color: coral;
      text-decoration: none;
  }
  #priv-content li{
      list-style-type: square;
  }
  #priv-body .ques{
      color: coral;
  }
  .ques{
    padding-top: 14px;
    font-size: 18px;
  }
  .line{
    position: relative;
    width: 100%;
    height: 2px;
    margin: 36px 0;
    background-color: rgb(18, 177, 26);
    
}
@media (max-width:950px) {
  #priv-content{
        width: 100% !important;
        justify-content: space-between;
        margin: 0px !important;
        padding: 20px !important;
        border: 1px solid #e1e1e1;
    }
}
</style>
<body class="body">
      <!--NAVIGATION-->
      <?php require "assets/includes/headers.php"; echo errorMessage(); echo successMessage(); ?>

      <!--HEAD-->
      <section id="privacy-h" class="container pt-3">
        <div class="priv-div">
          <h1 class="priv-h1">Disclaimer</h1>
        </div>
        <div class="container line"></div>
      </section>

      <!--BODY-->
      <section class="container">
        <div id="priv-body">
              <span class="priv-spans">
              </span> <br><br>
              Alright then, ready to keep shopping? <br><br>
              <a href="shop"> <button style="color: white;"> Shop Now</button> </a>
        </div>
      </section>

      <!--FOOTER-->
      <?php include_once "assets/includes/footer.php"; ?>
      
<!-- JavaScript Libraries -->
<script src="assets/js/C.I PINNACLE.js"></script>        
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk"
crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" 
crossorigin="anonymous"></script>
</body>
</html>