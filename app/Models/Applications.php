<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applications extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $foreignKey = 'user_id';
    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'personal_details_id',
        'birthplaces_id',
        'documents_id',
        'application_status'
    ];
}
