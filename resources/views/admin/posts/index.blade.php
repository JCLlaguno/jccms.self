
@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Posts</h1>
    </div>
    <div class="container">
    @if(count($posts) > 0)
        <table class="table">
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
@stop
