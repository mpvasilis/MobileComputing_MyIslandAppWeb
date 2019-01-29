<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    public $timestamps = false;
    const UPDATED_AT = 'last_update';
}
