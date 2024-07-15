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

    #description {
      width: 90%;
      max-width: 800px;
      height: 150px;
    }

    .form-control,
    .form-control-file,
    select {
      width: 40%;
      padding: 10px;
      border-radius: 5px;
      font-size: 14px;
      box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;
      margin: 20px;
      border: none;
    }

    .div-1 {
      padding: 20px;
    }


    label {
      font-weight: bold;
      font-size: 20px;
      color: #05826c;
      display: block;
      margin-bottom: 5px;
    }

    .form-section {
      margin-bottom: 25px;
      background-color: #fff;
      padding: 10px;
      border-radius: 10px;
      box-shadow: rgba(0, 0, 0, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;
    }

    .form-section p {
      font-size: 12px;
      color: #000;
      margin-top: 5px;
    }

    .div-4 {
      text-align: center;
    }

    .div-4 p {
      font-size: 12px;
      color: #555;
      margin-top: 5px;
    }

    .btn-img {
      font-size: 16px;
      background-color: #fff;
      border-radius: 50px;
      box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;
      width: 250px;
      outline: none;
      margin: 20px;
    }

    ::-webkit-file-upload-button {
      color: #fff;
      background-color: #05826c;
      padding: 8px;
      border: none;
      border-radius: 50px;
      box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;
      outline: none;
    }

    ::-webkit-file-upload-button:hover {
      background-color: #09c3a2;
    }
  </style>
</head>

<body>
  @include('admin.header')
  @include('admin.sidebar')

  <div class="page-content ">
    <div class="page-header">
      <h1>Update Product</h1>
    </div>

    <div class="div-1">
      <form action="{{url('edit_product', $data->id)}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-section">
          <label for="title">Product Title</label>
          <input type="text" id="title" name="title" value="{{$data->product_name}}" class="form-control" maxlength="16">
          <p>Enter a concise and descriptive title for the product. This will be used as the primary identifier for the product in listings and searches.</p>
        </div>

        <div class="form-section">
          <label for="description">Description</label>
          <textarea id="description" name="description" class="form-control">"{{$data->description}}" </textarea>
          <p>Provide a detailed description of the product, including key features, benefits, and any other relevant information that potential buyers would find useful.</p>
        </div>

        <div class="form-section">
          <label for="price">Price</label>
          <input type="number" id="price" name="price" class="form-control" value="{{$data->price}}">
          <p>Specify the price of the product in your local currency. Ensure that the price is competitive and reflects the value offered by the product.</p>
        </div>

        <div class="form-section">
          <label for="qty">Quantity</label>
          <input type="number" id="qty" name="quantity" class="form-control" value="{{$data->quantity}}">
          <p>Indicate the available stock quantity for the product. This helps manage inventory and ensures accurate stock levels are displayed to customers.</p>
        </div>
     
        <div class="form-section">
          <label for="category">Product Category</label>
          <select id="category" name="category" class="form-control" required>
            <option value="{{$data->category}}">value="{{$data->category}}" </option>
            @foreach($category as $category)
            <option value="{{$category->category_name}}">{{$category->category_name}}</option>
            @endforeach
          </select>
          <p>Select the appropriate category for the product from the dropdown menu. Categorizing products correctly helps in better organization and easier navigation for users.</p>
        </div>

        <div class="form-section">
          <label for="image">Current Image</label>
          <img style="width: 100px; height: 100px;" src="/products/{{ $data->image }}" class="form-control-file">
          <p> high-quality image of the product. The image should be clear and visually appealing to attract potential buyers.</p>
        </div>
     
        <div class="form-section">
          <label for="image">New Image</label>
          <input class="btn-img" type="file" id="image" name="image" class="form-control-file">
          <p>Upload a high-quality image of the product. The image should be clear and visually appealing to attract potential buyers.</p>
        </div>
       
        <div class="div-4 text-center">
          <input class="btn btn-success" type="submit" value="Update Product Product">
          <p>Click the "Update Product" button to save the product details and add it to the inventory. Ensure all information is accurate before submitting.</p>
        </div>

      </form>
    </div>
  </div>


 
  @include('admin.js')


  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>