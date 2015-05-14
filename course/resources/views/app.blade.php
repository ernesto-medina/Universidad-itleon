<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel</title>

	{!! Html::style('/css/app.css')!!}
	<!--<link href="{{ asset('/css/app.css') }}" rel="stylesheet">-->

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Custom Theme files -->
<!--<link href="css/style.css" rel='stylesheet' type='text/css' />-->
<!-- Custom Theme files -->
<!--webfont-->
<link href='http://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Dancing+Script:400,700' rel='stylesheet' type='text/css'>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script type="text/javascript">
					jQuery(document).ready(function($) {
						$(".scroll").click(function(event){
							event.preventDefault();
							$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
						});
					});
					</script>

					<script type="text/javascript">
					$(document).ready(
						function(){
					    $('[data-toggle="popover"]').popover({
									html : true,
					        placement : 'bottom'
					    });
					});
					</script>



</head>
<body>

<div class="header form-control" style="  margin-bottom: 0%;  height: 250px;border-style: solid;
border-top: 0px;border-left: 0px;border-right: 0px;
    border-bottom: solid #594737;">
   <div class="container ">
	  	<div class="header_top">

			<div class="top-nav">

				<ul class="nav1">
					<li class="active"><a href="{{ url('/') }}">Inicio</a></li>
					<li><a href="#feature" class="scroll">Catalogo</a></li>
					<li><a href="#price" class="scroll">Promociones</a></li>
					<li><a href="contact.html">Contacto</a></li>
				</ul>
				<!-- script-for-menu -->
				 <script>
				   $( "span.menu" ).click(function() {
					 $( "ul.nav1" ).slideToggle( 300, function() {
					 // Animation complete.
					  });
					 });
				</script>
				<!-- /script-for-menu -->

			</div>
			<button style="border:0px solid transparent;background: transparent;" type="button" data-toggle="popover" title="Popover title" data-content="&lt;div&gt;This is your div content&lt;/div&gt;"><a class="link-cart" >
				<i class="glyphicon glyphicon-shopping-cart fa-3x"></i><?php
			use Gloudemans\Shoppingcart\Facades\Cart as Test;
			use Illuminate\Support\Facades\Session as Session;
			$prueba=Test::instance(Session::get('_token'))->count();
			?>{{$prueba}}
			</a></button>
			<ul class="widget">

			</br>
					@if (Auth::guest())
					<a href="{{ url('/auth/login') }}"><li class="login">Iniciar Sesión</li></a>
						<a href="{{ url('/auth/register') }}"><li class="join">Resgistrar</li></a>

					@else
						<!--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><li class="login">{{ Auth::user()->name }}</li><span class="caret"></span></a>-->
						<a href="{{ url('/auth/logout') }}"><li class="login">Salir</li></a>
						<!--<a href="#"><li class="login">{{ Auth::user()->name }}</li></a>-->
					@endif

			</ul>

			<div class="clearfix"> </div>


		</div>
	</div>

</div>







<!--


	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Laravel</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="{{ url('/') }}">Home</a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="{{ url('/auth/login') }}">Login</a></li>
						<li><a href="{{ url('/auth/register') }}">Register</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav> -->

	@yield('content')

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>
