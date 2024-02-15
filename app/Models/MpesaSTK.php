<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MpesaSTK extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'mpesa_s_t_k_s';
    protected $primaryKey = 'id';
    protected $foreignKey = 'user_id';

    protected $fillable = [
        'user_id',
        'result_desc',
        'result_code',
        'merchant_request_id',
        'checkout_request_id',
        'amount',
        'mpesa_receipt_number',
        'transaction_date',
        'phonenumber'
    ];
}