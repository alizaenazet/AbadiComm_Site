<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioPromoter extends Model
{
    use HasFactory, HasUuids;
    
    protected $fillable = [
        'name',
        'portfolio_id'
    ];

    public function portfolio(){
        return $this->belongsTo(Portfolio::class);
    }
}
