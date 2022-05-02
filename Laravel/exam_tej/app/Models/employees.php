<?php

namespace App\Models;

use App\Http\Controllers\EmployeeController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\employee_address;
class employees extends Model
{
    use HasFactory;
    protected $fillable = [ 'name','email','salary', 'status'];

   

}
