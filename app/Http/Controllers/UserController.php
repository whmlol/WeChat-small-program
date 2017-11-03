<?php

namespace App\Http\Controllers;

use EasyWeChat\Foundation\Application;
use Illuminate\Support\Facades\Redis;
use Illuminate\Http\Request;
use App\Model\Users;

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
        $user = Users::where('user_openid',$data['openid'])->first();
        if ($user == null) {
            $user = new Users();
            $user->user_openid = $data['openid'];
            $user->user_name = $request->input('nick_name');
            $user->save();
        }

        $key = str_random(20);
        Redis::setex($key, 7000, $data['session_key'].":".$data['openid']);

        $ret = [
        	'ssid' => $key,
        ];

        return json_encode($ret);
    } 

    public function  updateUserInfo(Request $request){
    	$sessionId = $request->input('sessionId');
    	$value = Redis::get($sessionId);
    	$openid = explode(':', $value)[1];
    	$user = Users::where('openid',$openid)
    					->update($request->all());
    }
}
