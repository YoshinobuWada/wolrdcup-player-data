<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Player;
use App\Models\Country;
use App\Models\Goal;
use App\Models\Pairing;
use App\Models\User;
use Validator;
use App\Http\Requests\EditFormRequest;
use App\Http\Requests\RegisterFormRequest;
use App\Http\Requests\LoginFormRequest;

class PlayersController extends Controller
{
    //
    public function index()
    {
        $user = auth()->user();
        $role = auth()->user()->role;
        if ($role == 1) {
            $country_id = auth()->user()->country_id;
            $playerTable = new Player;
            $players = $playerTable->partPlayer($country_id);
            return view('players.index', ['players' => $players , 'user' => $user]);
        }
        if ($role == 0) {
            $playerTable = new Player;
            $players = $playerTable->allPlayer();
            return view('players.index', ['players' => $players, 'user' => $user]);
        }
    }

    public function detail($id)
    {
        $players = Player::find($id);
        $goalsTable = new Goal;
        $goals = $goalsTable->allGoal($id);
        $pairingTable = new Pairing;
        $pairings = $pairingTable->allPairing($id);
        return view('players.detail', compact('players', 'goals', 'pairings'));
    }

    public function update($id)
    {
        $players = Player::find($id);
        $this->country = new Country();
        $countries = $this->country->get();
        return view('players.update', compact('players'), compact('countries'));
    }

    public function delete($id)
    {
        $player = Player::find($id);
        $player->del_flg = 1;
        $player->save();
        return redirect()->route('players.index');
    }

    public function edit(EditFormRequest $request, $id)
    {
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

    public function login()
    {
        return view('players.login');
    }

    public function logup(LoginFormRequest $request)
    {
        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect('/');
        }
        return back()->withErrors([
            'password' => '入力されたパスワードは登録されている内容と違います。'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }


    public function setting()
    {
        $this->country = new Country();
        $countries = $this->country->get();
        return view('players.setting', compact('countries'));
    }

    public function register(RegisterFormRequest $request)
    {
        User::create([
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role,
            'country_id' => $request->country_id
        ]);
        return redirect()->route('players.login');
    }


}
