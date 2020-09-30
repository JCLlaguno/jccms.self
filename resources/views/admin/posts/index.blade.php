
@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <h1 class="mb-4">Posts</h1>
        @if(Session::has('post_added'))
            <div class="alert alert-success text-center" role="alert">
                {{Session::get('post_added')}}
            </div>
        @elseif(Session::has('post_updated'))
            <div class="alert alert-warning">
                {{Session::get('post_updated')}}
            </div>
        @endif
    </div>
    <div class="container">
        <div class="card">
            <div class="card-header">
                All Posts <a href="{{route('admin.posts.create')}}" class="btn btn-success">Add New</a>
            </div>
            <div class="card-body">
                @if(count($posts) > 0)
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Body</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @foreach($posts as $post)
                            <tbody>
                                <tr>
                                    <td>{{$post->id}}</td>
                                    <td>{{Str::limit($post->title, 20)}}</td>
                                    <td>{{Str::limit($post->body, 50)}}</td>
                                    <td>
                                        <a class="btn btn-warning" href="{{route('admin.posts.edit', $post->id)}}">Edit</a>
                                    </td>
                                    <td>
                                        <form method="post" action="{{route('admin.posts.delete', $post)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                    <div class="pagination justify-content-center" style="margin:20px 0">
                        {!! $posts->links() !!}
                    </div>
                @endif
            </div>
        </div>
    </div>
@stop
