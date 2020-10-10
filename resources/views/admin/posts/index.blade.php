
@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Posts</h1>
    {{-- <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Posts</li>
    </ol> --}}
    @if(Session::has('post_added'))
        <div class="alert alert-success text-center">
            {{Session::get('post_added')}}
        </div>
    @elseif(Session::has('post_updated'))
        <div class="alert alert-warning text-center">
            {{Session::get('post_updated')}}
        </div>
    @elseif(Session::get('post_deleted'))
        <div class="alert alert-danger text-center">
            {{Session::get('post_deleted')}}
        </div>
    @endif
    <div class="card mb-4">
        <div class="card-header">
            {{-- <i class="fas fa-table mr-1"></i> --}}
            {{-- All Posts  --}}
            <a href="{{route('admin.posts.create')}}" class="btn btn-success btn-sm">Add New</a>
        </div>
        <div class="card-body"> 
            @if(count($posts) > 0)
            <div class="table-responsive">
                <table class="table table-sm" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Image</th>
                            <th>Author</th>
                            <th>Title</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tbody>
                            <tr>
                                <td>{{$post->id}}</td>
                                <td><img width="30" height="30" src="{{$post->image}}" alt=""></td>
                                <td>{{$post->user->name}}</td>
                                <td>{{Str::limit($post->title, 20)}}</td>
                                @can('view', $post)
                                    <td>
                                        <a class="btn btn-warning btn-sm" href="{{route('admin.posts.edit', $post)}}">Edit</a>
                                    </td>
                                    <td>
                                        <form method="post" action="{{route('admin.posts.delete', $post)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                @endcan
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
            <div class="pagination pagination-sm float-right">
                {!! $posts->links() !!}
            </div>
            @endif
        </div>
    </div>
</div>
@stop
