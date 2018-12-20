@extends('layout')

@section('title', 'Home')

@section('content')
	<section class="cid-qTkA127IK8 mbr-fullscreen mbr-parallax-background" id="header2-1">
    	<div class="container align-center">
        	<div class="row justify-content-md-center">
            	<div class="mbr-white col-md-10">
                	<h1 class="mbr-section-title mbr-bold pb-3 mbr-fonts-style display-1">WELCOME TO PINTESTER</h1>
                
                	<p class="mbr-text pb-3 mbr-fonts-style display-5">Click any text to edit or style it. Select text to insert a link. Click blue "Gear" icon in the top right corner to hide/show buttons, text, title and change the block background. Click red "+" in the bottom right corner to add a new block. Use the top left menu to create new pages, sites and add themes.
                	</p>

                    @if(session()->get('userID') == "")
                	   <div class="mbr-section-btn"><a class="btn btn-md btn-secondary display-4" href="{{ url('register') }}">REGISTER NOW</a>
                        <a class="btn btn-md btn-white-outline display-4" href="{{ route('indexLogin') }}">LOGIN</a></div>
                    @endif
            	</div>
       		</div>
    	</div>
	</section>
	<section class="mbr-gallery mbr-slider-carousel cid-raLPpNv8Ha" id="gallery1-4" style="padding-top: 20px;">
		<div class="container">
        @if(session()->get('userID') != "")
            <a class="btn btn-md btn-primary display-4 col-centered" id="btn-filter">Filter by My Followed Category</a>
        @endif
        	<div class="row col-sm-12 row-list" id="allPost">
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
            </div>
    	</div>
	</section>
@endsection

@section('script')
<!-- <script type="text/javascript">
    $('#btn-filter').click(function(){
        if($('#btn-filter').text() == 'Filter by My Followed Category'){
            filterByFollowedCategory();
            $('#btn-filter').text('View All');
        }else{
            $('#btn-filter').text('Filter by My Followed Category');
        }
    });

    function filterByFollowedCategory(){
        $.ajax({
            url: "{{route('filter')}}",
            async: false,
            dataType: "json",
            success: function(response){
                loadPost(response.data);
            }
        });
    }

    function viewAll(){

    }

    function loadPost(datacall){
        strHTML = "";
        for(inde =0; inde < datacall.length; inde++){
            strHTML += "<div class='p-3 col-md-6' style='margin: 10px 0px;'>" +
                "<a href='{{ route('postDetail', ['id' => $post->postID]) }}'>" +
                        "<img class='card-img-top' src='{{asset('assets/images/posts/'.datacall[inde].picture)}}' alt='{{$post->title}}' style='object-fit: contain; height: 500px;'>" +
                "</a>" +
                "<div>" +
                "<p class='card-text text-center'>{{$post->title}}</p>" +
                "<p class='card-text text-center'>{{$post->caption}}</p>" +
                "</div>" +
            "</div>";
        }
        
        $('#allPost').html(strHTML);
    }
</script> -->
@endsection