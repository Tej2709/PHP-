<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articledetails extends Model
{
    use HasFactory;
    protected $fillable =['name','slug','description','phno','status'];
}
