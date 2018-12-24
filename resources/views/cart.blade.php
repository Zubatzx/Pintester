@extends('layout')

@section('title', 'My Cart')

@section('content')

<section class="cid-raLSBQAxbV">
	<div class="container">
		<div class="mbr-fonts-style">
	          <p><span>Item in cart : {{ $itemCount }}</span></p>
	    </div>
	    <div class="row col-sm-12 row-list" id="allCart">
		@foreach($cartDetail as $detail)
			<div class="p-3 col-md-12 bc-grey" style="margin: 10px 0px;">
				<div class="d-inline-block col-md-2">
                	<img src="{{asset('assets/images/posts/'.$detail->picture)}}" alt="{{$detail->title}}" style="object-fit: contain; height: 150px;">
                </div>
                <div class="d-inline-block col-md-8">
                    Image Title : {{$detail->title}}
                    <br>
                    Image Price : {{$detail->price}}
                    <br>
                    Image Owner : {{$detail->name}}
                    <br>
                    <a class="btn btn-sm btn-secondary display-4" href="{{ route('deleteFromCart', ['id' => $detail->detailCartID])}}">
                		Remove
            		</a>	
                </div>
			</div>
		@endforeach
            <div class="mbr-fonts-style">
              <p><span>Total Price : {{ $cart->totalPrice }}</span></p>
                @if($itemCount > 0)
                    <a class="btn btn-sm btn-primary display-4" href="{{ route('checkout', ['id' => $cart->cartID])}}">
                        Checkout
                    </a>
                @endif
            </div>
		</div>
	</div>
</section>
@endsection