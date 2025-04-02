<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PromotionController extends Controller
{
    /**
     * Display the specified promotion.
     */
    public function show($id)
    {
        $promotion = Promotion::findOrFail($id);
        $products = $promotion->products()->paginate(12);

        return view('promotions.show', compact('promotion', 'products'));
    }
}
