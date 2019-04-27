<?php

use Illuminate\Database\Seeder;
use App\Band;

class BandsTableSeeder extends Seeder
{
    /**
     * Seeds the bands table.
     *
     * @return void
     */
    public function run()
    {
        factory(Band::class, 20)->create();
    }
}
