<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Create extends Model
{
    //
    protected $fillable = [ 'userName', 'password', 'organizationID', 'organizationName', 'numberOfRelics', 'organizationAddress', 'email','organizationNumber'];
}
