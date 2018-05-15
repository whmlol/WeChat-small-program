<?php

namespace App\Http\Controllers\SellFriendsApi\V1;

use App\Api\V1\Controllers\ApiController;
use Illuminate\Http\Request;

class SellFriendsController extends ApiController
{
	public function sellCreate(Request $request)
	{
		$sellOrder = SellOrder::create($request->all());
		if ($sellOrder){
            return $this->responseSuccess('创建成功');
        }return $this->responseFailed('创建失败');
	}

	public function showGirls(){
	    $Girls = SellOrder::where('sell_sex',2)->paginate(8);
	    return $this->responsePaginate($Girls, new Showtransformer);
    }
}
