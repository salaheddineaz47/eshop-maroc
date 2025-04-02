<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Promotion;
use Illuminate\Http\Request;

class HomeController extends Controller
{

        public function index()
        {
            $featuredProducts = Product::where('is_featured', true)
                                      ->take(6)
                                      ->get();

            $promotions = Promotion::where('active', true)
                                  ->whereDate('start_date', '<=', now())
                                  ->whereDate('end_date', '>=', now())
                                  ->orderBy('discount_percentage', 'desc')
                                  ->take(3)
                                  ->get();

            return view('home', compact('featuredProducts', 'promotions'));
        }

}
