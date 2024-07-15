<!DOCTYPE html>
<html>

<head>
    @include('admin.head')
    <style>
        .page-content {

            margin-left: 5px;
            margin-bottom: 10px;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: rgba(0, 0, 0, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;
            padding: 5px;
            width: 100%;
        }

        .page-header {
            text-align: center;
            margin-bottom: 20px;
            background-color: #05826c;
            border-radius: 10px;
            box-shadow: rgba(0, 0, 0, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;
        }

        .page-header h1 {
            font-size: 25px;
            color: #fff;
            font-weight: bold;
        }

        .row {
            font-size: 12px;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
            padding: 5px;
            border-radius: 5px;
            background-color: #fff;
            margin-bottom: 10px;
            margin-top: 20px;
        }


        .row .col-md-3 {
            text-align: center;
        }

        .row img.img-fluid {
            width: 150px;
            height: 150px;
            object-fit: cover;
        }

        .row h5,
        .row h6 {
            margin-top: 0;
            margin-bottom: 5px;
        }

        .row p {
            margin-bottom: 5px;
        }

        .row .d-flex {
            margin-top: 10px;
        }

        .row .btn {
            margin-left: 5px;
        }

        .div-2 {
            padding: 30px;
        }

        .pagination {
            display: flex;
            justify-content: center;
            padding: 1rem 0;

        }

        .pagination li {
            list-style-type: none;
            margin: 0 5px;
            box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;
        }

        .pagination li a,
        .pagination li span {
            display: block;
            padding: 8px 12px;
            text-decoration: none;
            color: #000;
            border: 1px solid #dee2e6;
            border-radius: 4px;
        }

        .pagination li a:hover {
            background-color: #e9ecef;
        }

        .pagination .active span {
            background-color: #05826c;
            color: #fff;
            border-color: #007bff;
        }

        .pagination .disabled span {
            color: #6c757d;
            pointer-events: none;
        }

        .search-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .search-input {
            width: 40%;
            padding: 10px;
            border-radius: 5px;
            font-size: 14px;
            box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;
            margin: 10px;
            border: none;
        }

        .search-button {
            padding: 10px 20px;
            background: #536764;
            border: none;
            border-radius: 8px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        .search-button:hover {
            background-color: #0056b3;
        }

        @media (max-width: 600px) {
            .search-container {
                width: 100%;
                padding: 10px;
            }

            .search-input {
                width: 70%;
                margin-bottom: 10px;
            }

            .search-button {
                width: 30%;
            }
        }
    </style>
</head>

<body>
    @include('admin.header')
    @include('admin.sidebar')
    <!-- Sidebar Navigation end-->

    <div class="page-content">
        <div class="page-header">
            <h1>Orders</h1>
        </div>
        <div class="search-container">
            <form action="{{url('status_search')}}" method="get">
                @csrf
                <input type="search" name="search" placeholder="Order status..." class="search-input">
                <input type="submit" value="Search" class="search-button">
            </form>
        </div>
        <div class="container">
            <div class="row">
                @foreach($data as $order)
                <div class="col-12 order-card">
                    <div class="row product">
                        <div class="col-md-3 text-center">
                            <img src="products/{{$order->Product->image}}" alt="Product Image" class="img-fluid">
                        </div>
                        <div class="col-md-9">
                            <h5>Name : {{$order->name}}</h5>
                            <p>Address : {{$order->rec_address}}</p>
                            <p>Phone : {{$order->phone}}</p>
                            <h6>Product Name : {{$order->Product->product_name}}</h6>
                            <p>Price : ${{$order->Product->price}}</p>
                            <p>order placed : {{$order->created_at}}</p>
                            <?php
                            $orderCreatedAt = $order->created_at;
                            $deliveryTime = date('Y-m-d ', strtotime('+7 days', strtotime($orderCreatedAt)));
                            echo "<p>Delivery time: {$deliveryTime}</p>";
                            ?>
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p>Payment status : {{$order->payment_status}}</p>
                                    <p>
                                        @if($order->status == 'in progress')
                                        <span style="color:red;">{{$order->status}}</span>
                                        @elseif($order->status == 'On the way')
                                        <span style="color:blue;">{{$order->status}}</span>
                                        @else
                                        <span style="color:green;">{{$order->status}}</span>
                                        @endif
                                    </p>
                                </div>
                                <div>
                                    <a class="btn btn-primary btn-sm" href="{{ url('on_the_way', $order->id) }}">On The Way</a>
                                    <a class="btn btn-success btn-sm" href="{{ url('delivered', $order->id) }}">Delivered</a>
                                    <a class="btn btn-secondary btn-sm" href="{{ url('print_pdf', $order->id) }}">Print PDF</a>
                                    <a class="btn btn-danger btn-sm" href="{{ url('cancel_order', $order->id) }}">Cancel Order</a>
                                    <a class="btn btn-warning btn-sm" href="{{ url('refund_order', $order->id) }}">Refund</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="div-2">
            {{$data->onEachSide(1)->links()}}
        </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.js')
</body>

</html>