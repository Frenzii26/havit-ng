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
    <title>Shipping</title>
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
            <div class="row mb-4">
                <div class="col-md-12">
                    <button data-bs-toggle="modal" data-bs-target="#add_new" class="btn btn-primary text-center">Add New</button>
                </div>

            </div>
            <hr class="w-100">

            <!-- Orders Table Start -->
            <div class="table-responsive">
                <table class="table table-borderless main">
                    <thead>
                        <tr class="head">
                            <th scope="col">Origin</th>
                            <th scope="col">Destination</th>
                            <th scope="col">Rate</th>
                            <th scope="col">Update</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $sql = "SELECT * FROM shipping_rate ORDER BY id desc";
                        $query = mysqli_query($connectDB, $sql);
                        while ($row = mysqli_fetch_assoc($query)) { ?>
                            <tr class="rounded bg-white">
                                <input type="hidden" name="oid" value="<?php echo $row['id'] ?>">
                                <td class="order-color"><?php echo $row['origin']; ?></td>
                                <td class="order-color"><?php echo $row['destination']; ?></td>
                                <td class="text-nowrap">$ <?php echo number_format($row['rate'], 2, '.', ','); ?></td>

                                <td>
                                <input type="button" name="edit" value="Update" id="<?php echo $row["id"]; ?>" class="btn btn-primary edit_data" />

                                    <!-- <button data-bs-toggle="modal" data-bs-target="#add_new" class="btn btn-primary text-white">Update</button> -->

                                </td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- Orders Table End -->
        </div>
        <!-- Recent Sales End -->

        <div>
            <div class="modal fade" id="add_new" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-l">
                    <div class="modal-content">
                        <div class="modal-header border-bottom-0">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-black">

                            <form action="../assets/config/save_shipping" method="post">
                                <div class="mb-3">
                                    <label for="origin" class="form-label">Origin</label>
                                    <input type="text" class="form-control" name="origin" style="width: 460px;" required>
                                </div>
                                <div class="mb-3">
                                    <label for="destination" class="form-label">Destination</label>
                                    <input type="text" class="form-control" name="destination" style="width: 460px;" required>
                                </div>
                               
                                <div class="mb-3">
                                    <label for="rate" class="form-label">Rate</label>
                                    <input type="text" class="form-control" name="rate" style="width: 460px;" required>
                                </div>
                                <button type="submit" name="saveShipping" class="btn btn-primary">Submit</button>
                            </form>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-l">
                    <div class="modal-content">
                        <div class="modal-header border-bottom-0">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-black">

                            <form action="../assets/config/save_shipping" method="post">
                                <input type="hidden" id="id" name="id">
                                <div class="mb-3">
                                    <label for="origin" class="form-label">Origin</label>
                                    <input type="text" class="form-control" id="origin" name="origin" style="width: 460px;" required>
                                </div>
                                <div class="mb-3">
                                    <label for="destination" class="form-label">Destination</label>
                                    <input type="text" class="form-control" id="destination" name="destination" style="width: 460px;" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="rate" class="form-label">Rate</label>
                                    <input type="text" class="form-control" id="rate" name="rate" style="width: 460px;" required>
                                </div>
                                <button type="submit" name="updateShipping" class="btn btn-primary">Submit</button>
                            </form>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
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
                        &copy; <a href="../index">Geevic Ltd</a>, All Right Reserved.
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->

    </div>
    <!-- Content End -->


    <!-- Back to Top -->
    <a href="#" style="background-color: rgb(18, 177, 26);" class="btn btn-lg btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
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

    <script>
        $(document).ready(function() {
                   
                    $(document).on('click', '.edit_data', function() {
                        var id = $(this).attr("id");
                        $.ajax({
                            url: "../assets/config/save_shipping",
                            method: "POST",
                            data: {
                                id: id
                            },
                            dataType: "json",
                            success: function(data) {
                                $('#origin').val(data.origin);
                                $('#destination').val(data.destination);
                                $('#weight_min').val(data.weight_min);
                                $('#weight_max').val(data.weight_max);
                                $('#rate').val(data.rate);
                                $('#id').val(data.id);
                                $('#edit').modal('show');
                            }
                        });
                    });
                });
    </script>
</body>

</html>