<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\ModelNotFoundException;
use InvalidArgumentException;

class UserPointTotal extends Model
{
    //
    protected $fillable = [
        'user_id',
        'balance',


    ];


//  use Illuminate\Database\Eloquent\ModelNotFoundException;
// use InvalidArgumentException;

public static function updateBalance($user_id, $amount)
{
    // Ensure amount is numeric
    if (!is_numeric($amount)) {
        throw new InvalidArgumentException('Amount must be a numeric value.');
    }

    // Find the user or throw exception
    $user = self::find($user_id);
    if (!$user) {
        throw new ModelNotFoundException("User with ID {$user_id} not found.");
    }

    // Check if deduction would make balance negative
    if ($amount < 0 && $user->balance + $amount < 0) {
        throw new InvalidArgumentException('Insufficient balance.');
    }

    // Update balance
    $user->balance += $amount;

    // Save or throw exception on failure
    if (!$user->save()) {
        throw new \Exception('Failed to update balance.');
    }

    return true; // success
}


}
