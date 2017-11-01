<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\SellController;

class SellController extends Controller
{
	public function sellCreate(Request $request)
	{
		$sellOrder = SellOrder::create($request->all());
		if ($sellOrder) {
			$resCode = 0;
			$resMsg  = '创建成功';
		}else {
			$resCode = 1;
			$resMsg  = '创建失败';
		}

		return json_encode(['resCode'=>$resCode,'resMsg'=>$resMsg]);
	}
}
