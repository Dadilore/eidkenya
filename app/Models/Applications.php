<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applications extends Model
{
    public function application()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }
    
    public function appointments()
    {
        return $this->hasMany(Appointments::class, 'applications_id');
    }

    public function mpesaSTKs()
    {
        return $this->hasMany(MpesaSTK::class, 'applications_id');
    }


    use HasFactory;
    protected $primaryKey = 'id';
    protected $foreignKey = 'user_id';
    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'application_type',
        'application_status'
    ];
}
