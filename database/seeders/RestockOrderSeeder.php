<?php

namespace Database\Seeders;

use App\Models\RestockOrder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RestockOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RestockOrder::factory(40)->create();
    }
}
