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
                                <img class="img-responsive  mx-auto d-block" id="preview-image" src="{{$post->image}}" style="max-height: 200px">
                            </div>
                            <div class="form-group">
                                <label for="name">Photo</label>
                                <input type="file" name="image" class="form-control-file @error('image') is-invalid @enderror" id="image"/>
                                @error('image')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" value="{{$post->title}}" class="form-control @error('title') is-invalid @enderror"/>
                                @error('title')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="body">Body</label>
                                <textarea name="body" id="textarea" cols="20" rows="10" class="form-control @error('body') is-invalid @enderror">{{$post->body}}</textarea>
                                @error('body')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-warning">Edit Post</button>
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