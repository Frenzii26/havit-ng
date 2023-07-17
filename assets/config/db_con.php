<?php
#Online Connection
// $host = "localhost";
// $user = "cipinnac_cipinnac";
// $userPassword = "~RdiJPF0s8bX";
// $dbName = "cipinnac_pinacle";

#Local Connection
$host = "localhost";
$user = "root";
$userPassword = "";
$dbName = "havit";

$connectDB = mysqli_connect($host, $user, $userPassword, $dbName);

if (!$connectDB) {
    die("Something went wrong" . mysqli_connect_error());
}
    // Ifre