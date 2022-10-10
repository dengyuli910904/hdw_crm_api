<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlatUserInfoRequest;
use App\Http\Transformers\PlatUserInfoTransformer;
use App\Models\PlatUserInfo;

class PlatUserInfoController extends ApiController
{
    public function add(PlatUserInfoRequest $request){
        $user = app(PlatUserInfo::class);
        $user->username = $request->input('username');
        $user->phone = $request->input('phone');
        $user->ip = $request->getClientIp();
        $user->source = 'web';
        $user->save();
        return $this->successResponse(200,'保存成功', 200);
    }

    public function getlist(PlatUserInfoRequest $request){
        $user = app(PlatUserInfo::class);
        $list = $user->where(function($query) use($request){
            if(!is_null($request->input('username',null))){
                $query->where('username','like','%',escapeLike($request->input('username')),'%');
            }
            if(!is_null($request->input('phone',null))){
                $query->where('phone','like','%',escapeLike($request->input('phone')),'%');
            }
            if($request->exists('start_time')){
                $query->where('created_at','>=',$request->input('start_time'));
            }
            if($request->exists('end_time')){
                $query->where('created_at','<=',$request->input('end_time'));
            }

        })->orderBy('id')
            ->paginate($request->input('per_page', 10));
        return $this->response->paginator($list , PlatUserInfoTransformer::class);
    }
}
