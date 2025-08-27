<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    protected $fillable = [
        'community_id',
        'account_number',
        'account_name',
        'bank_name',
        'bank_code',
    ];

    public function community()
    {
        return $this->belongsTo(Community::class);
    }
}
