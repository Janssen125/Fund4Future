<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'nik',
        'ktpImg'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function mails() {
        return $this->hasMany(Mail::class);
    }

    public function fundHistory() {
        return $this->hasMany(FundHistory::class);
    }

    public function fund() {
        return $this->hasMany(Fund::class);
    }

    public function comment() {
        return $this->hasMany(Comment::class);
    }

    public function reply() {
        return $this->hasMany(Reply::class);
    }

    public function topup() {
        return $this->hasMany(TopUpTransaction::class);
    }
}
