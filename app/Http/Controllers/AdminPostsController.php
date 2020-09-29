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

        $posts = Post::paginate(10);

        return view('admin.posts.index', compact('posts'));

    }

    public function destroy(Post $post) {

        $post->delete();

        return redirect()->back();

    }
}
