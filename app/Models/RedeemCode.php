<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RedeemCode extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'booth_id', 'code'];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function booth()
    {
        return $this->hasOne(Booth::class, 'id', 'booth_id');
    }
}
