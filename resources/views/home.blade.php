@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Post <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </nav>

            <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
                <h1>Posts
                    <a href="{{ route('post.form') }}">
                        <button type="button" class="btn btn-primary btn-sm">Create Post</button>
                    </a>
                </h1>
                @if(Session::has('success'))
                    <div class="row">
                        <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
                            <div id="message" class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        </div>
                    </div>
                @endif
				
				<table id="posts" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
			@foreach($posts as $posts)
            <tr>
                <td>{{$posts->title}}</td>
                <td>{{$posts->description}}</td>
                <td>
				<a href="{{ route('post.edit', $posts->id) }}">Edit</a>
				
				<form method="post" action="{{ route('post.delete') }}">
                        {{ csrf_field() }}
						<input type='hidden' name="deletedId" value="{{$posts->id}}">
				<input type="submit" value="Delete"></td>
						</form>
            </tr>
			@endforeach   
        </tbody>
        
    </table>
            </main>
        </div>
    </div>
@endsection