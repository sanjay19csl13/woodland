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
            background-color: #05826c;
            border-radius: 10px;
            box-shadow: rgba(0, 0, 0, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;
        }

        .page-header h1 {
            font-size: 25px;
            color: #fff;
            font-weight: bold;
        }

        .div-1 {

            margin-bottom: 10px;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: rgba(0, 0, 0, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;
        }


        .product-card {
            box-shadow: rgba(0, 0, 0, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;
            padding: 5px;
            margin: 10px 0;
            border-radius: 5px;
            background-color: #fff;
        }

        .product-image {
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            height: 50px;
        }

        .product-details {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            font-size: 12px;

        }

        .product-details h5 {
            font-size: 15px;
            font-weight: 700;
        }

        .product-details h6 {
            font-size: 12px;
        }

        .product-description {
            font-size: 12px;
            padding-left: 10px;
        }

        .button-2,
        .button-3 {
            display: inline-block;
            padding: 5px 10px;
            font-size: 16px;
            color: #fff;
            text-align: center;
            text-decoration: none;
            background: linear-gradient(to right, #ff5f5f, #ff7b7b);
            border: none;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
            margin-inline: 20px;
        }

        .button-3:hover {
            background: linear-gradient(to right, #ff7b7b, #ff5f5f);
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            text-decoration: none;
            color: #fff;
        }

        .button-2:active,
        .button-3:active {
            transform: translateY(0);
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        }

        .button-2 {
            background: linear-gradient(to right, #70e000, #4caf50);
        }

        .button-2:hover {
            background: linear-gradient(to right, #4caf50, #70e000);
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            text-decoration: none;
            color: #ccc;
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
            width: 30%;
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
            <h1>View Product</h1>
        </div>
        <div class="search-container">
            <form action="{{url('product_search')}}" method="get">
                @csrf
                <input type="search" name="search" placeholder="Search products..." class="search-input">
                <input type="submit" value="Search" class="search-button">
            </form>
        </div>
        <div-1>
            <div class="container mt-4">
                <div class="row">
                    @foreach($product as $products)
                    <div class="col-md-4 col-lg-3 col-12">
                        <div class="product-card">
                            <div class="row ">
                                <div class="col-4 ">
                                    <div class="product-image"> <img style="height:85px; width:85px;" src="products/{{$products->image}}"></div>
                                </div>
                                <div class="col-8 product-details">
                                    <h5>{{$products->product_name}}</h5>
                                    <h6>Qty:{{$products->quantity}}</h6>
                                    <h6>Category:{{$products->category}}</h6>
                                    <h6>Price:${{$products->price}}</h6>
                                </div>
                            </div>
                            <hr>
                            <div class="product-description col-12">
                                <p>{!!Str::limit($products->description,57)!!}</p>
                            </div>
                            <hr>
                            <div class="product-buttons">
                                <a class="button-2" href="{{url('update_product',$products->id)}}">Update</a>
                                <a class="button-3" onClick="confirmation(event)" href="{{url('delete_product',$products->id)}}">Delete</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="div-2">
                {{$product->onEachSide(1)->links()}}
            </div>
    </div>
    @include('admin.js')
</body>

</html>