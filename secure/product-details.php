<?php
require "../assets/config/db_con.php";
require "../assets/includes/sessions.php";

auth();
if (!isset($_GET['q'])) {
    header('Location: ../assets/config/logout');
}

$curId = $_SESSION['id'];
$sql = "SELECT * FROM users WHERE _id = '$curId'";
$query = mysqli_query($connectDB, $sql);
$urow = mysqli_fetch_assoc($query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <title>Product-details</title>
    <link rel="icon" href="assets/img/geevic logo.jpg">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/C.I PINNACLE.css">

    <!-- Start WOWSlider.com HEAD section -->
    <link rel="stylesheet" type="text/css" href="../assets/lib/engine1/style.css" />
    <script type="text/javascript" src="../assets/lib/engine1/jquery.js"></script>
    <!-- End WOWSlider.com HEAD section -->
</head>
<style>
    body {
    margin: 0;
    font-family: "Heebo",sans-serif;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: white;
    background-color: #F3F6F9;
    -webkit-text-size-adjust: 100%;
    -webkit-tap-highlight-color: rgba(0,0,0,0);
}
.dropdown-item {
    display: block;
    width: 100%;
    padding: .25rem 1rem;
    clear: both;
    font-weight: 400;
    color: white;
    text-align: inherit;
    white-space: nowrap;
    background-color: transparent;
    border: 0;
}
.content .navbar .navbar-nav .nav-link {
    margin-left: 25px;
    padding: 12px 0;
    color: white;
    outline: none;
}
.dropdown-toggle:hover {
    background-color: rgb(22, 22, 22) !important;
    color: black;
    font-size: 15px;
}
    .content {
    background: rgb(22, 22, 22);
    transition: 0.5s;
}
h3 {
    font-size: 1.4rem;
    font-weight: 800;
    color: white;
}
h2 {
    font-size: 1.8rem;
    font-weight: 600;
    color: white;
}
h5 {
    color: rgb(22, 22, 22) !important;
}
@media (max-width:550px) {
    .dropdown-toggle {
    background-color: rgb(22, 22, 22) !important;
    color: white !important;
}
}
@media (max-width:1025px) {
    .dropdown-toggle {
    background-color: rgb(22, 22, 22) !important;
    color: white !important;
}
}
.dropdown-toggle {
    background-color: rgb(22, 22, 22) !important;
    color: white !important;
}
.btn{
    background-color: rgb(177, 18, 18) !important;
}
.btn:hover{
    background-color: rgb(22, 22, 22) !important;
}
</style>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0"></div>
    <!-- Spinner Start -->
    <!-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> -->
    <!-- Spinner End -->

    <!-- Sidebar Start -->
    <?php require_once "../assets/includes/sidebars.php";
    echo errorMessage();
    echo successMessage(); ?>

    <!-- Navbar End -->

    <!-- Recent Sales Start -->
    <div style="background-color: rgb(22, 22, 22); class="container-fluid pt-4 px-4">
        <div class="bg-light rounded p-4">
            <div class="d-block lh-lg d-md-flex justify-content-between">
                <h3 class="fw-bold">
                    Products
                </h3>
                <!-- Add Product Modal Start -->
                <div>
                    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Update Product
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">New Product</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="../assets/config/product_process" method="post" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <input type="hidden" name="pid" value="<?php echo $_GET['q'] ?>">
                                        <label style="color: rgb(22, 22, 22);">Product Name</label>
                                        <input style="color: rgb(22, 22, 22);" type="text" name="name" class="form-control w-100 mb-3 rounded-0">

                                        <label style="color: rgb(22, 22, 22);">Category Name</label>
                                        <select style="color: rgb(22, 22, 22);" name="cat" class="form-select mb-3" id="catSelect">
                                            <option selected disabled>__Category</option>
                                            <?php
                                            $sql = "SELECT * FROM categories ORDER BY category_name ASC";
                                            $query = mysqli_query($connectDB, $sql);
                                            while ($row = mysqli_fetch_assoc($query)) {
                                            ?>
                                                <option value="<?php echo $row['cat_id']; ?>">
                                                    <?php echo ucwords($row['category_name']); ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                         <label style="color: rgb(22, 22, 22);">Sub-Category</label>
                                    <select style="color: rgb(22, 22, 22);" name="sub" id="subSelect" class="form-select mb-3">
                                        <option selected disabled>__Sub Category</option>
                                    </select>

                                        <label style="color: rgb(22, 22, 22);">Product Price</label>
                                        <input style="color: rgb(22, 22, 22);" type="number" name="price" class="form-control w-100 mb-3 rounded-0">

                                        <label style="color: rgb(22, 22, 22);">Stock</label>
                                        <input style="color: rgb(22, 22, 22);" type="number" name="stock" class="form-control w-100 mb-3 rounded-0">

                                        <label style="color: rgb(22, 22, 22);">weight</label>
                                        <input style="color: rgb(22, 22, 22);" type="number" name="weight" class="form-control w-100 mb-3 rounded-0">

                                        <label style="color: rgb(22, 22, 22);">Details</label>
                                        <textarea style="color: rgb(22, 22, 22);" name="details" class="form-control w-100" style="height: 150px;"></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="updateProduct" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add to Products Modal End -->
                <!-- Add Products Image Modal Starts -->

                <div>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addImage">
                        Add Image
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="addImage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">New Product Image</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="../assets/config/product_process" method="post" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <input type="hidden" name="pid" value="<?php echo $_GET['q'] ?>">
                                        <label style="color: rgb(22, 22, 22);">Product Image</label>
                                        <input type="file" name="file" class="form-control w-100 mb-3 rounded-0">

                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="productImg" class="btn btn-primary">Add Image</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add Products Image Modal End -->

            </div>
        </div>
    </div>
    <section class="container sproduct my-5 pt-5">
        <div class="row">
            <div class="col-lg-5 col-md-12 col-12">
                <!-- Start WOWSlider.com BODY section -->
                <div id="wowslider-container1">
                    <div class="ws_images">
                        <?php
                        $pid = $_GET['q'];
                        $sql = "SELECT * FROM product_image WHERE product_id = '$pid'";
                        $query = mysqli_query($connectDB, $sql);
                        ?>
                        <ul>
                            <?php
                            if (mysqli_num_rows($query) < 1) {
                                echo "
                              <li>
                                <img src=\"../assets/img/logo.png\" class=\"img-fluid\" alt=\"product\"  />
                            </li>
                              ";
                            } else {
                                while ($irow = mysqli_fetch_assoc($query)) {
                            ?>
                                    <li>
                                        <img src="../assets/img/products/<?php
                                                                            $img = $irow['product_image'];
                                                                            echo "$img?" . mt_rand();
                                                                            ?>" alt="product" />
                                    </li>
                            <?php }
                            } ?>
                        </ul>
                    </div>
                    <div class="ws_bullets">
                        <div>
                            <?php
                            $sql = "SELECT * FROM product_image WHERE product_id = '$pid'";
                            $query = mysqli_query($connectDB, $sql);
                            while ($irow = mysqli_fetch_assoc($query)) {
                                echo "
                                    <a href=\"#\"> 
                                   
                                    </a>
                                    ";
                            }
                            ?>


                        </div>
                    </div>
                    <div class="ws_shadow"></div>
                </div>

                <!-- End WOWSlider.com BODY section -->
                <div class="dropdown">
                    <a class="btn btn-outline-danger dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        Delete Image
                    </a>

                    <div class="dropdown-menu w-100 p-2" aria-labelledby="dropdownMenuLink">
                        <li>
                            <div class="row">
                                <?php
                                $pid = $_GET['q'];
                                $sql = "SELECT * FROM product_image WHERE product_id = '$pid'";
                                $query = mysqli_query($connectDB, $sql);
                                while ($row = mysqli_fetch_assoc($query)) {
                                ?>
                                    <div class="col-4 mb-2">
                                        <img src="../assets/img/products/<?php echo $row['product_image']; ?>" height="70" width="70" class="img-fluid">
                                    </div>

                                    <div class="col-8 mb-2">
                                        <a href="../assets/config/product_process?delImg=<?php echo $row['_id']; ?>&imgName=<?php echo $row['product_image']; ?>&pid=<?php echo $_GET['q']; ?>" class="btn btn-danger float-end">
                                            <i class="fa fa-trash text-white"></i>
                                        </a>
                                    </div>
                                    <hr class="dropdown-divider">
                                <?php } ?>

                            </div>
                        </li>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12 col-12">
                <?php
                $pid = $_GET['q'];
                $sql = "SELECT * FROM tbl_products WHERE product_id = '$pid'";
                $query = mysqli_query($connectDB, $sql);
                $row = mysqli_fetch_assoc($query);
                ?>
                <h6>
                    <a href="dashboard" class="nav-link d-inline p-1">
                        Home
                    </a>
                    &gt;
                    <a href="" class="nav-link d-inline p-1">
                        <?php echo getName($connectDB, "category_name", "categories", "cat_id", $row['cat_id']); ?>
                    </a>
                    &gt;
                    <!-- <a href="" class="nav-link d-inline p-1">
                    
                    </a> -->
                </h6>
                <h3 class="py-4"><?php echo ucwords($row['product_name']); ?></h3>
                <h2 style="font-weight: 200;">$<?php echo number_format($row['price'], 2, '.', ',') ?></h2>
                <p><span class="fw-bold">Product code</span>: <?php echo $row['product_id'] ?></p>
                <p><span class="fw-bold">Current Stock</span>: <?php echo $row['stock'] ?></p>
                <h4 class="mt-5 mb-5">Product Details</h4>
                <article>
                    <?php echo $row['details'] ?>
                </article>
            </div>
        </div>
    </section>
    <!-- Recent Sales End -->
    <!-- product add end-->

    <!-- Footer Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded-top p-4">
            <div class="row">
                <div class="col-12 col-sm-6 text-center text-sm-start">
                    &copy; <a href="../index">Havit NG</a>, All Rights Reserved.
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    </div>
    <!-- Content End -->


    <!-- Back to Top -->
    <a href="#" style="background-color: rgb(177, 18, 18); color: white;" class="btn btn-lg btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
    <style>
        #catImg {
            height: 300px;
        }

        #catDiv .overlay {
            background-color: transparent;
            transition: background-color .45s ease-in-out;
        }

        #catDiv:hover #overlay {
            background-color: rgba(255, 0, 0, .3);
        }

        @media (max-width: 768px) {
            #catImg {
                height: 200px;
            }
        }
    </style>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/lib/chart/chart.min.js"></script>
    <script src="../assets/lib/easing/easing.min.js"></script>
    <script src="../assets/lib/waypoints/waypoints.min.js"></script>
    <script src="../assets/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../assets/lib/tempusdominus/js/moment.min.js"></script>
    <script src="../assets/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="../assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <script>
        const catSelect = document.querySelector('#catSelect');
        const subSelect = document.querySelector('#subSelect');

        catSelect.addEventListener('change', async () => {
            const val = catSelect.value;
            try {
                if (val != '') {
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            //    console.log(this.response);
                            var subObject = JSON.parse(this.response);
                            subSelect.innerHTML = "";
                            subObject.forEach(sub => {
                                const res = sub.res.split('-');
                                let id = res[0];
                                let subName = res[1];
                                subSelect.innerHTML += `<option value="${id}">${subName.charAt(0).toUpperCase() + subName.slice(1)}</option>`;

                            })

                        }
                    };
                    xmlhttp.open("GET", "../assets/config/get_sub.php?sub=" + val, true);
                    xmlhttp.send();


                }

            } catch (error) {
                console.log(error);
            }
        })
    </script>
    <!-- Wow Slider -->
    <script type="text/javascript" src="../assets/lib/engine1/wowslider.js"></script>
    <script type="text/javascript" src="../assets/lib/engine1/script.js"></script>

    <!-- Template Javascript -->
    <script src="../assets/js/main.js"></script>
</body>

</html>