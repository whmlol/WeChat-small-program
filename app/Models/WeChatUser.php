<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class WeChatUser extends Model
{
	use HasApiTokens;

	protected $table = 'we_chat_users';

    protected $guarded = [];
}