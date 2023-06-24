<?php
include_once 'db_con.php';
include "../includes/sessions.php";

if (!isset($_POST['login'])) {
    header("Location: ../../index");
} else {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = ?";
    // Initialize Database Connection
    $stmt = mysqli_stmt_init($connectDB);
    // Prepare SQL statement
    mysqli_stmt_prepare($stmt, $sql);
    // Bind parameters to the placeholder
    mysqli_stmt_bind_param($stmt, "s", $email);
    $execute = mysqli_stmt_execute($stmt);


    $result = mysqli_stmt_get_result($stmt);
    // print_r($result);
    if ($row = mysqli_fetch_assoc($result)) {
        $returnedPassword = $row['user_password'];


        if (password_verify($password, $returnedPassword)) {
            $_SESSION['id'] = $row['_id'];

            $_SESSION['role'] = $row['user_role'];
            $_SESSION['userName'] = $row['full_name'];
            if ($_SESSION['role'] == 'admin') {
                $_SESSION['successmessage'] = 'Welcome Havit NG Admin';
                header('Location: ../../secure/dashboard');
            } else {
                $_SESSION['successmessage'] = 'Welcome ' . $row['full_name'];;
                header('Location: ../../index');
            }
            $_SESSION['last_login_timestamp'] = time();
        } else {
            $_SESSION['errormessage'] =  "Incorrect password";
            header("Location: ../../login-signin");
        }
    } else {
        $_SESSION['errormessage'] =  "Invalid Email Address";
        header("Location: ../../login-signin");
    }
    // print_r($row);

}
