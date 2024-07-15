<!DOCTYPE html>
<html>

<head>
  @include('home.head')
</head>

<body>

  @include('home.header')

  <section class="shop py-5 text-center bg-light ">
    <div class="container shop-content ">
      <h4 class="mb-3">COMBO SALE</h4>
      <h1 class="mb-4">Fantacy Furniture<br>up to 50% OFF</h1>
      <a href="{{ url('shoping_page') }}" class="btt btn">Shop Now</a>
    </div>
  </section>

  <div class="heading text-center my-4">
    <h1 class="h2">Our Product</h1>
  </div>

  @include('home.product')

  <div class="page d-flex justify-content-center my-5">
    {{$product->links()}}
  </div>


  @include('home.footer')

</body>

</html>