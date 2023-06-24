<?php
require "assets/config/db_con.php";
require "assets/includes/sessions.php";

cartAuth();
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
    <title>Profile - Geevic</title>
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
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/C.I PINNACLE.css">
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
    <?php require_once "assets/includes/sidebars.php";
    echo errorMessage();
    echo successMessage(); ?>

    <!-- Navbar End -->

    <!-- Recent Sales Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded p-4">
            <form action="assets/config/details_process" method="post" class="row">
                <div class="col-md-6 mb-3">
                    <label>Full Name:</label>
                    <input type="text" name="name" placeholder="<?php echo $urow['full_name']; ?>" class="form-control form-control-lg rounded-0">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Email:</label>
                    <input type="text" name="email" value="<?php echo $urow['email']; ?>" class="form-control form-control-lg rounded-0" readonly>
                </div>

                <div class="col-md-6 mb-3">
                    <label>Phone:</label>
                    <input type="tel" placeholder="<?php echo $urow['phone']; ?>" name="phone" class="form-control form-control-lg rounded-0">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Current Password:</label>
                    <input type="password" name="curPass" class="form-control form-control-lg rounded-0">
                </div>
                <div class="col-md-6 mb-3">
                    <label>New Password:</label>
                    <input type="password" name="newPass" class="form-control form-control-lg rounded-0">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Confirm Password:</label>
                    <input type="password" name="conPass" class="form-control form-control-lg rounded-0">
                </div>

                <div class="col-md-12 mb-3">
                    <button type="submit" name="updateDetails" class="btn rounded-0 w-100 btn-primary">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
    <!-- Recent Sales End -->

    <!-- product add -->
    <div class="container-fluid pt-4 px-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Address</h6>
                <div class="text-end">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addressModal">
                        CLICK HERE TO ADD NEW ADDRESS
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="addressModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addressModal">New Address</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="assets/config/address_process" method="post">
                                    <div class="modal-body text-start">
                                        <div class="mb-3">
                                            <label>Country</label>
                                            <select name="country" id="country" class="form-control w-100">
                                                <option value="">Select country</option>
                                                <?php foreach (countries() as $country) { ?>
                                                    <option value="<?php echo $country['nicename'] ?>"><?php echo $country['name'] ?></option>
                                                <?php } ?>
                                            </select>
                                            <!-- <input type="text" class="form-control w-100" name="country"> -->
                                        </div>
                                        <div class="mb-3">
                                            <label>State</label>
                                            <input type="text" class="form-control w-100" name="state">
                                        </div>

                                        <div class="mb-3">
                                            <label for="city" class="form-label">City</label>
                                            <input type="text" class="form-control w-100" name="city">
                                        </div>
                                        <div class="mb-3">
                                            <label for="zip_code" class="form-label">Zip Code</label>
                                            <input type="text" class="form-control w-100" name="zip_code">
                                        </div>
                                        <div class="mb-3">
                                            <label>Address:</label>
                                            <textarea name="userAddress" class="form-control form-control-lg w-100"></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="addAddress" class="btn btn-primary">
                                            Add New Address
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" style="color: white;"><span style="color: red;">NOTE:</span> Dear customer, we would appreciate if you are very specific with your address, given that the location provided is where your orders will be delivered. NOTE that you can add as many addresses as you like, but the one you select while placing your order, is the location where the item(s) will be delivered. Thank you. <br><br>Your addresses will display below. <i class="fas fa-arrow-down"></i></th>
                                <th scope="col">...</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM user_address WHERE userid = '$curId'";
                            $query = mysqli_query($connectDB, $sql);
                            while ($row = mysqli_fetch_assoc($query)) {
                            ?>
                                <tr>
                                    <td><?php echo ucfirst($row['user_address']); ?></td>
                                    <td>
                                        <a href="assets/config/address_process?delAd=<?php echo $row['_id']; ?>" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash text-white fs-6"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- product add end-->

    <!-- Footer Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded-top p-4">
            <div class="row">
                <div class="col-12 col-sm-6 text-center text-sm-start">
                    &copy; <a href="index">Havit NG</a>, All Rights Reserved.
                </div>
                <div class="col-12 col-sm-6 text-center text-sm-end">
                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                    </br>
                    Distributed By <a class="border-bottom" href="https://themewagon.com" target="_blank">ThemeWagon</a>
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

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/lib/chart/chart.min.js"></script>
    <script src="assets/lib/easing/easing.min.js"></script>
    <script src="assets/lib/waypoints/waypoints.min.js"></script>
    <script src="assets/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="assets/lib/tempusdominus/js/moment.min.js"></script>
    <script src="assets/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="assets/js/main.js"></script>
</body>

</html>