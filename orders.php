<?php
require "assets/config/db_con.php";
require "assets/includes/sessions.php";
cartAuth();

function progress($row, $check)
{
  if ($row['order_status'] === $check) {
    echo "blue";
  } else {
    echo "green";
  }
}

function progressIcon($row, $check)
{
  if ($row['order_status'] === $check) {
    echo "text-white";
  }
}
?>
<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Orders - Geevic</title>
  <link rel="icon" href="assets/img/geevic logo.jpg">

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
  <link rel="stylesheet" href="assets/css/custom-style.css">
</head>
<style>
  .search {
    width: 100px;
    padding-left: 20px;
    padding-top: 30px;
  }

  .btn-outline-primary {
    background-color: #1d1d1d;
    color: aliceblue;
    border-radius: 0px;
    height: 38px;
  }

  .btn-outline-primary:hover {
    background-color: #575555;
  }

  .fa-search {
    color: aliceblue;

  }
</style>

<body class="body">
  <!--Navigation-->
  <?php require "assets/includes/headers.php";
  echo errorMessage();
  echo successMessage(); ?>

  <!--SEARCH-->
  <form action="shop" method="get" class="d-flex search">
    <input type="text" name="q" class="form-control rounded-0" placeholder="Search">
    <button class="btn btn-outline-primary border-0">
      <i class="fa fa-search"></i>
    </button>
  </form>
  <!--Cart home-->
  <section id="cart-home" class="container my-1">
    <h2 class="font-weight-bold pt-5">Orders</h2>
    <hr id="hr">
  </section>

  <!-- Orders -->
  <section class="h-100 gradient-custom">

    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <!-- Single Item Starts -->
        <?php
        $sql = "SELECT * FROM tbl_orders WHERE user_id = '" . $_SESSION['id'] . "' AND order_status <> 'pending' ORDER BY _id DESC";
        $query = mysqli_query($connectDB, $sql);
        
        if (mysqli_num_rows($query) < 1) {
          echo "<div class=\"card mx-auto fw-bold text-center p-5 fs-1\" style=\"max-width: 300px;\">No New Orders</div>";
        }
        while ($row = mysqli_fetch_assoc($query)) {
          $cql = "SELECT * FROM order_items WHERE order_id = '" . $row['order_id'] . "'";
          $cquery = mysqli_query($connectDB, $cql);
          $crow = mysqli_fetch_assoc($cquery); //put the while loop here if the need arises

         
        ?>
          <div class="col-lg-10 col-xl-8 mb-2">
            <div class="card" style="border-radius: 10px;">
              <div class="card-body p-4">
                <div class="card shadow-0 border mb-4">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-2">
                        <a href="sproduct?q=<?php echo $crow['product_id']; ?>" class="text-muted mb-0">
                          <img src="assets/img/products/<?php echo getName($connectDB, "product_image", "product_image", "product_id", $crow['product_id']); ?>" class="img-fluid" alt="Phone">
                        </a>
                      </div>
                      <div class="col-md-4 text-center d-flex justify-content-center align-items-center">
                        <a href="" class="text-muted mb-0">Order Id: <span class="fw-bold">
                            <?php echo $row['order_id']; ?>
                          </span></a>
                      </div>
                      <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                        <p class="text-muted mb-0 small">Qty: <span class="fw-bold">
                            <?php echo $crow['quantity']; ?>
                          </span></p>
                      </div>
                      <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                        <p class="text-muted mb-0 small text-nowrap">
                          $<?php echo number_format($crow['price'], 2, '.', ','); ?>
                        </p>
                      </div>
                      <div class="col-md-2 pt-4">
                        <!-- Button trigger modal -->
                        <?php if ($row['order_status'] == 'cancelled') {
                          echo "<h4 class=\"text-muted text-center\">Canceled</h4>";
                        } else { ?>
                          <button type="button" class="btn btn-light btn-sm rounded-pill" data-bs-toggle="modal" data-bs-target="#payreciept<?php echo $row['_id']; ?>">
                            <i class="fa fa-eye"></i>
                          </button>
                        <?php } ?>
                        <!-- Modal -->
                        <div class="modal fade" id="payreciept<?php echo $row['_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header border-bottom-0">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body text-start text-black p-4 lh-lg">
                                <h5 class="modal-title text-uppercase mb-5" id="exampleModalLabel"><?php echo ucwords(getName($connectDB, "full_name", "users", "_id", $_SESSION['id'])); ?></h5>
                                <h4 class="mb-5" style="color: #35558a;">Thanks for shopping with us</h4>
                                <p class="mb-0" style="color: #35558a;">Payment summary</p>
                                <hr class="mt-2 mb-4" style="height: 0; background-color: transparent; opacity: .75; border-top: 2px dashed #9e9e9e;">

                                <div class="d-flex justify-content-between">
                                  <p class="fw-bold mb-0"><?php echo substr(ucwords(getName($connectDB, "product_name", "tbl_products", "product_id", $crow['product_id'])), 0, 25) . '...'; ?>(Qty: <?php echo $crow['quantity']; ?>)</p>
                                  <p class="text-muted mb-0">
                                    $ <?php echo number_format($crow['price'], 2, '.', ','); ?>
                                  </p>
                                </div>

                                <div class="d-flex justify-content-between">
                                  <p class="small mb-0">Date: </p>
                                  <p class="small mb-0"><?php echo date_format(date_create($row['date_created']), "D, d M. Y h:s a")  ?></p>
                                </div>
                                <div class="d-flex justify-content-between">
                                  <p class="small mb-0">Address: </p>
                                  <?php
                                  $asql = "SELECT * FROM user_address WHERE _id = '" . $row['user_address_id'] . "'";
                                  $aquery = mysqli_query($connectDB, $asql);
                                  $arow = mysqli_fetch_assoc($aquery);
                                  ?>
                                  <p class="small mb-0"><?php echo ucwords($arow['user_address']); ?></p>
                                </div>
                                <div class="d-flex justify-content-between">
                                  <p class="small mb-0">Shipping: </p>
                                  <p class="small mb-0"></p>
                                </div>
                                <div class="d-flex justify-content-between">
                                  <p class="small mb-0">Payment Method: </p>
                                  <p class="small mb-0">Pay On Delivery</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                  <p class="fw-bold">Total</p>
                                  <p class="fw-bold" style="color: #35558a;">₦ <?php echo number_format($crow['price'], 2, '.', ','); ?></p>
                                </div>
                                <div class="my-3">
                                  <!-- Timeline Starts -->
                                  <div class="progressbar-track">
                                    <ul class="progressbar">
                                      <li id="step-1" class="text-muted <?php progress($row, "placed"); ?>">
                                        <span class="fas fa-gift <?php progressIcon($row, "placed"); ?>"></span>
                                      </li>
                                      <li id="step-2" class="text-muted <?php progress($row, "processing"); ?>">
                                        <span class="fas fa-check <?php progressIcon($row, "processing"); ?>"></span>
                                      </li>
                                      <li id="step-4" class="text-muted <?php progress($row, "shipped"); ?>">
                                        <span class="fas fa-truck <?php progressIcon($row, "shipped"); ?>"></span>
                                      </li>
                                      <li id="step-5" class="text-muted <?php progress($row, "delivered"); ?>">
                                        <span class="fas fa-box-open <?php progressIcon($row, "delivered"); ?>"></span>
                                      </li>
                                    </ul>
                                    <div id="tracker"></div>
                                  </div>
                                  <!-- Timeline Ends -->
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
        <!-- Single Item ends -->
      </div>
  </section>

  <!--FOOTER-->
  

  <script src="assets/js/C.I PINNACLE.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>

</body>

</html>