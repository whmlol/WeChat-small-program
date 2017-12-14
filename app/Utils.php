<?php

namespace App;

class Utils
{
    public static function getStateCode($state){
		if ($state == 'success') {
			return ['res_code'=>100,'res_msg'=>'success'];
		}elseif (state == 'fail') {
			return ['res_code'=>101,'res_msg'=>'fail'];
		}
	} 
}
