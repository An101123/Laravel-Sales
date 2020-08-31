<!DOCTYPE html>
<html lang="en">

<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible"
          content="IE=edge">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Register | CoreUI | {{ config('app.name') }}</title>
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
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z"
          crossorigin="anonymous">
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet"
          href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
          integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
          crossorigin="anonymous">
    <link rel="stylesheet"
          href="{{url('css/error.css')}}">

</head>

<body class="app flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mx-4">
                    <div class="card-body p-4">
                        <form name="register"
                              id="register"
                              method="post"
                              action="{{ url('/register') }}">
                            @csrf
                            <h1>Register</h1>
                            <p class="text-muted">Create your account</p>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-user"></i>
                                    </span>
                                </div>

                                <input type="text"
                                       class="form-control {{ $errors->has('name')?'is-invalid':'' }}"
                                       name="name"
                                       id="name"
                                       value="{{ old('name') }}"
                                       placeholder="Full Name">
                                @if ($errors->has('name'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif

                            </div>

                            <div class="input-group mb-3 ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                </div>
                                <input type="email"
                                       class="form-control {{ $errors->has('email')?'is-invalid':'' }}"
                                       name="email"
                                       value="{{ old('email') }}"
                                       placeholder="Email">

                                @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="input-group mb-3 ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-phone "
                                           aria-hidden="true"></i>
                                    </span>
                                </div>
                                <input type="text"
                                       class="form-control {{ $errors->has('phoneNumber')?'is-invalid':'' }}"
                                       name="phoneNumber"
                                       value="{{ old('phoneNumber') }}"
                                       placeholder="Phone Number">
                                @if ($errors->has('phoneNumber'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('phoneNumber') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-map-marker"></i>
                                    </span>
                                </div>
                                <input type="text"
                                       class="form-control {{ $errors->has('address')?'is-invalid':'' }}"
                                       name="address"
                                       value="{{ old('address') }}"
                                       placeholder="Address">
                                @if ($errors->has('address'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                </div>
                                <input type="password"
                                       id="password"
                                       class="form-control {{ $errors->has('password')?'is-invalid':''}}"
                                       name="password"
                                       placeholder="Password">
                                @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                </div>
                                <input type="password"
                                       name="password_confirmation"
                                       class="form-control"
                                       placeholder="Confirm password">
                                @if ($errors->has('password_confirmation'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                                @endif
                            </div>

                            <button type="submit"
                                    class="btn btn-primary btn-block btn-flat">Register</button>
                            <a href="{{ url('shoesstore') }}"
                               class="text-center">I already have a membership</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@2.1.16/dist/js/coreui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.4.0/perfect-scrollbar.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
            integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
            integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
            crossorigin="anonymous"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"
            type="text/javascript"></script> -->
    <script src="https://cdn.jsdelivr.net/jquery/1.12.4/jquery.min.js"
            type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"
            type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $.validator.setDefaults({
            errorClass: "help-block",
            highlight: function(element) {
                $(element)
                    .closest('.input-group')
                    .addClass('has-error');
            }
        });
        $("#register").validate({
            rules: {
                name: "required",
                email: {
                    required: true,
                    email: true
                },
                phoneNumber: "required",
                address: "required",
                password: {
                    required: true,
                    minlength: 8,
                    maxlength: 32
                },
                password_confirmation: {
                    equalTo: "#password",
                    required: true,
                    minlength: 5,
                    maxlength: 32
                }
            },
            messages: {
                name: "<span class='error'>Please enter your firstname</span>",
                password: {
                    required: "<span class='error'>Please provide a password</span>",
                    minlength: "<span class='error'>Your password must be 8 - 32 characters long</span>",
                    maxlength: "<span class='error'>Your password must be 8 - 32 characters long</span>"
                },
                password_confirmation: {
                    equalTo: "<span class='error'>Please enter Confirm password same as password</span>",
                    required: "<span class='error'>Please provide a password</span>",
                    minlength: "<span class='error'>Your password must be 8 - 32 characters long</span>",
                    maxlength: "<span class='error'>Your password must be 8 - 32 characters long</span>"

                },
                email: "<span class='error'>Please enter a valid email address</span>",
                phoneNumber: "<span class='error'>Please enter your phone number</span>",
                address: "<span class='error'>Please enter your address</span>"
            },
            // errorElement: 'div',
            // errorLabelContainer: '.errorTxt',

            submitHandler: function(form) {
                form.submit();
            }
        });
    });
    </script>
</body>

</html>