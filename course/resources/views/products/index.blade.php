<title>Catalogo</title>
@extends('app')

@section('content')
<script type="text/javascript" src="../js/hover_pack.js"></script>



<div class="main" style='margin-top: 0%;'>
<a style="visibility:hidden;">$products = Products::paginate(6)</a>
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
      -->
        <div class="col-md-8 col1">
           <a href="#" class="b-link-stroke b-animate-go  thickbox img-rounded">
           <img src="{{$products[0]->image}}" class="img-responsive" alt=""/><div class="b-wrapper2"><h2 class="b-animate b-from-left    b-delay03 ">{{$products[0]->name}}</h2><p class="b-animate b-from-top    b-delay03 ">{{$products[0]->description}} </br><span class="info" onclick="window.document.location='{{ route('product.show', $products[0]->id) }}';">Mostrar Información</span></p></div></a>
        </div>
        <div class="col-md-4">
           <a href="#" class="b-link-stroke b-animate-go  thickbox img-rounded">
           <img src="{{$products[1]->image}}" class="img-responsive" alt=""/><div class="b-wrapper1"><h2 class="b-animate b-from-left    b-delay03 ">{{$products[1]->name}}</h2><p class="b-animate b-from-right    b-delay03 ">{{$products[1]->description}} </br><span class="info" onclick="window.document.location='{{ route('product.show', $products[1]->id) }}';">Mostrar Información</span></p></div></a>
          <div class="grid1">
             <a href="#" class="b-link-stroke b-animate-go  thickbox img-rounded">
           <img src="{{$products[2]->image}}" class="img-responsive" alt=""/><div class="b-wrapper1"><h2 class="b-animate b-from-left    b-delay03 ">{{$products[2]->name}}</h2><p class="b-animate b-from-right    b-delay03 ">{{$products[2]->description}} </br><span class="info" onclick="window.document.location='{{ route('product.show', $products[2]->id) }}';">Mostrar Información</span></p></div></a>
          </div>
        </div>
        <div class="clearfix"> </div>
      </div>
      <div class="content_middle_top">
        <div class="col-md-4 ">
            <a href="#" class="b-link-stroke b-animate-go  thickbox img-rounded">
           <img src="{{$products[3]->image}}" class="img-responsive" alt=""/><div class="b-wrapper"><h2 class="b-animate b-from-left    b-delay03 ">{{$products[3]->name}}</h2><p class="b-animate b-from-top    b-delay03 ">{{$products[3]->description}} </br><span class="info" onclick="window.document.location='{{ route('product.show', $products[3]->id) }}';">Mostrar Información</span></p></div></a>
        </div>
        <div class="col-md-4 ">
            <a href="#" class="b-link-stroke b-animate-go  thickbox img-rounded">
           <img src="{{$products[4]->image}}" class="img-responsive" alt=""/><div class="b-wrapper"><h2 class="b-animate b-from-left    b-delay03 ">{{$products[4]->name}}</h2><p class="b-animate b-from-top    b-delay03 ">{{$products[4]->description}} </br><span class="info" onclick="window.document.location='{{ route('product.show', $products[4]->id) }}';">Mostrar Información</span></p></div></a>
        </div>
        <div class="col-md-4 ">
            <a href="#" class="b-link-stroke b-animate-go  thickbox img-rounded">
           <img src="{{$products[5]->image}}" class="img-responsive" alt=""/><div class="b-wrapper"><h2 class="b-animate b-from-left    b-delay03 ">{{$products[5]->name}}</h2><p class="b-animate b-from-right    b-delay03 ">{{$products[5]->description}} </br><span class="info" onclick="window.document.location='{{ route('product.show', $products[5]->id) }}';">Mostrar Información</span></p></div></a>
        </div>
        <div class="clearfix"> </div>
      </div>
      </div>
    </div>
    {!! $products->render() !!}
@endsection
