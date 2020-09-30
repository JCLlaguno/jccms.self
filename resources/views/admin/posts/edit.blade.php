@extends('layouts.admin')
@section('content')
    <div class="container my-4">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Edit Post</li>
        </ol>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        Edit Post
                    </div>
                    <div class="card-body">
                        <form  method="POST" action="{{route('admin.posts.update', $post)}}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" value="{{$post->title}}" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label for="body">Body</label>
                                <textarea name="body" cols="20" rows="10" class="form-control">{{$post->body}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-warning">Edit Post</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop