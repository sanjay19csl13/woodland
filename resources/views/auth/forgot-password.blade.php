<html lang="en">

<head>
    <!-- Include head content from 'home.head' -->
    @include('home.head')

    <!-- Internal CSS styles -->
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
            max-width: 900px;
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
            font-size: 14px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            margin-bottom: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            height: auto;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .form-control:focus {
            border-color: #fabe8f;
            box-shadow: 0 0 0 0.2rem rgba(250, 190, 143, 0.5);
        }

        .text-danger {
            color: red;
            font-size: 12px;
            padding: 0;
            margin: 0;
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
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #e88f49;
        }


        .text-sm {
            font-size: 0.875rem;
            line-height: 1.5;
            color: #4d4c4b;
        }

        .text-gray-600 {
            color: #4d4c4b;
        }

        .text-center {
            text-align: center;
        }

        .mb-4 {
            margin-bottom: 1.5rem;
        }

        .mt-4 {
            margin-top: 1.5rem;
        }

        .forget {
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            font-size: 30px;
            font-weight: bold;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>

    @include('home.header')


    <div class="container-fluid d-flex justify-content-center align-items-center vh-100">
        <div class="main-container row g-0 shadow-lg">

            <div class="left-box col-md-6 d-none d-sm-block p-2">
                <img src="images/log-1.png" alt="Login Image" class="img-fluid h-100 w-100">
            </div>

            <div class="right-box col-lg-6 col-md-6 col-12 p-5">
                <div class="forget">Forget Password</div>
                <div class="mb-4 text-sm text-gray-600">
                    Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
                </div>


                @if (session('status'))
                <div class="mb-4 text-sm text-gray-600">
                    {{ session('status') }}
                </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf


                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('Email') }}</label>
                        <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus>
                        @error('email')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="d-grid mt-3">
                        <button type="submit" class="btn btn-primary">{{ __('Email Password Reset Link') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>