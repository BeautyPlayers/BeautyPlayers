<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;

class ServicePackage extends Model {

    protected $fillable = [
        'name',
        'type',
        'user_id',
        'validity',
        'cost_price',
        'special_price',
        'status',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function servicePackageProducts(){
        return $this->hasMany(ServicePackageProduct::class);
    }

}
