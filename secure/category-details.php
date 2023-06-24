<?php
    require "../assets/config/db_con.php";
    require "../assets/includes/sessions.php";

    auth();
    $curId = $_SESSION['id'];
    $sql = "SELECT * FROM users WHERE _id = '$curId'";
    $query = mysqli_query($connectDB,$sql);
    $urow = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <title>Cartegory-details</title>
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
h5 {
    font-size: 1rem;
    font-weight: 400;
    color: rgb(22, 22, 22);
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
    <?php require_once "../assets/includes/sidebars.php"; echo errorMessage(); echo successMessage();?>

    <!-- Navbar End -->
    <?php  
        $cid = $_GET['q'];
        $sql = "SELECT * FROM categories WHERE cat_id = '$cid'";
        $query = mysqli_query($connectDB,$sql);
        $row = mysqli_fetch_assoc($query);
    ?>
    <!-- Recent Sales Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded p-4">
                <h3 class="mb-4">
                    Category:  <span class="fw-bold"><?php echo ucwords($row['category_name']); ?></span>
                </h3>


                <div class="table-responsive">
                    <!-- <h5 class="fw-bold">Sub-Categories</h5> -->
                    <div class="d-flex gap-3 justify-content-end">
                        <!-- Update Categories Modal Start -->
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateCat">
                                Update Category
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="updateCat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                        <form action="../assets/config/category_process" method="post" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <label style="color: rgb(22, 22, 22);">New Category Name</label>
                                                <input style="color: rgb(22, 22, 22);" type="text" name="name" class="form-control w-100 mb-3 rounded-0">

                                                <label style="color: rgb(22, 22, 22);">New Category Image</label>
                                                <input type="file" name="file" class="form-control w-100 mb-3 rounded-0">
                                                <input type="hidden" name="id" value="<?php echo $row['cat_id']; ?>">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" name="updateCat" class="btn btn-primary">Update Category</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        <!-- Update Categories Modal End -->

                        <!-- Delete Categories Modal Start -->
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delCat">
                                Delete Category
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="delCat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                        <div class="modal-body">
                                            <h2 style="color: rgb(22, 22, 22);" class="text-center">Are you Sure?</h2>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-warning" data-bs-dismiss="modal" aria-label="Close">No</button>
                                            <a href="../assets/config/category_process?del=<?php echo $row['cat_id'] ?>&q=<?php echo $row['category_image']; ?>" name="updateCat" class="btn btn-danger">Yes</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <!-- Delete Categories Modal End -->


                        <!-- Add Sub Categories Modal Start -->
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newSubCat">
                                Add Sub-Category
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="newSubCat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 style="color: rgb(22, 22, 22);" class="modal-title" id="exampleModalLabel">New Sub-Category</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="../assets/config/category_process" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <label style="color: rgb(22, 22, 22);">Sub-Category Name</label>
                                            <input style="color: rgb(22, 22, 22);" type="text" name="name" class="form-control w-100 mb-3 rounded-0">
                                            <input type="hidden" name="cid" value="<?php echo $row['cat_id']; ?>" class="form-control w-100 mb-3 rounded-0">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="newSubCat" class="btn btn-primary">Add Sub-Category</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>

                        <!-- Add Sub Categories Modal End -->
                    </div>
                    <table class="table table-hover table-bordered my-4">
                        <thead>
                            <tr>
                                <th class="text-center" scope="col">#</th>
                                <th class="text-center" scope="col">Name</th>
                                <th class="text-center" scope="col">Total Products</th>
                                <th class="text-center" scope="col">...</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $cid = $_GET['q']; 
                                $num = 1;
                                $sql = "SELECT * FROM sub_categories WHERE cat_id = '$cid' ORDER BY sub_name ASC";
                                $query = mysqli_query($connectDB,$sql);
                                while($row = mysqli_fetch_assoc($query)){
                            ?>
                            <tr>
                                <td class="text-center"><?php echo $num++ ?></td>
                                <td class="text-center"><?php echo ucwords($row['sub_name']); ?></td>
                                <td class="text-center"><?php echo ucwords($row['sub_name']); ?></td>
                                <td class="text-center" colspan="1">
                                    <!-- Edit Sub CategoryModal Start -->
                                        <button type="button" class="btn btn-sm btn-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#updateSubCat<?php echo $num; ?>">
                                            <i class="fas fa-edit text-white"></i>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="updateSubCat<?php echo $num; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Update <?php echo ucwords($row['sub_name']); ?></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                    <form action="../assets/config/category_process" method="post" enctype="multipart/form-data">
                                                        <div class="modal-body">
                                                            <label>New Sub-Category Name</label>
                                                            <input style="color: rgb(22, 22, 22);" type="text" name="name" class="form-control w-100 mb-3 rounded-0">
                                                            <input type="hidden" name="sid" value="<?php echo $row['sub_id'] ?>">
                                                            <input type="hidden" name="id" value="<?php echo $_GET['q'] ?>">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" name="updateSubCat" class="btn btn-primary">Update <?php echo ucwords($row['sub_name']); ?></button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    <!-- Edit Sub CategoryModal End -->
                                    <!-- Delete Categories Modal Start -->
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger rounded-pill" data-bs-toggle="modal" data-bs-target="#delSub<?php echo $num; ?>">
                                        <i class="fas fa-trash text-white"></i>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="delSub<?php echo $num; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete <?php echo $row['sub_name']; ?></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                    <div class="modal-body">
                                                        <h6 class="text-danger text-center">
                                                            Please Note that by deleting the sub category, <br> you would be deleting all products under this category
                                                        </h6>
                                                        <h3 class="text-danger text-center">This process is irriversable</h3>
                                                        <h2 class="text-center fw-bold text-danger">Are you Sure?</h2>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-warning" data-bs-dismiss="modal" aria-label="Close">No</button>
                                                        <a href="../assets/config/category_process?delSub=<?php echo $row['sub_id'] ?>&q=<?php echo $_GET['q']; ?>" class="btn btn-danger">Yes</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <!-- Delete Categories Modal End -->
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
    <!-- Recent Sales End -->
    <!-- product add end-->

    <!-- Footer Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded-top p-4">
            <div class="row">
                <div class="text-center">
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
        #catImg{
            height: 300px;
        }
        #catDiv .overlay{
            background-color: transparent;
            transition: background-color .45s ease-in-out;
        }
        #catDiv:hover #overlay{
            background-color: rgba(255,0,0,.3);
        }

        @media (max-width: 768px){
            #catImg{
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