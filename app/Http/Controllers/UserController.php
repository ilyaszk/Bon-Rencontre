<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Symfony\Component\Console\Input\Input;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'asc')->paginate(10);

        return view('admin.users.index', ['users' => $users]);
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('admin.users.edit', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->session()->flash('success', 'Utilisateur modifié');

        $user->update([
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'email' => $request->input('email'),
            'role_as' => $request->input('result'),
        ]);

        return redirect(route('admin.users.index'));
    }

    public function destroy($id, Request $request)
    {
        User::destroy($id);

        $request->session()->flash('success', 'Utilisateur supprimé');

        return redirect(route('admin.users.index'));
    }
}
