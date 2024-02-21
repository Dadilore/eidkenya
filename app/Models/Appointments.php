<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $foreignKey = 'user_id';
    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'appointment_date',
        'appointment_time',
        'appointment_venue',
        'status'
    ];
}
