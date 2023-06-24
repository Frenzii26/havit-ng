<?php

if(isset($_POST['btn-send'])) 
{
    $username = $_POST['uName'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $msg = $_POST['msg'];

    if(empty($username) || empty($email) || empty($subject) || empty($msg))
    {
        header('location:contact.php?error');
    }
    else 
    {
        $to = "Geevichfoods@gmail.com";

        if (mail($to,$subject,$msg,$email)) 
        {
            header("location:contact.php?success");
        }
    }
}
else 
{
    header("location:index.php");
}


// if (isset($_POST['submit'])) {
//     $name = $_POST['name'];
//     $subject = $_POST['subject'];
//     $mailFrom = $_POST['mail'];
//     $message = $_POST['message'];

//     $mailTo = "codeboat26@gmail.com";
//     $headers = "From: ".$mailFrom;
//     $txt = "You have recieved an email from ".$name.".\n\n".$message;

//     mail($mailTo, $subject, $txt, $headers);
//     if () {
//         $_SESSION['successmessage'] =  "Your Email has been sent, Thanks for your feedback.";
//         header("Location: ../../contact.php");
//     }else{
//      $_SESSION['errormessage'] =  "Something went wrong";
//      header("Location: ../../contact.php");
// }
// }
?>