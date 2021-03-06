<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Center;

class Volunteer extends Model
{
    protected $guarded = [];
    public function center(){
        return $this->belongsTo(Center::class,'center_id');
    }
}
