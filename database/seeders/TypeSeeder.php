<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    public function run()
    {
        Type::create(['name' => 'Web Development']);
        Type::create(['name' => 'Mobile Development']);
        Type::create(['name' => 'Data Science']);
        Type::create(['name' => 'Artificial Intelligence']);
        Type::create(['name' => 'Game Development']);
    }
}