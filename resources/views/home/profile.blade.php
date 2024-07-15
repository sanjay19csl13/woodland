<!DOCTYPE html>
<html lang="en">

<head>
    @include('home.head')
    <style>
        .container-pro {
            margin-top: 80px;

        }

        .card {
            border: none;

        }

        .card-header {
            background-color: #0b8876;
            color: #fff;
            font-size: 30px;
            font-weight: bold;
            text-align: center;
        }

        .card-body {
            padding: 2rem;
        }

        .des p {
            font-size: 20px;
            margin-bottom: 1.9rem;
            font-weight: bold;
        }


        .mb-3 {
            padding: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .mb-3 h4 {
            font-size: 16px;
            margin-bottom: 0.5rem;
            color: #000;
            font-weight: bold;
        }

        .mb-3 h4 span {
            font-size: 14px;
            margin-bottom: 0.5rem;
            color: #555;
        }

        .video-container {
            position: relative;
            padding-bottom: 56.25%;
            overflow: hidden;
            max-width: 100%;
            background: #000;
        }

        .video-container video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }


        .btn-custom-secondary {
            background-color: #0b8876;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-custom-danger {
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .rowoder {
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 1.5rem;
            border-radius: 5px;
            overflow: hidden;
            padding: 8px;
        }

        .oderimg img {
            border-radius: 5px;
            border: 2px solid #ddd;
        }

        .product-name {
            font-size: 1.3rem;
            color: #333;
            margin-bottom: 0.5rem;
        }

        .price {
            font-size: 1.1rem;
            color: #0b8e85;
            margin-bottom: 0.5rem;
        }

        .description {
            font-size: 14px;
            color: #666;
            margin-bottom: 1rem;
        }

        .btn-pay,
        .btn-sta {
            font-size: 0.9rem;
            padding: 0.5rem 1rem;
            border-radius: 5px;
        }

        .btn-warning {
            background-color: #ffc107;
            border: none;
            color: #fff;
            transition: background-color 0.3s ease;
        }

        .btn-warning:hover {
            background-color: #e0a800;
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
            color: #fff;
            transition: background-color 0.3s ease;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        /* Order Status Colors */
        .btn-sta span {
            font-weight: bold;
        }

        .btn-sta span[style*="color:red;"] {
            background-color: #f8d7da;
            color: #721c24;
            padding: 0.2rem 0.5rem;
            border-radius: 3px;
        }

        .btn-sta span[style*="color:blue;"] {
            background-color: #d1ecf1;
            color: #0c5460;
            padding: 0.2rem 0.5rem;
            border-radius: 3px;
        }

        .btn-sta span[style*="color:green;"] {
            background-color: #d4edda;
            color: #155724;
            padding: 0.2rem 0.5rem;
            border-radius: 3px;
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

    <div class="container-fluid container-pro">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Profile') }}</div>
                    <div class="card-body">
                        <div class="des">
                            <p>Welcome to your profile page.</p>
                        </div>
                     
                        <div class="row col-lg-12 ">
                            <div class="mt-3 col-lg-6 ">
                                <div class="mb-3">
                                    <h4>Name &nbsp; &nbsp; &nbsp; &nbsp; : &nbsp; &nbsp; <span>{{ Auth::user()->name }}</span></h4>
                                </div>
                                <div class="mb-3">
                                    <h4>Email &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : &nbsp; &nbsp; <span>{{ Auth::user()->email }}</span></h4>
                                </div>
                                <div class="mb-3">
                                    <h4>Phone &nbsp; &nbsp; &nbsp; &nbsp; :&nbsp; &nbsp; <span> {{ Auth::user()->phone }}</span></h4>
                                </div>
                                <div class="mb-3">
                                    <h4>Address &nbsp; :&nbsp; &nbsp; <span>{{ Auth::user()->address }}</span></h4>
                                </div>
                                <div class="mt-2 ">
                                    <h5>Cart Items: {{ $cart_count }}</h5>
                                    <a href="{{ url('mycart') }}" class="btn btn-custom-secondary">View My Cart</a>
                                </div>
                                <div class="mt-3">
                                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                        @csrf
                                        <input class="btn btn-custom-danger" type="submit" value="Logout">
                                    </form>
                                </div>
                            </div>
                            <div class="video-container p-0 col-lg-6 col-sm-12">
                                <video class="w-100 h-100" controls>
                                    <source src="images/woodland.mp4" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>


                   

                        </div>

                        <div class=" container mt-5 pt-5">
                            <div class="row">
                                <div class="col-md-3 p-4 bg-danger">
                                    <h5>Total Orders :{{$totalOrders}} </h5>
                                </div>
                                <div class="col-md-3 p-4 bg-info">
                                    <h5>In Progress :{{$inProgress}} </h5>
                                </div>
                                <div class="col-md-3 p-4 bg-warning">
                                    <h5>On the Way :{{$onTheWay}} </h5>
                                </div>
                                <div class="col-md-3 p-4 bg-success">
                                    <h5>Delivered :{{$delivered}} </h5>
                                </div>
                            </div>
                            @if($order->isEmpty())
                            <p class="empty">"There are no items in your cart"</p>
                            @else

                            @foreach($order as $order)
                            <div class="row rowoder my-5">
                                <div class="col-12 col-md-2 oderimg">
                                    <img src="products/{{ $order->product->image }}" alt="Product Image" class="img-fluid img-thumbnail" style="width: 150px; height: 150px;">
                                </div>
                                <div class="col-lg-7 col-md-6 col-12">
                                    <h4 class="product-name">{{ $order->product->product_name }}</h4>
                                    <h4 class="price">${{ $order->product->price }}</h4>
                                    <h6 class="description">{!! Str::limit($order->product->description, 150) !!}</h6>
                                    <p><strong>Order Placed:</strong> {{ $order->created_at }}</p>

                                    <?php
                                    $orderCreatedAt = $order->created_at;
                                    $deliveryTime = date('Y-m-d', strtotime('+7 days', strtotime($orderCreatedAt)));
                                    ?>
                                    <p><strong>Delivery Time:</strong> {{ $deliveryTime }}</p>
                                    <p class="btn btn-pay">{{ $order->payment_status }}</p>
                                    <p class="btn btn-sta">
                                        @if($order->status == 'in progress')
                                        <span style="color:red;">{{ $order->status }}</span>
                                        @elseif($order->status == 'On the way')
                                        <span style="color:blue;">{{ $order->status }}</span>
                                        @else
                                        <span style="color:green;">{{ $order->status }}</span>
                                        @endif
                                    </p>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-12 d-flex align-items-end justify-content-end">
                                    <div>
                                        <a class="btn btn-warning btn-sm mb-2" href="{{ url('print_pdf', $order->id) }}">Print PDF</a>
                                        <a class="btn btn-danger btn-sm mb-2" href="">Cancel Order</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>


                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
    @include('home.footer')

   
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>