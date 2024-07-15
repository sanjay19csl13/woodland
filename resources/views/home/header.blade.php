<nav class="navbar navbar-expand-lg navbar-light  py-1 fixed-top">
  <div class="container">
    <a class="navbar-brand" href="/" style="color:#016f7e">WoodLand</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span><i class="fa-solid fa-bars-staggered" id="bar"></i></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav ml-auto">

        <li class="nav-item ">
          <a class="nav-link" href="{{url('/')}}">Home<span class="sr-only">(current)</span></a>
        </li>

        <li class="nav-item ">
          <a class="nav-link" href="{{url('shoping_page')}}">Shop</a>

        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{url('contact')}}">ContactUs</a>
        </li>


        @if(Route::has('login'))
        @auth

        <li class="nav-item">
          <a class="nav-link" href="{{url('myorder')}}">My Order</a>
        </li>


        <li class="nav-item">
          <a class="nav-link" href="{{url('mycart')}}"><i class="fa-solid fa-cart-shopping"></i>[{{$count}}]</a>
        </li>


        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-circle-user "></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-end mt-4" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="{{ url('profile') }}">Profile</a></li>
            <li>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <input class="dropdown-item" type="submit" value="Logout">
              </form>
            </li>
          </ul>
        </li>

        @else

        <li class="nav-item">
          <a class="nav-link" href="{{url('/login')}}">Login</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{url('/register')}}">Register</a>
        </li>
        @endauth
        @endif

    </div>
  </div>
</nav>