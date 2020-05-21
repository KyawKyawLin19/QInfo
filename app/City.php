<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Township;
class City extends Model
{
    //
    public function townships(){
        return $this->hasMany(Township::class,'city_id');
    }
}
