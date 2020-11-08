<?php

namespace Sentrasoft\Indonesia\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class Seed extends Command
{
    protected $signature = 'indonesia:seed';
    protected $description = 'Database seeder for Sentrasoft Indonesia';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->line('<comment>Seeding:</comment> Sentrasoft\Indonesia\Database\Seeders\IndonesiaSeeder');
        Artisan::call('db:seed', ['--class' => 'Sentrasoft\Indonesia\Database\Seeders\IndonesiaSeeder', '--force' => true]);
        $this->line('<info>Seeded:</info> Sentrasoft\Indonesia\Database\Seeders\IndonesiaSeeder');
    }
}