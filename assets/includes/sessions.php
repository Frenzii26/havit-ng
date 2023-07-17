<?php

use Geevic\Shipping;

session_start();

function errorMessage()
{
    if (isset($_SESSION['errormessage'])) {
        $message = "<div class=\"alert alert-dismissal text-center fw-bold alert-danger position-fixed end-0\" style=\"top: 8%;\" role=\"alert\">";
        $message .= htmlentities($_SESSION['errormessage']);
        $message .= "</div>";

        $_SESSION['errormessage'] = null;
        return $message;
    }
}

function successMessage()
{
    if (isset($_SESSION['successmessage'])) {
        $message = "<div class=\"alert text-center fw-bold alert-success position-fixed end-0\" style=\"top: 19%;\" role=\"alert\">";
        $message .= htmlentities($_SESSION['successmessage']);
        $message .= "</div>";

        $_SESSION['successmessage'] = null;
        return $message;
    }
}

function auth()
{
    if (!isset($_SESSION['id']) && $_SESSION['role'] != 'admin') {
        header("Location:" . $_SERVER['HTTP_REFERER']);
    }
}

function cartAuth()
{
    if (!isset($_SESSION['id'])) {
        header("Location: login-signin");
    }
}


function activity()
{
    if ((time() - $_SESSION['last_login_timestamp']) > 900) // 900 = 15 * 60  
    {
        header("Location:../assets/config/logout.php");
    } else {
        $_SESSION['last_login_timestamp'] = time();
    }
}


function getName($connection, $return, $table, $column, $value)
{
    $sql = "SELECT $return FROM $table WHERE $column = '$value'";
    $query = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($query);
    return $row[$return];
}

function shippingCost(Shipping $shipping, $pid, $origin, $destination, $qty)
{

    return $shipping->calculateRate($pid, $origin, $destination, $qty);
}

function countries()
{
    global $connectDB;

    $sql = "SELECT * FROM countries";
    $query = mysqli_query($connectDB, $sql);
    $row = mysqli_fetch_all($query, MYSQLI_ASSOC);
    return $row;
}
