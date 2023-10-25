<?php

namespace Database\Seeders;

use App\Models\ProjectType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProjectType::create([
            'name' => 'Website Design / Development'
        ]);
        ProjectType::create([
            'name' => 'WordPress Design / Development'
        ]);
        ProjectType::create([
            'name' => 'WooCommerce Design / Development'
        ]);
        ProjectType::create([
            'name' => 'eCommerce Design / Development'
        ]);
        ProjectType::create([
            'name' => 'Laravel Development'
        ]);
        ProjectType::create([
            'name' => 'Graphical Design'
        ]);
        ProjectType::create([
            'name' => 'Microsoft 365 Provision'
        ]);
        ProjectType::create([
            'name' => 'Microsoft 365 Migration',
        ]);
        ProjectType::create([
            'name' => 'Web Hosting Migration'
        ]);
        ProjectType::create([
            'name' => 'Website Maintenance'
        ]);
    }
}
