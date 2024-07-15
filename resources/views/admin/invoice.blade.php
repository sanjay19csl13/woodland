<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer and Product Information - Woodland</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f3f4f6;
            color: #333;
            font-size: 14px; /* smaller default font size */
        }
        .container {
            width: 90%;
            max-width: 900px;
            margin: 30px auto;
            background-color: #fff;
            padding: 15px; /* Reduced padding */
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        header {
            text-align: center;
            margin-bottom: 30px;
        }
        header .heading {
            font-size: 35px;
            font-family: "Bonheur Royale", cursive;
            font-weight: bold;
            font-style: normal;
            color: #004750;
        }
        .company-info {
            background-color: #f9fafb;
            padding: 20px;
            margin: 20px 0;
            border-left: 4px solid #16a085;
            border-radius: 5px;
            text-align: left;
        }
        .company-info h2 {
            font-size: 1.5em;
            color: #16a085;
            margin: 0 0 10px;
        }
        .company-info p {
            color: #555;
            line-height: 1.6;
        }
        .customer-info, .product-info {
            margin: 20px 0;
            text-align: left;
        }
        .customer-info h4, .product-info h4 {
            font-size: 1.2em;
            color: #34495e;
            margin: 10px 0;
        }
        .product-info img {
            display: block;
            margin: 20px auto;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            color: #7f8c8d;
        }
        .footer p {
            margin: 5px 0;
        }
        span {
            color: #16a085;
        }
        .small-text {
            font-size: 12px; /* smaller font size for additional information */
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <strong class="heading">WoodLand</strong>
        </header>
        <div class="center-content">
            <section class="company-info">
                <h2>About Woodland</h2>
                <p>At Woodland, we are dedicated to providing high-quality furniture that combines comfort, style, and durability. Our wide range of products caters to all tastes and preferences, ensuring that every customer finds the perfect piece to complement their home. With a commitment to excellence, we source the finest materials and employ skilled craftsmen to create furniture that stands the test of time.</p>
            </section>

            <section class="customer-info">
    <center>
        <h5><span>Customer Name:</span> {{$data->name}}</h5>
        <h5><span>Customer Address:</span> {{$data->rec_address}}</h5>
        <h5><span>Customer Phone:</span> {{$data->phone}}</h5>
        <h5><span>Product Title:</span> {{$data->product->product_name}}</h5>
        <h5><span>Product Price:</span> ${{$data->product->price}}</h5>
        <h5><span>Order placed:</span> {{$data->created_at}}</h5>
        <h5><span>Payment status:</span> {{$data->payment_status}}</h5>
        <img width="180px" height="180px" src="products/{{$data->product->image}}" alt="Product Image">
    </center>
</section>

        </div>

        <footer class="footer">
            <p>Thank you for choosing Woodland. We value your business and strive to provide the best products and services.</p>
            <p>&copy; 2024 Woodland. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>


