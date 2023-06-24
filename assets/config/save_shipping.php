<?php
include_once 'db_con.php';
include "../includes/sessions.php";

if (isset($_POST['saveShipping'])) {
    $origin = $_POST['origin'];
    $destination = $_POST['destination'];
    $rate = $_POST['rate'];

    $sql = "INSERT INTO shipping_rate(origin, destination, rate) VALUES(?,?,?)";
    // Initialize Database Connection
    $stmt = mysqli_stmt_init($connectDB);
    // Prepare SQL statement
    mysqli_stmt_prepare($stmt, $sql);
    // Bind parameters to the placeholder
    mysqli_stmt_bind_param($stmt, "sss", $origin, $destination, $rate);
    // Execute statement
    if (mysqli_stmt_execute($stmt)) {
        $title = ucwords('shipping rate');
        $_SESSION['successmessage'] =  "$title added successfully";
        header("Location: ../../secure/shipping");
    } else {
        $_SESSION['errormessage'] =  "Something went wrong";
        header("Location: ../../secure/shipping");
    }
} elseif (isset($_POST['updateShipping'])) {
  
    $sid = $_POST['id'];
    $origin = $_POST['origin'];
    $destination = $_POST['destination'];
    $rate = $_POST['rate'];

    function updateDetails($check, $connnection, $column, $value, $id)
    {
        if (!empty($check)) {
            $sql = "UPDATE shipping_rate SET $column = '$value' WHERE id = '$id'";
            $query = mysqli_query($connnection, $sql);
            if ($query) {
                $_SESSION['successmessage'] =  "Updated successfully";
                header("Location: ../../secure/shipping");
            } else {
                $_SESSION['errormessage'] =  "Something went wrong";
                header("Location: ../../secure/shipping");
            }
        } else {
            header("Location: ../../secure/shipping");
        }
    }
    
    // origin
    updateDetails($origin, $connectDB, 'origin', $origin, $sid);
    // destination
    updateDetails($destination, $connectDB, 'destination', $destination, $sid);
    // rate
    updateDetails($rate, $connectDB, 'rate', $rate, $sid);
}

if(isset($_POST["id"]))  
 {  
      $query = "SELECT * FROM shipping_rate WHERE id = '".$_POST["id"]."'";  
      $result = mysqli_query($connectDB, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
