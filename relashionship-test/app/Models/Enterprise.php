<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enterprise extends Model
{
    protected $table = "enterprise_tbl";
    protected $fillable = array( "trade_name", "cnpj" );

    public function product() {
        return $this->belongsTo(
            Post::class,
            "post_id",
            "id"
        );
    }
}
