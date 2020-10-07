<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
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

        $request->validate([

            'photo' => 'mimes:jpeg,jpg,png,gif',
            'name' => 'bail|min:2|max:50',
            // 'email' => 'bail|required|unique:users'
            // 'password' => 'bail|unique:users|min:8'

        ]);

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

        return redirect('/admin/users')->with('user_updated', 'User has been updated.');

    }

    public function deleteUser(User $user) {

        if(Auth::user() != $user) {

            //Finds the old picture and deletes it
            if($user->photo !== null && strpos($user->photo, 'lorempixel') == FALSE) {
                
                unlink(public_path() . $user->photo); 

            }
        
            $user->posts->each(function ($post) {
                // Storage::delete($post->image);

                unlink(public_path() . $post->image);

                $post->delete();
            });

            $user->delete();
    
            return redirect('/admin/users')->with('user_deleted', 'User has been deleted.');

        }
            
        return redirect('/admin/users')->with('user_deleted', 'Active user cannot be deleted.');

    }
}
