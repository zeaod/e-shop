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
	<cart-system></cart-system>

@endsection

@section('js') 
<script src="{{asset('app/js/cart_custom.js')}}"></script>  
@endsection
