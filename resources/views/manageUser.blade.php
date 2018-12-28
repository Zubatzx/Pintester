@extends('layout')

@section('title', 'Manage - User')

@section('content')
<section class="cid-raLSBQAxbV">
	<div class="container">
		<div class="row justify-content-center">
            <div class="title col-12 col-lg-8">
                <h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">
                    Manage User
                </h2>
            </div>
        </div>
		<table class="table table-striped">
			<thead>
				<tr>
					<td scope="col">ID</td>
					<td scope="col">Name</td>
					<td scope="col">Email</td>
					<td scope="col">Gender</td>
					<td scope="col">Auth</td>
				</tr>
			</thead>
			<tbody>
				@foreach($users as $user)
				<tr>
					<td scope="row">{{ $user->userID }}</td>
					<td>{{ $user->name }}</td>
					<td>{{ $user->email }}</td>
					<td>{{ $user->gender }}</td>
					<td><a href="{{route('indexEditUser', ['id' => $user->userID])}}">Edit</a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
  	</div>
</section>
@endsection