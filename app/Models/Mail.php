<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'sender_id',
        'status',
        'readBy'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'sender_id');
    }
}
