<?php

use Illuminate\Database\Seeder;

class PromoterSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0 ;$i < 100; $i++){
            \App\Models\Promoter::create([
                'username' => "测试数据 {$i}",
                'email' => "test{$i}",
                'password' => bcrypt('12345678'),
                'status' => \App\Models\Promoter::STATUS_ENABLED,
                'sex' => \App\Models\Promoter::MALE,
                'created_at' => time(),
                'solt' => ' ',
                'phone' => '13566666666'
            ]);
        }
    }
}
