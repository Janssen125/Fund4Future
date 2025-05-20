<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'chat_id',
        'sender_id',
        'message',
        'type',
        'created_at',
        'attachment',
        'attachment_type',
        'attachment_size',
        'attachment_name',
    ];
}
