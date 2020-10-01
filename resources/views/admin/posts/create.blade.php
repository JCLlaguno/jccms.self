@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <h1 class="mt-4 mb-3 text-center">Add Post</h1>
        {{-- <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Add Posts</li>
        </ol> --}}
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="card">
                    <div class="card-header">
                        Add New Post
                    </div>
                    <div class="card-body">
                        <form  method="POST" action="{{route('admin.posts.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label for="body">Body</label>
                                <textarea id="textarea" name="body" cols="20" rows="10" class="form-control"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Post</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop