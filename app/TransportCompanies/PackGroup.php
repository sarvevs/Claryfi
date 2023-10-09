<?php

namespace App\TransportCompanies;

class PackGroup extends TransportCompany
{
    public function calculateShippingCost($weight)
    {
        return $weight . ' EUR';
    }
}
