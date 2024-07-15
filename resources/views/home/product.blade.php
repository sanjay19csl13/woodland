<div class="row mx-auto  container">
    @foreach($product as $products)
    <div class="product text-center col-lg-3 col-md-6 col-12 my-5">
        <div class="image-container">
            <img class="img-fluid" src="{{ asset('products/' . $products->image) }}" alt="{{ $products->product_name }}">
        </div>

        <h5 class="p-name text-dark">{{ $products->product_name }}</h5>
        <p>{!! Str::limit($products->description, 40) !!}</p>

        <h4 class="p-price">${{ $products->price }}</h4>
        <div class="star">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
        </div>
        <a class="btn btt buy-btn" href="{{ url('product_details', $products->id) }}">Buy Now</a>
        <a class=" btn cart-1" href="{{url('add_cart',$products->id)}}"><i class="fa-solid fa-cart-shopping"></i></a>
    </div>
    @endforeach
</div>