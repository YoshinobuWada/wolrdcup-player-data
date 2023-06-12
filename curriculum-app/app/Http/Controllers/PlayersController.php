<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Player;
use App\Models\Country;
use App\Models\Goal;
use App\Models\Pairing;
use Validator;
use App\Http\Requests\EditFormRequest;

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
        $goalsTable = new Goal;
        $goals = $goalsTable->allGoal($id);
        $pairingTable = new Pairing;
        $pairings = $pairingTable->allPairing($id);
        return view('players.detail', compact('players','goals','pairings'));
    }

    public function update($id){
        $players = Player::find($id);
        $this->country = new Country();
        $countries = $this->country->get();
        return view('players.update', compact('players'), compact('countries'));
    }

    public function delete($id){
        $player = Player::find($id);
        $player->del_flg = 1;
        $player->save();
        $playerTable = new Player;
        $players = $playerTable->allPlayer();
        return view('players.index', ['players' => $players]);
    }

    public function edit(EditFormRequest $request, $id){
        $players = Player::find($id);
        $players->update([
            'uniform_num' => $request->uniform_num,
            'position' => $request->position,
            'name' => $request->name,
            'country_id' => $request->country_id,
            'club' => $request->club,
            'birth' => $request->birth,
            'height' => $request->height,
            'weight' => $request->weight
        ]);

        return redirect()->route('players.index');
    }
}
