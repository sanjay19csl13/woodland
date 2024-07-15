<!DOCTYPE html>

<head>
   @include('home.head')
    <style>
        /* Add custom styles here */
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
        .reset{
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            font-size: 30px;
            font-weight: bold;
            margin-bottom: 25px;
            color:#4d4c4b;

        }



    </style>
</head>
<body>
    @include('home.header')
    <div class="container-fluid  d-flex justify-content-center align-items-center vh-100">
        <div class="main-container row g-0 shadow-lg">
       
            <div class="left-box col-md-6 d-none d-md-block p-2">
            <img src="{{ asset('images/log-1.png') }}" alt="Login Image" class="img-fluid h-100 w-100">
            </div>

       
            <div class="right-box  col-md-6 col-12 p-5">
                <div class="reset">Reset Password</div>
               

                <!-- Session Status -->
                @if (session('status'))
                <div class="mb-4 text-sm text-gray-600">
                    {{ session('status') }}
                </div>
                @endif

                <form method="POST" action="{{ route('password.store') }}">
                @csrf

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="form-label"/>
                    <x-text-input id="email" class="block mt-1 w-full form-control" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <x-input-label for="password" :value="__('Password')" class="form-label"/>
                    <x-text-input id="password" class="block mt-1 w-full form-control" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mb-3">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="form-label"/>
                    <x-text-input id="password_confirmation" class="block mt-1 w-full form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-3">
                    <x-primary-button class="btn">
                        {{ __('Reset Password') }}
                    </x-primary-button>
                </div>
            </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>

