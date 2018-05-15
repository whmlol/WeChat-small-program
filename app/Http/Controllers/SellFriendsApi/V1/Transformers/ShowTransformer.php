<?php
/**
 * Created by PhpStorm.
 * User: ji02
 * Date: 18-5-15
 * Time: 下午2:26
 */

namespace App\Http\Controllers\SellFriendsApi\V1\Transformers;

use App\Models\SellOrder;
use League\Fractal\TransformerAbstract;

class ShowTransformer extends TransformerAbstract
{
    public function transform(SellOrder $sellOrder)
    {
        return $sellOrder;
    }
}

