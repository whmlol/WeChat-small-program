<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{

	protected $table = 'user';

    public $timestamps = false;

    protected $guarded = [];
}
