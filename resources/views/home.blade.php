@extends('frontend_layout')

@section('css')
	<link href="/css/home.css" rel="stylesheet" type="text/css">
@endsection()

@section('content')
	<div class="row">

	@foreach($products as $product)
	    <div class="col-md-3">
		<div class="product-item-container">
		    <img class="product-item-image" src="/img/image-placeholder.jpg" />
		    <div class="product-item-description">
			<p>	{{$product->name}}	</p>
			<p>Rp. {{$product->price}}</p>
			<p>Disc. {{$product->discount}} %</p>
		    </div>
		    <div class="product-item-cta">
			<button class="btn btn-primary beli-cta" data-id="{{$product->id}}">Buy</button>
		    </div>
		</div>
	    </div>
	@endforeach

<!--
	    <div class="col-md-3">
		<div class="product-item-container">
		    <img class="product-item-image" src="/img/image-placeholder.jpg" />
		    <div class="product-item-description">
			<p>Item</p>
			<p>Rp. 999,000.00</p>
			<p>Disc. 30%</p>
		    </div>
		    <div class="product-item-cta">
			<button class="btn btn-primary">Buy</button>
		    </div>
		</div>
	    </div>
-->
	

	</div>
@endsection()


@section('js')
	
	<script>
		$(".beli-cta").on("click", function(event) {
			var el = event.target
			var id = $(el).data('id');
			alert("Tambah cart: "+id);

			$.post('/cart/add-content', {
				id: id
			}, 
				function() {
					refreshCart();
				}
			);
		}
	);
	</script>
@endsection()


