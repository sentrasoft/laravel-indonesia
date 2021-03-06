<?php

namespace Sentrasoft\Indonesia\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvincesSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();
        $helper = new \Sentrasoft\Indonesia\IndonesiaHelper();
        $file = __DIR__.'/../../resources/csv/provinces.csv';
        $header = ['id', 'name', 'lat', 'long'];
        $data = $helper->CsvToArray($file, $header);
        $data = array_map(function ($arr) use ($now) {
            $arr['meta'] = json_encode(['lat' => $arr['lat'], 'long' => $arr['long']]);
            unset($arr['lat'], $arr['long']);

            return $arr + ['created_at' => $now, 'updated_at' => $now];
        }, $data);

        DB::table(config('indonesia.table_prefix').'provinces')->insert($data);
    }
}