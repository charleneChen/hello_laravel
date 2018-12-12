<?php

use Illuminate\Database\Seeder;
use App\Models\Site;
use App\Models\Party;

class PartiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $site_seats = Site::find(1)->seats;
        $party = factory(Party::class)->times(1)->make([
            'available_seats' => $site_seats
        ]);
        Party::insert($party->toArray());
    }
}
