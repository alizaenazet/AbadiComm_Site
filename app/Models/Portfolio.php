<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\PortfolioImage;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Portfolio extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'title',
        'content',
        'promoter',
        'date'
    ];

    public function portfolioImage(){
        return $this->hasMany(PortfolioImage::class);
    }

    public function categories():BelongsToMany{
        return $this->belongsToMany(Category::class);
    }

    public function year(){
        return date('Y', strtotime($this->date));
    }

}
