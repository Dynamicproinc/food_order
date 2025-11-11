<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SSENotification extends Model
{
    protected $table = 's_s_e_notifications';

    protected $fillable = [
        'user_id',
        'message',
        'read',
    ];

    protected $casts = [
        'read' => 'boolean',
    ];
}
