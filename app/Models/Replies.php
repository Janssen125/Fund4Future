<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Replies extends Model
{
    use HasFactory;

    protected $fillable = [
        'comments_id',
        'user_id',
        'replyText',
    ];

    public function comment() {
        return $this->belongsTo(Comments::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
