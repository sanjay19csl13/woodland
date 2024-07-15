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

        .search-container {
            background-color: #fff;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            display: flex;
            justify-content: space-evenly;
            align-items: center;

        }

        .search-input {
            width: 60%;
            padding: 10px;
            font-size: 14px;
            box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 2px 0px, rgba(14, 30, 37, 0.2) 0px 2px 10px 0px inset;
            margin: 5px;
            border: none;
            border-radius: 5px;
        }

        .search-button {
            padding: 8px;
            background: #536764;
            border: none;
            border-radius: 8px;
            color: white;
            font-size: 14px;
            cursor: pointer;
        }

        .search-button:hover {
            background-color: #0056b3;
        }

        .category {
            width: 100%;
            height: 100%;
            box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 2px 0px, rgba(14, 30, 37, 0.2) 0px 2px 10px 0px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    @include('admin.header')
    @include('admin.sidebar')
    <!-- Sidebar Navigation end-->
    <div class="page-content">
        <div class="page-header">
            <h1 style="color:#fff;">Category</h1>
        </div>
        <div class="search-container ">
            <form action="{{ url('add_category') }}" method="post">
                @csrf
                <div>
                    <input type="text" name="category" class="search-input " placeholder="Add category...">
                    <input class="search-button" type="submit" value="Add">
                </div>
            </form>
            <form action="{{ url('search_category') }}" method="GET">
                <input type="search" name="search" placeholder="Search category..." class="search-input">
                <input type="submit" value="Search" class="search-button">
            </form>
        </div>
        <div class="row mt-5 mx-2">
            @foreach($data as $item)
            <div class="col-md-3 col-lg-2 col-6 text-center mb-3">
                <div class="d-flex align-items-center justify-content-center category py-3 ">
                    <h6 class="mb-0 mr-2 " style="text-transform: capitalize;">{{ $item->category_name }}</h6>
                    <a href="{{ url('delete_category', $item->id) }}" class="text-danger" onClick="confirmation(event)">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>




        <!-- JavaScript files-->
        @include('admin.js')
</body>

</html>