
@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Users</h1>
    {{-- <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Posts</li>
    </ol> --}}
    @if(Session::has('user_updated'))
        <div class="alert alert-warning">
            {{Session::get('user_updated')}}
        </div>
    @endif
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            All Users 
        </div>
        <div class="card-body"> 
            @if(count($users) > 0)
            <div class="table-responsive">
                <table class="table table-sm" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Added</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tbody>
                            <tr>
                                <td>{{$user->id}}</td>
                                <td><img width="30" height="30" src="{{$user->photo}}" alt=""></td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->created_at->diffForHumans()}}</td>
                                <td>
                                    <a class="btn btn-warning btn-sm" href="{{route('admin.user.edit', $user->id)}}">Edit</a>
                                </td>
                                <td>
                                    <form method="post" action="">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                </table>
            </div>
            <div class="pagination pagination-sm justify-content-center">
                {!! $users->links() !!}
            </div>
            @endif
        </div>
    </div>
</div>
@stop
