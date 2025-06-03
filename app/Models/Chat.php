<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;
    protected $fillable = [
        'fund_id',
        'staff_id',
        'funder_id',
        'status',
        'created_at',
    ];

    public function chatDetails()
    {
        return $this->hasMany(ChatDetail::class);
    }

    public function funder()
    {
        return $this->belongsTo(User::class, 'funder_id');
    }

    public function staff()
    {
        return $this->belongsTo(User::class, 'staff_id');
    }

    public function fund()
    {
        return $this->belongsTo(Fund::class);
    }
}
