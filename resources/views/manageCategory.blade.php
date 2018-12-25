@extends('layout')

@section('title', 'Manage - Category')

@section('content')
<section class="cid-raLSBQAxbV">
	<div class="container">
		<table class="table table-striped">
			<thead>
				<tr>
					<td scope="col">Category ID</td>
					<td scope="col">Category Name</td>
					<td scope="col">Auth</td>
				</tr>
			</thead>
			<tbody>
				@foreach($categories as $category)
				<tr>
					<td scope="row">{{ $category->categoryID }}</td>
					<td>{{ $category->name }}</td>
					<td><a href="{{route('indexEditCategory', ['id' => $category->categoryID])}}"><span class="mbri-edit2"></span></a><a href="{{route('deleteCategory', ['id' => $category->categoryID])}}"><span class="mbri-trash"></span></a>
        			</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<a class="btn btn-primary btn-block" href="{{route('indexAddCategory')}}">Add</a>
  	</div>
</section>
@endsection