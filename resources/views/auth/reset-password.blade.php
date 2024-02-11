<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Password Reset</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Password Recovery</h3>
                                </div>
                                <div class="card-body">

                                    <form method="POST" action="{{ route('password.update') }}">
                                        @csrf
                                        {{-- {{ dd(request()->route('token')) }} --}}
                                        <input type="hidden" name="token" value="{{ request()->route('token') }}">

                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputEmail" name="email" type="email"
                                                placeholder="Enter new Password" />
                                            <label for="inputEmail"> Email </label>
                                            @error('email')
                                                <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputPassword" name="password"
                                                type="password" placeholder="Enter new Password" />
                                            <label for="inputPassword">Password</label>
                                            @error('password')
                                                <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputConfirmPassword"
                                                name="password_confirmation" type="password"
                                                placeholder="Enter new Password" />
                                            <label for="inputConfirmPassword">Confirm Password </label>
                                            @error('password_confirmation')
                                                <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small" href="{{ route('login') }}">Return to login</a>
                                            <button type="submit" class="btn btn-primary">Reset Password</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="{{ route('login') }}">Need an account? Sign up!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
</body>

</html>
