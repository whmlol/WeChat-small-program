<?php

namespace App\Http\Controllers;

use EasyWeChat\Foundation\Application;
use Illuminate\Support\Facades\Redis;
use Illuminate\Http\Request;
use App\Models\WeChatUser;
use App\Utils;

class UserController extends Controller
{

 public function wechatLogin(Request $request){
    	$options = [
            // ...
            'mini_program' => [
                'app_id'   => env('WECHAT_MINI_PROGRAM_APPID', ''),
                'secret'   => env('WECHAT_MINI_PROGRAM_SECRET', ''),
            ],
            
        ];
        $code = $request->input('code');
        $app = new Application($options);
        $miniProgram = $app->mini_program;
        $data = $miniProgram->sns->getSessionKey($code);

        //填入会员信息
        $user = WeChatUser::where('user_openid',$data['openid'])->first();
        if ($user == null) {
            $user = new WeChatUser();
            $user->user_openid = $data['openid'];
            // $user->user_name = $request->input('nick_name');
            // $user->user_icon = $request->input('icon');
            // $user->user_province = $request->input('province');
            // $user->user_city = $request->input('city');
            $user->save();
        }
        //生成令牌
        $token = $user->createToken('token', [])->accessToken;
        $res = Utils::getStateCode('success');
        $res['data'] = [
            'access_token' => $token,
            'userId' => $user->id
        ];

        return json_encode($res);
    } 

    // public function  updateUserInfo(Request $request){
    // 	$sessionId = $request->input('sessionId');
    // 	$value = Redis::get($sessionId);
    // 	$openid = explode(':', $value)[1];
    // 	$user = WeChatUser::where('openid',$openid)
    // 					->update($request->all());
    // }
}
