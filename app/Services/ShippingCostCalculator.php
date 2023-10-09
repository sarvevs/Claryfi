<?php

namespace App\Services;
use App\TransportCompanies\TransportCompany;
class ShippingCostCalculator
{
    public function calculateCost(TransportCompany $transportCompany, $weight)
    {
        return $transportCompany->calculateShippingCost($weight);
    }
}
