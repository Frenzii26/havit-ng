<?php
include_once 'db_con.php';
include "../includes/sessions.php";
date_default_timezone_set("Africa/Lagos");
if (isset($_POST['updateDetails'])) {
    function update($value, $column, $connection, $id){
        if (!empty($value)) {
            $sql = "UPDATE users SET $column = '$value' WHERE _id = '$id'";
            $query = mysqli_query($connection, $sql);
            if ($query) {
                $_SESSION['successmessage'] =  "Changes has been Saved";
                header("Location: ../../profile");
            } else {
                $_SESSION['errormessage'] =  "Something went wrong";
                header("Location: ../../profile");
            }
        } else {
            header('Location: ../../profile');
        }
    }
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $oldPass = $_POST['curPass'];
    $newPass = $_POST['newPass'];
    $conPass = $_POST['conPass'];



    if (!empty($oldPass) && !empty($newPass) && !empty($conPass)) {
        $id = $_SESSION['id'];
        $sql = "SELECT * FROM users WHERE _id = '$id'";
        $query = mysqli_query($connectDB,$sql);
        $row = mysqli_fetch_assoc($query);
        $return = $row['user_password'];

        if (password_verify($oldPass, $return)) {
            if ($newPass != $conPass) {
                $_SESSION['errormessage'] =  "Your new passwords do not match";
                header("Location: ../../profile");
            }else{
                if (strlen($newPass) < 8) {
                    $_SESSION['errormessage'] =  "Password must be a minimum of eight characters";
                    header("Location: ../../profile");
                }else{
                    $hash = password_hash($newPass, PASSWORD_DEFAULT);
                    $sql = "UPDATE users SET user_password = '$hash' WHERE _id = '$id'";
                    $query = mysqli_query($connectDB, $sql);
                    if ($query) {
                        $_SESSION['successmessage'] =  "Password Update Successfull";
                        header("Location: ../../profile");
                    } else {
                        $_SESSION['errormessage'] =  "Something went wrong";
                        header("Location: ../../profile");
                    }
                }
            }
        }else{
            $_SESSION['errormessage'] =  "Your Current Password is not correct";
            header("Location: ../../profile");
        }
    }else{
        header('Location: ../../profile');
    }

    update($name,"full_name",$connectDB,$_SESSION['id']);
    update($phone,"phone",$connectDB,$_SESSION['id']);
} else {
    header('logout');
}
