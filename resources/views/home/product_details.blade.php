<!DOCTYPE html>
<html lang="en">

<head>
  @include('home.head')
  <style>
    .small-img-group {
      display: flex;
      justify-content: space-between;


    }

    .small-img-col {
      flex-basis: 24%;
    }

    .pimg {
      height: 500px;
    }

    .add-btn {
      padding: 8px 15px;
      background-color: #04665b;
      color: #fff;
    }
  </style>
</head>

<body>
  <div class="hero_area">
    @include('home.header')
  </div>
  <section class="container sproduct my-5 pt-5">
    <div class="row my-5">
      <div class="col-lg-5 col-md-12 col-12">
        <img class="img-fluid w-100 pimg pb-1" src="/products/{{$data->image}}" alt="{{$data->product_name}}">
        <div class="small-img-group">
          <div class="small-img-col">
            <img class="small-img" width="100%" src="/products/{{$data->image}}" alt="{{$data->product_name}}">
          </div>
          <div class="small-img-col simg">
            <img class="small-img" width="100%" src="/products/{{$data->image}}" alt="{{$data->product_name}}">
          </div>
          <div class="small-img-col">
            <img class="small-img" width="100%" src="/products/{{$data->image}}" alt="{{$data->product_name}}">
          </div>
          <div class="small-img-col">
            <img class="small-img" width="100%" src="/products/{{$data->image}}" alt="{{$data->product_name}}">
          </div>
        </div>
      </div>

      <div class="col-lg-6 col-md-12 col-12">
        <h6>Shop / Furniture</h6>
        <h2 class="py-3">{{$data->product_name}}</h2>
        <h3>${{$data->price}}</h3>
        <div class="star">
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
        </div>
        <p class="pt-4">Available Qty: {{$data->quantity}}</p>
        <a class="add-btn" href="{{url('add_cart', $data->id)}}">Add to Cart</i></a>
        <h4 class="mt-5 mb-3">Product details</h4>
        <span>{{$data->description}}</span>

      </div>
    </div>
  </section>


  <section class="my-5 mb-5">
    <div class="container text-center mt-5 py-5">

      <h3>Related product</h3>
      <hr class="mx-auto">
      <p>Introducing our latest furniture: elegant, comfortable, stylish, durable, modern, versatile, ergonomic, space-saving, premium craftsmanship</p>
    </div>

    <div class="row mx-auto container">
      @php $count = 0; @endphp
      @foreach($product as $product) <!-- Corrected the variable names to be consistent -->
      @if($count > 3 && $count < 8) <div class="product text-center col-lg-3 col-md-6 col-12">
        <div class="image-container">
          <img class="img-fluid" src="{{ asset('products/' . $product->image) }}" alt="{{ $product->name }}"> <!-- Corrected the variable name -->
        </div>

        <h5 class="p-name text-dark">{{$product->product_name}}</h5> <!-- Corrected the variable name -->
        <p>{!! Str::limit($product->description, 40) !!}</p> <!-- Corrected the variable name -->

        <h4 class="p-price">${{$product->price}}</h4> <!-- Corrected the variable name -->
        <div class="star">
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
        </div>
        <div>
          <button class="buy-btn"><a href="{{ url('product_details', $product->id) }}">Buy Now</a></button> <!-- Corrected the variable name -->
          <a class="btn cart-1" href="{{url('add_cart', $product->id)}}"><i class="fa-solid fa-cart-shopping"></i></a> <!-- Corrected the variable name -->
        </div>
    </div>
    @endif
    @php $count++; @endphp
    @endforeach
  </section>

  @include('home.footer')
</body>

</html>