@extends('layouts.app')

@section('css')  
<link rel="stylesheet" type="text/css" href="{{asset('app/styles/contact_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app/styles/contact_responsive.css')}}">
<style> 
.cus_nav {
    display: -ms-flexbox;
    display: grid;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    padding-left: 0;
    margin-bottom: 0;
    list-style: none;
}

/* customize
 */
 .nav-link.active {
    color: #495057;
    background-color: #fff;
    border-color: #ddd #ddd #fff;
}
.nav-tabs .nav-link { 
	border: unset; 
}
</style>

<style> 
.cus_table {
	border: solid 1px #e8e8e8;
    box-shadow: 0px 1px 5px rgba(0,0,0,0.1); 
} 
.cus_table td{
	text-align: center;
	padding: .75rem;
	vertical-align: middle;
	border-top: unset; 
} 
.btn_inc {
	width: 32px;
	height: 32px;
	border-radius: 0;
	margin: 0;
	background:transparent;
	border-radius:3px;
	border:#ccc solid 1px;
} 
</style>
@endsection

@section('content')

	<!-- Contact Form --> 
		<div class="contact_form">
		<div class="container">
				<div class="contact_form_title">บัญชีผู้ใช้งาน: {{ Auth::user()->name }}</div>

				{{-- รายการสั่งซื้อสินค้า --}} 
			 <div class="row"  v-if="details.total_quantity > 0" style="margin-bottom: 30px;padding-bottom: 50px;border-bottom:1px solid rgba(0,0,0,.1);">
				<div class="col-lg-10 offset-lg-1">
					<div class="cart_container">
						<div class="text-secondary"><b>รายการสั่งซื้อสินค้า</b> </div>
						<div class="cart_items">
							<table class="table cus_table ">
								<thead class="text-secondary">
								<tr style="align-content: center;">
									<td class="cart_item_title">รหัสสินค้า</td>
									<td class="cart_item_title">ชื่อสินค้า</td>
									{{-- <td class="cart_item_title">สี</td> --}}
									<td class="cart_item_title">จำนวน</td>
									<td class="cart_item_title">ราคา</td> 
								</tr>
								</thead>
								<tbody> 
									<tr v-for="item in itemList">
										<td class="cart_item_text">@{{ item.id }}</td>
										<td class="cart_item_text">
											<img :src="item.attributes.image" alt="" style="max-width: 100%;max-height: 60px;padding: 0px 10px;">
											<a class="cus_a" :href="/product/+item.id">@{{ item.name }}</a>
										</td>
										{{-- <td class="cart_item_text">สี</td> --}}
										<td class="cart_item_text">@{{ item.quantity }}  <button v-on:click="Increase(item.id,item.name,item.quantity,item.price)"class="btn_inc">+</button>&emsp;<button v-on:click="Decrease(item.id,item.name,item.quantity,item.price)"class="btn_inc">-</button></td>
										<td class="cart_item_text">@{{ item.price }}</td> 
									</tr> 
									<tr class="text-white bg-secondary">
										<td colspan="2">รวม</td>
										<td>ทั้งหมด @{{ details.total_quantity }} ชิ้น</td>
										<td>รวมราคา @{{ details.total.toFixed(2) }} บาท</td>
									</tr> 
									<tr>
										<td class="text-secondary">เลือกที่อยู่จัดส่งสินค้า</td>
										<td colspan="2">
											<div class="form-group">
												<select class="form-control" id="xx1">
												  <option selected>1 ถนนนครปฐม เขตดุสิต กรุงเทพฯ 10300</option>
												  <option>1 Nakhon Pathom Road, Dusit District, Bangkok 10300</option>
												</select>
											</div>
										</td> 
										<td><button type="button"  v-on:click="buy_now('1')" class="button contact_submit_button">สั่งซื้อ</button></td>
									</tr>
									<tr>
										<td class="text-secondary">เลือกวีธีการชำระเงิน</td>
										<td colspan="2">
											<div class="form-group">
												<select class="form-control" id="dd1">
												  <option selected>เก็บเง็นปลายทาง</option>
												</select>
											</div> 
										</td>
										<td><a href="/cart"> ไปที่ตะกร้าสินค้า </a></td>
									</tr>
								</tbody>
							</table>   
						</div> 
					</div>
				</div>
			 </div> {{-- /รายการสั่งซื้อสินค้า --}} 


			{{-- Tab menu --}}
			<div class="row"> 
				<div class="col-lg-3 ">
					
					<ul class="cus_nav nav-tabs" id="myTab" role="tablist">
						<b class="text-secondary">จัดการกับบัญชีของฉัน</b>
						<li class="nav-item">
						<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">ข้อมูลส่วนตัว</a>
						</li>
						<li class="nav-item">
						<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">ที่อยู่จัดส่งสินค้า</a>
						</li>
						<li class="xxxx">
						<a class="nav-link text-secondary" ><s>รายการสั่งซื้อสินค้า</s></a>
						</li>
						<li class="xxxx">
						<a class="nav-link text-secondary" ><s>การชำระเงิน</s></a>
						</li>
						<li class="xxxx">
						<a class="nav-link text-secondary" ><s>การยกเลิกสินค้า</s></a>
						</li>
						<li class="xxxx">
						<a class="nav-link text-secondary" ><s>การคืนสินค้า</s></a>
						</li>
						<li class="xxxx">
						<a class="nav-link text-secondary" ><s>รีวิวสินค้า</s></a>
						</li>
						<li class="xxxx">
						<a class="nav-link text-secondary" ><s>รายการที่ชอบและร้านค้าที่ติดตาม</s></a>
						</li> 
						<li class="xxxx">
						<a class="nav-link text-secondary" ><s>ขายสินค้ากับออนไลน์กับเราที่นี้</s></a>
						</li> 
					</ul> 
					
				</div> {{-- /col-lg-3 --}}


				<div class="col-lg-9">
					<!-- Tab panes -->
					<div class="tab-content">
						{{-- Account --}}
						<div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
							<b class="text-secondary">ข้อมูลส่วนตัว</b><hr>
							<p><b>ชื่อผู้ใช้: </b> {{Auth::user()->name}}</p>
							<p><b>อีเมล์: </b> {{Auth::user()->email}}</p>
							
						</div>{{-- /Account --}}


						{{-- Address --}}
						<div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
							<b class="text-secondary">ที่อยู่</b><hr>
							<form action="#" id="contact_form" class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="exampleInputEmail1">ชื่อ-สกุล</label>
										<input type="text" class="form-control" placeholder="ชื่อ-สกุล" required="required"> 
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">หมายเลขโทรศัพท์</label>
										<input type="text" class="form-control" placeholder="หมายเลขโทรศัพท์" required="required">
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">ที่อยู่อีเมล</label>
										<input type="email" class="form-control" placeholder="ที่อยู่อีเมล" required="required" value="@auth{{Auth::user()->email}} @endauth">
									</div>
								</div>
		
								<div class="col-md-6">
									<div class="form-group">
										<label for="exampleInputEmail1">ที่อยู่</label>
										<input type="text" class="form-control" placeholder="กรุณาระบุที่อยู่ (บ้านเลขที่,ถนน,ตำบล)" required="required"> 
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">จังหวัด</label>
										<input type="text" class="form-control" placeholder="กรุณาเลือกจังหวัด" required="required">
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">เขต/อำเภอ</label>
										<input type="text" class="form-control" placeholder="กรุณาเลือกเขต/อำเภอ" required="required"> 
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">รหัสไปรษณีย์</label>
										<input type="text" class="form-control" placeholder="กรุณาระบุรหัสไปรษณีย์" required="required">
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">อื่นๆ</label> 
										<textarea class="form-control" rows="4" placeholder="อื่นๆ" ></textarea>
									</div>
		
									<div class="contact_form_button">
										<button type="submit" class="button contact_submit_button">บันทึกที่อยู่</button>
									</div>
								</div>   
							</form>
						</div> {{-- /Address --}}



						{{-- <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">...........</div>  --}}

					</div> <!-- /Tab panes -->

					
				</div>
			</div>
		</div>
		<div class="panel"></div>
	</div>
 
    

@endsection

@section('js')  
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
<script src="{{asset('app/js/contact_custom.js')}}"></script>


@endsection
