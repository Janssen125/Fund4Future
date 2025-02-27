<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'fund_id',
        'comment',
    ];

    public function reply() {
        return $this->hasMany(Reply::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function fund() {
        return $this->belongsTo(Fund::class);
    }
}
