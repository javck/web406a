<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Job;
use Illuminate\Database\Seeder;
use Faker;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Job::truncate(); //清空表格與欄位
        $faker = Faker\Factory::create('zh_TW');
        for ($i=0; $i < 500; $i++) { 
            Job::create([
                'title' => $faker->name,
                'salary' => rand(100,10000),
                'enabled' => $faker->randomElement([true,false]) ,
                'content' => $faker->realText,
                'cgy_id'  => rand(1,3),
                'start_at' => Carbon::now()->addDays(rand(-5,5))
            ]);
        }
        
    }
}
