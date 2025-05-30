<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fund extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'owner_id',
        'category_id',
        'currAmount',
        'targetAmount',
        'approvalStatus',
        'approvedOrDeclinedBy'
    ];

    public function fundHistory() {
        return $this->hasMany(FundHistory::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function fundDetail() {
        return $this->hasMany(FundDetail::class);
    }

    public function comment() {
        return $this->hasMany(Comments::class);
    }

    public function owner() {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function chat() {
        return $this->hasOne(Chat::class, 'fund_id');
    }
}
