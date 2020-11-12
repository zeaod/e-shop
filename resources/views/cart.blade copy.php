@extends('layouts.app')

<link rel="stylesheet" type="text/css" href="{{asset('app/styles/product_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app/styles/product_responsive.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('app/styles/cart_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app/styles/cart_responsive.css')}}">


@section('css')  
<style>
	.product_quantity {
    width: 70px;
    height: 50px;
    border: solid 1px #e5e5e5;
    border-radius: 5px;
    overflow: hidden;
    padding-left: unset;
    float: left;
    margin-right: unset;
} 
</style>
@endsection

@section('content')

 

	<!-- Cart -->

	<div class="cart_section">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="cart_container">
						<div class="cart_title">Shopping Cart</div>
						<div class="cart_items">
								@php $total = 0; @endphp 

								 	<table id="cart" class="table table-hover table-condensed">
									<thead>
									<tr>
										<th style="width:50%">Product</th>
										<th style="width:10%">Price</th>
										<th style="width:8%">Quantity</th>
										<th style="width:22%" class="text-center">Subtotal</th>
										{{-- <th style="width:10%"></th> --}}
									</tr>
									</thead>
									<tbody>
									
											@if(session('cart'))
												@foreach(session('cart') as $id => $details)
									
													<?php $total += $details['price'] * $details['quantity'] ?>
									
													<tr>
														<td data-th="Product">
															<div class="row">
																<div class="col-sm-3 hidden-xs"><img src="{{ $details['photo'] }}" width="100" height="100" style="padding-right:15px !important;" class="img-responsive"/></div>
																<div class="col-sm-9">
																	<h4 class="nomargin">{{ $details['name'] }}</h4>
																</div>
															</div>
														</td>
														<td data-th="Price">${{ $details['price'] }}</td>
														<td data-th="Quantity">
															<div class="product_quantity clearfix">
																<input id="quantity_input" type="text" pattern="[0-9]*" value="{{ $details['quantity'] }}" class="form-control quantity" >
																<div class="quantity_buttons">
																	<div id="quantity_inc_button" class="quantity_inc quantity_control" data-id="{{ $id }}"><i class="fas fa-chevron-up"></i></div>
																	<div id="quantity_dec_button" class="quantity_dec quantity_control" data-id="{{ $id }}"><i class="fas fa-chevron-down"></i></div>
																</div>
															</div> 
														</td>
														<td data-th="ราคา" class="text-center">${{ $details['price'] * $details['quantity'] }}</td>
														<td class="actions" data-th="">
															<button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}"><i class="fas fa-sync-alt"></i></button>
															<button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}"><i class="fas fa-minus-circle"></i></button>
														</td>
													</tr>
												@endforeach
											@endif
							 
									</tbody> 
									<tr>
										<td><a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i>ช็อปปิ้งต่อ</a></td>
										<td colspan="2" class="hidden-xs"></td>
										<td class="hidden-xs text-center"><strong>Total ${{ $total }}</strong></td>
									</tr> 
								</table> 
						</div>
						 @if ($total != 0 )
							<div class="cart_buttons">
								{{-- <button type="button" class="button cart_button_clear">Add to Cart</button> --}}
								<button type="button" class="button cart_button_checkout">ชำระเงิน</button>
							</div>
						 @endif

						
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection

@section('js') 
<script src="{{asset('app/js/cart_custom.js')}}"></script>
<script src="{{asset('app/js/product_custom.js')}}"></script>


 
    <script type="text/javascript">
 
 
        $("#quantity_inc_button").click(function (e) {
           e.preventDefault(); 
		   var ele = $(this);
				$.ajax({
				url: '{{ url('update-cart') }}',
				method: "patch",
				data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()},
				success: function (response) {
					window.location.reload();
				}
				}); 
        });
 
 
        $("#quantity_dec_button").click(function (e) {
           e.preventDefault(); 
		   var ele = $(this); 
		   if (ele.parents("tr").find(".quantity").val() == 1){
				$.ajax({
				url: '{{ url('update-cart') }}',
				method: "patch",
				data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()},
				success: function (response) {
					$.ajax({
						url: '{{ url('remove-from-cart') }}',
						method: "DELETE",
						data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
						success: function (response) {
							window.location.reload();
						}
					});
				}
				}); 
			}else{
				$.ajax({
				url: '{{ url('update-cart') }}',
				method: "patch",
				data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()},
				success: function (response) {
					window.location.reload();
				}
				}); 
			}

		});
		
        $(".remove-from-cart").click(function (e) {
            e.preventDefault();
 
            var ele = $(this);
 
            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });
 
    </script>
  


@endsection
