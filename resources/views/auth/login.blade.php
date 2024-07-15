<!DOCTYPE html>
<html lang="en">
<head>
    @include('home.head')

   
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #fabe8f;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 110vh;
            margin: 0;
        }
        .main-container {
            display: flex;
            background: white;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            overflow: hidden;
            max-width: 1000px;
            width: 100%;
            height: auto;
        }
        .heading {
            color: #4d4c4b;
            text-align: center;
            margin-bottom: 20px;
        }
       
        .form-label {
            margin-bottom: 0.5rem;
            font-weight: bold;
            color: #4d4c4b;
            display: block;
            font-size: 14px;
        }
        .form-control {
            width: 100%;
            padding: 10px;
            margin-bottom: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
            font-size: 12px;
            height: auto;
        }
        .text-danger {
            color: red;
            font-size: 12px;
            padding: 0px;
            margin: 0px;
        }
        .btn {
            padding: 10px 20px;
            border-radius: 5px;
            color: #4d4c4b;
            background-color: #fabe8f;
            cursor: pointer;
            text-align: center;
            display: inline-block;
            text-decoration: none;
            border: 1px solid #fabe8f;
            font-size: 15px;
            font-weight: 500;
            width: 100%;
            margin-top: 10px;
        }
        .btn:hover {
            background-color: #fabe8f;
        }
        .mt-4 {
            margin-top: 1.5rem;
            color: #f7af12;
        }
        
        .page {
            color: #e88f49;
            text-decoration: none;
            font-size: 13px;
        }
        .page-container {
            text-align: right;
            margin-top: 8px;
        }
        .create-account-container {
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    @include('home.header')
    <div class="container-fluid d-flex justify-content-center align-items-center vh-100">
        <div class="main-container row g-0 shadow-lg">
            <div class="left-box col-md-6 d-none d-md-block p-2">
                <img src="images/log-1.png" alt="Login Image" class="img-fluid h-100 w-100">
            </div>
            <div class="right-box col-md-6 col-12 p-5">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="heading mb-4">
                        <h1 class="text-center ">Welcome Back</h1>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('Email') }}</label>
                        <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}">
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

       
                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('Password') }}</label>
                        <input id="password" class="form-control" type="password" name="password" value="{{ old('password') }}">
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    @if (Route::has('password.request'))
                    <div class="mb-3 text-center">
                        <a class="page" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    </div>
                    @endif

                    <div class="d-grid mt-3">
                        <button type="submit" class="btn btn-primary">{{ __('Log in') }}</button>
                    </div>

                    <div class="mt-4 text-center">
                        <a class="page" href="{{ route('register') }}">{{ __('Create Account?') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
  
    
</body>
</html>
