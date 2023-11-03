<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
<<<<<<< Updated upstream
use App\Models\Devision;
=======
use App\Models\Division;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
>>>>>>> Stashed changes

class TeamMember extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'name',
        'image_url',
        'qualification',
        'division_id'
    ];

<<<<<<< Updated upstream
=======
    public function division(){
        return $this->belongsTo(Division::class);
    }

>>>>>>> Stashed changes
}
