@extends('layout')

@section('title', 'My Post')

@section('content')
<section class="cid-raLSBQAxbV">
	<div class="container">
        <div class="row justify-content-center">
            <div class="title col-12 col-lg-8">
                <h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">
                    My Post
                </h2>
            </div>
        </div>
		<div class="row col-sm-12 justify-content-center">
        	<a class="btn btn-md btn-primary display-4 col-centered" href="{{ route('createPost') }}">
                <img src="{{asset('assets/images/u367.png')}}"/> &nbsp;Add
            </a>	
      	</div>
        <div class="row col-sm-12 row-list">
            @foreach($myposts as $post)
                    <div class="p-3 col-md-6" style="margin: 10px 0px;">
                        <a href="{{ route('postDetail', ['id' => $post->postID]) }}">
                            <img class="card-img-top" src="{{asset('assets/images/posts/'.$post->picture)}}" alt="{{$post->title}}" style="object-fit: contain; height: 500px;">
                        </a>
                        <div>
                            <div class="card-text text-center title" display="block" style="margin-bottom: 0 !important;">{{$post->title}}</div>
                            <div class="card-text text-center">{{$post->caption}}</div>
                        </div>
                    </div>
            @endforeach
            <div class="col-sm-12">{{ $myposts->links() }}</div>
        </div>
  	</div>
</section>
@endsection