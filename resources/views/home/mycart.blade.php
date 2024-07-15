<!DOCTYPE html>
<html>

<head>
    @include('home.head')
    <style>
        .container-cart {
            margin-top: 100px;
        }

        .cartheading {
            padding: 15px;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .order-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
            border: 1px solid #ebe8e8;

        }

        .order-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;

        }

        .order-details {
            flex-grow: 1;
            display: inline-block;
            justify-content: space-between;
            align-items: center;
            margin-left: 10px;
        }

        .order-details .product-name {
            font-weight: bold;
        }

        .order-details .description {
            font-size: 12px;
        }

        .order-details .product-name,
        .order-details .price,
        .order-details .description,
        .order-details .status {
            text-align: left;
        }

        .col-md-2 {
            max-width: 15%;
        }

        .col-md-8 {
            max-width: 70%;
        }

        .col-md-2-right {
            max-width: 15%;
        }

        .imagesection {
            width: 100px;
            height: 100px;
        }

        .cart-item-price {
            margin-top: 5px;
            font-size: 14px;

        }

        .cart-item-remove {
            margin-top: 10px;
        }

        .order-1 {
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            border: 1px solid #ebe8e8;
            background-color: #d5d5d5;
        }

        .form-control {
            width: 100%;
            padding: 8px;
            font-size: 13px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 5px;
        }

        .btn-block {
            display: block;
            width: 100%;
            padding: 10px;
            margin-top: 10px;
        }

        .btn-remove {
            background-color: #026c5d;
            color: #fff;
        }

        .btn-cash,
        .btn-card {
            background-color: #026c5d;
            color: #fff;
            padding: 10px 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .btn-cash:hover,
        .btn-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }

        .btn-card {
            background-color: #120988;
        }

        .bill {
            font-family: Arial, sans-serif;
            width: 100%;
            background-color: #fff;
            margin: 20px auto;
            border: 1px solid #ebe8e8;
            padding: 10px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .items {
            border-top: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
            padding: 5px 0;
        }

        .item {
            display: flex;
            justify-content: space-between;
            align-items: center;

        }

        .item-details {
            flex: 1;
            font-size: 13px;
        }

        .item-price {
            min-width: 50px;
            text-align: right;
        }

        .total {
            text-align: right;
            margin-top: 5px;
            font-size: 20px;
            font-weight: bold;
        }

        .bill-name {
            font-size: 16px;
            font-weight: bold;
        }

        .detail {
            font-size: 15px;
            font-weight: bold;
            color: #636363;
        }

        .empty {
            text-align: center;
            color: #636363;
            margin-top: 10%;
        }
    </style>
</head>

<body>
    @include('home.header')
    <div class="container container-cart">
        <div class="container text-center mt-5 py-3">
            <h1>My Cart</h1>
            <hr class="mx-auto">
            <p>Introducing our latest furniture: elegant, comfortable, stylish, durable, modern, versatile, ergonomic, space-saving, premium craftsmanship</p>
        </div>
        <div class="row">


            <div class="col-md-12 col-lg-8 my-5">
                <div class="cart-item pb-3">
                    <h4>Cart Item</h4>
                </div>
                <?php $totalValue = 0; ?>
                @if($cart->isEmpty())
                <p class="empty">"There are no items in your cart"</p>
                @else
                @foreach($cart as $item)
                <div class="order-item col-12 p-0">
                    <div class="col-12 col-md-2 imagesection p-0">
                        <img src="products/{{ $item->product->image }}" alt="Product Image" class="img-fluid w-100 h-100">
                    </div>
                    <div class="order-details col-lg-8 col-md-6 col-7 py-1">
                        <h4 class="product-name">{{ $item->product->product_name }}</h4>
                        <h6 class="description">{!! Str::limit($item->product->description, 80) !!}</h6>
                    </div>
                    <div class="cart-item-remove">
                        <h6 class="price">${{ $item->product->price }}</h6>
                        <a href="{{ url('delete_cart', $item->id) }}" class="btn btn-sm btn-remove">Remove</a>
                    </div>
                </div>
                <?php $totalValue += $item->product->price; ?>
                @endforeach
                @endif
            </div>



       
            <div class="col-md-12 col-lg-4 ">
                <div class="order-1">
                    <form class="main-form" action="{{ url('confirm_order') }}" method="POST">
                        @csrf
                        <h2 class="pb-4 text-center">Confrim Order</h2>
                        <div class="ord-1">
                            <label class="detail" for="receiver_name">Receiver Name</label>
                            <input type="text" id="receiver_name" name="name" value="{{ Auth::user()->name }}" class="form-control">
                        </div>

                        <div class="ord-1">
                            <label class="detail" for="receiver_address">Address</label>
                            <textarea id="receiver_address" name="address" class="form-control">{{ Auth::user()->address }}</textarea>
                        </div>

                        <div class="ord-1">
                            <label class="detail" for="receiver_phone">Phone Number</label>
                            <input type="text" id="receiver_phone" name="phone" value="{{ Auth::user()->phone }}" class="form-control">
                        </div>

                        <div class="ord-1">
                            <div class="bill">
                                <div class="header">
                                    <h2>Invoice</h2>
                                </div>
                                <div class="items">
                                    @foreach($cart as $item)
                                    <div class="item">
                                        <div class="item-details">
                                            <h4 class="bill-name">{{ $item->product->product_name }}</h4>
                                            <p>Price: ${{ $item->product->price }}</p>
                                        </div>

                                        <div class="item-price">${{ $item->product->price }}</div>
                                    </div>

                                    @endforeach
                                </div>
                                <div class="total">
                                    <p>Total: ${{ $totalValue }}</p>
                                </div>
                            </div>

                            <input class="btn btn-cash btn-block" type="submit" value="Cash On Delivery">
                            <a class="btn  btn-card btn-block" href="{{ url('stripe', $totalValue) }}">Card Payment</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('home.footer')

 

</body>

</html>