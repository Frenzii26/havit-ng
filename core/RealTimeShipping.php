<?php
namespace Geevic;

class RealTimeShipping
{
    public static function calculateShippingCost($item)
    {
        global $connectDB;

        $product_id = is_array($item) ? $item["product_id"] : $item;

        $sql = "SELECT * FROM tbl_products WHERE product_id = '$product_id'";

        $product = mysqli_query($connectDB, $sql);

        $row = mysqli_fetch_assoc($product);

        $weight = WeightBasedShipping::calculateShippingCost($item);

        $price = $row['price'] ;

        return (($price * $weight) / 100) * 0.05;
    }
}
