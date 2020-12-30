<template>
    
        <div class="cart">
            <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                <div class="cart_icon">
                    <img src="/images/cart.png" alt="">
                    <div class="cart_count"><span>{{ details.total_quantity }}</span></div>  
                </div>
                <div class="cart_content">
                    <div class="cart_text"><a href="/cart">Cart</a></div>
                    <div class="cart_price">{{ details.total.toFixed(2) }}</div>
                </div>
            </div>
        </div>
 

</template>


<script>
import { mapState, mapActions } from 'vuex';
 
export default { 
    created(){
        this.loadDetails();
    },
    methods:{

        ...mapActions('cart', ['loadDetails']),

    },
    computed:{

        ...mapState('cart', ['details']),

    }
}
</script>