@extends('layouts.admin')
@section('content')
    <div class="container my-4">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Edit User</li>
        </ol>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        Edit User
                    </div>
                    <div class="card-body">
                        <form  method="POST" action="{{route('admin.user.update', $user)}}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <img class="img-responsive  mx-auto d-block" id="preview-photo" src="https://via.placeholder.com/200x200" style="max-height: 200px">
                            </div>
                            <div class="form-group">
                                <label for="name">Photo</label>
                                <input type="file" name="photo" class="form-control-file" id="photo"/>
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" value="{{$user->name}}" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" value="{{$user->email}}" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label for="password">New Password</label>
                                <input type="password" name="password" class="form-control"/>
                            </div>
                            <button type="submit" class="btn btn-warning">Edit User</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('scripts')
  <script type="text/javascript">
    $('#photo').change(function(){
           
    let reader = new FileReader();

    reader.onload = (e) => { 

      $('#preview-photo').attr('src', e.target.result); 
    }

    reader.readAsDataURL(this.files[0]); 
  
   });
  </script>
@stop