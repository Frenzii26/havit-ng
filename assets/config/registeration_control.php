<?php
include_once 'db_con.php';
include "../includes/sessions.php";

date_default_timezone_set("Africa/Lagos");

if (!isset($_POST['register'])) {
    header("Location: ../../login-signin");
} else {
    // If button is set collect data

    $fullName = $_POST['fname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $role = "user";
    $date = date("Y-m-d h:i:s");

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $query = mysqli_query($connectDB, $sql);
    $numrow = mysqli_num_rows($query);

    if ($numrow > 0) {
        $_SESSION['errormessage'] =  "This email is already in use";
        header("Location: ../../login-signin");
    } elseif (strlen($_POST['password']) < 8) {
        $_SESSION['errormessage'] =  "Password must be at least 8 characters";
        header("Location: ../../login-signin");
    } elseif ($password != $cpassword) {
        $_SESSION['errormessage'] =  "Passwords do not match";
        header("Location: ../../login-signin");
    } else {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $sql = "INSERT INTO users(full_name,email,phone,user_password,user_role,date_created) VALUES(?,?,?,?,?,?)";
        // Initialize Database Connection
        $stmt = mysqli_stmt_init($connectDB);
        // Prepare SQL statement
        mysqli_stmt_prepare($stmt, $sql);
        // Bind parameters to the placeholder
        mysqli_stmt_bind_param($stmt, "ssssss", $fullName, $email, $phone, $password, $role, $date);
        // Execute statement
        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['id'] = mysqli_insert_id($connectDB);
            
            $_SESSION['successmessage'] = " Registration complete, go ahead and login";
            header("Location: ../../login-signin");
        } else {
            $_SESSION['errormessage'] =  "Something went wrong";
            header("Location: ../../login-signin");
        }
    }
}
