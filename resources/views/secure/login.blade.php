<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo Laravel 11</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-4">
                <div class="card">
                    <!-- <div class="card-header">
                        <h1 class="card-title">{{config('app.name')}}</h1>
                    </div> -->
                    <div class="card-body">
                        <form action="" method="post" id="js-login">
                            @if(Session::has('success'))
                                <div class="alert alert-success">{{ Session::get('success') }}</div>
                            @endif
                            @if(Session::has('fail'))
                                <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                            @endif

                            @if(Session::has('loginFailed'))
                                <div class="alert alert-danger">{{ session('loginFailed') }}</div>
                            @endif


                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}" autofocus placeholder="...">
                                <span class="text-danger">@error('name') {{$message}} @enderror</span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="...">
                                <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                            </div>
                            <div class="mb-3">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">Log-in</button>
                                </div>
                            </div>
                        </form>
                        <div class="row mb-4 mt-4">
                            <div class="col text-end">
                                Don't have account? <a href="register"><u>Sign Up</u></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function(){
            // $(document).on('submit', '#js-login', function (e) {
            //     e.preventDefault();
            //     $.ajax({
            //         url: $(this).attr('action'),
            //         type: "POST",
            //         cache: false,
            //         data: $(this).serialize(),
            //         dataType: 'json',
            //         success: function (data) {
            //             // if (data.status == 0) {
            //             //     $('.is_warning').html(data.pesan).slideDown();
            //             //     setTimeout(function () {
            //             //         $('.is_warning').slideUp();
            //             //     }, 3000);
            //             // }
            //             // if (data.status == 1) {
            //             //     GoToPage(data.url);
            //             // }
            //             // if (data.status == 2) {
            //             //     $('.is_warning').html(data.pesan).slideDown();
            //             //     setTimeout(function () {
            //             //         $('.is_warning').slideUp();
            //             //     }, 3000);
            //             // }
            //             // if (data.status == 3) {
            //             //     GoToPage(data.url);
            //             // }
            //         }
            //     });
            // });
        });
    </script>
</body>
</html>