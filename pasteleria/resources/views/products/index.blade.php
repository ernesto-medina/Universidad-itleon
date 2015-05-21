<title>Catalogo</title>
@extends('app')

@section('content')
<script type="text/javascript" src="../js/hover_pack.js"></script>


@if (Auth::check() AND Auth::user()->type == 'admin')
<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Registrar Producto
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header panel-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Registrar Producto</h4>
      </div>
      <div class="modal-body">
        <div class="row">
    <div class="col-xs-12 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <!-- image-preview-filename input [CUT FROM HERE]-->
        <style>
        .modal-header {
    padding:9px 15px;
    border-bottom:1px solid #eee;
    background-color: #cbc17b;
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
                    width:250,
                    height:200
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

        {!! Form::open(['route'=>'product.store', 'method'=> 'POST', 'files'=>true]) !!}

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
              <input type="text" name="name" class="form-control" placeholder="Nombre" style="resize:both;" required>
            </div>
          </br>
            <div class="input-group">
              <div class="input-group-addon"><i class="fa fa-tachometer fa-1x"></i></div>
              <input type="text" name="kilos" class="form-control" placeholder="Kilos" required>
            </div>
          </div>

          <div class="input-group">
            <span class="input-group-addon">$</span>
            <input type="text" class="form-control" name="unit_cost" placeholder="Precio Unitario" aria-label="monto (en pesos MXN)">
            <span class="input-group-addon">.00</span>
          </div>
        </br>
          <textarea name="description" style="width:270px;height:150px;" placeholder="Descripcion"></textarea>

      </div>
  </div>
          </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-success" style="background-color: #cbc17b;">Guardar</button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>



@endif
<div class="main" style='margin-top: 0%;background:		#fefef8'>
<a style="visibility:hidden;">{{$products = DB::table('products')->paginate(6)}}</a>
    <div class="container">
     <div class="top_grid" id="arrow">
      <div class="content_top">
      <!--@foreach ($products as $product)
      para sacar de la base de datos con archivos reales
      <img alt="embedded image" src="data:image/png;base64,{{chunk_split(base64_encode($product->image))}}">‌


        <div class="col-md-8 col1">
                <a href="#" class="b-link-stroke b-animate-go  thickbox">

           <img src="{{$product->image}}" class="img-responsive" alt=""/><div class="b-wrapper2"><h2 class="b-animate b-from-left    b-delay03 ">Photo 1</h2><p class="b-animate b-from-right    b-delay03 ">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p></div></a>
        </div>
      @endforeach
    -->@if (!empty($products[0]))
        <div class="col-md-4 ">
           <a href="#" class="b-link-stroke b-animate-go  thickbox img-rounded">
           <img src="{{$products[0]->image}}" class="img-responsive" alt=""/><div class="b-wrapper1"><h2 class="b-animate b-from-left    b-delay03 ">{{$products[0]->name}}</h2><p class="b-animate b-from-right    b-delay03 ">{{$products[0]->description}} </br></br><span class="info" onclick="window.document.location='{{ route('product.show', $products[0]->id) }}';">Mostrar Información</span></p></div></a>
        </div>
        @endif
        @if (!empty($products[1]))
        <div class="col-md-4">
           <a href="#" class="b-link-stroke b-animate-go  thickbox img-rounded">

           <img src="{{$products[1]->image}}" class="img-responsive" alt=""/><div class="b-wrapper1"><h2 class="b-animate b-from-left    b-delay03 ">{{$products[1]->name}}</h2><p class="b-animate b-from-right    b-delay03 ">{{$products[1]->description}} </br></br><span class="info" onclick="window.document.location='{{ route('product.show', $products[1]->id) }}';">Mostrar Información</span></p></div></a>

           @endif

        </div>
        @if (!empty($products[2]))

        <div class="col-md-4">
          <a href="#" class="b-link-stroke b-animate-go  thickbox img-rounded">

        <img src="{{$products[2]->image}}" class="img-responsive" alt=""/><div class="b-wrapper1"><h2 class="b-animate b-from-left    b-delay03 ">{{$products[2]->name}}</h2><p class="b-animate b-from-right    b-delay03 ">{{$products[2]->description}} </br> </br><span class="info" onclick="window.document.location='{{ route('product.show', $products[2]->id) }}';">Mostrar Información</span></p></div></a>
</div>
        @endif

        <div class="clearfix"> </div>
      </div>
      <div class="content_middle_top">
        @if (!empty($products[3]))
        <div class="col-md-4 ">
            <a href="#" class="b-link-stroke b-animate-go  thickbox img-rounded">

           <img src="{{$products[3]->image}}" class="img-responsive" alt=""/><div class="b-wrapper"><h2 class="b-animate b-from-left    b-delay03 ">{{$products[3]->name}}</h2><p class="b-animate b-from-top    b-delay03 ">{{$products[3]->description}} </br> </br><span class="info" onclick="window.document.location='{{ route('product.show', $products[3]->id) }}';">Mostrar Información</span></p></div></a>

        </div>
        @endif
        @if (!empty($products[4]))
        <div class="col-md-4 ">
            <a href="#" class="b-link-stroke b-animate-go  thickbox img-rounded">

           <img src="{{$products[4]->image}}" class="img-responsive" alt=""/><div class="b-wrapper"><h2 class="b-animate b-from-left    b-delay03 ">{{$products[4]->name}}</h2><p class="b-animate b-from-top    b-delay03 ">{{$products[4]->description}} </br> </br><span class="info" onclick="window.document.location='{{ route('product.show', $products[4]->id) }}';">Mostrar Información</span></p></div></a>

        </div>
        @endif
        @if (!empty($products[5]))
        <div class="col-md-4 ">
            <a href="#" class="b-link-stroke b-animate-go  thickbox img-rounded">

           <img src="{{$products[5]->image}}" class="img-responsive" alt=""/><div class="b-wrapper"><h2 class="b-animate b-from-left    b-delay03 ">{{$products[5]->name}}</h2><p class="b-animate b-from-right    b-delay03 ">{{$products[5]->description}} </br> </br><span class="info" onclick="window.document.location='{{ route('product.show', $products[5]->id) }}';">Mostrar Información</span></p></div></a>

        </div>
        @endif
        <div class="clearfix"> </div>
      </div>
      </div>
    </div>
    {!! $products->render() !!}
@endsection
