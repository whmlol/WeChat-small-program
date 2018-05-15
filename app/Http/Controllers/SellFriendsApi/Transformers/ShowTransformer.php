<?php
/**
 * Created by PhpStorm.
 * User: ji02
 * Date: 18-5-15
 * Time: 下午2:26
 */

namespace App\Http\Controllers\SellFriendsApi\Transformers;

use Dingo\Api\Http\Request;
use Dingo\Api\Transformer\Binding;
use Dingo\Api\Contract\Transformer\Adapter;

class ShowTransformer implements Adapter
{
    public function transform($response, $transformer, Binding $binding, Request $request)
    {
        
    }
}

