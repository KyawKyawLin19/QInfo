<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Patient;
use App\Volunteer;
use App\Township;

class Center extends Model
{
    protected $guarded = [];
    protected $table = "centers";

    public function patients()
    {
        return $this->hasMany(Patient::class);
    }

    public function volunteers()
    {
        return $this->hasMany(Volunteer::class);
    }

    public function township(){
        return $this->belongsTo(Township::class);
    }
}
