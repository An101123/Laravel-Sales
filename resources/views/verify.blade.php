<!DOCTYPE html>
<html lang="en">

<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible"
          content="IE=edge">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <!-- <title>Register | CoreUI | {{ config('app.name') }}</title> -->
    <meta name="description"
          content="CoreUI Template - InfyOm Laravel Generator">
    <meta name="keyword"
          content="CoreUI,Bootstrap,Admin,Template,InfyOm,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/@coreui/coreui@2.1.16/dist/css/coreui.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/@icon/coreui-icons-free@1.0.1-alpha.1/coreui-icons-free.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
          rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css"
          rel="stylesheet">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.3.0/css/flag-icon.min.css">

</head>

<body class="app flex-row align-items-center">
    <div class="container">
        <!-- <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mx-4">
                    <div class="card-body p-4"> -->

        <div class="row justify-content-center">
            <!-- <div class="col-md-8"
                 style="margin-top: 2%"> -->
            <div class="card"
                 style="width: 40rem;">
                <div class="card-body">
                    <h4 class="card-title">Verify Your Email Address</h4>
                    @if (session('resent'))
                    <p class="alert alert-success"
                       role="alert">A fresh verification link has been sent to
                        your email address</p>
                    @endif
                    <p class="card-text">Before proceeding, please check your email for a
                        verification
                        link.If you
                        did not receive the email,</p>
                    <a href="{{ route('verification.resend') }}">click here to request another</a>.
                </div>
            </div>
            <!-- </div> -->
        </div>
        <!-- </div>
                </div>
            </div>
        </div> -->
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@2.1.16/dist/js/coreui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.4.0/perfect-scrollbar.js"></script>
</body>

</html>