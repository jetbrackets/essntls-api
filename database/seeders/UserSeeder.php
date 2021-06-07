<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hasAdmin = User::where('email', 'admin@admin.com')->count();

        if (!$hasAdmin) {
            DB::table('users')->insert([
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('12345'),
                'type' => 'admin'
            ]);
        }

        User::factory(25)->create();
    }
}
