<?php

use Illuminate\Database\Seeder;
use App\Album;

class AlbumsTableSeeder extends Seeder
{
    /**
     * Seeds the album table.
     *
     * @return void
     */
    public function run()
    {
        factory(Album::class, 20)->create();        
    }
}
