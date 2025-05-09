<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "product_tbl";
    protected $fillable = array( "name", "price", "quantity" );

    public function enterprise() {
        return $this->belongsTo(
            Enterprise::class,
            "enterprise_id",
            "id"
        );
    }
}
