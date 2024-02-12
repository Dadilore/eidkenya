<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $foreignKey = 'user_id';
    public $timestamps = false;

    protected $fillable = [
        'birth_certificate_number',
        'passport_number',
        'parents_id_number',
        'certificate_of_registration_number',
        'birth_certificate',
        'passport_photo',
        'fathers_id_card_front',
        'fathers_id_card_back',
        'mothers_id_card_front',
        'mothers_id_card_back'
    ];
    
}
