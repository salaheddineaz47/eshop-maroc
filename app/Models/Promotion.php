<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'discount_percentage',
        'active',
        'start_date',
        'end_date'
    ];

    /**
     * Get the products associated with the promotion.
     */
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
