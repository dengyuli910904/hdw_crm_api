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
//            auth()->login($user, $remember);
//            dd($user);
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
                'token' => $token
            ];
            return $this->response->array($data);
        }else{
            $this->errorResponse('40002', '用户名或密码错误！');
        }
    }
//    public function login(AuthorizationRequest $originRequest, AuthorizationServer $server, ServerRequestInterface $serverRequest){
//        $promoter = Promoter::where(['status' => Promoter::STATUS_ENABLED, 'email'=>$originRequest->username])->first();
//        if(is_null($promoter)){
//            $this->errorResponse('40001', '用户名或密码错误！');
//        }
//        if(6 > strlen($originRequest->password)){
//            $this->errorResponse('40002', '您输入的密码格式不正确！');
//        }
////        $pwd = bcrypt($promoter->solt.$originRequest->password);
////        dd($promoter->password, bcrypt('12345678'));
////        if($promoter->password !== $pwd){
////            $this->errorResponse('40002', '用户名或密码错误！');
////        }
//        return $this->issueToken($server, $serverRequest);
//    }
//
//    protected function issueToken(AuthorizationServer $server, ServerRequestInterface $serverRequest){
//        try{
//            return $server->respondToAccessTokenRequest($serverRequest, new Psr7Response);
//        }catch (OAuthServerException $e){
//            return $this->response->errorUnauthorized($e->getMessage(), $e->getCode());
//        }
//    }


}
