<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Daftar</title>
    <link rel="icon" type="image/png" href="assetuser/images/logo2.png" />
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="loginasset/css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
    </style>

</head>

<body class="bg-gradient">
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <a href="{{ route('pembeli.beranda') }}">
                                    <img height="110px" src="assetuser/images/logo2.png" alt="Logo"
                                        class="logo-img">
                                </a>
                                <h1 class="h2 text-gray-900 mb-5">Create an Account!</h1>
                            </div>
                            <form class="user" method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="name"
                                        name="name" required placeholder="Nama Lengkap">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="email"
                                        name="email" required placeholder="Email Address">
                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" id="password"
                                        name="password" required placeholder="Password">

                                </div>


                                <div id="password-strength" class="mt-2"></div>
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user"
                                        id="password_confirmation" name="password_confirmation" required
                                        placeholder="Confirmation Password">
                                </div>
                                <hr>
                                <button type="submit" class="btn btn-primary btn-user btn-block">Register</button>
                            </form>
                            <div class="text-center">
                                @if (Route::has('password.request'))
                                    <a class="small" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                            <div class="text-center">
                                <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="loginasset/assetuser/vendor/jquery/jquery.min.js"></script>
    <script src="loginasset/assetuser/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="loginasset/assetuser/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="loginasset/js/sb-admin-2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.4.2/zxcvbn.js"></script>
    <script>
        document.getElementById('password').addEventListener('input', function() {
            var password = document.getElementById('password').value;
            var result = zxcvbn(password);
            var strengthMeter = document.getElementById('password-strength');

            var strength = {
                0: 'Very Weak',
                1: 'Weak',
                2: 'Fair',
                3: 'Strong',
                4: 'Very Strong'
            };

            var score = result.score;
            var feedback = result.feedback.warning || '';

            strengthMeter.innerHTML = '<div class="progress">' +
                '<div class="progress-bar bg-' + getProgressBarColor(score) +
                '" role="progressbar" style="width: ' + (score * 20) + '%" aria-valuenow="' + (score * 20) +
                '" aria-valuemin="0" aria-valuemax="100"></div>' +
                '</div>' +
                '<div class="mt-1">' + strength[score] + '</div>' +
                '<div class="mt-1">' + feedback + '</div>';
        });

        document.getElementById('togglePassword').addEventListener('click', function() {
            var passwordInput = document.getElementById('password');
            var toggleButton = document.getElementById('togglePassword');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleButton.innerHTML = '<i class="fa fa-eye-slash" aria-hidden="true"></i>';
            } else {
                passwordInput.type = 'password';
                toggleButton.innerHTML = '<i class="fa fa-eye" aria-hidden="true"></i>';
            }
        });

        function getProgressBarColor(score) {
            if (score <= 1) {
                return 'danger';
            } else if (score <= 2) {
                return 'warning';
            } else if (score <= 3) {
                return 'info';
            } else {
                return 'success';
            }
        }
    </script>

</body>

</html>
