<!DOCTYPE html>
<html>
<head>
	<title>Halaman Masuk</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" href="{{ asset('css/login.css') }}">
	<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		@if(session('success_msg'))
		<div style="margin-top: 60px;">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<div class="alert alert-success">
						{{ session('success_msg') }}
					</div>	
				</div>
			</div>
		</div>
		@endif
		<div id="login-box">
			<div class="logo">
				{{-- <img src="http://lorempixel.com/output/people-q-c-100-100-1.jpg" class="img img-responsive img-circle center-block"/> --}}
				<h1 class="logo-caption"><span class="tweak">Flash Sale </span>Gunnery</h1>
			</div>
			<div class="controls">
				<form action="{{ route('login') }}" method="post">
					@csrf
					<input type="email" required="required" name="email" placeholder="Email" class="form-control" value="{{ old('email') }}" />
					@if($errors->has('email'))
					<small style="color: #ee2222;">{{ $errors->first('email') }}</small>
					@endif
					<input type="password" name="password" placeholder="Password" class="form-control" value="{{ old('password') }}" />
					<button type="submit" class="btn btn-default btn-block btn-custom">Masuk</button>
				</form>
				<a href="{{ route('register') }}" class="btn btn-daftar btn-block btn-custom">Daftar</a>
			</div>
		</div>
	</div>
	<div id="particles-js"></div>
	<script src="{{ asset('js/login.js') }}"></script>
</body>
</html>