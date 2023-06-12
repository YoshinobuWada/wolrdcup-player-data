<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    use HasFactory;

    public function allGoal($id){
        $goals = Goal::where('player_id',$id)
        ->count();
        return $goals;
    }
}
