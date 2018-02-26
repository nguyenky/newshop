@extends('public.block.templete_cart')
@section('angularjs')
	<script src="{{$url_local}}/templete/public/angularjs/cart.js"></script>
@endsection
@section('main')
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form action="{{route('public.login.login')}}" method="POST">
							{{csrf_field()}}
							<input type="email" placeholder="Email Address" name="email" />
							@if ($errors->has('email'))
		                    	<div class="message-error">{{ $errors->first('name') }}</div>
		               		@endif
		               		<input type="password" placeholder="Password" name="password" />
		               		@if ($errors->has('password'))
		                    	<div class="message-error">{{ $errors->first('password') }}</div>
		               		@endif
							<span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<!-- @if (count($errors) > 0)
                            <div class="erorr">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif -->
						<form action="{{route('public.login.register')}}" method="POST">
							{{csrf_field()}}
							<input type="text" placeholder="Name" name="name" />
							@if ($errors->has('name'))
		                    	<div class="message-error">{{ $errors->first('name') }}</div>
		               		@endif
							<input type="email" placeholder="Email Address" name="email" />
							@if ($errors->has('email'))
		                    	<div class="message-error">{{ $errors->first('email') }}</div>
		               		@endif
							<input type="password" placeholder="Password" name="password" />
							@if ($errors->has('password'))
		                    	<div class="message-error">{{ $errors->first('password') }}</div>
		               		@endif
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
@endsection