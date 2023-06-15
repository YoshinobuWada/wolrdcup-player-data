<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Country;

class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        'uniform_num',
        'position',
        'name',
        'country_id',
        'club',
        'birth',
        'height',
        'weight'
    ];

    public $timestamps = false;

    public function allPlayer(){
        $players = Player::select('p.id','p.uniform_num','p.position','p.club','p.name as player_name','c.name','p.birth','p.height','p.weight','p.del_flg')
        ->from('players as p')
        ->join('countries as c','p.country_id','=','c.id')
        ->paginate(20);
        return $players;
    }

    public function partPlayer($country_id){
        $players = Player::select('p.id','p.uniform_num','p.position','p.club','p.name as player_name','c.name','p.birth','p.height','p.weight','p.del_flg')
        ->from('players as p')
        ->join('countries as c','p.country_id','=','c.id')
        ->where('p.country_id' , $country_id)
        ->paginate(20);
        return $players;
    }

    public function country(){
        return $this->belongsTo('App\Models\Country');
    }
}
