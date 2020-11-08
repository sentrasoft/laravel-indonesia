<?php

namespace Sentrasoft\Indonesia\Models;

class District extends Model
{
    protected $table = 'districts';

    protected $casts = [
        'meta' => 'array',
    ];

    public $timestamps = false;

    public function city()
    {
        return $this->belongsTo('Sentrasoft\Indonesia\Models\City', 'city_id');
    }

    public function villages()
    {
        return $this->hasMany('Sentrasoft\Indonesia\Models\Village', 'district_id');
    }

    public function getCityNameAttribute()
    {
        return $this->city->name;
    }

    public function getProvinceNameAttribute()
    {
        return $this->city->province->name;
    }
}