<?php

namespace Database\Seeders;

use App\Models\ProjectStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProjectStatus::create([
            'name' => 'Not Started',
        ]);
        ProjectStatus::create([
            'name' => 'In Planning'
        ]);
        ProjectStatus::create([
            'name' => 'In Design'
        ]);
        ProjectStatus::create([
           'name' => 'In Development'
        ]);
        ProjectStatus::create([
           'name' => 'In Progress'
        ]);
        ProjectStatus::create([
            'name' => 'On Hold'
        ]);
        ProjectStatus::create([
            'name' => 'In Review'
        ]);
        ProjectStatus::create([
            'Name' => 'Awaiting to go live'
        ]);
        ProjectStatus::create([
            'name' => 'Completed'
        ]);
        ProjectStatus::create([
            'name' => 'Cancelled'
        ]);
    }
}
