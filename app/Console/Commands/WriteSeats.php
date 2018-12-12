<?php

namespace App\Console\Commands;

use App\Models\Seat;
use Illuminate\Console\Command;

class WriteSeats extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seats:write {site_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '把某个场地所有的座位写入Redis';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $site_id = 1;
        $seats = \DB::table('seats')
            ->select('block', 'row', 'col')
            ->where('site_id', $site_id)
            ->get();

        foreach ($seats as $seat) {
            $seat = (array) $seat;
            $data = $seat['block'] . '-' . $seat['row'] . '-' . $seat['col'];
            \Redis::sadd('site_' . $site_id, $data);
        }

        $this->info('Success');
    }
}
