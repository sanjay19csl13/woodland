<!-- slidebar-->
<section id="sliderbar">
  <div class="div-1">
    <div class="content">
      <h1>
        Welcome To WoodLand
      </h1>
      <h5>
        Shop stylish, high-quality furniture at WoodLand.
        Find modern sofas, elegant dining tables, and more.<br>
        Enjoy seamless online shopping and exceptional customer service.
        Transform <br>your home today!
      </h5>
      <button type="submit"><a class="nav-link" href="{{url('shoping_page')}}">Shop Now</a></button>
    </div>
  </div>
</section>




<!-- BRAND-->
<section id="brand" class="container">
  <div class="row m-0 py-5">
    <img class="img-fluid col-lg-2 col-md-4 col-6" width="100px" height="70px" src="{{ asset('images/brand-1.png')}}">
    <img class="img-fluid col-lg-2 col-md-4 col-6" width="100px" height="70px" src="{{ asset('images/brand-2.png')}}">
    <img class="img-fluid col-lg-2 col-md-4 col-6" width="100px" height="70px" src="{{ asset('images/brand-5.png')}}">
    <img class="img-fluid col-lg-2 col-md-4 col-6" width="100px" height="70px" src="{{ asset('images/brand-3.png')}}">
    <img class="img-fluid col-lg-2 col-md-4 col-6" width="100px" height="70px" src="{{ asset('images/brand-4.png')}}">
    <img class="img-fluid col-lg-2 col-md-4 col-6" width="100px" height="70px" src="{{ asset('images/brand-3.png')}}">
  </div>
</section>





<!-- new itens-->
<section id="new" class="w-100%">
  <div class="row p-0 m-0">

    <div class="one col-lg-4 col-md-12 col-12 p-0">
      <img class="image-fluid" src="images/new-1.jpg" alt="">
      <div class="details">
        <h2>Living Room <br>Setup</h2>
        <button class="but-1"><a class="nav-link" href="{{url('shoping_page')}}">Shop Now</a></button>
      </div>
    </div>

    <div class="one col-lg-4 col-md-12 col-12 p-0">
      <img class="image-fluid" src="images/new-2.jpg" alt="">
      <div class="details">
        <h2>Comfortable<br> Sofa</h2>
        <button class="but-1"><a class="nav-link" href="{{url('shoping_page')}}">Shop Now</a></button>
      </div>
    </div>

    <div class="one col-lg-4 col-md-12 col-12 p-0">
      <img class="image-fluid" src="images/new-3.jpg" alt="">
      <div class="details">
        <h2>MoonLight<br> Lamps</h2>
        <button class="but-1"><a class="nav-link" href="{{url('shoping_page')}}">Shop Now</a></button>
      </div>
    </div>
  </div>
</section>




<!-- latest product-->
<section id="featured" class="my-5 pb-5">

  <div class="container text-center mt-5 py-5">

    <h3>New Product</h3>
    <hr class="mx-auto">
    <p>Introducing our latest furniture: elegant, comfortable, stylish, durable, modern, versatile, ergonomic, space-saving, premium craftsmanship</p>
  </div>

  <div class="row mx-auto container">
    @php $count = 0; @endphp
    @foreach($product as $products)
    @if($count < 4) <div class="product text-center col-lg-3 col-md-6 col-12">
      <div class="image-container">
        <img class="img-fluid " src="products/{{$products->image}}">
      </div>

      <h5 class="p-name text-dark ">{{$products->product_name}}</h5>
      <p>{!!Str::limit($products->description,40)!!}</p>

      <h4 class="p-price">${{$products->price}}</h4>
      <div class="star ">
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
      </div>
      <div>
        <button class="buy-btn"> <a href="{{ url('product_details', $products->id) }}">Buy Now</a></button>
        <a class=" btn cart-1" href="{{url('add_cart',$products->id)}}"><i class="fa-solid fa-cart-shopping"></i></a>
      </div>
  </div>
  @endif
  @php $count++; @endphp
  @endforeach
  </div>
</section>



<!--banner-->
<section id="banner" class="my-5 py-5">
  <div class="container">
    <h4>COMBO SALE</h4>
    <h1>white Wood Furniture<br>up to 50% oFF</h1>
    <button><a class="nav-link" href="{{url('shoping_page')}}">Shop Now</a></button>
  </div>
</section>




<!-- new product-->
<section id="Best" class="my-5 ">
  <div class="container text-center mt-5 py-5">
    <h3>Best product</h3>
    <hr class="mx-auto">
    <p>Introducing our latest furniture: elegant, comfortable, stylish, durable, modern, versatile, ergonomic, space-saving, premium craftsmanship</p>
  </div>
  <div class="row mx-auto container">
    @php $count = 0; @endphp
    @foreach($product as $products)
    @if($count > 3 && $count < 8) <div class="product text-center col-lg-3 col-md-6 col-12">
      <div class="image-container">
        <img class="img-fluid " src="products/{{$products->image}}">
      </div>
      <h5 class="p-name text-dark ">{{$products->product_name}}</h5>
      <p>{!!Str::limit($products->description,40)!!}</p>
      <h4 class="p-price">${{$products->price}}</h4>
      <div class="star ">
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
      </div>
      <div>
        <button class="buy-btn"> <a href="{{ url('product_details', $products->id) }}">Buy Now</a></button>
        <a class=" btn cart-1" href="{{url('add_cart',$products->id)}}"><i class="fa-solid fa-cart-shopping"></i></a>
      </div>
  </div>
  @endif
  @php $count++; @endphp
  @endforeach
  </div>
</section>




<!-- sofa-->
<section id="Best" class="my-5 ">
  <div class="container text-center mt-5 py-5">

    <h3>Primium Sofa</h3>
    <hr class="mx-auto">
    <p>Introducing our latest furniture: elegant, comfortable, stylish, durable, modern, versatile, ergonomic, space-saving, premium craftsmanship</p>
  </div>

  <div class="row mx-auto container">
    @php $count = 0; @endphp
    @foreach($product as $products)
    @if($count > 7 && $count < 12) <div class="product text-center col-lg-3 col-md-6 col-12">
      <div class="image-container">
        <img class="img-fluid " src="products/{{$products->image}}">
      </div>

      <h5 class="p-name text-dark ">{{$products->product_name}}</h5>
      <p>{!!Str::limit($products->description,40)!!}</p>

      <h4 class="p-price">${{$products->price}}</h4>
      <div class="star ">
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
      </div>
      <div classs="pro-sec">
        <button class="buy-btn"> <a href="{{ url('product_details', $products->id) }}">Buy Now</a></button>
        <a class="btn cart-1" href="{{url('add_cart',$products->id)}}"><i class="fa-solid fa-cart-shopping"></i></a>
      </div>
  </div>
  @endif
  @php $count++; @endphp
  @endforeach
  </div>
</section>