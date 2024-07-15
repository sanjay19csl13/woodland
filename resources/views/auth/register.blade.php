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
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            overflow: hidden;
            max-width: 1000px;
            width: 100%;
            height: auto;
        }

        .heading {
            color: #4d4c4b;
            text-align: center;
            padding-bottom: 15px;
        }

        .form-group {
            margin-bottom: 10px;
            width: 46%;
            margin-top: 20px;
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
            margin: 0px;
            padding: 0px;
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
        }

        .btn:hover {
            background-color: #fff;
        }

        .mt-4 {
            margin-top: 1.5rem;
        }

        .gradient-link {
            text-decoration: none;
            color: #f7af12;
        }
    </style>
</head>

<body>
    @include('home.header')

    <div class="container-fluid d-flex justify-content-center align-items-center vh-100">
        <div class="main-container row g-0 shadow-lg">
            <div class="left-box col-md-6 d-none d-md-block p-2">
                <img src="images/log-1.png" alt="Logo" class="img-fluid h-100 w-100">
            </div>
            <div class="right-box col-md-6 col-12 p-4">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="heading ">
                        <h1 class="text-center">Registration</h1>
                    </div>

                    <div class="form-row ">
                    
                        <div class="form-group col-md-6">
                            <label for="name" class="form-label">{{ __('Name') }}</label>
                            <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}">
                            <x-input-error :messages="$errors->get('name')" class="text-danger" />
                        </div>
                    
                        <div class="form-group col-md-6">
                            <label for="email" class="form-label">{{ __('Email') }}</label>
                            <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}">
                            <x-input-error :messages="$errors->get('email')" class="text-danger" />
                        </div>
                    </div>

                    <div class="form-row ">
                 
                        <div class="form-group col-md-6">
                            <label for="phone" class="form-label">{{ __('Phone') }}</label>
                            <input id="phone" class="form-control" type="text" name="phone" required value="{{ old('phone') }}">
                            <x-input-error :messages="$errors->get('phone')" class="text-danger" />
                        </div>
                     
                        <div class="form-group col-md-6">
                            <label for="address" class="form-label">{{ __('Address') }}</label>
                            <input id="address" class="form-control" type="text" name="address" required value="{{ old('address') }}">
                            <x-input-error :messages="$errors->get('address')" class="text-danger" />
                        </div>
                    </div>

                    <div class="form-row ">
                   
                        <div class="form-group col-md-6">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input id="password" class="form-control" type="password" name="password">
                            <x-input-error :messages="$errors->get('password')" class="text-danger" />
                        </div>
                      
                        <div class="form-group col-md-6">
                            <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                            <input id="password_confirmation" class="form-control" type="password" name="password_confirmation">
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-2">
                        <a class="gradient-link" href="{{ route('login') }}">{{ __('Already registered?') }}</a>
                        <button type="submit" class="btn btn-primary">{{ __('Register') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</body>
</html>