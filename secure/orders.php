<?php
require "../assets/config/db_con.php";
require "../assets/includes/sessions.php";

auth();
function checkStatus($row, $status, $echo)
{
    if ($row['order_status'] === $status) {
        echo $echo;
    }
}
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
    <title>Orders</title>
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
    <link href="../assets/css/custom-style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/C.I PINNACLE.css">
    <!-- Lightbox -->
    <!-- Lightbox Plugin -->
    <link rel="stylesheet" href="../assets/lib/lightbox/css/jquery.css">
    <link href="../assets/lib/lightbox/css/lightboxed.css" rel="stylesheet" />
    <script src="../assets/lib/lightbox/js/jquery.3.6.0.js"></script>
    <script src="../assets/lib/lightbox/js/lightboxed.js"></script>
    <!-- Lightbox plugin -->
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
.table {
    --bs-table-bg: rgba(0,0,0,0);
    --bs-table-striped-color: #757575;
    --bs-table-striped-bg: rgba(0,0,0,0.05);
    --bs-table-active-color: #757575;
    --bs-table-active-bg: rgba(0,0,0,0.1);
    --bs-table-hover-color: #757575;
    --bs-table-hover-bg: rgba(0,0,0,0.075);
    width: 100%;
    margin-bottom: 1rem;
    color: white;
    vertical-align: top;
    border-color: #dee2e6;
}
.fa-search{
    color: white;
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
        <div class="bg-light rounded p-4 h-100z">
            <div class="d-flex justify-content-center mb-4">
                <form method="get" class="d-flex">
                    <input type="text" name="search" placeholder="Order ID..." class="form-control h-100 rounded-0">
                    <button class="btn rounded-0 h-100">
                        <i class="fa fa-search"></i>
                    </button>
                </form>
            </div>
            <hr class="w-100">
            <div class="d-flex justify-content-between">
                <?php
                if (isset($_GET['filter'])) {
                    $stats = $_GET['filter'];
                    var_dump($stats);   
                    $sql = "SELECT * FROM tbl_orders WHERE order_status = '$stats'";

                    if ($stats == "accepted") {
                        $order = "Accepted Orders";
                    } elseif ($stats == "shipped") {
                        $order = "Shipped Orders";
                    } elseif ($stats == "delivered") {
                        $order = "Delivered Orders";
                    } elseif ($stats == "cancelled") {
                        $order = "Canceled Orders";
                    }
                } elseif (isset($_GET['search'])) {
                    $search = $_GET['search'];
                    $order = "Showing result for $search";
                    $sql = "SELECT * FROM tbl_orders WHERE order_id = '$search'";
                } else {
                    $order = "New Orders";
                    $sql = "SELECT * FROM tbl_orders WHERE order_status <> 'pending'";
                    // $sql = "SELECT * FROM tbl_orders WHERE order_status = 'placed'";
                }
                ?>
                <h3 class="fw-bold">
                    <?php echo $order ?>
                </h3>

                <div class="dropdown">
                    <a class="btn btn-primary h-100" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        Filter <i class="fa fa-sort text-light"></i>
                    </a>

                    <ul class="dropdown-menu rounded-0 lh-lg" aria-labelledby="dropdownMenuLink">
                        <li><a href="orders" class="dropdown-item" style="font-size: 13px;" href="#">New Orders</a></li>
                        <li><a href="orders?filter=accepted" class="dropdown-item" style="font-size: 13px;" href="#">Accepted Orders</a></li>
                        <li><a href="orders?filter=shipped" class="dropdown-item" style="font-size: 13px;" href="#">Shipped Orders</a></li>
                        <li><a href="orders?filter=delivered" class="dropdown-item" style="font-size: 13px;" href="#">Delivered Orders</a></li>
                        <li><a href="orders?filter=cancelled" class="dropdown-item" style="font-size: 13px;" href="#">Canceled Orders</a></li>
                    </ul>
                </div>
            </div>


            <!-- Orders Table Start -->
            <div class="table-responsive">
                <table class="table table-borderless main">
                    <thead>
                        <tr class="head">
                            <th scope="col">Order ID</th>
                            <th scope="col">Created</th>
                            <th scope="col">Customer</th>
                            <th scope="col">Status</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">View</th>
                            <th scope="col">Last Updated</th>
                            <th scope="col">Update</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $query = mysqli_query($connectDB, $sql);
                        while ($row = mysqli_fetch_assoc($query)) {
                            $cql = "SELECT * FROM order_items WHERE order_id = '" . $row['order_id'] . "'";
                            $cquery = mysqli_query($connectDB, $cql);
                            $crow = mysqli_fetch_assoc($cquery);
                        ?>
                            <tr class="rounded bg-white">
                                <form action="../assets/config/order_process" method="post">
                                    <input type="hidden" name="oid" value="<?php echo $row['_id'] ?>">
                                    <td class="order-color"><?php echo $row['order_id']; ?></td>
                                    <td><?php echo date_format(date_create($row['date_created']), "D, d M. Y")  ?></td>
                                    <td class="d-flex align-items-center">

                                        <span class="ml-2"><?php echo ucwords(getName($connectDB, "full_name", "users", "_id", $_SESSION['id'])); ?></span>
                                    </td>
                                    <td>
                                        <?php
                                        checkStatus($row, "placed", "Placed");
                                        checkStatus($row, "accepted", "Accepted");
                                        checkStatus($row, "shipped", "Shipped");
                                        checkStatus($row, "delivered", "Delivered");
                                        checkStatus($row, "cancelled", "Canceled");
                                        ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $crow['quantity']; ?>
                                    </td>
                                    <td class="text-nowrap">₦ <?php echo number_format($crow['price'], 2, '.', ','); ?></td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-light btn-sm rounded-pill" data-bs-toggle="modal" data-bs-target="#payreciept<?php echo $row['_id']; ?>">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                        <!-- Modal -->
                                        <div>
                                            <div class="modal fade" id="payreciept<?php echo $row['_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header border-bottom-0">
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body text-start text-black p-4" style="line-height: 50px;">
                                                            <img src="../assets/img/products/<?php echo getName($connectDB, "product_image", "product_image", "product_id", $crow['product_id']); ?>" class="lightboxed" height="150" alt="Phone">
                                                            <div class="d-flex justify-content-between">
                                                                <p class="fw-bold mb-0"><?php echo substr(ucwords(getName($connectDB, "product_name", "tbl_products", "product_id", $crow['product_id'])), 0, 25) . '...'; ?>(Qty: <?php echo $crow['quantity']; ?>)</p>
                                                                <p class="text-muted mb-0">
                                                                    ₦ <?php echo number_format($crow['price'], 2, '.', ','); ?>
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
                                                            <div class="d-flex justify-content-between mt-3">
                                                                <p class="small mb-0">Shipping: </p>
                                                                <p class="small mb-0"><?php echo $row['deliveryfee']; ?></p>
                                                            </div>
                                                            <div class="d-flex justify-content-between">
                                                                <p class="fw-bold">Total</p>
                                                                <p class="fw-bold" style="color: #35558a;">₦ <?php echo number_format($crow['price'] + $row['deliveryfee'], 2, '.', ','); ?></p>
                                                            </div>
                                                            <div class="my-3">
                                                                <!-- Timeline Starts -->
                                                                <div class="progressbar-track">
                                                                    <ul class="progressbar">
                                                                        <li id="step-1" class="text-muted <?php progress($row, "placed"); ?>">
                                                                            <span class="fas fa-gift <?php progressIcon($row, "placed"); ?>"></span>
                                                                        </li>
                                                                        <li id="step-2" class="text-muted <?php progress($row, "accepted"); ?>">
                                                                            <span class="fas fa-check <?php progressIcon($row, "accepted"); ?>"></span>
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
                                    </td>
                                    <td><?php if (!empty($row['date_updated'])) {
                                            echo date_format(date_create($row['date_updated']), "D, d M. Y");
                                        }  ?></td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn bg-primary text-white dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                Update
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <li>
                                                    <button type="submit" class="dropdown-item" name="acceptOrder">Accept</button>
                                                </li>
                                                <li><button type="submit" class="dropdown-item" name="shipOrder">Shipped</button></li>
                                                <li><button type="submit" class="dropdown-item" name="deliverOrder">Delivered</button></li>
                                                <li><button type="submit" class="dropdown-item" name="cancelOrder">Canceled</button></li>

                                            </ul>
                                        </div>
                                    </td>

                                </form>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- Orders Table End -->
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

    <!-- Template Javascript -->
    <script src="../assets/js/main.js"></script>
</body>

</html>