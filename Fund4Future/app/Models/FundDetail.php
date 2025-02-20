<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FundDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'fund_id',
        'types',
        'imageOrVideo'
    ];
}
