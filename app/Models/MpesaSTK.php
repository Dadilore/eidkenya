<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MpesaSTK extends Model
{
    public function application()
    {
        return $this->belongsTo(Applications::class, 'applications_id');
    }
    
    use HasFactory;

    protected $guarded = [];
    protected $table = 'mpesa_s_t_k_s';
    protected $primaryKey = 'id';
    protected $foreignKey = 'user_id';

    protected $fillable = [
        'user_id',
        'applications_id',
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
