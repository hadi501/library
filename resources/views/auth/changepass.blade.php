<!doctype html>
<html lang="en">
  <head>
  	<title>Baitulhikmah</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
		@include('sweetalert::alert')
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="img" style="background-image: url(images/bg.jpg);">
			      </div>
						<div class="login-wrap p-4 p-md-5">
						<form action="/changepass" method="POST" class="signin-form">
						@csrf
			      		<div class="form-group mb-3">
			      			<label class="label" for="name">New Password</label>
			      			<input name="password" id="password" type="text" class="form-control @error('password') is-invalid @enderror" placeholder="password" autofocus required>
							@error('password')
								<div class="invalid-feedback">
									{{$message}}
								</div>
							@enderror
			      		</div>
                          <input name="token" id="token" type="hidden" value="{{$token}}">
						<div class="form-group">
							<button type="submit" class="form-control btn btn-primary rounded submit px-3">Send</button>
						</div>
		          </form>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/auth/login.js') }}"></script>

	</body>
</html>

