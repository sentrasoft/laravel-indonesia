<?php

namespace Sentrasoft\Indonesia\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class IndonesiaSeeder extends Seeder
{
    public function run()
    {
        $this->reset();
        
        $this->call(ProvincesSeeder::class);
        $this->call(CitiesSeeder::class);
        $this->call(DistrictsSeeder::class);
        $this->call(VillagesSeeder::class);
    }

    public function reset()
    {
        Schema::disableForeignKeyConstraints();

        DB::table(config('indonesia.table_prefix').'villages')->truncate();
        DB::table(config('indonesia.table_prefix').'districts')->truncate();
        DB::table(config('indonesia.table_prefix').'cities')->truncate();
        DB::table(config('indonesia.table_prefix').'provinces')->truncate();

        Schema::enableForeignKeyConstraints();
    }
}