<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/sweetalert.js') }}"></script>
    <title>Activity 6</title>
</head>

<body>
    <div class="wrapper">
        <div class="head-form">
            <div class="logo">
                <img src="{{ asset('assets/images/logo.png') }}" alt="">
            </div>
            <div class="title">
                <h1>Login</h1>
            </div>
        </div>
        <form id="loginForm">
            @csrf
            <div class="input-box">
                <input type="email" required placeholder="" name="email">
                <label for="">Email</label>
            </div>
            <div class="input-box">
                <input type="password" required placeholder="" name="password">
                <label for="">Password</label>
            </div>
            <div class="input-box">
                <button class="btn login">Login</button>
            </div>
            <p>or</p>
            <div class="input-box-social-media">
                <a href="{{ route('provider.redirect', 'google') }}" class="btn google"><ion-icon
                        name="logo-google"></ion-icon>
                    Google</a>
                <a href="{{ route('provider.redirect', 'facebook') }}" class="btn facebook"><ion-icon
                        name="logo-facebook"></ion-icon>
                    Facebook</a>
            </div>
            <div class="form-cols">
                <span>Already have an account? <a href="{{ route('register.page') }}">Register</a></span>
            </div>
        </form>
    </div>



    <script>
        $(document).ready(function() {

            $('#loginForm').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: '{{ route('login') }}',
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response.success) {
                            window.location.href = response.route;
                            console.log(response);
                        } else {
                            Swal.fire({
                                title: "Error",
                                icon: "error",
                                text: response.message
                            });
                        }
                    },
                    error: function(xhr) {
                        Swal.fire({
                            title: "Error",
                            icon: "error",
                            text: xhr.responseJSON.message
                        });
                        console.log(xhr.responseJSON.message);
                    }
                });
            });
        });
    </script>

</body>


</html>
