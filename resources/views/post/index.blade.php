@extends('layouts.master')

@section('title')
    Welcome Laravel Blog Tutorial
@endsection

@section('content')
    <main role="main" class="container"  style="margin-top: 5px">

        <div class="row">

            <div class="col-sm-8 blog-main">

               
@foreach($posts as $posts)
   

                <div class="blog-post">
                    <h2 class="blog-post-title"><a href="{{ route('post.showpost', $posts->id) }}">{{ $posts->title }}</a></h2>
                    <p class="blog-post-meta"><small><i>{{$posts->created_at}} by <a href="#">{{$posts->name}}</a></i></small></p>

                    <p>{{$posts->description}}</p>
                </div><!-- /.blog-post -->
    @endforeach

                

            </div><!-- /.blog-main -->

            

        </div><!-- /.row -->

    </main><!-- /.container -->
@endsection