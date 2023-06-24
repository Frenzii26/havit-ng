<?php
    include_once 'db_con.php';
    include "../includes/sessions.php";
    date_default_timezone_set("Africa/Lagos");

    if (isset($_POST['newCat'])) {
        $cid = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
        $cid = str_shuffle($cid);
        $cid = substr($cid, 3, 13);
        $title = strtolower($_POST['name']);
        $file = $_FILES['file'];
        $date = date("Y-m-d h:i:s a");

         // Get all the values from the file associative array
         $fileName = $file['name'];
         $fileSize = $file['size'];
         $fileError = $file['error'];
         $fileTempLoc = $file['tmp_name'];
 
         $fileExt = explode('.',$fileName);
         $fileActualExt = strtolower(end($fileExt));
 
         // Files that would be allowed
         $allowed = array('jpg','png','jpeg','tiff','swf','jpeg2000');
 
         // Check if the file extension is allowed
         if (in_array($fileActualExt,$allowed)) {
             // check the file size
             if ($fileSize < 10000000) {
             //  check for errors
                 if ($fileError === 0) {
                     // Create a new name for our file
                     $fileNewName = str_replace(' ', '', $cid).".".$fileActualExt;
                     $location = "../img/category/";
                     $move = move_uploaded_file($fileTempLoc,$location.$fileNewName);
                     if ($move) {

                        $sql = "INSERT INTO categories(cat_id,category_name,category_image,date_created) VALUES(?,?,?,?)";
                            // Initialize Database Connection
                            $stmt = mysqli_stmt_init($connectDB);
                            // Prepare SQL statement
                            mysqli_stmt_prepare($stmt,$sql);
                            // Bind parameters to the placeholder
                            mysqli_stmt_bind_param($stmt,"ssss",$cid,$title,$fileNewName,$date);
                            // Execute statement
                        if (mysqli_stmt_execute($stmt)) {
                            $_SESSION['successmessage'] =  "Category added successfully";
                            header("Location: ../../secure/category");
                        }else{
                                $_SESSION['errormessage'] =  "Something went wrong";
                                header("Location: ../../secure/category");
                        }
                     }else{
                         $_SESSION['errormessage'] =  "Something went wrong";
                         header("Location: ../../secure/category");
                     }
                 }else{
                     $_SESSION['errormessage'] =  "There is an error with your file";
                     header("Location: ../../secure/category");
                 }
             }else{
                 $_SESSION['errormessage'] =  "This file is too large";
                 header("Location: ../../secure/category");
             }
         }else{
             $_SESSION['errormessage'] =  "Please upload a file that is either jpg,png or jpeg";
             header("Location: ../../secure/category");
         }
    }
    elseif(isset($_POST['updateCat'])){
       $id = $_POST['id'];
       $title = $_POST['name'];
       $title = addslashes($title);
       $file = $_FILES['file'];
       
       if (!empty($title)) {
          $sql = "UPDATE categories SET category_name='$title' WHERE cat_id = '$id'";
          $query = mysqli_query($connectDB,$sql);
          if ($query) {
            $_SESSION['successmessage'] =  "Category updated successfully";
            header("Location: ../../secure/category-details?q=$id");
          }else{
            $_SESSION['errormessage'] =  "Something went wrong";
            header("Location: ../../secure/category-details?q=$id");
          }
       }

       if ($file['name'] != '') {
        // Get all the values from the file associative array
         $fileName = $file['name'];
         $fileSize = $file['size'];
         $fileError = $file['error'];
         $fileTempLoc = $file['tmp_name'];
 
         $fileExt = explode('.',$fileName);
         $fileActualExt = strtolower(end($fileExt));
 
         // Files that would be allowed
         $allowed = array('jpg','png','jpeg','tiff','swf','jpeg2000');
 
         // Check if the file extension is allowed
         if (in_array($fileActualExt,$allowed)) {
             // check the file size
             if ($fileSize < 10000000) {
             //  check for errors
                 if ($fileError === 0) {
                     // Create a new name for our file
                     $fileNewName = str_replace(' ', '', $id).".".$fileActualExt;
                     $location = "../img/category/";
                     if (file_exists($location.$fileNewName)) {
                         unlink($location.$fileNewName);
                        $move = move_uploaded_file($fileTempLoc,$location.$fileNewName);
                        if ($move) {
                        
                            $sql = "UPDATE categories SET category_image='$fileNewName' WHERE cat_id = '$id'";
                            $query = mysqli_query($connectDB,$sql);
                            if ($query) {
                              $_SESSION['successmessage'] =  "Category updated successfully";
                              header("Location: ../../secure/category-details?q=$id");
                            }else{
                              $_SESSION['errormessage'] =  "Something went wrong";
                              //header("Location: ../../secure/category-details?q=$id");
                            }
                        }
                        else{
                            $_SESSION['errormessage'] =  "Something went wrong";
                           header("Location: ../../secure/category-details?q=$id");
                        }
                        
                    }else{
                        $move = move_uploaded_file($fileTempLoc,$location.$fileNewName);
                        if ($move) {
                        
                            $sql = "UPDATE categories SET category_image='$fileNewName' WHERE cat_id = '$id'";
                            $query = mysqli_query($connectDB,$sql);
                            if ($query) {
                              $_SESSION['successmessage'] =  "Category updated successfully";
                              header("Location: ../../secure/category-details?q=$id");
                            }else{
                              $_SESSION['errormessage'] =  "Something went wrong";
                              //header("Location: ../../secure/category-details?q=$id");
                            }
                        }
                        else{
                            $_SESSION['errormessage'] =  "Something went wrong";
                           header("Location: ../../secure/category-details?q=$id");
                        }
                    }
                    
                 }else{
                     $_SESSION['errormessage'] =  "There is an error with your file";
                    header("Location: ../../secure/category-details?q=$id");
                 }
             }else{
                 $_SESSION['errormessage'] =  "This file is too large";
                 header("Location: ../../secure/category-details?q=$id");
             }
         }else{
             $_SESSION['errormessage'] =  "Please upload a file that is either jpg,png or jpeg";
             header("Location: ../../secure/category-details?q=$id");
         }
        }
    }

    elseif (isset($_GET['del'])) {
        $pid = $_GET["del"];
        $fileName = $_GET['q'];

        $sql = "DELETE FROM categories WHERE cat_id='$pid'";
        $query = mysqli_query($connectDB,$sql);

        if ($query) {
            unlink('../img/category/'.$fileName);
            $_SESSION['successmessage'] =  "Category Deleted successfully";
            header("Location: ../../secure/dashboard");
        }else{
            $_SESSION['errormessage'] =  "Something went wrong";
            header("Location: ../../secure/dashboard");
        }
    }
    elseif (isset($_POST['newSubCat'])) {
        $sid = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
        $sid = str_shuffle($sid);
        $sid = substr($sid, 3, 13);
        $cid = $_POST['cid'];
        $name = $_POST['name'];
        $date = date("Y-m-d h:i:s a");
        $sql = "INSERT INTO sub_categories(sub_id,cat_id,sub_name,date_created) VALUES(?,?,?,?)";
        // Initialize Database Connection
        $stmt = mysqli_stmt_init($connectDB);
        // Prepare SQL statement
        mysqli_stmt_prepare($stmt,$sql);
        // Bind parameters to the placeholder
        mysqli_stmt_bind_param($stmt,"ssss",$sid,$cid,$name,$date);
        // Execute statement
        if (mysqli_stmt_execute($stmt)) {
            $name = ucwords($name);
            $_SESSION['successmessage'] =  "$name sub-category has been created";
            header("Location: ../../secure/category-details?q=$cid");
        }else{
            $_SESSION['errormessage'] =  "Something went wrong";
            //header("Location: ../../secure/category-details?q=$cid");
        }
    }
    elseif(isset($_POST['updateSubCat'])){
        $id = $_POST['id'];
        $sid = $_POST['sid'];
        $title = $_POST['name'];
        $title = addslashes($title);
        
        if (!empty($title)) {
           $sql = "UPDATE sub_categories SET sub_name='$title' WHERE sub_id = '$sid'";
           $query = mysqli_query($connectDB,$sql);
           if ($query) {
             $_SESSION['successmessage'] =  "Category updated successfully";
             header("Location: ../../secure/category-details?q=$id");
           }else{
             $_SESSION['errormessage'] =  "Something went wrong";
             header("Location: ../../secure/category-details?q=$id");
           }
        }
    }
    elseif (isset($_GET['del'])) {
        $pid = $_GET["del"];
        $fileName = $_GET['q'];

        $sql = "DELETE FROM sub_categories WHERE sub_id='$pid'";
        $query = mysqli_query($connectDB,$sql);

        if ($query) {
            
            $_SESSION['successmessage'] =  "Category Deleted successfully";
            header("Location: ../../secure/dashboard");
        }else{
            $_SESSION['errormessage'] =  "Something went wrong";
            header("Location: ../../secure/dashboard");
        }
    }

    // Main Else 
    else{
        header('Location:logout');
    }