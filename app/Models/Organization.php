<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    //
    protected $fillable = ['organizationName', 'organizationAddress', 'organizationNumber'];
}
