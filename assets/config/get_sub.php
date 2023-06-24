<?php
    include_once 'db_con.php';
    include "../includes/sessions.php";
        $id = $_GET['sub'];

        $sql = "SELECT sub_id,sub_name FROM sub_categories WHERE cat_id = '$id'";
        $query = mysqli_query($connectDB,$sql);
        $result = array();

        while ($row = mysqli_fetch_assoc($query)) {
            $result[]['res'] = $row['sub_id'].'-'.$row['sub_name'];
        }

        echo json_encode($result);