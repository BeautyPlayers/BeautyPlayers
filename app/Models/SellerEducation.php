<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerEducation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'degree',
        'college',
        'year',
        'photo',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
