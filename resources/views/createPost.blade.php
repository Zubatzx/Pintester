@extends('layout')

@section('title', 'My Post')

@section('content')
<section class="cid-raLSBQAxbV">
    <div class="container">
        <div class="row justify-content-center">
            <div class="title col-12 col-lg-8">
                <h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">
                    Insert Post
                </h2>
            </div>
        </div>
    </div>
	<div class="container">
		<div class="row justify-content-center">
            <div class="media-container-column col-lg-8">          
                <form action="{{ route('addPost') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                @if(isset($errors))
                    <p class="message">{{ $errors->first() }}</p>
                @endif
                   <div class="row row-sm-offset">
                        <div class="col-md-10 multi-horizontal" data-for="title">
                            <div class="form-group">
                                <label class="form-control-label mbr-fonts-style display-7" for="title-form1-5">Title</label>
                                    <input type="text" class="form-control" name="title" value="{{ old('title') }}"required>
                                </div>
                            </div>
                            <div class="col-md-10 multi-horizontal" data-for="caption">
                                <div class="form-group">
                                    <label class="form-control-label mbr-fonts-style display-7" for="caption-form1-5">Caption</label>
                                    <textarea class="form-control" name="caption" value="{{ old('caption') }}"required></textarea>
                                </div>
                            </div>
                            <div class="col-md-10 multi-horizontal" data-for="image">
                                <div class="form-group">
                                    <label class="form-control-label mbr-fonts-style display-7" for="image-form1-5">Image</label>
                                    <input type="file" class="form-control" name="image">
                                </div>
                            </div>
                            <div class="col-md-10 multi-horizontal" data-for="price">
                                <div class="form-group">
                                    <label class="form-control-label mbr-fonts-style display-7" for="price-form1-5">Price (in Rupiah)</label>
                                    <input type="text" class="form-control" name="price" value="{{ old('price') }}"required>
                                </div>
                            </div>
                            <div class="col-md-3 multi-horizontal" data-for="Category">
                                <div class="form-group">
                                    <label class="form-control-label mbr-fonts-style display-7" for="category-form1-5">Category</label>
                                    <select class="form-control" name="category">
                                        @foreach($categories as $category)
                                        	<option value="{{$category->categoryID}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <span class="input-group-btn"><button type="submit" class="btn btn-primary btn-form display-4">Post</button></span>
                    </form>
            	</div>
        	</div>
  	</div>
</section>
@endsection