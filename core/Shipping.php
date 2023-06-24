<?php

namespace Geevic;

// require "RealTimeShipping.php";
// require "WeightBasedShipping.php";
// require "FlatRateShipping.php";

class Shipping
{
    private $total_cost = 0;
    public $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    // public function calculateRate($weight, $price, $origin, $destination, $num_products)
    public function calculateRate($item, $destination)
    {
        // calculate the base shipping cost based on weight and destination
        $DestinationCost = RealTimeShipping::calculateShippingCost($item);

        $flatWeight = FlatRateShipping::calculateShippingCost($destination);

        $this->total_cost = $flatWeight + $DestinationCost;

        return number_format($this->total_cost);
    }

    public function calculateLocation($location)
    {
        $newfee = FlatRateShipping::calculateShippingCost($location);
        return $this->total_cost + $newfee;
    }
}
