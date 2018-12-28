@extends('layout')

@section('title', 'Manage - Add Category')

@section('content')
<section class="mbr-section form1 cid-raLSBQAxbV" id="form1-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="title col-12 col-lg-8">
                <h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">
                    Insert Category
                </h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="media-container-column col-lg-8">          
                <form action="{{ url('saveNewCategory') }}" method="post">
                {{ csrf_field() }}
                @if(isset($errors))
                    <p class="message">{{ $errors->first() }}</p>
                @endif
                    <div class="row row-sm-offset">
                        <div class="col-md-10 multi-horizontal" data-for="name">
                            <div class="form-group">
                                <label class="form-control-label mbr-fonts-style display-7" for="name-form1-5">Name</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                            </div>
                        </div>
                    </div>
                    <span class="input-group-btn"><button type="submit" class="btn btn-primary btn-form display-4">Add</button></span>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection