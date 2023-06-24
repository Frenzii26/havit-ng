<?php
include_once 'db_con.php';
include "../includes/sessions.php";
date_default_timezone_set("Africa/Lagos");

if (isset($_POST['addAddress'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        foreach ($_POST as $field) {
            if ($field == $_POST['addAddress']) {
                continue;
            }

            if (empty($field)) {
                $_SESSION['errormessage'] =  "Please fill in all the form fields.";
                header("Location: ../../profile");
                exit;
            }
        }

       
    }

    $currId = $_SESSION['id'];
    $user_address = $_POST['userAddress'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $zip_code = $_POST['zip_code'];
    $date = date("Y-m-d h:i:s");

    $sql = "INSERT INTO user_address(userid, user_address, country, `state`, city, zip_code, date_created) VALUES(?,?,?,?,?,?,?)";
    // Initialize Database Connection 
    $stmt = mysqli_stmt_init($connectDB);
    // Prepare SQL statement
    mysqli_stmt_prepare($stmt, $sql);
    // Bind parameters to the placeholder
    mysqli_stmt_bind_param($stmt, "sssssss", $currId, $user_address, $country, $state, $city, $zip_code, $date);
    // Execute statement
    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['successmessage'] =  "New Address Added";
        header("Location: ../../profile");
    } else {
        $_SESSION['errormessage'] =  "Something went wrong";
        header("Location: ../../profile");
    }
} elseif (isset($_GET['delAd'])) {
    $did = $_GET['delAd'];

    $sql = "DELETE FROM user_address WHERE _id = '$did'";
    $query = mysqli_query($connectDB, $sql);
    if ($query) {
        $_SESSION['successmessage'] =  "Address has been removed";
        header("Location: ../../profile");
    } else {
        $_SESSION['errormessage'] =  "Something went wrong";
        header("Location: ../../profile");
    }
} else {
    header('logout');
}
