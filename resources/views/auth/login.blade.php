<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
	<title>Tela de Login</title>
   <!--Made with love by Mutiullah Samim -->

	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <!--<link href="{{asset('css/estiloLogin.css')}}" rel="stylesheet" type="text/css">-->
	<!--Custom styles-->
	<!--<link rel="stylesheet" type="text/css" href="styles.css">-->

	<style>
			html,body{
			background-image: url('https://blog.solistica.com/hubfs/Administraci%C3%B3n%20log%C3%ADstica%202020%20v2.jpg');
			background-size: cover;
			background-repeat: no-repeat;
			height: 100%;
			font-family: 'Numans', sans-serif;
			}

			.container{
			height: 100%;
			align-content: center;
			}

			.card{
			height: 370px;
			margin-top: auto;
			margin-bottom: auto;
			width: 400px;
			background-color: rgba(0,0,0,0.5) !important;
			}

			.logo{
				margin-top: 45px;
				height: 85px;
				margin-right: -20px;
			}

			.social_icon span:hover{
			color: white;
			cursor: pointer;
			}

			.card-header h3{
			color: white;
			}

			.social_icon{
			position: absolute;
			right: 20px;
			top: -45px;
			}

			.input-group-prepend span{
			width: 50px;
			background-color: #FFC312;
			color: black;
			border:0 !important;
			}

			input:focus{
			outline: 0 0 0 0  !important;
			box-shadow: 0 0 0 0 !important;

			}

			.remember{
			color: white;
			}

			.remember input
			{
			width: 20px;
			height: 20px;
			margin-left: 15px;
			margin-right: 5px;
			}

			.login_btn{
			color: black;
			background-color: #FFC312;
			width: 100px;
			text-align: center
			}

			.login_btn:hover{
			color: black;
			background-color: white;
			}

			.links{
			color: white;
			}

			.links a{
			margin-left: 4px;
			}

	</style>

</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>TELA DE LOGIN</h3>
				<div class="d-flex justify-content-end social_icon">
					<img src="/logo.jpg" class="logo">
				</div>
			</div>
			<div class="card-body">
				<form method="POST" action="{{ route('login') }}">
          {{ csrf_field() }}

					<div class="input-group form-group{{ $errors->has('email') ? ' has-error' : '' }}">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						  <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-mail">

              @if ($errors->has('email'))
                  <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
              @endif
					</div>

					<div class="input-group form-group{{ $errors->has('password') ? ' has-error' : '' }}">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input id="password" type="password" class="form-control" name="password" required placeholder="Senha">

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
					</div>

					<div class="form-group">
						<input type="submit" value="Login" class="btn  login_btn">
					</div>
				</form>
			</div>
			<div class="card-footer">

				<div class="d-flex justify-content-center">
					<a href="#">Esqueceu a senha?</a>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
