<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPointTotal extends Model
{
    //
    protected $fillable = [
        'user_id',
        'balance',


    ];


  public static function updateBalance($user_id, $amount)
{
    // Ensure amount is numeric
    if (!is_numeric($amount)) {
        return false; // or throw an exception
    }

    // Find the user
    $user = self::find($user_id);
    if (!$user) {
        return false; // or throw an exception
    }

    // Check if deduction would make balance negative
    if ($amount < 0 && $user->balance + $amount < 0) {
        return false; // insufficient balance
    }

    // Update balance
    $user->balance += $amount;

    // Save and return result
    return $user->save();
}

}
