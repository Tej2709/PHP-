<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','email','password','gender','hobbies','usertype',
    ];
    public function setHobbiesAttribute($data)
    {
        $this->attributes['hobbies'] = implode(',',$data);
    }

    public function getHobbiesAttribute($data)
    {
        return $this->attributes[''] = explode(',',$data);
    }
}
