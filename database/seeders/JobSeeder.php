<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Job;
use Illuminate\Database\Seeder;

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

        Job::create([
            'title' => '搬家',
            'salary' => 1000,
            'enabled' => true,
            'content' => '輕鬆好搬家',
            'cgy_id'  => 1,
            'start_at' => Carbon::now()
        ]);
    }
}
