<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{

	protected $table = 'user';

    public $timestamps = false;

    protected $guarded = [];
}
