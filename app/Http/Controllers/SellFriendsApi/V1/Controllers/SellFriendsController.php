<?php

namespace App\Http\Controllers\SellFriendsApi\V1\Controllers;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\SellFriendsApi\V1\Transformers\ShowTransformer;
use App\Models\SellOrder;
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
	    return $this->response->paginator($Girls, new Showtransformer);
    }

    public function showBoys(){
	    $Boys = SellOrder::where('sell_sex',1)->paginate(8);
	    return $this->response->paginator($Boys, new ShowTransformer);
    }

    public function showRecommends(){
	    $Recommends = SellOrder::paginate(8);
	    return $this->response-paginator($Recommends, new ShowTransformer);
    }
}
