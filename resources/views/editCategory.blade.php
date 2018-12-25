@extends('layout')

@section('title', 'Manage - Edit Category')

@section('content')
<section class="mbr-section form1 cid-raLSBQAxbV" id="form1-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="title col-12 col-lg-8">
                <h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">
                    Edit Category
                </h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="media-container-column col-lg-8">          
                <form action="{{ route('saveEditedCategory', ['id' => $category->categoryID]) }}" method="post">
                {{ csrf_field() }}
                @if(isset($errors))
                    <p style="font-weight: bold; color: red">{{ $errors->first() }}</p>
                @endif
                    <div class="row row-sm-offset">
                        <div class="col-md-10 multi-horizontal" data-for="id">
                            <div class="form-group">
                                <label class="form-control-label mbr-fonts-style display-7" for="id-form1-5">ID</label>
                                <input type="text" class="form-control" name="id" value="{{ $category->categoryID }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-10 multi-horizontal" data-for="name">
                            <div class="form-group">
                                <label class="form-control-label mbr-fonts-style display-7" for="name-form1-5">Name</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') ? old('name') : $category->name }}" required>
                            </div>
                        </div>
                    </div>
                    <span class="input-group-btn"><button type="submit" class="btn btn-primary btn-form display-4">Update</button></span>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection