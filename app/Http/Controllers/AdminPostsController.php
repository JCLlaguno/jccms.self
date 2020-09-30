<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\PostDataTable;
use App\Models\Post;

class AdminPostsController extends Controller
{
    // public function index(PostDataTable $dataTable) {

    //     return $dataTable->render('posts');

    // }

    public function index() {

        $posts = Post::paginate(4);

        return view('admin.posts.index', compact('posts'));

    }

    public function createPosts() {

        return view('admin.posts.create');

    }

    public function storePosts(Request $request) {
        
        $inputs = request()->validate([

            'title' => 'required',
            'body' => 'required'
        
        ]);

        auth()->user()->posts()->create($inputs);

        return redirect('/admin/posts')->with('post_added', 'Post has been created');

    }

    public function editPosts($id) {

        $post = Post::findOrFail($id);

        return view('admin.posts.edit', compact('post'));

    }

    public function updatePosts(Post $post) {

        $inputs = request()->validate([

            'title' => 'required|min:8|max:255',
            'body' => 'required'
        
        ]);

        $post->title = $inputs['title'];
        $post->body = $inputs['body'];

        $post->update();

        return redirect('/admin/posts')->with('post_updated', 'Post has been updated');

    }

    public function destroy(Post $post) {

        $post->delete();

        return redirect('/admin/posts');

    }
}
