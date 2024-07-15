<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NominalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('nominals')->insert([
            [
                'nominal' => '100',
                'image' => 'money/100.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nominal' => '200',
                'image' => 'money/200.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nominal' => '500',
                'image' => 'money/500.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nominal' => '1000',
                'image' => 'money/1000.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nominal' => '2000',
                'image' => 'money/2000.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nominal' => '5000',
                'image' => 'money/5000.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nominal' => '10000',
                'image' => 'money/10000.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nominal' => '20000',
                'image' => 'money/20000.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nominal' => '50000',
                'image' => 'money/50000.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nominal' => '100000',
                'image' => 'money/100000.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
