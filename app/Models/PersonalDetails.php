<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalDetails extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $foreignKey = 'user_id';
    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'applications_id',
        'surname',
        'name',
        'middle_name',
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
