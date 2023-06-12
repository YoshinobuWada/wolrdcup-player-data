<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Player;
class Country extends Model
{
    use HasFactory;

    public function allCountry(){
        $countries = Country::all();
        return $countries;
    }

    public function players(){
        return $this->belongsTo(('App\Models\Player'));
    }
}
