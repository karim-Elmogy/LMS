<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Sub_Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(Category::class);
        $this->call(Sub_Category::class);
    }
}
