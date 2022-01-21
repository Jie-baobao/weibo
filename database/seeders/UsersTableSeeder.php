<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::factory()->count(50)->create();

        $user = User::find(1);
        $user->name = 'jiebaobao';
        $user->email = 'jiebaobao1996@foxmail.com';
        $user->save();
    }
}
