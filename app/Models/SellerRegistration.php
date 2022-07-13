<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'registration',
        'year',
        'photo'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
