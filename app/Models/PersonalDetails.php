<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalDetails extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $foreignKey = 'user_id';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'full_names',
        'date_of_birth',
        'gender',
        'fathers_name',
        'mothers_name',
        'marital_status',
        'husbands_names',
        'husbands_id_number',
        'occupation',
        'telephone_number',
        'email'
    ];
}
