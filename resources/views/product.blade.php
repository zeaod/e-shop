@extends('layouts.app')

@section('css') 
<link rel="stylesheet" type="text/css" href="{{asset('app/styles/product_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app/styles/product_responsive.css')}}">

@endsection

@section('content')
 
			<product-single
				:product="{{$item}}"
				
				_token = '<?php echo csrf_token() ?>'
				number = '<?php echo time() ?>'

			>
			</product-single>

@endsection

@section('js') 
<script src="{{asset('app/js/product_custom.js')}}"></script>
@endsection
