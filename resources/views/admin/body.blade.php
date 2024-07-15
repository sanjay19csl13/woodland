<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .page-content {
            margin-left: 5px;
            margin-bottom: 10px;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: rgba(0, 0, 0, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;
            width: 100%;
        }

        .page-header {
            display: flex;
            text-align: center;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
            justify-content: space-between;
        }

        .page-header h1 {
            font-size: 30px;
            color: #05826c;
            font-weight: bold;
        }

        .row {
            padding: 30px 30px;
            align-items: center;
            background-color: #ffffff;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
            border-radius: 10px;
        }

        .col {
            flex: 1;
            max-width: 25%;
            padding: 15px;
            box-sizing: border-box;
        }

        .statistic-block {
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin: 0px;
        }

        .title-ico {
            display: flex;
            align-items: center;
        }

        .title-ico .icon {
            font-size: 20px;
            margin-right: 10px;
            padding: 10px;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            text-align: center;
        }

        .icon-1 {
            color: #ff8d8d;
            background-color: #ac0d0d;
        }

        .icon-2 {
            color: #fffb6b;
            background-color: #aca80d;
        }

        .icon-3 {
            color: #6ba5ff;
            background-color: #11479a;
        }

        .icon-4 {
            color: #65fe73;
            background-color: #119a1e;
        }

        .dash-1 {
            color: #ac0d0d;
            font-size: 25px;
            font-weight: 900;
        }

        .dash-2 {
            color: #aca80d;
            font-size: 25px;
            font-weight: 900;
        }

        .dash-3 {
            color: #11479a;
            font-size: 25px;
            font-weight: 900;
        }

        .dash-4 {
            color: #119a1e;
            font-size: 25px;
            font-weight: 900;
        }

        .detail-1 {
            background-color: #ff8d8d;
        }

        .detail-2 {
            background-color: #fffb6b;
        }

        .detail-3 {
            background-color: #6ba5ff;
        }

        .detail-4 {
            background-color: #65fe73;
        }

        .detail {
            box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
        }

        .search-input {
            width: 60%;
            padding: 8px;
            border-radius: 5px;
            font-size: 13px;
            box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;
            border: none;
        }

        .search-button {
            padding: 8px 15px;
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
                width: 80%;
                margin-bottom: 10px;
            }

            .search-button {
                width: 50%;
            }
        }

        .headuser {
            padding: 10px;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
            margin: 10px;
            border-radius: 10px;
        }

        .headuser h2 {
            font-size: 30px;
            color: #05826c;
            font-weight: bold;
        }

        .div-deg {
            margin: 25px;
        }

        .custom-card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            background: linear-gradient(135deg, #e0f7fa, #f1f8e9); /* Light gradient background */
            color: #333; /* Darker text color for readability */
        }

        .custom-card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #00796b; /* Darker teal for title */
        }

        .card-text {
            font-size: 16px;
            line-height: 1.5;
            margin-bottom: 5px;
            color: #37474f; /* Dark gray text color */
        }

        .card-text strong {
            color: #00796b; /* Darker teal for strong text */
        }

        @media (max-width: 768px) {
            .card-title {
                font-size: 16px;
            }

            .card-text {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="page-content">
        <div class="page-header px-3">
            <h1 style="color:#05826c;">Dashboard</h1>
        </div>

        <div class="row mx-2 my-4">
            <div class="col-lg-3 col-md-4 col-sm-12 my-3">
                <div class="statistic-block detail-1">
                    <div class="title title-ico">
                        <div class="icon icon-1"><i class="fa-solid fa-user-group"></i></div>
                        <strong class="pl-2 pr-3">Total Clients</strong>
                        <div class="number dash-1 pl-2">{{ $user }}</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-12 my-3">
                <div class="statistic-block detail-2">
                    <div class="title title-ico">
                        <div class="icon icon-2"><i class="fa-solid fa-box-open"></i></div>
                        <strong class="pl-2">Total Products</strong>
                        <div class="number dash-2 pl-2">{{ $product }}</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-12 my-3">
                <div class="statistic-block detail-3">
                    <div class="title title-ico">
                        <div class="icon icon-3"><i class="fa-solid fa-cart-shopping"></i></div>
                        <strong class="pl-2 pr-3">Total Orders</strong>
                        <div class="number dash-3 pl-2">{{ $order }}</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-12 my-3">
                <div class="statistic-block detail-4">
                    <div class="title title-ico">
                        <div class="icon icon-4"><i class="fa-solid fa-truck"></i></div>
                        <strong class="pl-2">Total Delivered</strong>
                        <div class="number dash-4 pl-2">{{ $delivered }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="headuser">
            <h2>Users</h2>
        </div>

        <div class="div-deg fluid">
            <div class="row">
                @foreach($users as $user)
                <div class="col-md-4 mb-4">
                    <div class="card custom-card">
                        <div class="card-body">
                            <h5 class="card-title">Customer-Id: {{$user->id}}</h5>
                            <p class="card-text"><strong>Name:</strong> {{$user->name}}</p>
                            <p class="card-text"><strong>Email:</strong> {{$user->email}}</p>
                            <p class="card-text"><strong>User Type:</strong> {{$user->usertype}}</p>
                            <p class="card-text"><strong>Phone:</strong> {{$user->phone}}</p>
                            <p class="card-text"><strong>Address:</strong> {{$user->address}}</p>
                            <p class="card-text"><strong>Account Created Date:</strong> {{$user->email_verified_at}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</body>
</html>
