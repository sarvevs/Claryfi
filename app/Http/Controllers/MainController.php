<?php

namespace App\Http\Controllers;

use App\TransportCompanies\TransCompany;
use App\TransportCompanies\PackGroup;
use App\Services\ShippingCostCalculator;
use Illuminate\Http\Request;

class MainController
{
    public function index()
    {
        return view('show');
    }

    public function calculateShippingCost(Request $request)
    {
//        $selectedCompany = $request->input('company');
//        $weight = $request->input('weight');
        $selectedCompany = $request['company'];
        $weight = $request['weight'];
        $calculator = new ShippingCostCalculator();

        if ($selectedCompany == 'transcompany') {

            $company = new TransCompany();
        } elseif ($selectedCompany == 'packgroup') {

            $company = new PackGroup();
        }
        $shippingCost = $calculator->calculateCost($company, $weight);
        return response()->json([
            'selectedCompany' => $selectedCompany,
            'shippingCost' => $shippingCost,
        ]);
//        $weight = 150;

//        $costTransComp = $calculator->calculateCost($transCompany, $weight);
//        $costPackGroup = $calculator->calculateCost($packGroup, $weight);

//        dd($shippingCost);
//        return view('show', [
//            'selectedCompany' => $selectedCompany,
//            'shippingCost' => $shippingCost,
//        ]);

    }
}
