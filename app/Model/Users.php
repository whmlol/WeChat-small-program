<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class Users extends Model
{
	use HasApiTokens;

	protected $table = 'user';

    public $timestamps = false;

    protected $guarded = [];
}
