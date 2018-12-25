@extends('layout')

@section('title', 'View')

@section('content')
<section class="cid-raLSBQAxbV">
	<div class="container">
		<div class="titleBox">
            <div class="posterText">
            	@if(session()->get('isAdmin') == 1)          
	            	<a class="btn btn-sm btn-primary display-4" href="{{ route('indexView', ['id' => session()->get('userID')]) }}">
	                    View Your Transaction
	            	</a> 
	                <a class="btn btn-sm btn-secondary display-4" href="{{ route('indexViewAll') }}">
	                    View All Transaction
	                </a>
                @endif  
            </div>
         </div>
	@foreach($histories as $history)
		<table class="mbr-fonts-style">
			<tr>
				<td>Transaction ID</td>
				<td style="width: 25px" align="center">:</td>
				<td>{{ $history->historyID }}</td>
			</tr>
			<tr>
				<td>Buyer</td>
				<td style="width: 25px" align="center">:</td>
				<td>{{ $history->name }}</td>
			</tr>
			<tr>
				<td>Total Price</td>
				<td style="width: 25px" align="center">:</td>
				<td>{{ $history->totalPrice }}</td>
			</tr>
			<tr>
				<td>Transaction Date</td>
				<td style="width: 25px" align="center">:</td>
				<td>{{ $history->transactionDate }}</td>
			</tr>
		</table>
		@php
			$currentID = $history->historyID
		@endphp
		@foreach($detailHistories as $detailHistory)
			@if($detailHistory->historyID == $currentID)
				<div class="p-3 col-md-12 bc-grey" style="margin: 10px 0px;">
				<div class="d-inline-block col-md-2">
                	<img src="{{asset('assets/images/posts/'.$detailHistory->picture)}}" alt="{{$detailHistory->title}}" style="object-fit: contain; height: 150px;">
                </div>
                <div class="d-inline-block col-md-8">
                    Image Name : {{$detailHistory->title}}
                    <br>
                    Image Price &nbsp;&nbsp;: {{$detailHistory->price}}
                    <br>
                </div>
			</div>
			@endif
		@endforeach
		<br><br><br>
	@endforeach
  	</div>
</section>
@endsection