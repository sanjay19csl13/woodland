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
            height: 100vh;
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

       
        .btn,
        .btn-1 {
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

        .btn {
            background-color: #069a67;
            border: 1px solid #069a67;

        }

        .btn:hover {
            background-color: #069a67;
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


  
    <div class="container-fluid d-flex justify-content-center align-items-center vh-100">
        <div class="main-container row g-0 shadow-lg">
       
            <div class="left-box col-md-6 d-none d-sm-block p-2">
                <img src="images/log-1.png" alt="Login Image" class="img-fluid h-100 w-100">
            </div>

         
            <div class="right-box col-lg-6 col-md-6 col-12 p-5">
                <div class="forget">Verify Email</div>
                <div class="mb-4 text-sm text-gray-600">
                    {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                </div>

                @if (session('status') == 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                </div>
                @endif

                <div class="mt-4 flex items-center justify-between">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf

                        <div>
                            <x-primary-button class="btn-1">
                                {{ __('Resend Verification Email') }}
                            </x-primary-button>
                        </div>
                    </form>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-primary-button type="submit" class="btn">
                            {{ __('Log Out') }}
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>