@extends('layouts.home')

@section('content')
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('https://source.unsplash.com/daily')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
            <h1>JC Blog</h1>
            <span class="subheading">Blog website by JC Llaguno</span>
            </div>
        </div>
        </div>
    </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                @foreach($posts as $post)
                    <div class="post-preview">
                        <a href="post.html">
                        <h2 class="post-title">
                            {{$post->title}}
                        </h2>
                        <h3 class="post-subtitle">
                            {!! $post->body !!}
                        </h3>
                        </a>
                        <p class="post-meta">Posted by
                        {{$post->user->name}}
                        on {{$post->created_at->diffForHumans()}}</p>
                    </div>
                    <hr>
                @endforeach
                <!-- Pager -->
                <div class="float-right">{{$posts->links()}}</div>
            
            
            </div>
        </div>
    </div>
@endsection
