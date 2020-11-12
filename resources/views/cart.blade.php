@extends('layouts.app')


@section('css')   
<link rel="stylesheet" type="text/css" href="{{asset('app/styles/cart_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app/styles/cart_responsive.css')}}"> 

<style> 
.cus_table td{
	text-align: center;
    padding: .75rem;
    vertical-align: middle;
    border-top: unset; 
}
.cus_a {
    vertical-align: middle;
    margin-top: 10px; 
    color: #007bff;
    display: block;
    max-width: 550px;
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

 

	<!-- Cart -->

	<div class="cart_section">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="cart_container">
						<div class="cart_title">รายการสินค้า</div>
						<div class="cart_items">
							<table class="table cus_table cart_list">
								<thead>
								<tr style="align-content: center;">
									<td class="cart_item_title">รหัสสินค้า</td>
									<td class="cart_item_title">ชื่อสินค้า</td>
									{{-- <td class="cart_item_title">สี</td> --}}
									<td class="cart_item_title">จำนวน</td>
									<td class="cart_item_title">ราคา</td>
									<td class="cart_item_title">จัดการ</td>
								</tr>
								</thead>
								<tbody>  
									<tr v-for="item in itemList">
										<td class="cart_item_text">@{{ item.id }}</td>
										<td class="cart_item_text"> 
											<div class="cart_item_image"><img :src="item.attributes.image" alt=""></div>
											<a class="cus_a" :href="/product/+item.id">@{{ item.name }}</a>
										</td>
										{{-- <td class="cart_item_text">สี</td> --}}
										<td class="cart_item_text">@{{ item.quantity }} <button v-on:click="Increase(item.id,item.name,item.quantity,item.price)"class="btn_inc">+</button>&emsp;<button v-on:click="Decrease(item.id,item.name,item.quantity,item.price)"class="btn_inc">-</button></td>
										<td class="cart_item_text">@{{ item.price }}</td>
										<td class="cart_item_text">
											<button v-on:click="removeItem(item.id)" class="btn btn-sm" title="ลบ"><i class="far fa-minus-square text-danger"></i></button>
										</td>
									</tr> 
								</tbody>
							</table> 
							
							<!-- Order Total -->
								<div class="order_total">
								<div class="order_total_content text-md-right">
									<div class="order_total_title">จำนวน:</div>
									<div class="order_total_amount">@{{ details.total_quantity }}</div>
									<div class="order_total_title">ชิ้น /</div>
									<div class="order_total_title">รวมราคา:</div>
									<div class="order_total_amount">@{{ details.total.toFixed(2) }}</div>
									<div class="order_total_title">บาท</div>
								</div>
							</div>
	
							<div class="cart_buttons">
								{{-- <a href="javascript:history.back()"><button type="button" class="button cart_button_clear">ช็อปปิ้งต่อ</button></a> --}}
								<a href="javascript:history.back()"><button type="button" class="button cart_button_clear">ช็อปปิ้งต่อ</button></a>
								<a href="/profile" v-if="details.total_quantity > 0"><button type="button" class="button cart_button_checkout"> ชำระเงิน</button></a>
							</div>
				
 
						</div> 
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection

@section('js') 
<script src="{{asset('app/js/cart_custom.js')}}"></script> 
<script>
$(document).ready(function() {

function gotoproduct(){
	alert('sss');
}
	
})

</script> 

@endsection
