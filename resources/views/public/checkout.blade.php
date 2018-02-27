@extends('public.block.templete_cart')
@section('angularjs')
	<script src="{{$url_local}}/templete/public/angularjs/cart.js"></script>
@endsection
@section('main')
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->

			<!-- <div class="step-one">
				<h2 class="heading">Step1</h2>
			</div> -->
			<!-- <div class="checkout-options">
				<h3>New User</h3>
				<p>Checkout options</p>
				<ul class="nav">
					<li>
						<label><input type="checkbox"> Register Account</label>
					</li>
					<li>
						<label><input type="checkbox"> Guest Checkout</label>
					</li>
					<li>
						<a href=""><i class="fa fa-times"></i>Cancel</a>
					</li>
				</ul>
			</div> -->
			@if(!\Auth::user())
			<div class="register-req">
				<p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
			</div><!--/register-req-->
			@endif
			<form action="{{route('pay')}}" method="GET" name="frmCheckout">
				<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-3">
						@if(\Auth::user())
						<div class="shopper-info">
							<p>Shopper Information</p>
								<input type="text" value="{{\Auth::user()->name}}" placeholder="Fullname" readonly="">
								<input type="email" value="{{\Auth::user()->email}}"  placeholder="Email" readonly="">
							<!-- <a class="btn btn-primary" href="">Get Quotes</a>
							<a class="btn btn-primary" href="">Continue</a> -->
						</div>
						@else
						<div class="shopper-info">
							<p>Shopper Information</p>
								<input type="text" name="name" placeholder="Fullname" required="">
								<input type="email" name="email" placeholder="email" required="">
						</div>
						@endif
					</div>
					<div class="col-sm-5 clearfix">
						<div class="bill-to">
							<p>Bill To</p>
							<div class="form-one">
									<input type="text" value="" name="company_name" placeholder="Company Name">
									<input type="text" placeholder="Title">
									<input type="text" name="" name="address_1" placeholder="Address 1 *" required="">
									<input type="text" name="" name="address_2" placeholder="Address 2">
							</div>
							<div class="form-two">
									<input type="text" name="postal" placeholder="Zip / Postal Code *">
									<input type="text" name="phone" placeholder="Phone *" required="">
									<input type="text" name="mobile_phone" placeholder="Mobile Phone">
									<input type="text" name="fax" placeholder="Fax">
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="order-message">
							<p>Shipping Order</p>
							<textarea name="message"  placeholder="Notes about your order, Special Notes for Delivery" rows="16" name="note"></textarea>
							<label><input type="checkbox"> Shipping to bill address</label>
						</div>	
					</div>
					<div class="text-center">
						<!-- <a class="btn btn-primary" href="">Continue</a>	 -->
						<button class="btn btn-primary">Continue</button>
					</div>
									
				</div>
				</div>
			</form>
			<div class="review-payment">
				<h2>Review & Payment</h2>
			</div>

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@foreach($carts as $cart)
						<tr>
							<td class="cart_product">
								<a href=""><img src="images/cart/one.png" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$cart->name}}</a></h4>
								<p>Web ID: 1089772</p>
							</td>
							<td class="cart_price">
								<p>${{$cart->price}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<input class="cart_quantity_input" type="text" name="quantity" value="{{$cart->qty}}" autocomplete="off" size="2" readonly="">
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">${{$cart->subtotal}}</p>
							</td>
							<td class="cart_delete">
								
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<!-- <div class="payment-options">
				<span>
					<label><input type="checkbox"> Direct Bank Transfer</label>
				</span>
				<span>
					<label><input type="checkbox"> Check Payment</label>
				</span>
				<span>
					<label><input type="checkbox"> Paypal</label>
				</span>
			</div> -->
		</div>
	</section>
@endsection