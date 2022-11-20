<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function show(User $user)
    {
        $user = Auth::user();
        return view('users/show')->with(['user' => $user]);
    }
    
    
    public function edit(User $user)
    {
        return view('users/edit')->with(['user' => $user]);
    }

    public function store(Request $request, User $user)
    {
        $input = $request['user'];
        $user->fill($input)->save();
        return redirect('/users/' . $user->id);

    }
    
    public function update(Request $request, User $user)
    {
        $input_user = $request['user'];
        $user->fill($input_user)->save();
        return redirect('/users/' . $user->id);
    }

}
