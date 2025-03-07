<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/register.css') }}">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/sweetalert.js') }}"></script>
    <title>Activity 6</title>
</head>

<body>
    <div class="wrapper">
        <div class="outer-section-1">
            <div class="head-form">

                <div class="title">
                    <h1>Register</h1>
                </div>
            </div>
        </div>
        <div class="outer-section-2">
            <div class="section-1">
                <div class="logo">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="">
                </div>
            </div>
            <div class="section-2">

                <form id="registerForm">
                    @csrf
                    <div class="input-box">
                        <input type="text" required placeholder="" name="firstname">
                        <label for="">Firstname</label>
                    </div>
                    <div class="input-box">
                        <input type="text" required placeholder="" name="middlename">
                        <label for="">Middlename</label>
                    </div>
                    <div class="input-box">
                        <input type="text" required placeholder="" name="lastname">
                        <label for="">Lastname</label>
                    </div>
                    <div class="input-box">
                        <input type="email" required placeholder="" name="email">
                        <label for="">Email</label>
                    </div>
                    <div class="input-box">
                        <input type="password" required placeholder="" name="password">
                        <label for="">Password</label>
                    </div>
                    <div class="input-box-buttons">
                        <button class="btn login"><ion-icon name="log-in-outline"></ion-icon> Register</button>
                        <a href="{{ route('login.page') }}" class="btn google"><ion-icon name="home"></ion-icon>
                            Back</a>
                    </div>
                </form>
            </div>
        </div>

    </div>



</body>
<script>
    $(document).ready(function() {

        $('#registerForm').submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: '{{ route('register') }}',
                method: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            title: "Success",
                            icon: "success",
                            text: response.message,
                            confirmButtonText: 'Ok'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '/login';
                            }
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

</html>
