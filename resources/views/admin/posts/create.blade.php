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
                                <img class="img-responsive  mx-auto d-block" id="preview-image" src="https://breakthrough.org/wp-content/uploads/2018/10/default-placeholder-image.png" style="max-height: 200px">
                            </div>
                            <div class="form-group">
                                <label for="name">Photo</label>
                                <input class="form-control-file @error('image') is-invalid @enderror" type="file" name="image" id="image"/>
                                @error('image')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"/>
                                @error('title')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="body">Body</label>
                                <textarea id="textarea" name="body" cols="20" rows="10" class="form-control @error('body') is-invalid @enderror"></textarea>
                                @error('body')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Add Post</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('scripts')
  <script type="text/javascript">
    $('#image').change(function(){
           
    let reader = new FileReader();

    reader.onload = (e) => { 

      $('#preview-image').attr('src', e.target.result); 
    }

    reader.readAsDataURL(this.files[0]); 
  
   });
  </script>
@stop