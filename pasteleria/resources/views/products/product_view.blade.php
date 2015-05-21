@extends('app')

@section('content')

<script src="../js/jquery.etalage.min.js"></script>
<link rel="stylesheet" href="../css/etalage.css">
<link rel="stylesheet" href="../css/product_view.css">

<!-- Include the Etalage files -->
<script>
        jQuery(document).ready(function($){

            $('#etalage').etalage({
                thumb_image_width: 300,
                thumb_image_height: 400,

                show_hint: true,
                click_callback: function(image_anchor, instance_id){
                    alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
                }
            });
            // This is for the dropdown list example:
            $('.dropdownlist').change(function(){
                etalage_show( $(this).find('option:selected').attr('class') );
            });

    });
</script>

<div class="container" style="background:#fefef8;margin-top: 0%;">

  @if (Auth::check() AND Auth::user()->type == 'admin')



  <button class="btn btn-primary btn-lg pull-left" data-toggle="popover" title="¿Deseas eliminar este producto?" data-content='
  {!! Form::model($product, ['route'=>['product.destroy', $product], 'method'=> 'DELETE']) !!}
  <button type="submit" class="btn btn-primary btn-block" style="background-color: #7DE4FF;">Aceptar</button>
  {!! Form::close() !!}

  '>
    Eliminar
  </button>


  <button class="btn btn-primary btn-lg pull-right" data-toggle="modal" data-target="#myModal">
    Editar
  </button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header panel-primary">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Editar Producto</h4>
        </div>
        <div class="modal-body">
          <div class="row">
      <div class="col-xs-12 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
          <!-- image-preview-filename input [CUT FROM HERE]-->
          <style>
          .modal-header {
      padding:9px 15px;
      border-bottom:1px solid #eee;
      background-color: #7DE4FF;
      -webkit-border-top-left-radius: 5px;
      -webkit-border-top-right-radius: 5px;
      -moz-border-radius-topleft: 5px;
      -moz-border-radius-topright: 5px;
       border-top-left-radius: 5px;
       border-top-right-radius: 5px;
   }
            .container{
                  margin-top:20px;
              }
              .image-preview-input {
                  position: relative;
                overflow: hidden;
                margin: 0px;
                  color: #333;
                  background-color: #fff;
                  border-color: #ccc;
              }
              .image-preview-input input[type=file] {
                position: absolute;
                top: 0;
                right: 0;
                margin: 0;
                padding: 0;
                font-size: 20px;
                cursor: pointer;
                opacity: 0;
                filter: alpha(opacity=0);
              }
              .image-preview-input-title {
                  margin-left:2px;
              }
          </style>

          <script>
          $(document).on('click', '#close-preview', function(){
              $('.image-preview').popover('hide');
              // Hover befor close the preview
              $('.image-preview').hover(
                  function () {
                     $('.image-preview').popover('show');
                  },
                   function () {
                     $('.image-preview').popover('hide');
                  }
              );
          });

          $(function() {
              // Create the close button
              var closebtn = $('<button/>', {
                  type:"button",
                  text: 'x',
                  id: 'close-preview',
                  style: 'font-size: initial;',
              });
              closebtn.attr("class","close pull-right");
              // Set the popover default content
              $('.image-preview').popover({
                  trigger:'manual',
                  html:true,
                  title: "<strong>Vista Previa</strong>"+$(closebtn)[0].outerHTML,
                  content: "Archivo no valido",
                  placement:'left'
              });
              // Clear event
              $('.image-preview-clear').click(function(){
                  $('.image-preview').attr("data-content","").popover('hide');
                  $('.image-preview-filename').val("");
                  $('.image-preview-clear').hide();
                  $('.image-preview-input input:file').val("");
                  $(".image-preview-input-title").text("Browse");
              });
              // Create the preview image
              $(".image-preview-input input:file").change(function (){
                  var img = $('<img/>', {
                      id: 'dynamic',
                      width:600,
                      height:600
                  });
                  var file = this.files[0];

                  var reader = new FileReader();
                  // Set preview image into the popover data-content
                  reader.onload = function (e) {
                      $(".image-preview-input-title").text("Cambiar");
                      $(".image-preview-clear").show();
                      $(".image-preview-filename").val(file.name);
                      img.attr('src', e.target.result);
                      $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
                  }
                  reader.readAsDataURL(file);
            });
        });
          </script>
          {!! Form::model($product, ['route'=>['product.update', $product], 'method'=> 'PUT']) !!}
          <!-- {!! Form::open(['route'=>'product.store', 'method'=> 'POST', 'files'=>true]) !!} -->

          <div class="input-group image-preview">
            <i class="fa fa-picture-o fa-3x"></br></i>
            <h2>Foto</h2>
              <input type="text" class="form-control image-preview-filename" disabled="disabled" style="visibility:hidden;"> <!-- don't give a name === doesn't send on POST/GET -->
              <span class="input-group-btn">


                  <!-- image-preview-clear button -->
                  <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                      <span class="glyphicon glyphicon-remove"></span> Limpiar
                  </button>
                  <!-- image-preview-input -->
                  <div class="btn btn-default image-preview-input">
                      <span class="glyphicon glyphicon-folder-open"></span>
                      <span class="image-preview-input-title">Buscar</span>

                      <input type="file" accept="image/png, image/jpeg, image/gif" name="image_decode"/> <!-- rename it -->
                  </div>
              </span>
          </div><!-- /input-group image-preview [TO HERE]-->

            <div class="form-group">
              <div class="input-group ">
                <div class="input-group-addon"><i class="glyphicon glyphicon-tag fa-1x"></i></div>
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
              </div>
            </br>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-tachometer fa-1x"></i></div>
                {!! Form::text('kilos', null, ['class' => 'form-control']) !!}
                <!-- <input type="text" name="kilos" class="form-control" placeholder="Kilos Maximos" required> -->
              </div>
            </div>

            <div class="input-group">
              <span class="input-group-addon">$</span>
              {!! Form::text('unit_cost', null, ['class' => 'form-control']) !!}
              <!-- <input type="text" class="form-control" name="unit_cost" placeholder="Precio Unitario" aria-label="monto (en pesos MXN)"> -->
              <span class="input-group-addon">.00</span>
            </div>
          </br>
          {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
            <!-- <textarea name="description" style="width:270px;height:150px;" placeholder="Descripcion"></textarea> -->

        </div>
    </div>
            </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-success" style="background-color: #7DE4FF;">Guardar</button>
        </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>






  @endif
</br>
  <!--<div class="col-md-3">
    <div class="box1 ">
      <ul class="box1_list">
          <li><a href="#">Jeans</a></li>
          <li><a href="#">Hoodies</a></li>
          <li><a href="#">Watches</a></li>
          <li><a href="#">Suits</a></li>
          <li><a href="#">Ties</a></li>
          <li><a href="#">Shirts</a></li>
          <li><a href="#">T-Shirts</a></li>
          <li><a href="#">Underwear</a></li>
          <li><a href="#">Accessories</a></li>
          <li><a href="#">Caps & Hats</a></li>
      </ul>
    </div>
  </div>-->
  <div class="col-md-9 content_right">
    <div class="dreamcrub">
      <div class="clearfix"></div>
    </div>
    <div class="singel_right">
      <div class="labout span_1_of_a1">
        <!-- start product_slider -->
        <ul id="etalage">
          <li>
              <a href="optionallink.html">
                  <img class="etalage_thumb_image" width="16" height="14" src="{{$product['image']}}" class="img-responsive" />
                  <img class="etalage_source_image" src="{{$product['image']}}" class="img-responsive" />
              </a>
          </li>
          <div class="clearfix"> </div>
        </ul>
        <!-- end product_slider -->
      </div>
      {!! Form::open(['route'=>'addCart','method'=>'POST']) !!}
      <input type="hidden" name="product_id" value="{{$product['id']}}" />
      <input type="hidden" name="product_precio" value="{{$product['unit_cost']}}" />
      <div class="cont1 span_2_of_a1">
        <h1> {{ $product['name'] }}</h1>
        <!-- <ul class="rating">
           <li><a class="product-rate" href="#"> </a> <span> </span></li>
           <li><a href="#">1 Review(s) Add Review</a></li>
           <div class="clearfix"></div>
        </ul> -->

        <div class="price_single">
          <span class="actual">$ {{ $product['unit_cost'] or '0.0'}}</span>
        </div>
        <h2 class="quick">Descripción:</h2>
        <p class="quick_desc"> {{ $product['description'] }}</p>
        <form class="form-inline">
          <div class="form-group ">
            <div class="input-group">
              <div class="input-group-addon">Cantidad</div>
              <input type="integer" name="cantidad" class="form-control" required>
            </div>
          </div>

          <div class="form-group ">
            <div class="input-group">
              <div class="input-group-addon">Kilos</div>
              <select class="form-control">
                <option>{{ $product['kilos'] }}</option>

              </select>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Add to Cart</button>
        </form>
      </div>
      {!! Form::close() !!}
      <div class="clearfix"></div>
    </div>
  </div>
</div>

@endsection
