<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class BudgetController extends Controller
{
    public function index(): View
    {
        $comparisons = [
            ['country' => 'USA', 'cost_mad' => 450000, 'flag' => '🇺🇸', 'highlight' => false],
            ['country' => 'UK', 'cost_mad' => 280000, 'flag' => '🇬🇧', 'highlight' => false],
            ['country' => 'France', 'cost_mad' => 150000, 'flag' => '🇫🇷', 'highlight' => false],
            ['country' => 'China', 'cost_mad' => 30000, 'flag' => '🇨🇳', 'highlight' => true],
        ];

        return view('pages.budget', compact('comparisons'));
    }
}
