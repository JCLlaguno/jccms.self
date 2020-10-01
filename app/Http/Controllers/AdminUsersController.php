<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class AdminUsersController extends Controller
{
    public function index() {

        $users = User::paginate(2);

        return view('admin.users.index', compact('users'));

    }

    public function editUser($id) {

        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user'));

    }

    public function updateUser(Request $request, $id) {

        $user = User::findOrFail($id);

        if(trim($request->password) == '') {

            $input = $request->except('password');

        } else {

            $input = $request->all();

            $input['password'] = bcrypt($request->password);

        }
        
        // photo
        if($file = $request->file('photo')) {
            
            //Finds the old picture and deletes it
            unlink(public_path() . $user->photo); 

            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $input['photo'] = $name;

        }

        $user->update($input);

        return redirect('/admin/users')->with('user_updated', 'User has been updated');

    }
}
