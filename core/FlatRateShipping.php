<?php

namespace Geevic;

class FlatRateShipping
{
    // Function to fetch the shipping cost array from the database
    public static function calculateShippingCost($userDestination)
    {
        global $connectDB;

        $shippingCosts = array();

        // Execute a query to retrieve the shipping cost data
        $query = "SELECT origin, destination, rate FROM shipping_rate";
        $result = $connectDB->query($query);

        // Check if the query executed successfully
        if ($result) {
            // Fetch the rows from the result set and build the shipping cost array
            while ($row = $result->fetch_assoc()) {
                $origin = $row['origin'];
                $destination = $row['destination'];
                $rate = $row['rate'];
                $shippingCosts[$destination] = array("origin" => $origin, "rate" => $rate);
            }

            // Free the result set
            $result->free();
        }

        if (array_key_exists($userDestination, $shippingCosts)) {
            $origin = $shippingCosts[$userDestination]["origin"];
            $rate = $shippingCosts[$userDestination]["rate"];
            return $rate;
            
        } else {
            
            return 10; // to be changed later;
        }
    }
}
