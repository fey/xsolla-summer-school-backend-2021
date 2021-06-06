<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Item::factory()
            ->count(100)
            ->state(new Sequence(
                ['type' => 'virtual_good'],
                ['type' => 'virtual_currency'],
                ['type' => 'game_key'],
                ['type' => 'compact_disc']))
            ->create();
    }
}
