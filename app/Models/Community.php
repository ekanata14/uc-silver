<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Community extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'image',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'id_community');
    }

    public function bankAccount()
    {
        return $this->hasOne(BankAccount::class, 'community_id');
    }
}
