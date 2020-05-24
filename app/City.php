<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Township;
class City extends Model
{
    protected $fillable = ['name'];
    //
    public function townships(){
        return $this->hasMany(Township::class,'city_id');
    }
}
