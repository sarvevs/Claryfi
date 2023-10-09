<?php

namespace App\TransportCompanies;

abstract class TransportCompany
{
    abstract public function calculateShippingCost($weight);
}
