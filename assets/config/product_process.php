<?php
include_once 'db_con.php';
include "../includes/sessions.php";

if (isset($_POST['newProduct'])) {
    $pid = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
    $pid = str_shuffle($pid);
    $pid = substr($pid, 3, 13);
    $title = strtolower($_POST['name']);
    $cat = strtolower($_POST['cat']);
    $sub = strtolower($_POST['sub']);
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $weight = $_POST['weight'];
    $details = $_POST['details'];

    $sql = "INSERT INTO tbl_products(product_id,product_name,cat_id,sub_id,price,stock,`weight`,details) VALUES(?,?,?,?,?,?,?,?)";
    // Initialize Database Connection
    $stmt = mysqli_stmt_init($connectDB);
    // Prepare SQL statement
    mysqli_stmt_prepare($stmt, $sql);
    // Bind parameters to the placeholder
    mysqli_stmt_bind_param($stmt, "ssssssss", $pid, $title, $cat, $sub, $price, $stock, $weight, $details);
    // Execute statement
    if (mysqli_stmt_execute($stmt)) {
        $title = ucwords($title);
        $_SESSION['successmessage'] =  "$title added successfully";
        header("Location: ../../secure/product-details?q=$pid");
    } else {
        $_SESSION['errormessage'] =  "Something went wrong";
        header("Location: ../../secure/products");
    }
} elseif (isset($_POST['productImg'])) {
    $rand = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
    $rand = str_shuffle($rand);
    $rand = substr($rand, 3, 13) . '-' . substr($rand, 15, 20);
    $pid = $_POST['pid'];
    $file = $_FILES['file'];

    $sql = "SELECT * FROM product_image WHERE product_id = '$pid'";
    $query = mysqli_query($connectDB, $sql);

    if (mysqli_num_rows($query) >= 4) {
        $_SESSION['errormessage'] =  "Max number of image: 4";
        header("Location: ../../secure/product-details?q=$pid");
    } else {
        // Get all the values from the file associative array
        $fileName = $file['name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        $fileTempLoc = $file['tmp_name'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        // Files that would be allowed
        $allowed = array('jpg', 'png', 'jpeg', 'tiff', 'swf', 'jpeg2000');

        // Check if the file extension is allowed
        if (in_array($fileActualExt, $allowed)) {
            // check the file size
            if ($fileSize < 10000000) {
                //  check for errors
                if ($fileError === 0) {
                    // Create a new name for our file
                    $fileNewName = $rand . "." . $fileActualExt;
                    $location = "../img/products/";
                    $move = move_uploaded_file($fileTempLoc, $location . $fileNewName);
                    if ($move) {

                        $sql = "INSERT INTO product_image(product_id,product_image) VALUES(?,?)";
                        // Initialize Database Connection
                        $stmt = mysqli_stmt_init($connectDB);
                        // Prepare SQL statement
                        mysqli_stmt_prepare($stmt, $sql);
                        // Bind parameters to the placeholder
                        mysqli_stmt_bind_param($stmt, "ss", $pid, $fileNewName);
                        // Execute statement
                        if (mysqli_stmt_execute($stmt)) {
                            $_SESSION['successmessage'] =  "Image added successfully";
                            header("Location: ../../secure/product-details?q=$pid");
                        } else {
                            $_SESSION['errormessage'] =  "Something went wrong";
                            header("Location: ../../secure/product-details?q=$pid");
                        }
                    } else {
                        $_SESSION['errormessage'] =  "Something went wrong";
                        header("Location: ../../secure/product-details?q=$pid");
                    }
                } else {
                    $_SESSION['errormessage'] =  "There is an error with your file";
                    header("Location: ../../secure/product-details?q=$pid");
                }
            } else {
                $_SESSION['errormessage'] =  "This file is too large";
                header("Location: ../../secure/product-details?q=$pid");
            }
        } else {
            $_SESSION['errormessage'] =  "Please upload a file that is either jpg,png or jpeg";
            header("Location: ../../secure/product-details?q=$pid");
        }
    }
} elseif (isset($_POST['updateProduct'])) {
    $pid = $_POST['pid'];
    $title = strtolower($_POST['name']);
    $cat = strtolower($_POST['cat']);
    $sub = strtolower($_POST['sub']);
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $weight = $_POST['weight'];
    $details = addslashes($_POST['details']);

    function updateDetails($check, $connnection, $column, $value, $id)
    {
        if (!empty($check)) {
            $sql = "UPDATE tbl_products SET $column = '$value' WHERE product_id = '$id'";
            $query = mysqli_query($connnection, $sql);
            if ($query) {
                $_SESSION['successmessage'] =  "Updated successfully";
                header("Location: ../../secure/product-details?q=$id");
            } else {
                $_SESSION['errormessage'] =  "Something went wrong";
                header("Location: ../../secure/product-details?q=$id");
            }
        } else {
            header("Location: ../../secure/product-details?q=$id");
        }
    }

    // Title
    updateDetails($title, $connectDB, 'product_name', $title, $pid);
    // Price
    updateDetails($price, $connectDB, 'price', $price, $pid);
    // Stock
    updateDetails($stock, $connectDB, 'stock', $stock, $pid);
    // Weight
    updateDetails($weight, $connectDB, 'weight', $weight, $pid);
    // Details
    updateDetails($details, $connectDB, 'details', $details, $pid);
    // Category and Sub-Category
    if (!empty($cat)) {
        if (!empty($sub)) {
            $sql = "UPDATE tbl_products SET cat_id = '$cat',sub_id = '$sub' WHERE product_id = '$pid'";
            $query = mysqli_query($connectDB, $sql);
            if ($query) {
                $_SESSION['successmessage'] =  "Updated successfully";
                header("Location: ../../secure/product-details?q=$pid");
            } else {
                $_SESSION['errormessage'] =  "Something went wrong";
                header("Location: ../../secure/product-details?q=$pid");
            }
        } else {
            $_SESSION['errormessage'] =  "Please Select a Sub-Category";
            header("Location: ../../secure/product-details?q=$pid");
        }
    } else {
        header("Location: ../../secure/product-details?q=$pid");
    }
} elseif (isset($_GET['delImg'])) {
    $id = $_GET['delImg'];
    $img = $_GET['imgName'];
    $pid = $_GET['pid'];

    $sql = "DELETE FROM product_image WHERE _id = '$id'";
    $query = mysqli_query($connectDB, $sql);
    if ($query) {
        unlink('../img/products/' . $img);
        $_SESSION['successmessage'] =  "Deleted successfully";
        header("Location: ../../secure/product-details?q=$pid");
    } else {
        $_SESSION['errormessage'] =  "Something went wrong";
        header("Location: ../../secure/product-details?q=$pid");
    }
}
