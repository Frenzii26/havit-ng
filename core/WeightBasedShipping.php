<?php

namespace Geevic;

use Exception;

class WeightBasedShipping
{
    public static function calculateShippingCost($item)
    {
        global $connectDB;

        $product_id = is_array($item) ? $item["product_id"] : $item;
        
        $sql = "SELECT * FROM tbl_products WHERE product_id = '$product_id'";

        $product = mysqli_query($connectDB, $sql);

        $row = mysqli_fetch_assoc($product);
        
        $weight = $row['weight'];

        if ($weight <= 0) {
            throw new Exception("Invalid weight");
        }

        if ($weight <= 10) {
            return 1.0;
        } elseif ($weight <= 20) {
            return 2.0;
        } elseif ($weight <= 30) {
            return 3.0;
        } else {
            return 5.00;
        }
    }
}
