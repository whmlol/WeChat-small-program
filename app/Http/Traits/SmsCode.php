<?php

namespace App\Traits;

use Request;
use SmsManager;
use Validator;

trait SmsCode
{

    public function sendSmsCode()
    {
        $result = SmsManager::validateSendable();
        if (!$result['success']) {
            return response()->json($result);
        }
        $result = SmsManager::validateFields();
        if (!$result['success']) {
            return response()->json($result);
        }
        $result = SmsManager::requestVerifySms();
        if (!$result['success']) {
            return response()->json($result);
        }
        return response()->json($result);
    }

    public function validateSmsCode()
    {
        $validator = Validator::make(Request::all(), [
            'tel'      => 'required|confirm_mobile_not_change',
            'sms_code' => 'required|verify_code',
        ]);
        if ($validator->fails()) {
            return self::generateResult(false, $validator->errors()->toArray());
        }

        return self::generateResult(true, 'success');
    }

    public static function generateResult($pass, $message = 'success')
    {
        $result            = [];
        $result['success'] = (bool)$pass;
        $result['message'] = $message;

        return $result;
    }
}