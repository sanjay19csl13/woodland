<!DOCTYPE html>
<html lang="en">

<head>
    @include('home.head')
    <style>
        .container-order {
            margin-top: 100px;
        }

        .container-order {
            padding: 20px;
            border-radius: 10px;

        }

        .rowoder {
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
            padding: 10px;

        }

        .heading-1 {
            font-size: 2rem;
            color: #333;
            text-align: center;
        }


        .oderimg img {
            border-radius: 10px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        .product-name {
            font-size: 1.25rem;
            color: #333;
        }

        .price {
            font-size: 1.25rem;
            color: #0b8e85;
        }

        .description {
            font-size: 0.875rem;
            color: #666;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        p {
            font-size: 0.875rem;
            color: #333;
        }

        .btn-pay {

            color: #000;
            padding: 3px;
            border-radius: 0px;
            font-size: 0.875rem;

        }

        .btn-sta span {
            font-size: 0.875rem;
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

     
        .btn-secondary,
        .btn-danger {
            padding: 5px 10px;
            font-size: 0.875rem;
            border-radius: 5px;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .empty {
            text-align: center;
            color: #636363;
            margin-top: 10%;
        }

        @media (max-width: 767px) {
            .product-name {
                font-size: 1rem;
            }

            .price {
                font-size: 1rem;
            }

            .description {
                font-size: 0.75rem;
            }

            .btn-secondary,
            .btn-danger {
                font-size: 0.75rem;
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        @include('home.header')

        <div class="container container-order">
            <div class="row">
                <div class="col-12 text-center mb-5 ">
                    <h1 class="heading-1 mt-3 mb-3">My Order</h1>
                    <hr class="mx-auto ">
                    <span>Introducing our latest furniture: elegant, comfortable, stylish, durable, modern, versatile, ergonomic, space-saving, premium craftsmanship</span>
                </div>
            </div>
            @if($order->isEmpty())
            <p class="empty">"There are no items in your cart"</p>
            @else
            @foreach($order as $order)
            <div class="row rowoder my-4">
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
        @endif

        @include('home.footer')
    </div>


  
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>