@extends('layout')

@section('title', 'Post')

@section('content')
	<section class="cid-raLSBQAxbV" id="image1-d">
        <div class="container">
                <div class="titleBox">
                    <div class="posterImage">
                        <img src="{{asset('assets/images/users/'.$post[0]->profilePicture)}}" alt="{{$post[0]->username}}" />
                    </div>
                    <div class="posterText">
                        <p class="d-inline-block col-sm-6">{{$post[0]->username}}</p>
                        @if(session()->get('name') != "" AND session()->get('name') != $post[0]->username OR session()->get('isAdmin') == 1)
                            <a class="btn btn-sm btn-primary display-4" href="{{route('addToCart', ['user' => session()->get('userID'), 'id' => $post[0]->postID])}}">
                                Add to Cart
                            </a>
                        @endif
                        @if(session()->get('name') == $post[0]->username OR session()->get('isAdmin') == 1)
                            <a class="btn btn-sm btn-secondary display-4" href="{{route('deletePost', ['id' => $post[0]->postID])}}">
                                Delete Post
                            </a>
                        @endif
                    </div>
                </div>

                <div class="commentBox">
                    <div class="posterText">
                        <p align="center">Title : {{$post[0]->title}}</p>
                        <p align="center">Category : {{$post[0]->category}}</p>
                    </div>
                    <div>
                        <img class="card-img-top" src="{{asset('assets/images/posts/'.$post[0]->picture)}}" alt="{{$post[0]->title}}" style="object-fit: contain; height: 500px;">
                    </div>
                    <div class="posterText">
                        <p align="center">Caption : {{$post[0]->caption}}</p>
                    </div>
                </div>
                @if(session()->get('userID') != "")
                    <div class="actionBox">
                        <ul class="commentList">
                            @foreach($comments as $comment)
                            <li>
                                <div class="commenterImage">
                                    <img src="{{asset('assets/images/users/'.$comment->profilePicture)}}" alt="{{$comment->name}}" />
                                </div>
                                <div class="commentText">
                                    <p class="">{{$comment->name}}</p>
                                    <p class="">{{$comment->comment}}</p>

                                </div>
                            </li>
                            @endforeach
                        </ul>
                    <form class="form-inline" role="form" action="{{ route('addComment', ['id' => $post[0]->postID]) }}" method="post">
                        <div class="form-group">
                            <input class="form-control" type="text" name="comment" placeholder="Your comments" />
                        </div>
                        {{ csrf_field() }}
                        <div class="form-group">
                            <button class="btn btn-default" type="submit">Add</button>
                        </div>
                    </form>
                    @if(isset($errors))
                        <p style="font-weight: bold; color: red">{{ $errors->first() }}</p>
                    @endif
                @endif
            </div>
            <!-- <div class="row col-sm-12 row-list">
                <div class="card col-md-12">
                    <div class="card-header">
                        <p class="card-text">Username : {{$post[0]->username}}</p>
                        <p class="card-text">{{$post[0]->title}}</p>
                        <p class="card-text">{{$post[0]->category}}</p>
                    </div>
                    <div class="card-body">
                        <img class="card-img-top" src="{{asset('assets/images/posts/'.$post[0]->picture)}}" alt="{{$post[0]->title}}" style="object-fit: contain; height: 500px;">
                    </div>
                    <div class="card-footer">
                        <p class="card-text">{{$post[0]->caption}}</p>
                    </div>
                </div>
            </div>
            klo loggedin kasih liat
            <div class="row col-sm-12 row-list">
                @foreach($comments as $comment)
                    <img class="card-img-top" src="{{asset('assets/images/users/'.$comment->profilePicture)}}" alt="{{$comment->name}}">
                    <p>{{$comment->name}}</p>
                    <p>{{$comment->comment}}</p>
                @endforeach
            </div> -->
        </div>
    </section>
@endsection