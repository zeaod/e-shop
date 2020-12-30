		<!-- Header -->
	
		<header class="header">

			<!-- Top Bar -->
	
			<div class="top_bar">
				<div class="container">
					<div class="row">
						<div class="col d-flex flex-row">
							<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{asset('images/phone.png')}}" alt=""></div>+66 9992 8876</div>
							<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{asset('images/mail.png')}}" alt=""></div><a href="mailto:e-shop.info@gmail.com">e-shop.info@gmail.com</a></div>
							<div class="top_bar_content ml-auto">
								{{-- <div class="top_bar_menu">
									<ul class="standard_dropdown top_bar_dropdown">
										<li>
											<a href="#">English<i class="fas fa-chevron-down"></i></a>
											<ul>
												<li><a href="#">Italian</a></li>
												<li><a href="#">Spanish</a></li>
												<li><a href="#">Japanese</a></li>
											</ul>
										</li>
										<li>
											<a href="#">$ US dollar<i class="fas fa-chevron-down"></i></a>
											<ul>
												<li><a href="#">EUR Euro</a></li>
												<li><a href="#">GBP British Pound</a></li>
												<li><a href="#">JPY Japanese Yen</a></li>
											</ul>
										</li>
									</ul>
								</div> --}}
								<div class="top_bar_user">
									{{-- <div><a href="#">Register</a></div>
									<div><a href="#">Sign in</a></div>  --}}
									@guest
										@if (Route::has('register')) 
										<div class="user_icon"><img src="{{asset('images/user.svg')}}" alt=""></div>
										<div><a href="{{ route('register') }}">ลงทะเบียน</a></div>
										@endif
										<div><a href="{{ route('login') }}">เข้าระบบ</a></div> 
									@else  
										<ul class="cus_standard_dropdown top_bar_dropdown">
											<li>
												<div class="user_icon"><img src="{{asset('images/user.svg')}}" alt=""></div>
												<a href="#" class="dropdown-toggle">{{ Auth::user()->name }}</a>
												<ul>
													<li><a href="/profile">{{ __('บัญชีของฉัน') }}</a></li>
													<li><a href="{{ route('password.request') }}" >
														{{ __('เปลี่ยบรหัสผ่าน') }}
														</a>
													</li>
													<li>
														<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
															{{ __('ออกจากระบบ') }}
														</a>
														<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
															@csrf
														</form>
													</li>
												</ul>
											</li> 
										</ul>
									@endguest 
								</div>
							</div>
						</div>
					</div>
				</div>		
			</div>
	
			<!-- Header Main -->
	
			<div class="header_main">
				<div class="container">
					<div class="row">
	
						<!-- Logo -->
						<div class="col-lg-2 col-sm-3 col-3 order-1">
							<div class="logo_container">
								<div class="logo"><a href="#">E-shop</a></div>
							</div>
						</div>
	
						<!-- Search -->
						<div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
							<div class="header_search">
								<div class="header_search_content">
									<div class="header_search_form_container">
										<form action="search" class="header_search_form clearfix">
											{{ csrf_field() }}
											<input name="q" type="search" required="required" class="header_search_input" placeholder="ค้นหารายการสินค้า...">
											<div class="custom_dropdown">
												<div class="custom_dropdown_list">
													<span class="custom_dropdown_placeholder clc">หมวดหมู่ทั้งหมด</span>
													<i class="fas fa-chevron-down"></i>
													<ul class="custom_list clc">
														<li><a class="clc" href="#">หมวดหมู่ทั้งหมด</a></li>
														{{-- @isset($categories) --}}
															@foreach ($categories as $item)
																<li><a class="clc" href="#">{{$item->name}}</a></li>
															@endforeach 
														{{-- @endisset  --}}
													</ul>
												</div>
											</div>
											<button type="submit" class="header_search_button trans_300" value="Submit"><img src="{{asset('images/search.png')}}" alt=""></button>
										</form> 
									</div>
								</div>
							</div>
						</div>
	

						<div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
							<div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">

								{{-- Wishlist --}}
								<wishlist-shortcut></wishlist-shortcut>
	
								<!-- Cart -->
								<cart-shortcut></cart-shortcut>

							</div>
						</div>
					</div>
				</div>
			</div>
			
			<!-- Main Navigation -->
	
			<nav class="main_nav">
				<div class="container">
					<div class="row">
						<div class="col">
							
							<div class="main_nav_content d-flex flex-row">
	
								<!-- Categories Menu -->
								<div class="cat_menu_container">
									<div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
										<div class="cat_burger"><span></span><span></span><span></span></div>
										<div class="cat_menu_text">หมวดหมู่</div>
									</div>
	
									<ul class="cat_menu">
										
										@isset($categories)
											@foreach ($categories as $item)
												<li><a href="/category/{{encrypt($item->id)}}">{{$item->name}}<i class="fas fa-chevron-right ml-auto"></i></a></li>
											@endforeach 
										@endisset 
									</ul>
								</div>
	
								<!-- Main Nav Menu -->
	
								<div class="main_nav_menu ml-auto">
									<ul class="standard_dropdown main_nav_dropdown">
										<li><a href="/">หน้าหลัก<i class="fas fa-chevron-down"></i></a></li>
										{{-- <li class="hassubs">
											<a href="#">Super Deals<i class="fas fa-chevron-down"></i></a>
											<ul>
												<li>
													<a href="#">Menu Item<i class="fas fa-chevron-down"></i></a>
													<ul>
														<li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
														<li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
														<li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
													</ul>
												</li>
												<li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
												<li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
												<li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
											</ul>
										</li> --}}
										{{-- <li class="hassubs">
											<a href="#">Featured Brands<i class="fas fa-chevron-down"></i></a>
											<ul>
												<li>
													<a href="#">Menu Item<i class="fas fa-chevron-down"></i></a>
													<ul>
														<li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
														<li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
														<li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
													</ul>
												</li>
												<li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
												<li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
												<li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
											</ul>
										</li> --}}
										{{-- <li class="hassubs">
											<a href="#">Pages<i class="fas fa-chevron-down"></i></a>
											<ul>
												<li><a href="/shop">Shop<i class="fas fa-chevron-down"></i></a></li>
												<li><a href="/product">Product<i class="fas fa-chevron-down"></i></a></li>
												<li><a href="/blog">Blog<i class="fas fa-chevron-down"></i></a></li>
												<li><a href="/blog-post">Blog Post<i class="fas fa-chevron-down"></i></a></li>
												<li><a href="/regular">Regular Post<i class="fas fa-chevron-down"></i></a></li>
												<li><a href="/cart">Cart<i class="fas fa-chevron-down"></i></a></li>
												<li><a href="/contact">Contact<i class="fas fa-chevron-down"></i></a></li> 
											</ul>
										</li> --}}
										{{-- <li><a href="/blog">Blog<i class="fas fa-chevron-down"></i></a></li> --}}
										<li><a href="/category/1">สินค้ายอดนิยม<i class="fas fa-chevron-down"></i></a></li>
										<li><a href="/contact">การติดต่อ<i class="fas fa-chevron-down"></i></a></li>
									</ul>
								</div>
	
								<!-- Menu Trigger -->
	
								<div class="menu_trigger_container ml-auto">
									<div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
										<div class="menu_burger">
											<div class="menu_trigger_text">menu</div>
											<div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
										</div>
									</div>
								</div>
	
							</div>
						</div>
					</div>
				</div>
			</nav>
			
			<!-- Menu -->
	
			<div class="page_menu">
				<div class="container">
					<div class="row">
						<div class="col">
							
							<div class="page_menu_content">
								
								<div class="page_menu_search">
									<form action="#">
										<input type="search" required="required" class="page_menu_search_input" placeholder="Search for products...">
									</form>
								</div>
								<ul class="page_menu_nav">
									<li class="page_menu_item has-children">
										<a href="#">Language<i class="fa fa-angle-down"></i></a>
										<ul class="page_menu_selection">
											<li><a href="#">English<i class="fa fa-angle-down"></i></a></li>
											<li><a href="#">Italian<i class="fa fa-angle-down"></i></a></li>
											<li><a href="#">Spanish<i class="fa fa-angle-down"></i></a></li>
											<li><a href="#">Japanese<i class="fa fa-angle-down"></i></a></li>
										</ul>
									</li>
									<li class="page_menu_item has-children">
										<a href="#">Currency<i class="fa fa-angle-down"></i></a>
										<ul class="page_menu_selection">
											<li><a href="#">US Dollar<i class="fa fa-angle-down"></i></a></li>
											<li><a href="#">EUR Euro<i class="fa fa-angle-down"></i></a></li>
											<li><a href="#">GBP British Pound<i class="fa fa-angle-down"></i></a></li>
											<li><a href="#">JPY Japanese Yen<i class="fa fa-angle-down"></i></a></li>
										</ul>
									</li>
									<li class="page_menu_item">
										<a href="#">Home<i class="fa fa-angle-down"></i></a>
									</li>
									<li class="page_menu_item has-children">
										<a href="#">Super Deals<i class="fa fa-angle-down"></i></a>
										<ul class="page_menu_selection">
											<li><a href="#">Super Deals<i class="fa fa-angle-down"></i></a></li>
											<li class="page_menu_item has-children">
												<a href="#">Menu Item<i class="fa fa-angle-down"></i></a>
												<ul class="page_menu_selection">
													<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
													<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
													<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
													<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
												</ul>
											</li>
											<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
											<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
											<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
										</ul>
									</li>
									<li class="page_menu_item has-children">
										<a href="#">Featured Brands<i class="fa fa-angle-down"></i></a>
										<ul class="page_menu_selection">
											<li><a href="#">Featured Brands<i class="fa fa-angle-down"></i></a></li>
											<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
											<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
											<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
										</ul>
									</li>
									<li class="page_menu_item has-children">
										<a href="#">Trending Styles<i class="fa fa-angle-down"></i></a>
										<ul class="page_menu_selection">
											<li><a href="#">Trending Styles<i class="fa fa-angle-down"></i></a></li>
											<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
											<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
											<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
										</ul>
									</li>
									<li class="page_menu_item"><a href="blog.html">blog<i class="fa fa-angle-down"></i></a></li>
									<li class="page_menu_item"><a href="contact.html">contact<i class="fa fa-angle-down"></i></a></li>
								</ul>
								
								<div class="menu_contact">
									<div class="menu_contact_item"><div class="menu_contact_icon"><img src="{{asset('images/phone_white.png')}}" alt=""></div>+38 068 005 3570</div>
									<div class="menu_contact_item"><div class="menu_contact_icon"><img src="{{asset('images/mail_white.png')}}" alt=""></div><a href="mailto:fastsales@gmail.com">fastsales@gmail.com</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	
		</header>
		 