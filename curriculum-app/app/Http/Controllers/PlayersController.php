<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Https\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Player;

class PlayersController extends Controller
{
    //
    public function index(){
        $playerTable = new Player;
        $players = $playerTable->allPlayer();
        return view('players.index', ['players' => $players]);
    }
    public function detail($id){
        $players = Player::find($id);

        return view('players.detail', compact('players'));
    }
}
