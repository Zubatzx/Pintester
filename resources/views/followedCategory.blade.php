@extends('layout')

@section('title', 'My Profile')

@section('content')
<section class="mbr-section form1 cid-raLSBQAxbV" id="form1-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="title col-12 col-lg-8">
        <h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">
          Followed Categories
        </h2>
      </div>
    </div>
    <div class="row justify-content-md-center">
      <img class="rounded-circle" style="object-fit: contain; height: 260px; width: auto;" src="{{asset('assets/images/users/'.$user->profilePicture)}}"/>
    </div>
    <div>
      <div class="card-text text-center title" display="block" style="margin-bottom: 0 !important; margin-top: 20px;font-size: 30px;">{{ $user->name }}</div>
      <div class="card-text text-center">{{ $user->email }}</div>
    </div>
    <br>
    <div class="container">
    	<div class="row">
      		<div class="col text-center">
        		<a class="btn btn-sm btn-primary display-7" href="{{ route('myProfile', ['id' => $user->userID]) }}">Profile</a>
      		</div>
      		<div class="col text-center">
        		<a class="btn btn-sm btn-secondary display-7" href="">Categories</a>
      		</div>
    	</div>
      	<div class="row col-md-12">
      	@foreach($categories as $category)
    	<div class="col-md-4" style="background-color: #DCDCDC; border: 1px solid black; margin:10px 0px;">
    		<div class="card-text text-center title" display="block" style="margin-bottom: 0 !important;">{{ $category->name }}</div>
            <div class="card-text text-center"><input class="toggle-input" id="{{ $category->categoryID }}" class="checkbox-inline" type="checkbox" data-toggle="toggle" data-size="small" data-on="Followed" data-off="Unfollow"></div>
    	</div>
    	@endforeach
  	  </div>
  	  <div class="message" style="margin-top: 15px;margin-bottom: 0;font-size: 35px;text-align: center;"></div>
  	</div>
</section>
@endsection

@section('script')
<script type="text/javascript">
	$("document").ready(function(){
		setFollowedCategory();
	});
	
	function setFollowedCategory() {
		flag = 1; //sebagai flag biar dia ga fire function change
		@foreach($followedCategories as $a)
			temp = @json($a->categoryID);
			$('#'+temp).prop("checked", true).change();
		@endforeach
		flag = 0;
	}

	$(".toggle-input").change(function(){
		if(flag == 0){
			if($(this).is(":checked") == true){
				addFollowedCategory($(this).attr("id"));
			}else{
				deleteFollowedCategory($(this).attr("id"));
			}
		}
    })

    function addFollowedCategory(id){
    	$.ajax({
    		type: "GET",
        	url: "/addFollowedCategory/"+id,
        	success: function(response){
        		if(response == "success"){
        			$('.message').html("Category Followed !!!");
        		}
        	}
    	});
    }

    function deleteFollowedCategory(id){
    	$.ajax({
    		type: "GET",
        	url: "/deleteFollowedCategory/"+id,
        	success: function(response){
        		if(response == "success"){
        			$('.message').html("Category Unfollowed !!!");
        		}
        	}
    	});
    }
</script>
@endsection