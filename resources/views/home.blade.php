<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    {{-- jquery cdn --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    {{-- nav --}}
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Fortify Demo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    {{-- <a class="nav-link active" aria-current="page" href="#">  </a> --}}
                    @auth
                        <div class="d-flex">
                            <form role="button" id="form1" action="logout" method="post">
                                @csrf
                                Logout
                            </form>
                            <a class="nav-link" href="{{ route('profile.edit') }}"> Profile </a>
                            <a class="nav-link" href="{{ route('profile.password') }}"> Change Password </a>

                        </div>
                    @else
                        <a class="nav-link" href="login"> Login </a>
                        <a class="nav-link" href="register"> Register </a>

                    @endauth
                    {{-- <a class="nav-link" href="#">Pricing</a> --}}
                    {{-- <a class="nav-link disabled" aria-disabled="true">Disabled</a> --}}
                </div>
            </div>
        </div>
    </nav>
    @auth
        <h1 class="text-center mt-5"> Home Page </h1>
    @endauth
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Two Factor Authentication
                    </div>


                    <div class="card-body">
                        @if (session('status') == 'two-factor-authentication-disabled')
                            <div class="alert alert-success" role="alert">
                                Two factor Authentication has been disabled.
                            </div>
                        @elseif (session('status') == 'two-factor-authentication-enabled')
                            <div class="alert alert-success" role="alert">
                                Two factor Authentication has been enabled.
                            </div>
                        @endif

                        

                        <div>
                            <h3> Recovery Codes </h3>
                            <ul>
                                @foreach (json_decode(decrypt(auth()->user()->two_factor_recovery_codes)) as $code)
                                    <li> {{ $code }} </li>
                                @endforeach
                            </ul>
                        </div>

                        <form action="user/two-factor-authentication" method="post">
                            @csrf
                            @if (isset(auth()->user()->two_factor_secret))
                                @method('DELETE')

                                {!! auth()->user()->twoFactorQrCodeSvg() !!}
                                <button class="btn btn-danger">
                                    Disable
                                </button>
                            @else
                                <button class="btn btn-primary">
                                    Enable
                                </button>
                            @endif
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        $(document).ready(function() {
            $(document).on('click', '#form1', function() {
                $(this).submit();
            });
        });
    </script>
</body>

</html>
