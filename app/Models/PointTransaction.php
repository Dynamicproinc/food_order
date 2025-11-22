<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Livewire\WithPagination;

class PointTransaction extends Model
{
    use WithPagination;
    
    protected $fillable = [
        'user_id',
        'type',
        'amount',
        'currency',
        'status',
        'reference_id',
        'description',
        'metadata',
        'issued_by',
    ];

    // Cast metadata to array automatically
    protected $casts = [
        'metadata' => 'array',
        'amount' => 'decimal:2',
    ];

    /**
     * Relationship: Transaction belongs to a User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Create a credit transaction
     */
    public static function credit($userId, $amount, $description = null, $metadata = [])
    {
        return self::create([
            'user_id' => $userId,
            'issued_by'=> auth()->id(),
            'type' => 'credit',
            'amount' => $amount,
            'status' => 'completed',
            'description' => $description,
            'metadata' => $metadata,
        ]);
    }

    /**
     * Create a debit transaction
     */
    public static function debit($userId, $amount, $description = null, $metadata = [])
    {
        return self::create([
            'user_id' => $userId,
            'issued_by'=> auth()->id(),
            'type' => 'debit',
            'amount' => $amount,
            'status' => 'completed',
            'description' => $description,
            'metadata' => $metadata,
        ]);
    }

    /**
     * Transfer amount between two users
     */
    public static function transfer($fromUserId, $toUserId, $amount, $description = null)
    {
        // Debit from sender
        $debit = self::debit($fromUserId, $amount, $description, ['to_user_id' => $toUserId]);

        // Credit to receiver
        $credit = self::credit($toUserId, $amount, $description, ['from_user_id' => $fromUserId]);

        return ['debit' => $debit, 'credit' => $credit];
    }
}
