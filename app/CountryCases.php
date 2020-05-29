<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CountryCases extends Model
{
    protected $table = 'country_cases';

    protected $fillable = ['countryName' , 'cases' , 'date'];
}
