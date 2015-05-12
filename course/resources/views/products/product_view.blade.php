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
</br>
<div class="container">
<div class="col-md-3">
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
                <ul class="size">
                    <h3>Kilos</h3>
                    <li><a href="#">{{ $product['kilos'] or '0'}}</a></li>
                </ul>
                <ul class="product-qty">
                   <span>Color:</span>
                   <select>
                     <option>Blanco</option>
                     <option>Azul</option>
                     <option>Rosa</option>
                     <option>Lila</option>
                     <option>Verde</option>
                   </select>
                </ul>
                </br>
                <div class="btn_form">
                   <form>
                     <input type="submit" value="Add to Cart" title="">
                  </form>
                </div>
            </div>
            {!! Form::close() !!}
            <div class="clearfix"></div>
           </div>
        </div>

@endsection
