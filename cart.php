<?php
require "assets/config/db_con.php";
require "assets/includes/sessions.php";
cartAuth();
?>
<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shopping Cart - Easy Link</title>
  <link rel="icon" href="assets/img/logo/easylink logo back.jpg">

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
  @media (max-width:799px) {
    .pricing-input-class {
      width: 50px;
    }

    .fa-times {
      padding-bottom: 70px;
    }
  }

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
  <section id="cart-home" class="container my-5">
    <h2 class="font-weight-bold pt-5">Shopping Cart</h2>
    <hr id="hr">
  </section>
  <section class="h-100 h-custom" style="background-color: #d2c9ff;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12">
          <div class="card card-registration card-registration-2" style="border-radius: 15px;">
            <div class="card-body p-0">
              <div class="row g-0">
                <!-- Products -->
                <div class="col-lg-8">
                  <div class="p-5">

                    <?php
                    $sql = "SELECT * FROM tbl_cart WHERE order_status = '0' AND user = '" . $_SESSION['id'] . "'ORDER BY _id DESC";
                    $query = mysqli_query($connectDB, $sql);
                    if (mysqli_num_rows($query) < 1) {
                      echo "<div class=\"card mx-auto fw-bold text-center p-5 fs-1\" style=\"max-width: 300px;\">No Item In Cart</div>";
                    }
                    while ($row = mysqli_fetch_assoc($query)) {
                    ?>
                      <div class="row mb-4 d-flex justify-content-between align-items-center">
                        <div class="col-md-2 col-lg-2 col-xl-2">
                          <img src="assets/img/products/<?php echo getName($connectDB, "product_image", "product_image", "product_id", $row['product_id']); ?>" class="img-fluid rounded-3" alt="<?php echo ucwords(getName($connectDB, "product_name", "tbl_products", "product_id", $row['product_id'])); ?>">
                        </div>
                        <div class="col-md-3 col-lg-3 col-xl-3">
                          <h6 class="text-muted">
                            <?php
                            $subId = getName($connectDB, "sub_id", "tbl_products", "product_id", $row['product_id']);
                            echo substr(ucwords(getName($connectDB, "sub_name", "sub_categories", "sub_id", $subId)), 0, 20);
                            ?>
                          </h6>
                          <h6 style="color:rgb(22, 22, 22);" class="text-black mb-0"><?php echo substr(ucwords(getName($connectDB, "product_name", "tbl_products", "product_id", $row['product_id'])), 0, 30) . '...'; ?></h6>
                        </div>
                        <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                          <button class="btn btn-transparent px-2 h-100 position-relative" style="z-index: 9;" onclick="addQty('#qty<?php echo $row['_id']; ?>','<?php echo $row['_id']; ?>','#subTotal<?php echo $row['_id']; ?>')">
                            <i class="fas fa-plus"></i>
                          </button>
                          <button class="btn btn-transparent px-2 h-100" onclick="subQty('#qty<?php echo $row['_id']; ?>','<?php echo $row['_id']; ?>','#subTotal<?php echo $row['_id']; ?>')">
                            <i class="fas fa-minus"></i>
                          </button>

                          <input min="0" id="qty<?php echo $row['_id']; ?>" name="quantity" value="<?php echo $row['quantity'] ?>" type="text" class="form-control form-control-sm h-100 pricing-input-class" readonly />


                        </div>
                        <div class="col-md-3 col-lg-2 col-xl-2 position-relativ" id="subTotal<?php echo $row['_id']; ?>">
                          <h6 style="color:rgb(22, 22, 22);" class="mb-0">₦ <?php echo number_format($row['total'], 2, '.', ','); ?> </h6>
                        </div>
                        <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                          <a href="assets/config/order_process?removeCart=<?php echo $row['_id']; ?>" class="text-muted"><i style="padding-left: 40px;" class="fas fa-times"></i></a>
                        </div>
                      </div>

                    <?php } ?>

                    <hr class="my-4">


                    <div class="pt-5">
                      <h6 class="mb-0"><a href="shop" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>
                    </div>
                  </div>
                </div>

                <!-- Summary -->
                <div class="col-lg-4 bg-grey">
                  <div class="p-5">
                    <h3 style="color:rgb(22, 22, 22);" class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                    <hr class="my-4">

                    <div class="d-flex justify-content-between mb-4">
                      <h5 style="color:rgb(22, 22, 22);" class="text-uppercase">items <span>
                          <?php
                          if (mysqli_num_rows($query) < 1) {
                            echo "0";
                          } else {
                            $nsql = "SELECT * FROM tbl_cart WHERE user = '" . $_SESSION['id'] . "' AND order_status = '0'";
                            $nquery = mysqli_query($connectDB, $nsql);
                            echo mysqli_num_rows($nquery);
                          }
                          ?>
                        </span></h5>
                    </div>

                    <h5 style="color:rgb(22, 22, 22);" class="text-uppercase mb-3">Apply promo code</h5>

                    <div class="mb-5">
                      <div class="form-outline">
                        <form action="assets/config/order_process" method="post">
                          <input type="text" id="form3Examplea2" name="promocode" class="form-control w-100 form-control-lg" />
                          <label style="color:rgb(22, 22, 22);" class="form-label" for="form3Examplea2">Enter your code</label>
                      </div>
                    </div>

                    <hr class="my-4">

                    <div class="d-flex justify-content-between mb-5">
                      <h5 style="color:rgb(22, 22, 22);" class="text-uppercase">Total price</h5>
                      <?php
                      if (mysqli_num_rows($query) < 1) {
                        echo "<h5>₦ 0</h5>";
                      } else {
                        $nsql = "SELECT SUM(total) AS grand_total FROM tbl_cart WHERE user = '" . $_SESSION['id'] . "' AND order_status = '0'";
                        $nquery = mysqli_query($connectDB, $nsql);
                        $nrow = mysqli_fetch_assoc($nquery);
                      ?>
                        <h5 style="color:rgb(22, 22, 22);" id="grandTotal">₦ <?php echo number_format($nrow['grand_total'], 2, '.', ','); ?></h5>

                    </div>
                    <button type="button" class="btn btn-dark btn-block btn-lg" data-mdb-ripple-color="dark" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Check Out</button>
                  <?php } ?>

                  <!--Address Modal -->
                  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="staticBackdropLabel">Select Address</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <select name="address" class="form-select">
                            <?php
                            $sql = "SELECT * FROM user_address WHERE userid = '" . $_SESSION['id'] . "'";
                            $query = mysqli_query($connectDB, $sql);
                            if (mysqli_num_rows($query) < 1) {
                              echo "<option disabled selected>No Address Found, Please Add Address </option>";
                            }
                            while ($row = mysqli_fetch_assoc($query)) {
                            ?>
                              <option><?php echo substr(ucwords($row['user_address']), 0, 50) . "..."; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-success" data-bs-dismiss="modal"><a style="color: white;" href="profile">Add Address</a></button>
                          <button type="submit" name="checkout" class="btn btn-primary text-white">Place Order</button>
                        </div>
                      </div>
                    </div>
                  </div>

                  </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>





  <!--FOOTER-->
  <?php include_once "assets/includes/footer.php"; ?>

  <script src="assets/js/C.I PINNACLE.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
  <script>
    function addQty(input, id, sub) {
      let formatter = Intl.NumberFormat('en-US');
      const qty = document.querySelector(input)
      const subQty = document.querySelector(sub);
      const totalVal = document.querySelector("#grandTotal");
      let curr = qty.value
      curr = Number(curr) + 1;

      qty.value = curr;
      if (curr > 0) {

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            //  console.log(this.response);
            let obj = JSON.parse(this.response);
            // console.log(obj);
            subQty.innerText = `₦ ${formatter.format(obj.subTotal)}`;
            totalVal.innerText = `₦ ${formatter.format(obj.grandTotal)}`;

          }
        };
        xmlhttp.open("GET", "assets/config/order_process.php?addQty=" + id + "&qty=" + curr + "&u=<?php echo $_SESSION['id']; ?>", true);
        xmlhttp.send();

      }
    }

    function subQty(input, id, sub) {
      let formatter = Intl.NumberFormat('en-US');
      const qty = document.querySelector(input);
      const subQty = document.querySelector(sub);
      const total = document.querySelector("#grandTotal");
      let curr = qty.value
      curr = Number(curr) - 1;

      if (curr < 1) {
        curr = 1;
      } else {
        qty.value = curr
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            // console.log(this.response);
            let obj = JSON.parse(this.response);
            // console.log(obj);
            subQty.innerText = `₦ ${formatter.format(obj.subTotal)}`;
            total.innerText = `₦ ${formatter.format(obj.grandTotal)}`;
          }
        };
        xmlhttp.open("GET", "assets/config/order_process.php?subQty=" + id + "&qty=" + curr + "&u=<?php echo $_SESSION['id']; ?>", true);
        xmlhttp.send();
      }
    }



    // console.log(formatter.format(10000));
  </script>
</body>

</html>