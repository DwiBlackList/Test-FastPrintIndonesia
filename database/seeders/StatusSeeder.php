<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            ['nama_status' => 'bisa dijual'],
            ['nama_status' => 'tidak bisa dijual'],
        ];

        foreach ($statuses as $status) {
            \App\Models\Status::create($status);
        }
    }
}
