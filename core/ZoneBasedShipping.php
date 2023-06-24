<?php

namespace Geevic;

use Exception;

class ZoneBasedShipping
{
    private $zone;
    private $distance;

    public function __construct($zone, $distance)
    {
        $this->zone = $zone;
        $this->distance = $distance;
    }

    public function calculateShippingCost()
    {
        if ($this->distance <= 0) {
            throw new Exception("Invalid distance");
        }

        if ($this->zone == 1) {
            return $this->distance * 0.5;
        } elseif ($this->zone == 2) {
            return $this->distance * 0.7;
        } else {
            return $this->distance * 0.9;
        }
    }
}
