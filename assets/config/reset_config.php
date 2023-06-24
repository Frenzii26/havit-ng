<?php
    include_once 'db_con.php';
    include "../includes/sessions.php";

    if (isset($_POST['sendMail'])) {
        $email = $_POST['email'];    

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $_SESSION['errormessage'] =  "Invalid Email!";
            header("Location: ../../reset-password");
        }else{
            $sql = "SELECT email FROM users WHERE email = ?";
            $stmt = mysqli_stmt_init($connectDB);
            mysqli_stmt_prepare($stmt,$sql);
            mysqli_stmt_bind_param($stmt,"s",$email);
            $execute = mysqli_stmt_execute($stmt);
    
    
            $result = mysqli_stmt_get_result($stmt);

            $numRow = mysqli_num_rows($result); 

            if($numRow < 1){
                $_SESSION['errormessage'] =  "This account does not exist!";
                header("Location: ../../reset-password");
            }else{
                $token = rand(10000000,99999999);

                $sql = "UPDATE users SET reset_token = '$token' WHERE email = '$email'";
                $query = mysqli_query($connectDB,$sql);

                if(!$query){
                    $_SESSION['errormessage'] =  "Oops, Something went wrong!";
                    header("Location: ../../reset-password");
                }else{
                    $to = $email;
                    $subject = "Password Reset";
                    $headers = "From: Easy Link <easylinkasaba@gmail.com>";

                    $message = "Please use the one  time password (OTP) to reset your password: \"$token\" ";

                    if(!mail($to,$subject,$message,$headers)){
                        $_SESSION['errormessage'] =  "Oops, Something went wrong!";
                        header("Location: ../../reset-password");
                    }else{
                        $_SESSION['successmessage'] = 'Please check your email for your one time password (OTP).';
                        header('Location: ../../reset');
                    }
                }
            }
        }



    }
    elseif (isset($_POST['reset'] )) {
        $password = $_POST['_password'];
        $token = $_POST['_token'];
 
         $sql = "SELECT * FROM users WHERE reset_token = ?";
         $stmt = mysqli_stmt_init($connectDB);
         mysqli_stmt_prepare($stmt,$sql);
         mysqli_stmt_bind_param($stmt, 's',$token);
         if (!mysqli_stmt_execute($stmt)) {
            $_SESSION['errormessage'] =  "Oops, Something went wrong!";
            header("Location: ../../reset-password");
         }else{
             $result = mysqli_stmt_get_result($stmt);
 
             // Get the number of rows that match the email and check if it is less than 1
             $numRow = mysqli_num_rows($result);
             if ($numRow < 1) {
                $_SESSION['errormessage'] =  "Invalid Token!";
                header("Location: ../../reset");
             }
             elseif(strlen($password) < 8){
                $_SESSION['errormessage'] =  "Password is too short, minimum of 8 characters!";
                header("Location: ../../reset");
             }
             else{
                 // Convert the data to associative array
                 $row = mysqli_fetch_assoc($result);
 
                 $email = $row['email'];
                 // Retrieve the hashed token
                 $hash =password_hash($password, PASSWORD_DEFAULT);

                 $sql = "UPDATE users SET user_password = '$hash', reset_token = null WHERE email = '$email' ";
                 $query = mysqli_query($connectDB,$sql);
 
                 // Verify if the token match
                 if (!$query) {
                    $_SESSION['errormessage'] =  "Oops, Something went wrong!";
                    header("Location: ../../reset-password");
                 }else{
                    $_SESSION['successmessage'] =  "Password Reset Successful!";
                    header("Location: ../../login-signin");
                 }
             }
         }
     }
    else{
        header("Location: ../../index");
    }