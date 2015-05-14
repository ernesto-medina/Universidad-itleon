<html>
<head>
  <!-- title and meta -->
  <meta charset="utf-8">
  <meta content="width=device-width,initial-scale=1.0" name="viewport">
  <meta content="description" name="In this tutorial, we take a look at a beautiful parallax scrolling effect in the simplest of ways, with stationary backgrounds and scrolling content.">

  <title>Pastelería Santa Cecilia</title>

  <!-- css -->
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto+Slab">
  <link rel="stylesheet" href="css/base.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

  <!-- js -->
  <script src="js/modernizr.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


	</head>
	<body>

<div class="wrapper">

  <div class="info-bar">
    <div class="container">
      <a class="icon cmn-tut" data-title="Inicio" href="{{ url('/products') }}"></a>
    </div>
  </div>

  <main>
      <section class="module parallax parallax-1">
        <div class="container">
          <h1>Pastelería Santa Cecilia</h1>
        </div>
      </section>

      <section class="module content">
        <div class="container">
          <i class="fa fa-birthday-cake fa-3x"></i><h2 style="display: inline;"> Misión</h2>
          <p style="color: rgba(150,111,214, 0.8);">Nuestra finalidad es ofrecer productos de calidad
          haciendo uso de recetas artesanales y técnicas actuales realizando una combinación de sabores única.</p>
          <i class="fa fa-birthday-cake fa-3x"></i><h2 style="display: inline;">Visión</h2>
          <p style="color: rgba(150,111,214, 0.8);">Estar dentro de la preferencia de nuestros clientes para poder
          ofrecer nuestros productos en sus eventos más importantes.</p>
          <i class="fa fa-birthday-cake fa-3x"></i><h2 style="display: inline;">Valores</h2>
			<li><p style="color: rgba(150,111,214, 0.8);">Responsabilidad</p></li>
			<li><p style="color: rgba(150,111,214, 0.8);">Honestidad</p></li>
        </div>
      </section>

      <section class="module parallax parallax-2">
        <div class="container">
          <h1>Ocaciones Especiales</h1>
        </div>
      </section>

      <section class="module content">
        <div class="container">
			<div id="slideshow" style="margin:50px auto;
			position:relative;
			width:620px;
			height:620px;
			padding:10px;
			box-shadow:0 0 20px rgba(0,0,0,0.4);">
			    <div style="position:absolute;
			  top:10px;
			  left:10px;
			  right:10px;
			  bottom:10px;"><img src="../img/demo/_small/p1.jpg"/></div>
			    <div style="position:absolute;
			  top:10px;
			  left:10px;
			  right:10px;
			  bottom:10px;"><img src="../img/demo/_small/p2.jpg"/></div>
			  <div style="position:absolute;
			  top:10px;
			  left:10px;
			  right:10px;
			  bottom:10px;"><img src="../img/demo/_small/p3.jpg"/></div>
			  <div style="position:absolute;
			  top:10px;
			  left:10px;
			  right:10px;
			  bottom:10px;"><img src="../img/demo/_small/p4.jpg"/></div>
			</div>
        </div>
      </section>

      <section class="module parallax parallax-3">
        <div class="container">
          <h1>Ubicación</h1>
        </div>
      </section>

      <section class="module content">
        <div class="container">
          <i class="fa fa-map-marker fa-5x"></i><h2 style="display: inline;">¿Dondé nos encuentras?</h2>
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d373.3880209745115!2d-101.72834197878475!3d21.10256903171491!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x31918632ea09cc60!2s%22Santa+Cecilia%22!5e1!3m2!1ses!2smx!4v1429271692239" width="600" height="450" frameborder="0" style="border:0"></iframe>
          <p>
          Bulevar Mariano Escobedo #7318 <br>
          Col. León II <br>
          Télefono: 7-58-75-12</p>
        </div>
      </section>

  </main><!-- /main -->

  <footer>
    <div class="container">
      <div class="asides clearfix">


      </div>
      <div class="copyright">
        <small>
          &copy; 2015, Luis Ernesto García Medina<br>
        </small>
      </div>
    </div>
  </footer><!-- /footer -->

</div><!-- /#wrapper -->

<script>
	$(function() {

			$("#slideshow > div:gt(0)").hide();

			setInterval(function() {
			  $('#slideshow > div:first')
			    .fadeOut(1000)
			    .next()
			    .fadeIn(1000)
			    .end()
			    .appendTo('#slideshow');
			},  3000);

		});

</script>
<!-- analytics -->
<script type="text/javascript">
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-34160351-1']);
_gaq.push(['_trackPageview']);
(function() {
  var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
  ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
</script>

</body>
</html>
