<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>My forgot password-</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/adminpannel/css/my-login.css') }}">
    <link rel="icon" href= "{{ asset('public/adminpanel/img/logo.jpg') }}" type="image/ico" />
</head>
    <body class="my-login-page">
        <section class="h-100">
            <div class="container h-100">
                <div class="row justify-content-md-center h-100">
                    <div class="card-wrapper">
                        <div class="brand">
                            <img src="{{ asset('public/adminpanel/img/logo.jpg') }}" alt="logo">
                        </div>
                        <div class="card fat">
                            <div class="card-body">
                                <h4 class="card-title">Login</h4>
    <!-- Main Wrapper -->
    @include('admin.includes._message')
                        <!-- Account Form -->
                        <form method="post" action="{{ route('forgetPassword') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input class="form-control" type="email" name="email" id="email">
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-primary account-btn" type="submit">Reset Password</button>
                            </div>
                            <div class="mt-4 text-center">
                                Want Back? <a href="{{ route('adminLogin')}}">Click here</a>
                            </div>

                           
                            

                            
                        </form>
                        <div class="footer">
                            Copyright &copy; 2017 &mdash; Your Company 
                        </div>
                    </div>
                </div>
            </div>

            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="/adminpannel/js/my-login.js"></script>
        </body>
        <label for="password">Password
            <a href="forgot.html" class="float-right">
                Forgot Password?
            </a>
        </label>
        </html>