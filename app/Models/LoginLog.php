<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'cretated_at',
    ];
    protected $casts = [
        'created_at' => 'datetime',
    ];

    /**
     * User associated with this login attempt.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Magic link associated with this login attempt.
     */
    public function magicLink()
    {
        return $this->belongsTo(MagicLink::class);
    }
}
    