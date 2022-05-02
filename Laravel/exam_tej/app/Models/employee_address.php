<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\employees;
use Prophecy\Doubler\Generator\Node\ReturnTypeNode;

class employee_address extends Model
{
    use HasFactory;
    protected $fillable = [ 'employee_id','city','state','country' ];
}
