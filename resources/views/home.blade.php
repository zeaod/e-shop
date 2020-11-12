@extends('layouts.app')

@section('css')   
<link rel="stylesheet" type="text/css" href="{{asset('app/plugins/jquery-ui-1.12.1.custom/jquery-ui.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app/styles/shop_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app/styles/shop_responsive.css')}}">
@endsection

@section('content')

 
	<!-- Home -->

	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="images/shop_background.jpg"></div>
		<div class="home_overlay"></div>
		<div class="home_content d-flex flex-column align-items-center justify-content-center">
			<h2 class="home_title">Smartphones & Tablets</h2>
		</div>
	</div>

	<!-- Shop -->

	<div class="shop">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">

					<!-- Shop Sidebar -->
					<div class="shop_sidebar">
						<div class="sidebar_section">
							<div class="sidebar_title">หมวดหมู่</div>
							<ul class="sidebar_categories">
								@isset($categories)
									@foreach ($categories as $item)
									<li><a href="/category/{{encrypt($item->id)}}">{{$item->name}}</a></li> 
									@endforeach 
								@endisset
							</ul>
						</div>
						<div class="sidebar_section filter_by_section">
							<div class="sidebar_title">กรอง</div>
							<div class="sidebar_subtitle">ราคา</div>
							<div class="filter_price">
								<div id="slider-range" class="slider_range"></div>
								<p>ช่วงราคา: </p>
								<p><input type="text" id="amount" class="amount" readonly style="border:0; font-weight:bold;"></p>
							</div>
						</div>
						{{-- <div class="sidebar_section">
							<div class="sidebar_subtitle color_subtitle">Color</div>
							<ul class="colors_list">
								<li class="color"><a href="#" style="background: #b19c83;"></a></li>
								<li class="color"><a href="#" style="background: #000000;"></a></li>
								<li class="color"><a href="#" style="background: #999999;"></a></li>
								<li class="color"><a href="#" style="background: #0e8ce4;"></a></li>
								<li class="color"><a href="#" style="background: #df3b3b;"></a></li>
								<li class="color"><a href="#" style="background: #ffffff; border: solid 1px #e1e1e1;"></a></li>
							</ul>
						</div> --}}
						<div class="sidebar_section">
							<div class="sidebar_subtitle brands_subtitle">ยี่ห้อ</div>
							<ul class="brands_list">
								@isset($brands)
									@foreach ($brands as $item)
										<li class="brand"><a href="/brand/{{encrypt($item->id)}}">{{$item->name}}</a></li>
									@endforeach
								@endisset
							</ul>
						</div>
					</div>

				</div>

				<div class="col-lg-9">
					
					<!-- Shop Content -->

					<div class="shop_content">
						<div class="shop_bar clearfix">
							{{-- <div class="shop_product_count"><span>186</span> รายการที่ค้นพบ</div> --}}
							<div class="shop_sorting">
								<span>เรียงตาม:</span>
								<ul>
									<li>
										<span class="sorting_text">ความนิยมสูงสุด<i class="fas fa-chevron-down"></span></i>
										<ul>
											<li class="shop_sorting_button" data-isotope-option='{ "sortBy": "original-order" }'>ความนิยมสูงสุด</li>
											<li class="shop_sorting_button" data-isotope-option='{ "sortBy": "name" }'>ชื่อ</li>
											<li class="shop_sorting_button"data-isotope-option='{ "sortBy": "price" }'>ราคา</li>
										</ul>
									</li>
								</ul>
							</div>
						</div>

						<div class="product_grid">
							<div class="product_grid_border"></div>

							<!-- Product Item แบบธรรมดา -->
							@isset($products)
							@foreach ($products as $item)
							<div class="product_item">
								<div class="product_border"></div>
								<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{$item->image}}" alt=""></div>
								<div class="product_content">
									<div class="product_price">${{$item->ragular_price}}</div>
									<div class="product_name"><div><a href="{{url('/product')}}/{{encrypt($item->id)}}" tabindex="0">{{$item->name}}</a></div></div>
								</div>
								<div class="product_fav"><i class="fas fa-heart"></i></div>
								<ul class="product_marks">
									<li class="product_mark product_discount">{{$item->discount_price}}%</li>
									<li class="product_mark product_new">new</li>
								</ul>
							</div>
							@endforeach	
							@endisset
							@isset($message)
								{{$message}}
							@endisset


							<!-- Product Item แบบ News-->
							{{-- <div class="product_item is_new">
								<div class="product_border"></div>
								<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/new_5.jpg" alt=""></div>
								<div class="product_content">
									<div class="product_price">$225</div>
									<div class="product_name"><div><a href="#" tabindex="0">Philips BT6900A</a></div></div>
								</div>
								<div class="product_fav"><i class="fas fa-heart"></i></div>
								<ul class="product_marks">
									<li class="product_mark product_discount">-25%</li>
									<li class="product_mark product_new">new</li>
								</ul>
							</div> --}}

							<!-- Product Item แบบมีส่วนลด-->
							{{-- <div class="product_item discount">
								<div class="product_border"></div>
								<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/featured_1.png" alt=""></div>
								<div class="product_content">
									<div class="product_price">$225<span>$300</span></div>
									<div class="product_name"><div><a href="#" tabindex="0">Huawei MediaPad...</a></div></div>
								</div>
								<div class="product_fav"><i class="fas fa-heart"></i></div>
								<ul class="product_marks">
									<li class="product_mark product_discount">-25%</li>
									<li class="product_mark product_new">new</li>
								</ul>
							</div> --}}
 

						</div>

						<!-- Shop Page Navigation -->
						<div class="shop_page_nav d-flex flex-row">
							@isset($products)
								{{-- {!! $products->render() !!} --}}
								{{-- {{ $products->links() }} --}}
							@endisset
							{{-- <div class="page_prev d-flex flex-column align-items-center justify-content-center"><i class="fas fa-chevron-left"></i></div>
							<ul class="page_nav d-flex flex-row">
								<li><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">...</a></li>
								<li><a href="#">21</a></li>
							</ul>
							<div class="page_next d-flex flex-column align-items-center justify-content-center"><i class="fas fa-chevron-right"></i></div> --}}
						</div>

					</div>

				</div>
			</div>
		</div>
	</div>


@endsection

@section('js') 
<script src="{{asset('app/plugins/Isotope/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('app/plugins/jquery-ui-1.12.1.custom/jquery-ui.js')}}"></script>
<script src="{{asset('app/plugins/parallax-js-master/parallax.min.js')}}"></script> 
<script src="{{asset('app/js/shop_custom.js')}}"></script>
@endsection