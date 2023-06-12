<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pairing extends Model
{
    use HasFactory;

    public function allPairing($id){
        $pairings = Pairing::select('p.kickoff as kickoff','c.name as name','g.goal_time as goal_time')
        ->from('pairings as p')
        ->join('goals as g','p.id','=','g.pairing_id')
        ->join('countries as c','p.enemy_country_id','=','c.id')
        ->where('g.player_id', $id)
        ->get();
        return $pairings;
    }
}
