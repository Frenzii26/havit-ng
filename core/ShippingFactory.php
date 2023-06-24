<?php

namespace Geevic;

use Exception;

class ShippingFactory
{
    public static function create($type, $params)
    {
        switch ($type) {
            case 'zone':
                return new ZoneBasedShipping($params['zone'], $params['distance']);
                break;
            case 'weight':
                return new WeightBasedShipping($params['weight']);
                break;
            case 'real_time':
                return new RealTimeShipping();
                break;
            case 'flat_rate':
                return new FlatRateShipping($params['rate']);
                break;
            default:
                throw new Exception("Invalid shipping type");
        }
    }
}
