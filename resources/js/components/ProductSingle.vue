<template>
     

    <div class="single_product">
		<div class="container">
			<div class="row">

				<!-- Images -->
				<div class="col-lg-2 order-lg-1 order-2">
					<ul class="image_list">
						<li data-image="images"><img :src="product.image" alt=""></li>
						<li data-image="https://image.winudf.com/v2/image1/Y29tLmVzaG9wY29tX3NjcmVlbl8xXzE1NjgwNzUyNDBfMDY0/screen-1.jpg?fakeurl=1&type=.jpg"><img src="https://image.winudf.com/v2/image1/Y29tLmVzaG9wY29tX3NjcmVlbl8xXzE1NjgwNzUyNDBfMDY0/screen-1.jpg?fakeurl=1&type=.jpg" alt="" style="transform: rotate(25deg);"></li>
						<li data-image="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAPFBMVEX6+vq2trazs7Pw8PD5+fn9/f329va7u7vMzMzi4uLU1NS+vr7X19fExMTq6urt7e3IyMje3t6tra3Pz8/fmMdaAAAFC0lEQVR4nO2c65KjKhRGUS4id4f3f9ezNxp1+qS7k/yIQ+pb1ZWKChmWbEEBRwgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA8DtavyfPZcj5JfLV5X6YPIwvMcydVKN24/ASY7266A+yGj5fg8No1dVlf4xm6O2TxM4Mx/Bsrpmq8bMNUyzx6UwX8Zoh9Yfd9IgvGnbE2dDIV/jXL8fDUJUXe8b5aoefOQzTq11/vNrhZw7D+VVDf7XDz3wxnJ6lM8OxCPUcuTdD+2wnJ2F4PV+j9Em6M7TPZu/P8OOj9GSYgwv5V+GODQM/9w+/3pL3a7jd4Ix/3XOa/2fv1lD52x3Z6ckh3blKuzWU+12n3FMqPy7666PSBxjuA786jKetG90ammkTnLZrT4ncHpQ+pg5F2FqavTFdn4/HsCbYRfs1VJb6itOIoV425URPHxSxtza2X0PatNEefcXtwhw9ha1O++1dz4Z/p9rHcHi6glrV2/X5KYb6PMIx60opt5mnTzHcm9YWp+2SLJ9lWP8apFo31jD9EMP53gjb2gp1bKiFaVDfYPydccatNe3TkPpAbRbbbr4nX2y8P5DawrQbQxY7G4Zp3LuHbwaK19a0F0OX5TlKzTe1didMOzGkenL6MHxIcLsp78Wwxelu+ODqjBamPRgufId9NpTT73Z7mHZgKJSLxHwYtluWh6pR9mFIPR8/EB0tzeMzwaoTwxufOiJ8AMN7aH4y7sqwmCdJnRl+5Cz3wasrFfqpw09dbXKg6otVmK4u+eM828xsz8hXFxsAAAAAAAAAAACfhWrTE23IwajbMlJ+gUSsf9vsBScz61ZjTadueXnHtrEeu33d0u4Z9rzvY6lUlFSFkHbyrk3Cq5pVLTy/0l4IdbWV0cUpzloHnpKKbbmlsk4bKym/KVK4Nqtm6bfWMyIjL8vg5FXq5DiDLJzXvdmw/uEZtKjlEIwpbRml8sn4IQkdBquFnDz7xCLNPCRtq8xZ8loMkfxgdOTJ/nnSMk5JiDyJtC7F5FOhBB2W0kX6B3hf9okzi/fWYi2T1GRYK0+n+XkzjFQ/ylqrtQsLHUq87lnPs7bL7U1Y+uqCnnngNy46OIqGk6HwOdJJoiNaTmpu76TkaC54i7YuobBhTJrntldPMqSzLuNitYlZeqOraytplK4lhLCwhPGGvM2UScGQkKHPwzB5HarWhZJTcG+Gk6PM7/5/JWoQfiadNoCrnb0ZZm9mR4ZpStlT1Tm+BL0jw2UznH3KQ2Z3TuZbst2QYiLPpFxsCLaKzdCHSwxJYom6LFyHNuyGpJeo6DaWEgtJ8MjwUjjFFqSFj1SSUlRJ1XOyow7NVIqd5hal9HunKH2zX6tD7UYKVLoc+UPcDJOPZrHG024zSTNwFLuynoNW3ImKSx8ihqjUICmKB8mG3AprOmftgwyprZK74dv9hLCBrygqT/CVTjrvUhO1pUmQdrBUSGoRKUaTL9XTxWonbvHTFtDCL3r5E8il/ZbLg0gDHQ+e15yYURZKTrE9885F8mesb+4QJdea4WtDzmk9xSob+hPUrPPqBLEdN2lO3EcmhhJms2U3tLUmk9kk2iRyahrZcHIp1p1Stbz5/Z1+s/rt+AOF+j7JlyOXGH4pws9H1b2v3+VUpy//gBoAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADv5D8IIUBnoRgs7gAAAABJRU5ErkJggg=="><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAPFBMVEX6+vq2trazs7Pw8PD5+fn9/f329va7u7vMzMzi4uLU1NS+vr7X19fExMTq6urt7e3IyMje3t6tra3Pz8/fmMdaAAAFC0lEQVR4nO2c65KjKhRGUS4id4f3f9ezNxp1+qS7k/yIQ+pb1ZWKChmWbEEBRwgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA8DtavyfPZcj5JfLV5X6YPIwvMcydVKN24/ASY7266A+yGj5fg8No1dVlf4xm6O2TxM4Mx/Bsrpmq8bMNUyzx6UwX8Zoh9Yfd9IgvGnbE2dDIV/jXL8fDUJUXe8b5aoefOQzTq11/vNrhZw7D+VVDf7XDz3wxnJ6lM8OxCPUcuTdD+2wnJ2F4PV+j9Em6M7TPZu/P8OOj9GSYgwv5V+GODQM/9w+/3pL3a7jd4Ix/3XOa/2fv1lD52x3Z6ckh3blKuzWU+12n3FMqPy7666PSBxjuA786jKetG90ammkTnLZrT4ncHpQ+pg5F2FqavTFdn4/HsCbYRfs1VJb6itOIoV425URPHxSxtza2X0PatNEefcXtwhw9ha1O++1dz4Z/p9rHcHi6glrV2/X5KYb6PMIx60opt5mnTzHcm9YWp+2SLJ9lWP8apFo31jD9EMP53gjb2gp1bKiFaVDfYPydccatNe3TkPpAbRbbbr4nX2y8P5DawrQbQxY7G4Zp3LuHbwaK19a0F0OX5TlKzTe1didMOzGkenL6MHxIcLsp78Wwxelu+ODqjBamPRgufId9NpTT73Z7mHZgKJSLxHwYtluWh6pR9mFIPR8/EB0tzeMzwaoTwxufOiJ8AMN7aH4y7sqwmCdJnRl+5Cz3wasrFfqpw09dbXKg6otVmK4u+eM828xsz8hXFxsAAAAAAAAAAACfhWrTE23IwajbMlJ+gUSsf9vsBScz61ZjTadueXnHtrEeu33d0u4Z9rzvY6lUlFSFkHbyrk3Cq5pVLTy/0l4IdbWV0cUpzloHnpKKbbmlsk4bKym/KVK4Nqtm6bfWMyIjL8vg5FXq5DiDLJzXvdmw/uEZtKjlEIwpbRml8sn4IQkdBquFnDz7xCLNPCRtq8xZ8loMkfxgdOTJ/nnSMk5JiDyJtC7F5FOhBB2W0kX6B3hf9okzi/fWYi2T1GRYK0+n+XkzjFQ/ylqrtQsLHUq87lnPs7bL7U1Y+uqCnnngNy46OIqGk6HwOdJJoiNaTmpu76TkaC54i7YuobBhTJrntldPMqSzLuNitYlZeqOraytplK4lhLCwhPGGvM2UScGQkKHPwzB5HarWhZJTcG+Gk6PM7/5/JWoQfiadNoCrnb0ZZm9mR4ZpStlT1Tm+BL0jw2UznH3KQ2Z3TuZbst2QYiLPpFxsCLaKzdCHSwxJYom6LFyHNuyGpJeo6DaWEgtJ8MjwUjjFFqSFj1SSUlRJ1XOyow7NVIqd5hal9HunKH2zX6tD7UYKVLoc+UPcDJOPZrHG024zSTNwFLuynoNW3ImKSx8ihqjUICmKB8mG3AprOmftgwyprZK74dv9hLCBrygqT/CVTjrvUhO1pUmQdrBUSGoRKUaTL9XTxWonbvHTFtDCL3r5E8il/ZbLg0gDHQ+e15yYURZKTrE9885F8mesb+4QJdea4WtDzmk9xSob+hPUrPPqBLEdN2lO3EcmhhJms2U3tLUmk9kk2iRyahrZcHIp1p1Stbz5/Z1+s/rt+AOF+j7JlyOXGH4pws9H1b2v3+VUpy//gBoAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADv5D8IIUBnoRgs7gAAAABJRU5ErkJggg==" alt=""></li>
					</ul>
				</div>

				<!-- Selected Image -->
				<div class="col-lg-5 order-lg-2 order-1">
					<div class="image_selected"><img :src="product.image" alt=""></div>
				</div>

				<!-- Description -->
				<div class="col-lg-5 order-3">
					<div class="product_description">
						<div class="product_category">{{product.catecory}}</div>
						<div class="product_name">{{product.name}}</div>
						<div class="rating_r rating_r_4 product_rating"></div>
						<div class="product_text"><p>{{product.description}}</p></div>
						<div class="order_info d-flex flex-row">

                                <div class="clearfix" style="z-index: 1000;">

                                    <!-- Product Quantity -->
                                    <div class="product_quantity clearfix"> 
                                        <span>จำนวน: </span>
                                        <!-- {{-- <input v-model="amount" id="quantity_input" type="text" pattern="[0-9]*"> --}} -->
                                        <input @input="change" @change="change" v-model="amount" type="text">
                                        <div class="quantity_buttons">
                                            <div @click="quantity_inc_button" id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>
                                            <div @click="quantity_dec_button" id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
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

                                    <div class="button_container">
                                        <div class="product_price">
                                            ฿ {{product.ragular_price}}
                                            <div class="product_fav"><i class="fas fa-heart"></i></div>
                                        </div>
                                    </div>
                                        
                                    <div class="button_container"> 
                                        <!-- <a :href="'add-to-cart/'+product.id"><button type="button" class=" cart_button btn-danger">สั่งซื้อทันที</button></a>  -->
                                        <button @click="addItem()" type="button" class="button cart_button">เพิ่มลงตะกร้า</button>
                                    </div>
                            </div>


						</div> 

					</div>
				</div>


			</div>
		</div>
	</div>
 

  
