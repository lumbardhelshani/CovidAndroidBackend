<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorldCases extends Model
{
    protected $table = 'world_cases';

    protected $fillable = ['cases' , 'date'];
}
