<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopUpTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_id',
        'gross_amount',
        'status',
        'status_code',
        'transaction_id',
        'fraud_status',
        'payment_type',
        'transaction_time',
        'finish_redirect_url',
    ];

    public function users() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
