<?php

namespace Database\Seeders;

use App\Models\RestockOrderItem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RestockOrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RestockOrderItem::factory(100)->create();
    }
}
