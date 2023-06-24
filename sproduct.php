<?php
  require "assets/config/db_con.php";
  require "assets/includes/sessions.php";
  if(!isset($_GET['q'])){
    header("Location: shop");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viewing Product - Geevic</title>
    <link rel="icon" href="assets/img/geevic logo.jpg">

    <!--icons -->
    <!-- <link rel="stylesheet" href="assets/lib/fontawsome/css/all.css">
    <link rel="stylesheet" href="assets/lib/fontawsome/webfonts/"> -->
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

    <!-- Start WOWSlider.com HEAD section -->
    <link rel="stylesheet" type="text/css" href="assets/lib/wowCarousel/engine1/style.css" />
    <script type="text/javascript" src="assets/lib/wowCarousel/engine1/jquery.js"></script>
<!-- End WOWSlider.com HEAD section -->

    <!-- Customized Bootstrap Stylesheet -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Template Stylesheet -->
    <link rel="stylesheet" href="assets/css/C.I PINNACLE.css">
    <link rel="stylesheet" href="assets/lib/lightbox/lightboxed.css">
    <script src="assets/lib/lightbox/jquery.js"></script>
    <script src="assets/lib/lightbox/lightboxed.js"></script>
    <style>
        .small-img-group{
            display: flex;
            justify-content: space-between;
        }
        .small-img-col{
            flex-basis: 24%;
            cursor: pointer;
        }
        #spanp{
            color: #575656;;
        }
        .sproduct input{
            width: 50px;
            height: 40px;
            padding-left: 10px;
            font-size: 16px;
            margin-right: 10px;
        }
        .sproduct input:focus{
            outline: none;
        }
        .buy-btn{
            background: rgb(177, 18, 18);
            opacity: 1;
            transition: 0.3s all;
        }
        .search{
           width: 100px;
           padding-left: 20px;
           padding-top: 30px;
       }
      .btn-outline-primary{
           background-color: #1d1d1d;
           color: aliceblue;
           border-radius: 0px;
       }
      .btn-outline-primary:hover{
          background-color: #575555;
      }
     .fa-search{
          color: aliceblue;
    
       }
    </style>

</head>
<body class="body">

      <!--NAVIGATION-->
      <?php require "assets/includes/headers.php"; echo errorMessage(); echo successMessage(); ?>

      <!--SEARCH-->
      <form action="shop" method="get" class="d-flex search">
              <input type="text" name="q" class="form-control rounded-0" placeholder="Search">
              <button class="btn btn-outline-primary border-0">
                <i class="fa fa-search"></i>
              </button>
            </form>

      <!--SPRODUCT-->
      <section class="container sproduct my-5 pt-5">
        <div class="row">
        <?php
                    $pid = $_GET['q'];
                    $sql = "SELECT * FROM tbl_products WHERE product_id = '$pid'";
                    $query = mysqli_query($connectDB,$sql);
                    $row = mysqli_fetch_assoc($query);
                    $catid = $row['cat_id'];
                    $subid = $row['sub_id'];
                ?>
            <div class="col-lg-5 col-md-12 col-12">
                <!-- Carousel Start -->
                  <!-- Start WOWSlider.com BODY section -->
                  <div id="wowslider-container1">
                  <div class="ws_images"><ul>
                  <?php 
                        $pid = $_GET['q'];
                        $sql = "SELECT * FROM product_image WHERE product_id = '$pid'";
                        $query = mysqli_query($connectDB,$sql);
                        if (mysqli_num_rows($query) < 1) {
                          echo "
                          <li>
                            <img src=\"assets/img/logo.png\" class=\"img-fluid\" alt=\"product\"  />
                        </li>
                          ";
                        }else{
                          while($irow = mysqli_fetch_assoc($query)){
                    ?>
                       <li>
                            <img src="assets/img/products/<?php 
                                    $img = $irow['product_image']; 
                                    echo "$img?".mt_rand();
                            ?>" class="lightboxed" alt="product" />
                        </li>
                      <?php }} ?>
                      <!--<li>
                        <img src="assets/lib/wowCarousel/data1/images/slide2.jpg" alt="jquery carousel slider" title="slide-2" id="wows1_1"/>
                      </li>
                      <li>
                        <img src="assets/lib/wowCarousel/data1/images/slide1.jpg" alt="slide-1" title="slide-1" id="wows1_2"/>
                      </li> -->
                    </ul></div>
                    <div class="ws_bullets"><div>
                      <a href="#" title="slide-3"><span>1</span></a>
                      <a href="#" title="slide-2"><span>2</span></a>
                      <a href="#" title="slide-1"><span>3</span></a>
                    </div></div>
                  <div class="ws_shadow"></div>
                  </div>	
                  <script type="text/javascript" src="assets/lib/wowCarousel/engine1/wowslider.js"></script>
                  <script type="text/javascript" src="assets/lib/wowCarousel/engine1/script.js"></script>
                <!-- Carousel Ends -->
            </div>

            <div class="col-lg-6 col-md-12 col-12">
                <h6>Home > 
                  <a href="shop?q=<?php echo $row['cat_id']; ?>"" class="nav-link d-inline p-1"> <?php echo getName($connectDB,"category_name","categories","cat_id",$row['cat_id']); ?></a> > 
                <a href="shop?q=<?php echo $row['sub_id']; ?>" class="nav-link d-inline p-1">
                    <?php echo getName($connectDB,"sub_name","sub_categories","sub_id",$row['sub_id']); ?>
                    </a></h6>
                <h3 class="py-4"><?php echo ucwords($row['product_name']); ?></h3>
                <h2 style="font-weight: 200;">$<?php echo number_format($row['price'],2,'.',',') ?></h2>
                <p><span id="spanp">Product code</span>: <?php echo $row['product_id'] ?></p>
                <form action="assets/config/order_process" method="post">
                  <input type="hidden" name="product" value="<?php echo $_GET['q'] ?>">
                  <input type="number" name="qty" min="1" value="1">
                  <button type="submit" name="addToCart" class="buy-btn">Add To Cart</button>
                </form>
                <h4 class="mt-5 mb-5">Product Details</h4>
                <article class="text-transform-0">
                    <?php echo $row['details'] ?>
                </article>
            </div>
        </div>
      </section>

      <!--Related-->
      <section id="Related-p" class="my-5 pb-5">
        <div class="container text-center mt-5 py-5">
          <h3>Related products</h3>
          <hr class="mx-auto" id="hr">
        </div>
        <div class="row mx-auto container-fluid">
        <?php 
              $sql = "SELECT * FROM tbl_products WHERE cat_id = '$catid' OR sub_id = '$subid' ORDER BY _id DESC LIMIT 0,50";
              $query = mysqli_query($connectDB,$sql);
              while($row = mysqli_fetch_assoc($query)){
        ?>
         <div class="product text-center col-lg-3 col-md-6 col-12">
                <img onclick="window.location.href='sproduct?q=<?php echo $row['product_id']; ?>';" class="img-fluid mb-3" src="assets/img/products/<?php echo getName($connectDB,"product_image","product_image","product_id",$row['product_id']); ?>" alt="">
<!--
                <div class="star">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                </div>
-->
                <h5 class="p-name"><?php echo substr(ucwords($row['product_name']),0,40).'...'; ?></h5>
                <h4 class="p-price">$<?php echo number_format($row['price'],2,'.',',') ?></h4>
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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk"
crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" 
crossorigin="anonymous"></script>
</body>
</html>