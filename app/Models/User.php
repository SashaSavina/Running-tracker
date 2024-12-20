<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str; //для генерации токенов
use Carbon\Carbon; //для работы со временем

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'password_reset_token',
        'password_reset_expires_at',
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

    public function generatePasswordResetToken() {
        $this->password_reset_token = Str::random(60);
        $this->password_reset_expires_at = Carbon::now()->addMinutes(30); // Токен действителен 30 минут
        $this->save();
        return $this->password_reset_token;
    }


    public function hasValidPasswordResetToken($token) {
        return $this->password_reset_token === $token && $this->password_reset_expires_at->gt(Carbon::now());
    }

    public function clearPasswordResetToken() {
        $this->password_reset_token = null;
        $this->password_reset_expires_at = null;
        $this->save();
    }
}
