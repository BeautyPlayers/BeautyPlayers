<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerMembership extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'membership',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
