@extends('layout')

@section('title', 'Search Post')

@section('content')
<section class="cid-raLSBQAxbV">
	<div class="container">
		<div class="title" display="block">Search Result for {{$key}} :</div>
        <div class="row col-sm-12 row-list">
            @foreach($posts as $post)
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
        </div>
  	</div>
</section>
@endsection