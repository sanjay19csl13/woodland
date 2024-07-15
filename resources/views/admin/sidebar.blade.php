<div class="d-flex align-items-stretch">
  <!-- Sidebar Navigation-->
  <nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
      <div class="avatar"><img src="/images/logo10.png" class="img-fluid rounded-circle"></div>
      <div class="title">
        <h1 class="h5">Sanjay S</h1>
        <p>Admin</p>
      </div>
    </div>
    <!-- Sidebar Navidation Menus--><span class="heading">Product Menu</span>
    <ul class="list-unstyled">
      <li class="{{Request::is('admin/dashboard')?'active':'';}}"><a href="{{url('admin/dashboard')}}"> <i class="fa-solid fa-house"></i>Home </a></li>
      <li class="{{Request::is('view_category')?'active':'';}}">
        <a href="{{url('view_category')}}"><i class="fa-solid fa-list"></i>Category </a>
      </li>
      <li class="{{ Request::is('add_product', 'view_product') ? 'active' : '' }}"><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="fa-solid fa-bag-shopping"></i>Products</a>
        <ul id="exampledropdownDropdown" class="collapse list-unstyled {{ Request::is('add_product', 'view_product') ? 'show' : '' }}">
          <li class="{{Request::is('add_product')?'active':'';}}"><a href="{{url('add_product')}}"><i class="fa-solid fa-plus"></i>Add Product </a></li>
          <li class="{{Request::is('view_product')?'active':'';}}"><a href="{{url('view_product')}}"><i class="fa-regular fa-star"></i>View Product</a></li>
        </ul>
      </li>

      <li class="{{Request::is('view_order')?'active':'';}}">
        <a href="{{url('view_order')}}"> <i class="fa-solid fa-cart-shopping"></i>Orders </a>
      </li>
    </ul>
  </nav>