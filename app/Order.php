<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // relationship one to many
    public function details()
    {
        return $this->hasMany('App\OrderProduct', 'order_id', 'id');
    }
}
