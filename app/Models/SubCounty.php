<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\County;

class SubCounty extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'county_id',        
    ];

    public function county(): BelongsTo
    {
        return $this->belongsTo(County::class);
    }
}
