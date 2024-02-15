<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Birthplaces extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $foreignKey = 'user_id';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'district_of_birth',
        'tribe',
        'clan',
        'family',
        'home_district',
        'division',
        'constituency',
        'location',
        'sub_location',
        'village',
        'home_address'
    ];
}
