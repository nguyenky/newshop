@include('public.block.header')	

	@yield('slide')

	@yield('main')
					
@include('public.block.footer')
	<script src="{{$url}}/templete/public/js/jquery.js"></script>
		<script src="{{$url}}/templete/public/js/bootstrap.min.js"></script>
		<script src="{{$url}}/templete/public/js/jquery.scrollUp.min.js"></script>
		<script src="{{$url}}/templete/public/js/price-range.js"></script>
	    <script src="{{$url}}/templete/public/js/jquery.prettyPhoto.js"></script>
	    <script src="{{$url}}/templete/public/js/main.js"></script>
	    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
	    <script src="plugins/underscorejs/underscore.js"></script>
	    <script src="{{$url_local}}/templete/public/angularjs/angularjs.js"></script>
	    <!-- <script src="http://127.0.0.1:8000/templete/public/angularjs/angularjs.js"></script> -->
	    <script src="{{$url_local}}/templete/public/angularjs/header.js"></script>
	    <!-- <script src="http://127.0.0.1:8000/templete/public/angularjs/header.js"></script> -->
	    @yield('angularjs')

	</body>
</html>	