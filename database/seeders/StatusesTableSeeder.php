<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Status;

//微博测试假数据批量生成
class StatusesTableSeeder extends Seeder
{
    public function run()
    {
        Status::factory()->count(100)->create();
    }
}
