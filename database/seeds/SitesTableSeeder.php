<?php

use Illuminate\Database\Seeder;
use App\Models\Site;
use App\Models\Seat;

class SitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sites = factory(Site::class)->times(1)->make();
        Site::insert($sites->toArray());

         // 第一排有50个座位
         $first_row = 50;
         // 最后一排有100个座位
         $last_row = 100;
         // 计算有多少排
         $row = 1;
         // 计算有多少个座位
//         $size = 0;
//         while ($first_row < $last_row) {
//             if ($row != 1 && $row % 2 == 1) {
//                 $first_row += 2;
//             }
//             $size += $first_row;
//             $row++;
//         }

        $blocks = ['A', 'B', 'C', 'D'];
        while ($first_row < $last_row) {
            // 利用一个临时数组来批量保存临时数据
            // 组不宜设置过大，否则会导致异常
            $data = [];

            if ($row != 1 && $row % 2 == 1) {
                $first_row += 2;
            }
            foreach ($blocks as $block) {
                for ($i=1; $i <= $first_row; $i++) {
                    $seats_A = factory(Seat::class)->make([
                        'block' => $block,
                        'row' => $row,
                        'col' => $i
                    ]);

                    array_push($data, $seats_A->toArray());
                }
            }
            Seat::insert($data);

            $row++;
        }

        $site = Site::find(1);
        $seats = Seat::where('site_id', 1)->count();
        $site->seats = $seats;
        $site->save();
    }
}
