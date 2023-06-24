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
    <title>Shop - Geevic</title>
    <link rel="icon" href="assets/img/geevic logo.jpg">

    <!--icons -->
    <!-- <link rel="stylesheet" href="../fontawsome/css/all.css">
    <link rel="stylesheet" href="../fontawsome/webfonts/"> -->

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
    
    <!--STYLE-->
<style>
  /*.product img{
      width: 100%;
      height: auto;
      box-sizing: border-box;
      object-fit: cover;
  }*/
  @media (max-width: 1024px){
    
    .shop-dropdown {
    background-color: #d4d3d3 !important;
    color: black;
    font-size: 15px;
  }
  .list-group-item {
    position: relative;
    display: block;
    padding: .5rem 1rem;
    color: #212529;
    background-color: rgb(22, 22, 22);
    border: 1px solid rgba(0,0,0,0.125);
}
.text-dark {
    color: #D8D8D8 !important;
}
}
.list-group-item {
    color: #D8D8D8;
    background-color: rgb(22, 22, 22);
}
.text-dark {
    color: #D8D8D8 !important;
}
  #featured > div.row.mx-auto.container > nav > ul > li.page-item.active > a{
    background-color: black;
    outline: none;
  }
  #featured > div.row.mx-auto.container > nav > ul > li:nth-child(n):hover>a{
    background-color: coral;
    color: white;
  }
  .pagination a {
    color: black; 
  }
  .search{
    width: 100px;
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

    <!--FEATURED-->
    <section id="featured-p" class="my-5 pb-5">
      <?php if(!isset($_GET['q'])){ ?>
        <div class="container text-center">
          <a href="shop"><h3>Get your Next Gadget Today</h3></a>
          <hr class="mx-auto" id="hr">
        </div>
      <?php } ?>
    <div class="container-fluid row my-2">
      <!-- Filter Column Starts -->
      <div class="col-md-6 mb-2">
       <div class="p-2">
       <h4 class="fw-bold">
              Geevic
            </h4>

            <form action="shop" method="get" class="d-flex search">
              <input type="text" name="q" class="form-control rounded-0" placeholder="Search">
              <button class="btn btn-outline-primary border-0">
                <i class="fa fa-search"></i>
              </button>
            </form>

            <ul class="list-group rounded-0 my-2">
              <li class="list-group-item active bg- bg-gradient" aria-current="true">Categories</li>
              <?php
                  $sql = "SELECT * FROM categories ORDER BY _id DESC";
                  $query = mysqli_query($connectDB,$sql);
                  while($row = mysqli_fetch_assoc($query)){
                    $cid = $row['cat_id']
              ?>
              <li class="list-group-item">
                <div class="dropdown shop-dropdown">
                    <a class="nav-link p-1 text-dark dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php echo ucwords($row['category_name']); ?>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                      <li><a class="dropdown-item text-dark" href="shop?q=<?php echo $row['cat_id']; ?>">View All</a></li>
                      <?php
                          $ssql = "SELECT * FROM sub_categories WHERE cat_id = '$cid' ORDER BY _id DESC";
                          $squery = mysqli_query($connectDB,$ssql);
                          while($row = mysqli_fetch_assoc($squery)){
                      ?>
                      <li><a class="dropdown-item text-dark" href="shop?q=<?php echo $row['sub_id']; ?>"><?php echo ucwords($row['sub_name']); ?></a></li>
                      <?php } ?>
                    </ul>
                </div>
              </li>
              <?php } ?>
            </ul>
       </div>
      </div>
      <!-- Filter column ends -->
      <div class="col-md-12 col-12 mb-2">
        <div class="row mx-auto container-fluid">
            <?php 
            if (isset($_GET['q'])) {
              $q = $_GET['q'];
              $sql = "SELECT * FROM tbl_products WHERE product_name LIKE '%$q%' OR price LIKE '%$q%'  ORDER BY _id DESC";
              $query = mysqli_query($connectDB,$sql);
              $name = ucwords($_GET['q']);
              if (mysqli_num_rows($query) < 1) {
                $sql = "SELECT * FROM categories WHERE cat_id = '$q' OR category_name LIKE '%$q%'  ORDER BY _id DESC";
                $query = mysqli_query($connectDB,$sql);
                if(mysqli_num_rows($query) > 0){
                  $return = mysqli_fetch_assoc($query);
                  $cid = $return['cat_id'];
                  $name = ucwords($return['category_name']);
                  $sql = "SELECT * FROM tbl_products WHERE cat_id = '$cid' ORDER BY _id DESC";
                  $query = mysqli_query($connectDB,$sql);
                }
                
                if (mysqli_num_rows($query) < 1) {
                  $sql = "SELECT * FROM sub_categories WHERE sub_id = '$q' OR sub_name LIKE '%$q%'  ORDER BY _id DESC";
                  $query = mysqli_query($connectDB,$sql);
                  if(mysqli_num_rows($query) > 0){
                    $return = mysqli_fetch_assoc($query);
                    $cid = $return['sub_id'];
                    $name = ucwords($return['sub_name']);
                    $sql = "SELECT * FROM tbl_products WHERE sub_id = '$cid' ORDER BY _id DESC";
                    $query = mysqli_query($connectDB,$sql);
                  }
                }

              }
            }else{
              $sql = "SELECT * FROM tbl_products ORDER BY _id DESC";
              $query = mysqli_query($connectDB,$sql);
            }
            if (isset($_GET['q'])) {
              echo "
              <div class=\"container text-center\">
              <h3>Showing all products in $name</h3>
                <hr class=\"mx-auto\" id=\"hr\">
              </div>";
            }
              while($row = mysqli_fetch_assoc($query)){
            ?>
            <div onclick="window.location.href='sproduct?q=<?php echo $row['product_id']; ?>';" class="product text-center col-lg-3 col-md-6 col-12">
              <img class="img-fluid mb-3" src="assets/img/products/<?php echo getName($connectDB,"product_image","product_image","product_id",$row['product_id']); ?>" alt="">
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
                      <h4 class="p-price" style="color: green;">$<?php echo number_format($row['price'],2,'.',',') ?></h4>
                      <!-- <a href="checkout?q=<?php echo $row['product_id'] ?>">
                          <button class="buy-btn"> Buy Now </button> 
                      </a> -->
                        <a href="assets/config/order_process?addCart=<?php echo $row['product_id'] ?>">
                          <button class="buy-btn"> Add to Cart </button> 
                        </a>
                    </div>
                    <?php } ?>
    
        </div>
      </div>
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