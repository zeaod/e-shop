<template>
    


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
									<!-- {{-- <td class="cart_item_title">สี</td> --}} -->
									<td class="cart_item_title">จำนวน</td>
									<td class="cart_item_title">ราคา</td>
									<td class="cart_item_title">ลบสินค้า</td>
								</tr>
								</thead>
								<tbody>   
									<tr
                                        v-for="item in itemList"
                                        :key="item.id"  
                                    >
										<td class="cart_item_text"> {{item.id}}</td>
										<td class="cart_item_text"> 
											<div class="cart_item_image"><img :src="item.attributes.image" alt=""></div>
											<a class="cus_a" :href="'/product/' + item.id"> {{item.name}}</a>
										</td>
										<!-- <td class="cart_item_text">สี</td> -->
										<td class="cart_item_text">{{item.quantity}} 
                                            <button v-on:click="Increase(item.id,item.name,item.quantity,item.price)" class="btn_inc">+</button>&emsp;
                                            <button v-on:click="Decrease(item.id,item.name,item.quantity,item.price)" class="btn_inc">-</button></td>
										<td class="cart_item_text"> {{item.price}}</td>
										<td class="cart_item_text">
											<button v-on:click="removeItem(item.id)" class="btn btn-sm" title="ลบ"><i class="fas fa-ban text-danger"></i></button> 
										</td>
									</tr> 
								</tbody>
							</table> 
							
							<!-- Order Total -->
								<div class="order_total">
								<div class="order_total_content text-md-right">
									<div class="order_total_title">จำนวน:</div>
									<div class="order_total_amount"> {{details.total_quantity}}</div>
									<div class="order_total_title">ชิ้น /</div>
									<div class="order_total_title">รวมราคา:</div>
									<div class="order_total_amount"> {{details.total.toFixed(2)}}</div>
									<div class="order_total_title">บาท</div>
								</div>
							</div>
	
							<div class="cart_buttons">
								<a href="javascript:history.back()"><button type="button" class="button cart_button_clear">ช็อปปิ้งต่อ</button></a>
								<a href="/profile" v-if="details.total_quantity > 0"><button type="button" class="button cart_button_checkout"> ชำระเงิน</button></a>
							</div>
 
 
						</div> 
					</div>
				</div>
			</div>
		</div>
	</div>



</template>

<script>

import { mapState, mapActions } from 'vuex';

export default { 

    created(){
        this.loadItems();
    },
    methods:{
        ...mapActions('cart',['loadDetails', 'loadItems']),

            Increase: function(id,name,quantity,price) {    //เพิ่มขึ้น page: cart
                axios.post('/cart/update',{
                    _token:this._token,
                    action:'Increase',
                    id:id,
                    name:name, 
                    price:price,
                    qty:1
                }).then( Response => { 
                    this.loadItems();
                    this.loadDetails();
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            Decrease: function(id,name,quantity,price) {    //ลดลง page: cart
                if (quantity > 1) {
                    // this.removeItem(id)
                    axios.post('/cart/update',{
                        _token:this._token,
                        action:'Decrease',
                        id:id,
                        name:name, 
                        price:price,
                        qty:quantity
                    }).then( Response => {
                        this.loadItems();
                        this.loadDetails();
                    })
                    .catch(function (error) {
                        console.log(error);
                    });  
                } 
            },
            removeItem: function(id) {
                axios.delete('/cart/'+id,{
                    params: {
                        _token:this._token
                    }
                }).then( Response => {
                    this.loadItems();
                    this.loadDetails();
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
    },

    
    computed: {
        ...mapState('cart',['details','items']),
 
 
        itemList(){  
            return this.items
                .sort((a, b) => (a.name > b.name) ? 1 : -1) 
                .sort((a, b) => (a.attributes['number'] > b.attributes['number']) ? 1 : -1)
        }, 
    }
}
</script>