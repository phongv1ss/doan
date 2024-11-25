<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable = [
        'name',
    ];
    protected $table ='districts';
    protected $primaryKey='code';
    public $incrementing= false;

    public function province(){
        return $this->belongsTo(Province::class,'province_code','code');
    }
    public function wards(){
        return $this->hasMany(Ward::class, 'district_code','code');
    }
}
