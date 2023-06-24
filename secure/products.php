<?php
require "../assets/config/db_con.php";
require "../assets/includes/sessions.php";
auth();
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
    <title>Products</title>
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
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded p-4">
            <div class="d-flex justify-content-between">
                <h3 class="fw-bold">
                    Products
                </h3>
                <!-- Add Categories Modal Start -->
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    New Product
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 style="color: rgb(22, 22, 22);" class="modal-title" id="exampleModalLabel">New Product</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="../assets/config/product_process" method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <label style="color: rgb(22, 22, 22);">Product Name</label>
                                    <input style="color: rgb(22, 22, 22);" type="text" name="name" class="form-control w-100 mb-3 rounded-0">

                                    <label style="color: rgb(22, 22, 22);">Category Name</label>
                                    <select style="color: rgb(22, 22, 22);" name="cat" class="form-select mb-3" id="catSelect">
                                        <option style="color: rgb(22, 22, 22);" selected disabled>Category</option>
                                        <?php
                                        $sql = "SELECT * FROM categories ORDER BY category_name ASC";
                                        $query = mysqli_query($connectDB, $sql);
                                        while ($row = mysqli_fetch_assoc($query)) {
                                        ?>
                                            <option style="color: rgb(22, 22, 22);" value="<?php echo $row['cat_id']; ?>">
                                                <?php echo ucwords($row['category_name']); ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                    <label style="color: rgb(22, 22, 22);">Sub-Category</label>
                                    <select style="color: rgb(22, 22, 22);" name="sub" id="subSelect" class="form-select mb-3">
                                        <option style="color: rgb(22, 22, 22);" value="1">Test</option>
                                        <option style="color: rgb(22, 22, 22);" selected disabled>Sub Category</option>
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
                                    <button type="submit" name="newProduct" class="btn btn-primary">Add Product</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Add Categories Modal End -->
            </div>
            <div class="row my-3">
                <?php
                if (!isset($_GET['q'])) {
                    $sql = "SELECT * FROM categories ORDER BY _id DESC LIMIT 0, 5";
                    $query = mysqli_query($connectDB, $sql);
                    while ($row = mysqli_fetch_assoc($query)) {
                ?>
                        <div class="col-md-6  col-lg-4 mb-2">
                            <a href="products?q=<?php echo $row['cat_id']; ?>" id="catDiv">
                                <div class="card position-relative">
                                    <div class="overlay position-absolute w-100 h-100" id="overlay"></div>
                                    <img src="../assets/img/category/<?php
                                                                        $img = $row['category_image'];
                                                                        echo "$img?" . mt_rand();
                                                                        ?>" alt="category" id="catImg" class="img-fluid">
                                    <div class="position-absolute w-100 text-center top-50 p-2" style="background-color: rgba(0,0,0,.3);">
                                        <h3 class="fw-bold text-center text-white w-100 top-50">
                                            <?php echo $row['category_name']; ?>
                                        </h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php
                    }
                } else {
                    $cid = $_GET['q'];
                    $sql = "SELECT * FROM tbl_products WHERE cat_id = '$cid'";
                    $query = mysqli_query($connectDB, $sql);
                    while ($row = mysqli_fetch_assoc($query)) {
                    ?>
                        <div class="col-md-6 col-lg-4 mb-2">
                            <a href="product-details?q=<?php echo $row['product_id'] ?>" class="product text-center">
                                <img class="img-fluid d-block mx-auto mb-3" src="../assets/img/products/<?php echo getName($connectDB, "product_image", "product_image", "product_id", $row['product_id']) ?>" alt="">
                                <div class="text-center">
                                    <p class="text-capitalize row">
                                        <span class="fw-bold col-5 text-end">Category: </span>
                                        <span class="col-7 text-start"><?php echo getName($connectDB, "category_name", "categories", "cat_id", $_GET['q']); ?></span>
                                    </p>
                                    <!-- <p class="text-capitalize row">
                                <span class="fw-bold col-5 text-end">Sub-Category: </span>
                                <span class="col-7 text-start"><?php echo getName($connectDB, "sub_name", "sub_categories", "cat_id", $_GET['q']); ?></span>
                            </p> -->

                                </div>
                                <h5 class="fw-bold"><?php echo ucwords(substr($row['product_name'], 0, 30)) . '...'; ?></h5>
                                <h4 class="p-price">
                                    <span class="fw-bold">$</span> <?php echo number_format($row['price'], 2, '.', ',') ?>
                                </h4>
                            </a>
                        </div>

                <?php }
                } ?>
            </div>
        </div>
    </div>
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

    <!-- Template Javascript -->
    <script src="../assets/js/main.js"></script>
</body>

</html>