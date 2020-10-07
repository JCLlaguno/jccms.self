<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
// use App\DataTables\PostDataTable;

class AdminPostsController extends Controller
{
    // public function index(PostDataTable $dataTable) {

    //     return $dataTable->render('posts');

    // }

    public function index() {

        $posts = Post::paginate(10);

        return view('admin.posts.index', compact('posts'));

    }

    public function createPosts() {

        return view('admin.posts.create');

    }

    public function storePosts(Request $request) {
        
        $inputs = request()->validate([

            'image' => 'bail|mimes:jpeg,jpg,png,gif',
            'title' => 'bail|required|min:8|max:255',
            'body' => 'bail|required|min:8'
        
        ]);

        // photo
        if($file = $request->file('image')) {

            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $inputs['image'] = $name;

        }

        auth()->user()->posts()->create($inputs);

        return redirect('/admin/posts')->with('post_added', 'Post has been created.');

    }

    public function editPosts($id) {

        $post = Post::findOrFail($id);

        return view('admin.posts.edit', compact('post'));

    }

    public function updatePosts(Post $post) {

        $inputs = request()->validate([

            'image' => 'bail|mimes:jpeg,jpg,png,gif',
            'title' => 'bail|required|min:8|max:255',
            'body' => 'bail|required|min:8'
        
        ]);

        // photo
        if($file = request()->file('image')) {
           
            //Finds the old picture and deletes it
            if($post->image !== null && strpos($post->image, 'lorempixel') == FALSE) {
                
                unlink(public_path() . $post->image); 

            }

            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $post->image = $name;

        }

        $post->title = $inputs['title'];

        $post->body = $inputs['body'];

        $post->update();

        return redirect('/admin/posts')->with('post_updated', 'Post has been updated.');

    }

    public function deletePosts(Post $post) {
        
        //Finds the old picture and deletes it
        if($post->image !== null && strpos($post->image, 'lorempixel') == FALSE) {
            
            unlink(public_path() . $post->image); 

        }

        $post->delete();

        return redirect('/admin/posts')->with('post_deleted', 'Post has been deleted.');

    }
}
