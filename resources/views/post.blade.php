@extends('layouts.home')

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('{{$post->image}}')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-heading">
            <h1>{{$post->title}}</h1>
            <span class="meta">Posted by
              <a>{{$post->user->name}}</a>
              on August 24, 2019</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Post Content -->
  <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <p>{!! $post->body !!}</p>
        </div>
      </div>
    </div>
  </article>

  