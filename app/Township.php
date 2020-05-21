<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\City;
class Township extends Model
{
    
    public function city(){
        return $this->belongsTo(City::class);
    }
}
