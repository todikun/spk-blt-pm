<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>BLT | Profile Matching </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('dist/images/favicon.png')}}">
    <link href="{{asset('dist/css/style.css')}}" rel="stylesheet">
    @notifyCss
</head>

<body class="h-100">

    <x:notify-messages />

    <div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">

                    @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show">
                        <button type="button" class="close h-100 text-white" data-dismiss="alert"
                            aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                        </button>
                        @foreach ($errors->all() as $error)
                        <div class="font-weight-bold text-white">{{ $error }}</div>
                        @endforeach
                    </div>
                    @endif

                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">

                                <div class="auth-form">
                                    <h4 class="text-center mb-4">Sign in your account</h4>
                                    <form action="{{route('login.action')}}" method="POST">
                                        @csrf

                                        <div class="form-group">
                                            <label><strong>Username</strong></label>
                                            <input type="text" class="form-control" name="username"
                                                placeholder="Username" required>
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Password</strong></label>
                                            <input type="password" class="form-control" name="password"
                                                placeholder="Password" required>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Required vendors -->
    <script src="./vendor/global/global.min.js"></script>
    <script src="./js/quixnav-init.js"></script>
    <script src="./js/custom.min.js"></script>
    @notifyJs
</body>

</html>