</template>

<script>

import {mapActions} from 'vuex';

export default {
        props:{
            product:Object,
            _token: String,
            number: String,
        },
        data(){
            return{ 
                amount:1,  //จำนวน
            }
        },
        methods: {
            ...mapActions('cart', ['loadDetails']),

            quantity_inc_button() {
                this.amount += 1;
            },
            quantity_dec_button() {
                if (this.amount > 1) {
                    this.amount -= 1;
                }else {
                    this.amount = 1;
                }
            },
            addItem() {  
                axios.post('/cart',{ 
                    _token:this._token,
                    number:this.number,
                    id:this.product.id,
                    name:this.product.name,
                    image:this.product.image,
                    price:this.product.ragular_price,
                    qty:this.amount, 
                }).then(response => {
                    this.loadDetails();   //refresh Cart Detail
                    toast.fire({
                        icon: 'success',
                        type: 'success',
                        title: 'เพิ่มสินค้าเรียบร้อยแล้ว'
                    });
                })
                .catch(function (error) {
                    console.log(error);
                })
            },


    
            // addCartCondition() {
            //     axios.post('/cart/conditions',{
            //         _token:this._token,
            //         name:this.cartCondition.name,
            //         type:this.cartCondition.type,
            //         target:this.cartCondition.target,
            //         value:this.cartCondition.value,
            //     }).then(function(success) {
            //         this.loadItems();
            //     }, function(error) {
            //         console.log(error);
            //     });
            // },

            clearCartCondition() {
                axios.delete('/cart/conditions?_token=' + this._token).then(function(success) {
                    this.loadItems();
                }, function(error) {
                    console.log(error);
                });
            }, 

            

            change (event) {  //input quantity number Only
                let val = event.target.value.trim()  
                // It can only be positive integer or empty, and the rule can be modified according to the requirement.
                if (/^[1-9]\d*$|^$/.test(val)) {
                    this.amount = val
                } else {
                    event.target.value = this.amount
                }
            },

            // buy_now(id){ // btn สั่งซื้อ/จัดส่ง
            //     axios.get('/cart/clear').then(function(success) {
            //         this.loadItems(); 
            //         toast.fire({
            //             icon: 'success',
            //             type: 'success',
            //             title: 'สั่งซื้อสินค้าเรียบร้อยแล้ว'
            //         }) ;
            //     }, function(error) {
            //         console.log(error);
            //     });
            // }
        }, 
}
</script>