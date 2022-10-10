<?php

namespace Tests\Feature;

use App\Models\Promoter;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class testLogin extends TestCase
{
//    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
//        $data = [
//            'username' => "1测试数据",
//            'email' => "1test",
//            'password' => bcrypt('12345678'),
//            'status' => \App\Models\Promoter::STATUS_ENABLED,
//            'sex' => \App\Models\Promoter::MALE,
//            'created_at' => time()
//        ];
//        \App\Models\Promoter::create($data);
//        $user = Promoter::first();
//        $this->assertDatabaseCount('promoter', 1);

        dd(Auth::attempt(['email' => 'test0', 'password' => '12345678']));
    }
}
