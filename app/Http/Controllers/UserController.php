<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Melody;

class UserController extends Controller
{

    public function show(User $user, Melody $melody)
    {
        $user = Auth::user();
        return view('users/show')->with(['user' => $user])->with(['melody' => $melody]);
    }
    
    
    public function edit(User $user, Melody $melody)
    {
        return view('users/edit')->with(['user' => $user])->with(['melodies' => $melody->get()]);
    }

    public function store(Request $request, User $user)
    {
        $input = $request['user'];
        $user->fill($input)->save();
                
        $input_user = $request['user'];
        $input_melodies = $request->melodies_array; 
        $user->fill($input_user)->save();
        $user->melodies()->attach($input_melodies); 

        return redirect('/users/' . $user->id);

    }
    
    public function update(Request $request, User $user)
    {
        $input_user = $request['user'];
        $user->fill($input_user)->save();
        return redirect('/users/' . $user->id);
    }

}
