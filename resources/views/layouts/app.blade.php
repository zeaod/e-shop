<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="OneTech shop project"> 

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title> 

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->   
    <link rel="stylesheet" type="text/css" href="{{asset('app/styles/bootstrap4/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/plugins/OwlCarousel2-2.2.1/animate.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('app/styles/shop_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/styles/shop_responsive.css')}}">
  
    <style>
    /* Customize */
        .card-header {
        padding: .75rem 1.25rem;
        margin-bottom: 0;
        background-color: rgba(0,0,0,.03); 
        background-color: rgb(14 140 228);
        border-bottom: unset;
        color: #ffffff;
        font-weight: bold;
        }
    /* / Customize */
    </style>
    @yield('css')
</head>
<body>
    <div id="app" class="super_container">

            {{-- <x-header :categories="$categories"/> --}}
            <x-header />

            @yield('content') 

            <x-footer/> 

    </div> 

    <div id="wishlist"></div>
<script
        src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
<script src="https://unpkg.com/vue"></script>
<script src="https://cdn.jsdelivr.net/vue.resource/1.3.1/vue-resource.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<script>
    (function($) {

        var _token = '<?php echo csrf_token() ?>';
        var number = '<?php echo time() ?>';

        $(document).ready(function() {

            var app = new Vue({
                el: '#app',
                data: {
                    details: {
                        sub_total: 0,
                        total: 0,
                        total_quantity: 0
                    },
                    itemCount: 0,
                    items: [],
                    item: {
                        id: '',
                        name: '',
                        price: 0.00,
                        qty: 1
                    },
                    cartCondition: {
                        name: '',
                        type: '',
                        target: '',
                        value: '',
                        attributes: {
                            description: 'Value Added Tax'
                        }
                    },

                    options: {
                        target: [
                            {label: 'Apply to SubTotal', key: 'subtotal'},
                            {label: 'Apply to Total', key: 'total'}
                        ]
                    }
                },
                mounted:function(){
                    this.loadItems();
                },
                methods: {
                    quantity_inc_button: function() {
                        this.item.qty += 1;
                    },
                    quantity_dec_button: function() {
                        if (this.item.qty > 1) {
                            this.item.qty -= 1;
                        }else {
                            this.item.qty = 1;
                        }
                    },
                    // addItem: function(id,name,price) {
                    addItem: function(id,name,image,price) {
                        var _this = this;
                        this.$http.post('/cart',{
                            _token:_token,
                            number:number,
                            id:id,
                            name:name,
                            image:image,
                            price:price,
                            qty:_this.item.qty
                        }).then(function(success) {
                            _this.loadItems();
                            Swal.fire({
                            // position: 'top-end',
                            // icon: 'success',
                            // title: 'Your work has been saved',
                            html: 'เพิ่มสินค้าเรียบร้อยแล้ว',
                            showConfirmButton: false,
                            timer: 1500
                            })
                        }, function(error) {
                            console.log(error);
                        });
                    },
                    addCartCondition: function() {
                        var _this = this;
                        this.$http.post('/cart/conditions',{
                            _token:_token,
                            name:_this.cartCondition.name,
                            type:_this.cartCondition.type,
                            target:_this.cartCondition.target,
                            value:_this.cartCondition.value,
                        }).then(function(success) {
                            _this.loadItems();
                        }, function(error) {
                            console.log(error);
                        });
                    },
                    clearCartCondition: function() {
                        var _this = this;
                        this.$http.delete('/cart/conditions?_token=' + _token).then(function(success) {
                            _this.loadItems();
                        }, function(error) {
                            console.log(error);
                        });
                    },
                    removeItem: function(id) {
                        var _this = this;
                        this.$http.delete('/cart/'+id,{
                            params: {
                                _token:_token
                            }
                        }).then(function(success) {
                            _this.loadItems();
                        }, function(error) {
                            console.log(error);
                        });
                    },
                    Increase: function(id,name,quantity,price) {    //เพิ่มขึ้น page: cart
                        this.$http.post('/cart/update',{
                            _token:_token,
                            action:'Increase',
                            id:id,
                            name:name, 
                            price:price,
                            qty:1
                        }).then(function(success) { 
                            this.loadItems();
                        }, function(error) {
                            console.log(error);
                        });
                    },
                    Decrease: function(id,name,quantity,price) {    //ลดลง page: cart
                        if (quantity == 1) {
                            this.removeItem(id)
                        }
                        else{
                            this.$http.post('/cart/update',{
                                _token:_token,
                                action:'Decrease',
                                id:id,
                                name:name, 
                                price:price,
                                qty:quantity
                            }).then(function(success) {
                                this.loadItems();
                            }, function(error) {
                                console.log(error);
                            });  
                        }

                    },
                    loadItems: function() {
                        var _this = this;
                        this.$http.get('/cart',{
                            params: {
                                limit:10
                            }
                        }).then(function(success) {
                            _this.items = success.body.data;
                            _this.itemCount = success.body.data.length;
                            _this.loadCartDetails();
                            // console.log(success.body.message);
                        }, function(error) {
                            console.log(error);
                        });
                    },
                    loadCartDetails: function() {
                        var _this = this;
                        this.$http.get('/cart/details').then(function(success) {
                            _this.details = success.body.data;
                        }, function(error) {
                            console.log(error);
                        });
                    },
                    change (event) {  //input quantity number Only
                        let val = event.target.value.trim()  
                        // It can only be positive integer or empty, and the rule can be modified according to the requirement.
                        if (/^[1-9]\d*$|^$/.test(val)) {
                            this.item.qty = val
                        } else {
                            event.target.value = this.item.qty
                        }
                    },
                    buy_now: function(id){ // btn สั่งซื้อ/จัดส่ง
                        this.$http.get('/cart/clear').then(function(success) {
                            this.loadItems();
                            Swal.fire({
                            // position: 'top-end',
                            icon: 'success',
                            title: 'สั่งซื้อสินค้าเรียบร้อยแล้ว',
                            html: 'ระยะเวลาดำเนินการจัดส่ง 3-5 วัน',
                            showConfirmButton: true,
                            // timer: 1500
                            })
                        }, function(error) {
                            console.log(error);
                        });
                    }
                    
                },
                computed: {
                    itemList: function () {
                        return this.items
                        .sort((a, b) => (a.name > b.name) ? 1 : -1) 
                        .sort((a, b) => (a.attributes['number'] > b.attributes['number']) ? 1 : -1)
                    }, 
                    inpNum:function(){ 
                        return this.item.qty
                    } 
                }
            });

            // var wishlist = new Vue({
            //     el: '#wishlist',
            //     data: {
            //         details: {
            //             sub_total: 0,
            //             total: 0,
            //             total_quantity: 0
            //         },
            //         itemCount: 0,
            //         items: [],
            //         item: {
            //             id: '',
            //             name: '',
            //             price: 0.00,
            //             qty: 1
            //         }
            //     },
            //     mounted:function(){
            //         this.loadItems();
            //     },
            //     methods: {
            //         addItem: function() {
            //             var _this = this;
            //             this.$http.post('/wishlist',{
            //                 _token:_token,
            //                 id:_this.item.id,
            //                 name:_this.item.name,
            //                 price:_this.item.price,
            //                 qty:_this.item.qty
            //             }).then(function(success) {
            //                 _this.loadItems();
            //             }, function(error) {
            //                 console.log(error);
            //             });
            //         },
            //         removeItem: function(id) {

            //             var _this = this;

            //             this.$http.delete('/wishlist/'+id,{
            //                 params: {
            //                     _token:_token
            //                 }
            //             }).then(function(success) {
            //                 _this.loadItems();
            //             }, function(error) {
            //                 console.log(error);
            //             });
            //         },
            //         loadItems: function() {

            //             var _this = this;

            //             this.$http.get('/wishlist',{
            //                 params: {
            //                     limit:10
            //                 }
            //             }).then(function(success) {
            //                 _this.items = success.body.data;
            //                 _this.itemCount = success.body.data.length;
            //                 _this.loadCartDetails();
            //             }, function(error) {
            //                 console.log(error);
            //             });
            //         },
            //         loadCartDetails: function() {

            //             var _this = this;

            //             this.$http.get('/wishlist/details').then(function(success) {
            //                 _this.details = success.body.data;
            //             }, function(error) {
            //                 console.log(error);
            //             });
            //         }
            //     }
            // });

        });

    })(jQuery);
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="{{asset('app/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('app/styles/bootstrap4/popper.js')}}"></script>
<script src="{{asset('app/styles/bootstrap4/bootstrap.min.js')}}"></script>
<script src="{{asset('app/plugins/greensock/TweenMax.min.js')}}"></script>
<script src="{{asset('app/plugins/greensock/TimelineMax.min.js')}}"></script>
<script src="{{asset('app/plugins/scrollmagic/ScrollMagic.min.js')}}"></script>
<script src="{{asset('app/plugins/greensock/animation.gsap.min.js')}}"></script>
<script src="{{asset('app/plugins/greensock/ScrollToPlugin.min.js')}}"></script>
<script src="{{asset('app/plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
<script src="{{asset('app/plugins/easing/easing.js')}}"></script> 
 

@yield('js') 



</body>
</html>
