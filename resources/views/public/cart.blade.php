@extends('public.block.templete_cart')
@section('angularjs')
	<script src="{{$url_local}}/templete/public/angularjs/cart.js"></script>
@endsection
@section('main')
	<div ng-controller="CartController">
	<section id="cart_items" >
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
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
							<tr ng-repeat="cart in carts">
								<td class="cart_product">
									<a href=""><img src="images/cart/one.png" alt=""></a>
								</td>
								<td class="cart_description">
									<h4><a href="">@{{cart.name}}</a></h4>
									<p>Web ID: 1089772</p>
								</td>
								<td class="cart_price">
									<p>$@{{cart.price}}</p>
								</td>
								<td class="cart_quantity">
									<div class="cart_quantity_button">
										<a class="cart_quantity_up" href="" ng-click="qtyUp(cart.rowId)" > + </a>
										<input class="cart_quantity_input" type="text" readonly="" name="quantity" ng-model="cart.qty" autocomplete="off" size="2">
										<a class="cart_quantity_down" href="" ng-click="qtyDown(cart.rowId)" > - </a>
									</div>
								</td>
								<td class="cart_total">
									<p class="cart_total_price">$@{{cart.subtotal}}</p>
								</td>
								<td class="cart_delete">
									<a class="cart_quantity_delete" href="" ng-click="delCart(cart.rowId)"><i class="fa fa-times"></i></a>
								</td>
							</tr>
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				<form action="{{route('check')}}" method="GET">
					<!-- <div class="col-sm-12">
						<div class="chose_area">
							<div class="col-sm-12">
								<h3>Information</h3>
							</div>
							<div class="col-sm-6">
								<ul class="user_info">
									<li class="single_field zip-field free">
										<label>Full name:</label>
										<input type="text" class="input-free" placeholder="Name" name="name" required="">
									</li>
								</ul>
								<ul class="user_info">
									<li class="single_field zip-field free">
										<label>Email:</label>
										<input type="email" class="input-free" placeholder="Email" name="email" required="">
									</li>
								</ul>
								<ul class="user_info">
									<li class="single_field zip-field free">
										<label>Phone:</label>
										<input type="text" class="input-free" placeholder="Phone" name="phone" required="">
									</li>
								</ul>
							</div>
							<div class="col-sm-6">
								<ul class="user_info">
									<li class="single_field zip-field free">
										<label>Website</label>
										<input type="text" class="input-free" placeholder="Website" name="website" >
									</li>
								</ul>
								<ul class="user_info">
									<li class="single_field zip-field free">
										<label>Address 1: ( Country - City - District - Street ... or other )</label>
										<input type="text" class="input-free" placeholder="Address" name="address" required="">
									</li>
								</ul>
							</div>
							<div style="clear: left;">
								
							</div>
						</div>
					</div> -->
					<div class="col-sm-6">
						<div class="chose_area">
							<ul class="user_option">
								<li>
									<input type="checkbox">
									<label>Use Coupon Code</label>
								</li>
								<li>
									<input type="checkbox" >
									<label>Use Gift Voucher</label>
								</li>
								<li>
									<input type="checkbox">
									<label>Estimate Shipping & Taxes</label>
								</li>
							</ul>
							<ul class="user_info">
								<li class="single_field">
									<label>Country:</label>
									<select>
										<option>United States</option>
										<option>Bangladesh</option>
										<option>UK</option>
										<option>India</option>
										<option>Pakistan</option>
										<option>Ucrane</option>
										<option>Canada</option>
										<option>Dubai</option>
									</select>
									
								</li>
								<li class="single_field">
									<label>Region / State:</label>
									<select>
										<option>Select</option>
										<option>Dhaka</option>
										<option>London</option>
										<option>Dillih</option>
										<option>Lahore</option>
										<option>Alaska</option>
										<option>Canada</option>
										<option>Dubai</option>
									</select>
								
								</li>
								<li class="single_field zip-field">
									<label>Zip Code:</label>
									<input type="text">
								</li>
							</ul>
							<a class="btn btn-default update" href="" ng-click="functionUpdate()">Get Quotes</a>
							<a class="btn btn-default check_out" href="" ng-click="functionUpdate()">Continue</a>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="total_area">
							<ul>
								<li>Cart Sub Total<span>$ @{{cartSubTotal}}</span></li>
								<li>Eco Tax <span>$0</span></li>
								<li>Shipping Cost <span>Free</span></li>
								<li>Total <span>$ @{{cartSubTotal}}</span></li>
							</ul>
								<a class="btn btn-default update" href="">Update</a>
								<!-- <a class="btn btn-default check_out" href="" ng-click="checkout()">Check Out</a> -->
								<button type="submit" class="btn btn-default check_out">Check Out</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</section><!--/#do_action-->
	</div>
@endsection