<?php

namespace Sentrasoft\Indonesia\Models;

class Province extends Model
{
    protected $table = 'provinces';

    protected $casts = [
        'meta' => 'array',
    ];

    public $timestamps = false;

    public function cities()
    {
        return $this->hasMany('Sentrasoft\Indonesia\Models\City', 'province_id');
    }

    public function districts()
    {
        return $this->hasManyThrough('Sentrasoft\Indonesia\Models\District', 'Sentrasoft\Indonesia\Models\City');
    }

    public function getLogoPathAttribute()
    {
        $folder = 'indonesia-logo/';
        $id = $this->getAttributeValue('id');
        $arr_glob = glob(public_path().'/'.$folder.$id.'.*');
        if (count($arr_glob) == 1) {
            $logo_name = basename($arr_glob[0]);
            $logo_path = url($folder.$logo_name);

            return $logo_path;
        }
    }
}