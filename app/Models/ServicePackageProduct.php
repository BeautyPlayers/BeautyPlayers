<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;

class ServicePackageProduct extends Model {

    protected $fillable = [
        'service_package_id',
        'product_id',
        'min_qty',
    ];

    public function service_package() {
        return $this->belongsTo(ServicePackage::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }

}
