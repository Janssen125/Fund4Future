<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageAnalytics extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ip_address',
        'page_url',
        'user_agent',
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
