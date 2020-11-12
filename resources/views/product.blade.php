@extends('layouts.app')

@section('css') 
<link rel="stylesheet" type="text/css" href="{{asset('app/styles/product_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app/styles/product_responsive.css')}}">

@endsection

@section('content')

	<!-- Single Product -->

	<div class="single_product">
		<div class="container">
			<div class="row">

				<!-- Images -->
				<div class="col-lg-2 order-lg-1 order-2">
					<ul class="image_list">
						<li data-image="{{$item->image}}"><img src="{{$item->image}}" alt=""></li>
						<li data-image="https://image.winudf.com/v2/image1/Y29tLmVzaG9wY29tX3NjcmVlbl8xXzE1NjgwNzUyNDBfMDY0/screen-1.jpg?fakeurl=1&type=.jpg"><img src="https://image.winudf.com/v2/image1/Y29tLmVzaG9wY29tX3NjcmVlbl8xXzE1NjgwNzUyNDBfMDY0/screen-1.jpg?fakeurl=1&type=.jpg" alt="" style="transform: rotate(25deg);"></li>
						<li data-image="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAPFBMVEX6+vq2trazs7Pw8PD5+fn9/f329va7u7vMzMzi4uLU1NS+vr7X19fExMTq6urt7e3IyMje3t6tra3Pz8/fmMdaAAAFC0lEQVR4nO2c65KjKhRGUS4id4f3f9ezNxp1+qS7k/yIQ+pb1ZWKChmWbEEBRwgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA8DtavyfPZcj5JfLV5X6YPIwvMcydVKN24/ASY7266A+yGj5fg8No1dVlf4xm6O2TxM4Mx/Bsrpmq8bMNUyzx6UwX8Zoh9Yfd9IgvGnbE2dDIV/jXL8fDUJUXe8b5aoefOQzTq11/vNrhZw7D+VVDf7XDz3wxnJ6lM8OxCPUcuTdD+2wnJ2F4PV+j9Em6M7TPZu/P8OOj9GSYgwv5V+GODQM/9w+/3pL3a7jd4Ix/3XOa/2fv1lD52x3Z6ckh3blKuzWU+12n3FMqPy7666PSBxjuA786jKetG90ammkTnLZrT4ncHpQ+pg5F2FqavTFdn4/HsCbYRfs1VJb6itOIoV425URPHxSxtza2X0PatNEefcXtwhw9ha1O++1dz4Z/p9rHcHi6glrV2/X5KYb6PMIx60opt5mnTzHcm9YWp+2SLJ9lWP8apFo31jD9EMP53gjb2gp1bKiFaVDfYPydccatNe3TkPpAbRbbbr4nX2y8P5DawrQbQxY7G4Zp3LuHbwaK19a0F0OX5TlKzTe1didMOzGkenL6MHxIcLsp78Wwxelu+ODqjBamPRgufId9NpTT73Z7mHZgKJSLxHwYtluWh6pR9mFIPR8/EB0tzeMzwaoTwxufOiJ8AMN7aH4y7sqwmCdJnRl+5Cz3wasrFfqpw09dbXKg6otVmK4u+eM828xsz8hXFxsAAAAAAAAAAACfhWrTE23IwajbMlJ+gUSsf9vsBScz61ZjTadueXnHtrEeu33d0u4Z9rzvY6lUlFSFkHbyrk3Cq5pVLTy/0l4IdbWV0cUpzloHnpKKbbmlsk4bKym/KVK4Nqtm6bfWMyIjL8vg5FXq5DiDLJzXvdmw/uEZtKjlEIwpbRml8sn4IQkdBquFnDz7xCLNPCRtq8xZ8loMkfxgdOTJ/nnSMk5JiDyJtC7F5FOhBB2W0kX6B3hf9okzi/fWYi2T1GRYK0+n+XkzjFQ/ylqrtQsLHUq87lnPs7bL7U1Y+uqCnnngNy46OIqGk6HwOdJJoiNaTmpu76TkaC54i7YuobBhTJrntldPMqSzLuNitYlZeqOraytplK4lhLCwhPGGvM2UScGQkKHPwzB5HarWhZJTcG+Gk6PM7/5/JWoQfiadNoCrnb0ZZm9mR4ZpStlT1Tm+BL0jw2UznH3KQ2Z3TuZbst2QYiLPpFxsCLaKzdCHSwxJYom6LFyHNuyGpJeo6DaWEgtJ8MjwUjjFFqSFj1SSUlRJ1XOyow7NVIqd5hal9HunKH2zX6tD7UYKVLoc+UPcDJOPZrHG024zSTNwFLuynoNW3ImKSx8ihqjUICmKB8mG3AprOmftgwyprZK74dv9hLCBrygqT/CVTjrvUhO1pUmQdrBUSGoRKUaTL9XTxWonbvHTFtDCL3r5E8il/ZbLg0gDHQ+e15yYURZKTrE9885F8mesb+4QJdea4WtDzmk9xSob+hPUrPPqBLEdN2lO3EcmhhJms2U3tLUmk9kk2iRyahrZcHIp1p1Stbz5/Z1+s/rt+AOF+j7JlyOXGH4pws9H1b2v3+VUpy//gBoAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADv5D8IIUBnoRgs7gAAAABJRU5ErkJggg=="><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAPFBMVEX6+vq2trazs7Pw8PD5+fn9/f329va7u7vMzMzi4uLU1NS+vr7X19fExMTq6urt7e3IyMje3t6tra3Pz8/fmMdaAAAFC0lEQVR4nO2c65KjKhRGUS4id4f3f9ezNxp1+qS7k/yIQ+pb1ZWKChmWbEEBRwgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA8DtavyfPZcj5JfLV5X6YPIwvMcydVKN24/ASY7266A+yGj5fg8No1dVlf4xm6O2TxM4Mx/Bsrpmq8bMNUyzx6UwX8Zoh9Yfd9IgvGnbE2dDIV/jXL8fDUJUXe8b5aoefOQzTq11/vNrhZw7D+VVDf7XDz3wxnJ6lM8OxCPUcuTdD+2wnJ2F4PV+j9Em6M7TPZu/P8OOj9GSYgwv5V+GODQM/9w+/3pL3a7jd4Ix/3XOa/2fv1lD52x3Z6ckh3blKuzWU+12n3FMqPy7666PSBxjuA786jKetG90ammkTnLZrT4ncHpQ+pg5F2FqavTFdn4/HsCbYRfs1VJb6itOIoV425URPHxSxtza2X0PatNEefcXtwhw9ha1O++1dz4Z/p9rHcHi6glrV2/X5KYb6PMIx60opt5mnTzHcm9YWp+2SLJ9lWP8apFo31jD9EMP53gjb2gp1bKiFaVDfYPydccatNe3TkPpAbRbbbr4nX2y8P5DawrQbQxY7G4Zp3LuHbwaK19a0F0OX5TlKzTe1didMOzGkenL6MHxIcLsp78Wwxelu+ODqjBamPRgufId9NpTT73Z7mHZgKJSLxHwYtluWh6pR9mFIPR8/EB0tzeMzwaoTwxufOiJ8AMN7aH4y7sqwmCdJnRl+5Cz3wasrFfqpw09dbXKg6otVmK4u+eM828xsz8hXFxsAAAAAAAAAAACfhWrTE23IwajbMlJ+gUSsf9vsBScz61ZjTadueXnHtrEeu33d0u4Z9rzvY6lUlFSFkHbyrk3Cq5pVLTy/0l4IdbWV0cUpzloHnpKKbbmlsk4bKym/KVK4Nqtm6bfWMyIjL8vg5FXq5DiDLJzXvdmw/uEZtKjlEIwpbRml8sn4IQkdBquFnDz7xCLNPCRtq8xZ8loMkfxgdOTJ/nnSMk5JiDyJtC7F5FOhBB2W0kX6B3hf9okzi/fWYi2T1GRYK0+n+XkzjFQ/ylqrtQsLHUq87lnPs7bL7U1Y+uqCnnngNy46OIqGk6HwOdJJoiNaTmpu76TkaC54i7YuobBhTJrntldPMqSzLuNitYlZeqOraytplK4lhLCwhPGGvM2UScGQkKHPwzB5HarWhZJTcG+Gk6PM7/5/JWoQfiadNoCrnb0ZZm9mR4ZpStlT1Tm+BL0jw2UznH3KQ2Z3TuZbst2QYiLPpFxsCLaKzdCHSwxJYom6LFyHNuyGpJeo6DaWEgtJ8MjwUjjFFqSFj1SSUlRJ1XOyow7NVIqd5hal9HunKH2zX6tD7UYKVLoc+UPcDJOPZrHG024zSTNwFLuynoNW3ImKSx8ihqjUICmKB8mG3AprOmftgwyprZK74dv9hLCBrygqT/CVTjrvUhO1pUmQdrBUSGoRKUaTL9XTxWonbvHTFtDCL3r5E8il/ZbLg0gDHQ+e15yYURZKTrE9885F8mesb+4QJdea4WtDzmk9xSob+hPUrPPqBLEdN2lO3EcmhhJms2U3tLUmk9kk2iRyahrZcHIp1p1Stbz5/Z1+s/rt+AOF+j7JlyOXGH4pws9H1b2v3+VUpy//gBoAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADv5D8IIUBnoRgs7gAAAABJRU5ErkJggg==" alt=""></li>
					</ul>
				</div>

				<!-- Selected Image -->
				<div class="col-lg-5 order-lg-2 order-1">
					<div class="image_selected"><img src="{{$item->image}}" alt=""></div>
				</div>

				<!-- Description -->
				<div class="col-lg-5 order-3">
					<div class="product_description">
						<div class="product_category">{{$item->catecory}}</div>
						<div class="product_name">{{$item->name}}</div>
						<div class="rating_r rating_r_4 product_rating"><i></i><i></i><i></i><i></i><i></i></div>
						<div class="product_text"><p>{{$item->description}}</p></div>
						<div class="order_info d-flex flex-row">
							<form action="#">
								<div class="clearfix" style="z-index: 1000;">

									<!-- Product Quantity -->
									<div class="product_quantity clearfix"> 
										<span>จำนวน: </span>
										{{-- <input v-model="item.qty" id="quantity_input" type="text" pattern="[0-9]*"> --}}
										<input v-on:input="change" v-on:change="change" :value="inpNum" type="text">
										<div class="quantity_buttons">
											<div v-on:click="quantity_inc_button" id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>
											<div v-on:click="quantity_dec_button" id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
										</div>
									</div>

									<!-- Product Color -->
									<ul class="product_color">
										<li>
											<span>สี: </span>
											<div class="color_mark_container"><div id="selected_color" class="color_mark"></div></div>
											<div class="color_dropdown_button"><i class="fas fa-chevron-down"></i></div>

											<ul class="color_list">
												<li><div class="color_mark" style="background: #999999;"></div></li>
												<li><div class="color_mark" style="background: #b19c83;"></div></li>
												<li><div class="color_mark" style="background: #000000;"></div></li>
											</ul>
										</li>
									</ul>

								</div>

								<div class="product_price">฿{{$item->ragular_price}}</div>
								<div class="button_container"> 
									{{-- <a href="{{ url('add-to-cart/'.$item->id) }}"><button type="button" class="button cart_button">สั่งซื้อ</button></a> --}}
									{{-- <button v-on:click="addItem('{{$item->id}}','{{$item->name}}','{{$item->ragular_price}}')" type="button" class="button cart_button">เพิ่มลงตะกร้า</button> --}}
									<button v-on:click="addItem('{{$item->id}}','{{$item->name}}','{{$item->image}}','{{$item->ragular_price}}')" type="button" class="button cart_button">เพิ่มลงตะกร้า</button>
									<div class="product_fav"><i class="fas fa-heart"></i></div>

									<!-- Cart -->
									<div class="cart" style="position: fixed; top: 50%; right: 10px; z-index: 9999; background: rgb(14 140 228 / 18%); padding: 10px; border-radius: 5px;">
										<a href="/cart" class="cart_container d-flex flex-row align-items-center justify-content-end">
											<div class="cart_icon">
												<img src="{{asset('images/cart.png')}}" alt="">
												<div class="cart_count"><span>@{{ details.total_quantity }}</span></div>
											</div>
											<div class="cart_content"> 
												<div class="cart_price">@{{ details.total.toFixed(2) }}</div>
											</div>
										</a>
									</div>
								</div>
								
							</form>


						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
 

@endsection

@section('js') 
<script src="{{asset('app/js/product_custom.js')}}"></script>
@endsection
