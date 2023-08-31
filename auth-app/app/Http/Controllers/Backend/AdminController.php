<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse; 
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class AdminController extends Controller
{
     public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function manage_user(){

        $users = User::all();

        return view('backend.manage-user', compact('users'));

    }

    public function edit($id){

        $user = User::find($id);

        return view('backend.edit-user', compact('user'));

    }

    public function update(Request $request, $id){

        $user = User::find($id);

        $user->name = $request->u_name;
        $user->email = $request->u_email;

        $user->update();

        return redirect()->route('user.manage');

    }

    public function delete($id){

        $user = User::find($id);
        $user->delete();

        return redirect()->route('user.manage');

    }
}
 
