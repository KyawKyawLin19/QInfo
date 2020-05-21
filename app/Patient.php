<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Center;

class Patient extends Model
{
    protected $guarded = [];
    protected $table = "patients";
    public function center()
    {
        return $this->belongsTo(Center::class,'center_id');
    }

}
