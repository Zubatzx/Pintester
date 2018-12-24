@foreach($posts as $post)
    <div class="p-3 col-md-6" style="margin: 10px 0px;">
        <a href="{{ route('postDetail', ['id' => $post->postID]) }}">
            <img class="card-img-top" src="{{asset('assets/images/posts/'.$post->picture)}}" alt="{{$post->title}}" style="object-fit: contain; height: 500px;">
        </a>
        <div>
            <p class="card-text text-center">{{$post->title}}</p>
            <p class="card-text text-center">{{$post->caption}}</p>
        </div>
    </div>
@endforeach
<div class="col-sm-12">{{ $posts->links() }}</div>