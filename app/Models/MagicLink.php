<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class MagicLink extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'token',
        'expires_at',
        'used'
    ];

    protected $casts = [
        'expires_at' => 'datetime',
        'used' => 'boolean'
    ];

    public static function generateToken($email)
    {
        return self::create([
            'email' => $email,
            'token' => Str::random(64),
            'expires_at' => now()->addMinutes(30),
            'used' => false
        ]);
    }

    public function isValid()
    {
        return !$this->used && $this->expires_at->isFuture();
    }
}