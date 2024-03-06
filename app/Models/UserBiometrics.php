<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_biometrics extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $foreignKey = 'user_id';
    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'passport_photo',
        'signature',

        'right_hand_index',
        'right_hand_middle',
        'right_hand_thumb',
        'right_hand_ring',
        'right_hand_pinky',
        'right_hand_palm',

        'left_hand_index',
        'left_hand_middle',
        'left_hand_thumb',
        'left_hand_ring',
        'left_hand_pinky',
        'left_hand_palm'
    ];
}
