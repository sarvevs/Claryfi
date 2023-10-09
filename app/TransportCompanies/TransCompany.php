<?php

namespace App\TransportCompanies;

class TransCompany extends TransportCompany
{
    public function calculateShippingCost($weight)
    {
        if ($weight <= 10) {
            return $weight * 20 . ' EUR';
        } else {
            return $weight * 100 . ' EUR';
        }
    }
}
