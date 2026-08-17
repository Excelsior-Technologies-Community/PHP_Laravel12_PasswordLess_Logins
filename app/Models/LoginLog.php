<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginLog extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'magic_link_id',
        'email',
        'ip_address',
        'user_agent',
        'status',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function magicLink()
    {
        return $this->belongsTo(MagicLink::class);
    }

    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'success' => 'Successful Login',
            'failed' => 'Failed',
            'expired' => 'Expired Link',
            'already_used' => 'Already Used',
            'invalid' => 'Invalid Link',
            'rate_limited' => 'Rate Limited',
            default => ucfirst(str_replace('_', ' ', $this->status)),
        };
    }
}
