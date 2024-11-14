<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index() {

        $plans = $this->getPlans();

        return view('site.index', compact('plans'));
    }


    private function getPlans()
    {
        $plansInfo = [
            [
                'id'=> 1,
                'title' => 'Básico',
                'prices' => [
                    'monthly' => 32.99,
                    'semiannual' => 160,
                    'annual' => 300
                ],
                'description' => 'Saia do caderninho'
            ],
            [
                'id'=> 2,
                'title' => 'Premium',
                'prices' => [
                    'monthly' => 54.55,
                    'semiannual' => 270,
                    'annual' => 500
                ],
                'description' => 'Saia do caderninho'
            ],
            [
                'id'=> 3,
                'title' => 'Profissional',
                'prices' => [
                    'monthly' => 89.00,
                    'semiannual' => 450,
                    'annual' => 800
                ],
                'description' => 'Para quem precisa de mais'
            ],
            [
                'id'=> 4,
                'title' => 'Corporativo',
                'prices' => [
                    'monthly' => 110.00,
                    'semiannual' => 550,
                    'annual' => 1000
                ],
                'description' => 'Para empresas grandes'
            ]
        ];

        return $plansInfo;
    }
}
