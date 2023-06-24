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
    <title>Privacy Policy - Geevic</title>
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
    color: #E3E6F3;
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
#priv-content li{
    list-style-type: square;
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
      color: #E3E6F3;
  }
  #priv-content a:hover{
      color: rgb(216, 16, 16);
      text-decoration: none;
  }
  #priv-content li{
      list-style-type: square;
  }
  #priv-body .ques{
      color: rgb(216, 16, 16);
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
    background-color: rgb(216, 16, 16);
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
          <h1 class="priv-h1">Privacy Policies & Cookies</h1>
        </div>
        <div class="container line"></div>
      </section>

      <!--CONTENT-->
      <section class="container" >
          <div id="priv-content" class="priv-list">
            <ul>
              <li ><a href="#q1">About our privacy and cookies page</a></li>
              <li><a href="#q2">The data we collect</a></li>
              <!-- <li><a href="#q3">Cookies, what they are and how we use them</a></li> -->
              <li><a href="#q4">How we collect your data</a></li>
              <li><a href="#q5">How we use your data</a></li>
              <li><a href="#q6">How we share your data and with whom</a></li>
              <li><a href="#q7">How to opt-out of our data collection</a></li>
            </ul>
          </div>
      </section>

      <!--BODY-->
      <section class="container">
        <div id="priv-body">
          <p class="ques" id="q1">1.) About our privacy and cookies page</p>
              <span class="priv-spans">
                This page is here to provide you with information on how we at Geevic, collect and use your personal
                data when using our website.
              </span>

              <p class="ques" id="q2">2.) The data we collect</p>
              <span class="priv-spans">
                We collect personal information like email address, Name, phone number, address, present location, banking details,
                 When you create an account with Geevic.com. Although you are able to browse most
                parts of our website without being registered, certain activities like placing  orders & adding items to cart,
                do require registration. <br> Note that all information and personal data we collect are provided by you and in no way
                gotten through any unorthodox means.
              </span>

              <!-- <p class="ques" id="q3">3.) Cookies, what they are and how we use them</p>
              <span class="priv-spans">
                By definition, cookies or HTTP cookies rather, are small blocks of data created by a web server 
                while a user is browsing  a website and placed on the user's computer or other devices by the user's web browser.
                These cookies help the browser remember certain given information about a particular user, which helps us
                provide you with an efficient & helpful browsing experience.
              </span> -->

              <p class="ques" id="q4">3.) How we collect your data</p>
              <span class="priv-spans">
                We may collect personal information from users in a variety of ways including: <br>
                <ul>
                  <li>When users visit our website</li>
                  <li>When users register on our website</li>
                  <li>When users place an order</li>
                  <li>When users fill out a form on our website</li>
                </ul>
                Again, these information are collected in order to improve our website efficiency & help you navigate properly.
              </span>

              <p class="ques" id="q5">4.) How we use your data</p>
              <span class="priv-spans">
                Geevic uses the information collected from you to: <br>
                <ul>
                  <li>Register you as a customer</li>
                  <li>Improve customer care and general services</li>
                  <li>Enhance user experience</li>
                  <li>Improve our site</li>
                  <li>Process payments and transactions made</li>
                  <li>Advertise products which may interest you</li>
                  <li>Abide by legal obligations</li>
                  <li>Detect fraud and suspicious practices</li>
                </ul>
              </span>

              <p class="ques" id="q6">5.) How we share your data and with whom</p>
              <span class="priv-spans">
                We most times need to share your personal information with third party agencies for: <br>
                <ul>
                  <li>Delivery purposes</li>
                  <li>Sales and marketing of products</li>
                  <li>Working with third party service providers</li>
                  <li>Detection of fraud and illegal practices</li>
                </ul>
                Keep in mind that we do not sell or trade customer personal information in any way, as that would compromise 
                the customer privacy policies which we try our best to abide by.
              </span>

              <p class="ques" id="q7">6.) How to opt-out of our data collection</p>
              <span class="priv-spans">
                We provide our users with the opportunity to opt-out of certain communication from us after registration.
                If you want to remove all your data from all Geevic.com lists and newsletters, you can unsubscribe by
                clicking the unsubscribe button located at the bottom of every email we send. <br>
                We hope that we have been able to educate you on our data and information collection and that you are
                comfortable with the way we handle your personal information. <br>
              </span> <br><br>
              <div class=" btshopb">Alright then, ready to keep shopping?</div> <br><br>
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