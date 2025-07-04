<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{ asset('dashboard/assets/images/favicon.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('dashboard/assets/images/favicon.png')}}" type="image/x-icon">
    <title>Cuba - Premium Admin Template</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/assets/css/font-awesome.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/assets/css/vendors/icofont.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/assets/css/vendors/themify.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/assets/css/vendors/flag-icon.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/assets/css/vendors/feather-icon.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/assets/css/vendors/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/assets/css/style.css')}}">
    <link id="color" rel="stylesheet" href="{{ asset('dashboard/assets/css/color-1.css')}}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/assets/css/responsive.css')}}">
</head>
<body>
<!-- login page start-->
<div class="container-fluid p-0">
    <div class="row m-0">
        <div class="col-12 p-0">
            <div class="login-card">
                <div>
                    <div><a class="logo" href="#"><img class="img-fluid for-light" src="{{ asset('dashboard/assets/images/logo/login.png') }}" alt="looginpage"><img class="img-fluid for-dark" src="{{ asset('dashboard/assets/images/logo/logo_dark.png') }}" alt="looginpage"></a></div>
                    <div class="login-main">
                        <form class="theme-form" method="post" action="{{ route('auth.login') }}">
                            @csrf
                            <h4>Kabinetga kirish</h4>
                            <p>Login va parolingizni kiriting</p>
                            <div class="form-group">
                                <label for="login" class="col-form-label">Login</label>
                                <input class="form-control" name="login" id="login" type="text" value="{{ old('login') }}" required="" placeholder="Login...">
                                @error('login')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group  mb-3">
                                <label for="password" class="col-form-label">Parol</label>
                                <div class="form-input position-relative">
                                    <input class="form-control" type="password" id="password" name="password" required="" placeholder="*********">
                                    <div class="show-hide"><span class="show">                         </span></div>
                                </div>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group d-flex align-items-center">
                                <div class="form-check radio radio-primary" style="margin-right: 15px;">
                                    <input class="form-check-input" checked id="radio11" type="radio" name="guard" value="employee">
                                    <label class="form-check-label" for="radio11"><span class="digits">Xodim</span></label>
                                </div>
                                <div class="form-check radio radio-success">
                                    <input class="form-check-input" id="radio55" type="radio" name="guard" value="user">
                                    <label class="form-check-label" for="radio55"><span class="digits">Foydalanuvchi</span></label>
                                </div>
                                @error('guard')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-0">
                                <div class="text-end mt-3">
                                    <button class="btn btn-primary btn-block w-100" type="submit">Kirish</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- latest jquery-->
    <script src="{{ asset('dashboard/assets/js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{ asset('dashboard/assets/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('dashboard/assets/js/icons/feather-icon/feather.min.js')}}"></script>
    <script src="{{ asset('dashboard/assets/js/icons/feather-icon/feather-icon.js')}}"></script>
    <script src="{{ asset('dashboard/assets/js/config.js')}}"></script>
    <script src="{{ asset('dashboard/assets/js/script.js')}}"></script>
</div>
</body>
</html>
