<?php

namespace App\Http\Controllers;

use App\Http\Requests\Api\AuthorizationRequest;
use App\Models\Promoter;
use Illuminate\Http\Request;
use Laravel\Passport\Exceptions\OAuthServerException;
use Laravel\Passport\Http\Controllers\AccessTokenController;
use League\OAuth2\Server\AuthorizationServer;
use Psr\Http\Message\ServerRequestInterface;
use Nyholm\Psr7\Response as Psr7Response;
use Auth;

class PromoterController extends ApiController
{
    public function token(Request $request){
//        dd($this->auth);
        $remember = $request->input('is_remember', false);
        if(auth()->guard('promoter')->attempt(['email' => $request->loginname, 'password' => $request->password, 'status' => Promoter::STATUS_ENABLED], $remember)) {
            $user = auth()->guard('promoter')->user();
            $token = $user->createToken('api')->accessToken;
            $user->setRememberToken($token);
            $data = [
                'code' => 40000,
                'message' => '获取成功',
                'userInfo' => [
                    'username' => $user->username,
                    'loginname' => $user->email,
                    'phone' => $user->phone
                ],
                'token' => $token,
//                'user' => auth()->user()
            ];

            return $this->response->array($data);
        }else{
            $this->errorResponse('40002', '用户名或密码错误！');
        }
    }

    public function login(Request $request){
        $validator=\Validator::make($request->all(),[
            'email'=>'required',
            'password'=>'required',
        ]);
        if ($validator->fails()){
            return ['code'=>500,'msg'=>$validator->errors()->first()];
        }

        //应为基于auth登录，所匹配的字段不能出现中文
//        dd($request->all());
        $bool=auth()->guard('promoterss')->attempt($request->all());
        if ($bool){
            $user=auth()->guard('promoterss')->user();
            //在这里生成token
            $token=$user->createToken('promoter')->accessToken;
            $data=['token'=>$token,'expire'=>7200];
            return ['code'=>200,'msg'=>'登录成功','data'=>$data];
        }
        return ['code'=>500,'msg'=>'账号密码错误'];
    }

}
