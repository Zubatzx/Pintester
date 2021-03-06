@extends('layout')

@section('title', 'Post')

@section('content')
	<section class="cid-raLSBQAxbV" id="image1-d">
        <div class="container">
            @if(isset($errors))
                <p class="message">{{ $errors->first() }}</p>
            @endif
                <div class="titleBox">
                    <div class="posterImage">
                        <img class="rounded-img" src="{{asset('assets/images/users/'.$post[0]->profilePicture)}}" alt="{{$post[0]->username}}" />
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
                        <div class="title" style="margin-bottom: 0 !important; margin-left: 0" align="center">{{$post[0]->title}}</div>
                        <div align="center">{{$post[0]->category}}</div>
                    </div>
                    <div>
                        <img class="card-img-top" src="{{asset('assets/images/posts/'.$post[0]->picture)}}" alt="{{$post[0]->title}}" style="object-fit: contain; height: 500px;">
                    </div>
                    <div class="posterText">
                        <div class="txt">{{$post[0]->caption}}</div>
                    </div>
                </div>
                <hr>
                @if(session()->get('userID') != "")
                    <div class="actionBox">
                        <div class="txt">Comments</div>
                        <hr>
                        <ul class="commentList">
                            @foreach($comments as $comment)
                            <li>
                                <div class="commenterImage">
                                    <img src="{{asset('assets/images/users/'.$comment->profilePicture)}}" alt="{{$comment->name}}" />
                                </div>
                                <div class="commentText">
                                    <p class="bold">{{$comment->name}}</p>
                                    <p class="">{{$comment->comment}}</p>

                                </div>
                            </li>
                            <hr>
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