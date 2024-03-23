<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Models\SubCounty;

class County extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'code',
        'capital',

    ];

    public function subcounty(): HasMany
    {
        return $this->hasMany(SubCounty::class);
    }
}
