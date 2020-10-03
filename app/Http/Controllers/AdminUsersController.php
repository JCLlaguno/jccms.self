<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminUsersController extends Controller
{
    public function index() {

        $users = Auth::user()->paginate(2);

        return view('admin.users.index', compact('users'));

    }

    public function editUser($id) {

        $user = Auth::user()->findOrFail($id);

        return view('admin.users.edit', compact('user'));

    }

    public function updateUser(Request $request, $id) {

        $user = User::findOrFail($id);

        if(trim($request->password) == '') {

            $inputs = $request->except('password');

        } else {

            $inputs = $request->all();

            $inputs['password'] = bcrypt($request->password);

        }
        
        // photo
        if($file = $request->file('photo')) {
           
            //Finds the old picture and deletes it
            if($user->photo !== null && strpos($user->photo, 'lorempixel') == FALSE) {
                
                unlink(public_path() . $user->photo); 

            }

            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $inputs['photo'] = $name;

        }

        $user->update($inputs);

        return redirect('/admin/users')->with('user_updated', 'User has been updated');

    }

    public function deleteUser(User $user) {

        if(Auth::user() != $user) {

            //Finds the old picture and deletes it
            if($user->photo !== null && strpos($user->photo, 'lorempixel') == FALSE) {
                
                unlink(public_path() . $user->photo); 

            }

            $user->delete();
    
            return redirect('/admin/users')->with('user_deleted', 'User has been deleted');

        }
            
        return redirect('/admin/users')->with('user_deleted', 'Logged in user cannot be deleted');

    }
}
