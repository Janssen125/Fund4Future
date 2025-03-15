<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FundHistory extends Model
{
    use HasFactory;
    protected $fillable = [
        'fund_id',
        'amount',
        'funder_id'
    ];

    public function fund() {
        return $this->belongsTo(Fund::class);
    }

    public function funder() {
        return $this->belongsTo(User::class, 'funder_id');
    }
}
