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

<div class="container" style="background:#FFF1F4">
</br>
  <div class="col-md-3" >
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
  </div>
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
                  <img class="etalage_thumb_image" src="{{$product['image']}}" class="img-responsive" />
                  <img class="etalage_source_image" src="{{$product['image']}}" class="img-responsive" />
              </a>
          </li>
          <div class="clearfix"> </div>
        </ul>
        <!-- end product_slider -->
      </div>
      {!! Form::open(['route'=>'addCart','method'=>'POST']) !!}
      <input type="hidden" name="product_id" value="{{$product['id']}}" />
      <div class="cont1 span_2_of_a1">
        <h1> {{ $product['name'] }}</h1>
        <!-- <ul class="rating">
           <li><a class="product-rate" href="#"> </a> <span> </span></li>
           <li><a href="#">1 Review(s) Add Review</a></li>
           <div class="clearfix"></div>
        </ul> -->
        <div class="price_single">
          <span class="actual"> {{ $product['unit_cost'] or '0.0'}}</span>
        </div>
        <h2 class="quick">Quick Overview:</h2>
        <p class="quick_desc"> {{ $product['description'] }}</p>
        <form class="form-inline">
          <div class="form-group ">
            <div class="input-group">
              <div class="input-group-addon">Cantidad</div>
              <input type="integer" class="form-control" required>
            </div>
          </div>

          <div class="form-group ">
            <div class="input-group">
              <div class="input-group-addon">Kilos</div>
              <select class="form-control">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
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
