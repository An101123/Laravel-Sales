@extends('frontend.layouts.index')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Đăng kí</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="index.html">Home</a> / <span>Đăng kí</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">

        <form action="{{url('shoesstore/signup')}}"
              method="post"
              class="beta-form-checkout">
            <input type="hidden"
                   name="_token"
                   value="{{ csrf_token() }}">

            <div class="row">
                <div class="col-sm-3"></div>

                <div class="col-sm-6">
                    <div class="row">@if(Session::has('notification'))
                        <div class="alert alert-success">
                            {{Session::get('notification')}}
                        </div>

                        @endif</div>
                    <div class="row"> @if(count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                            {{$err}} <br />
                            @endforeach
                        </div>
                        @endif</div>

                    <h4>Đăng kí</h4>


                    <div class="space20">&nbsp;</div>


                    <div class="form-block">
                        <label for="email">Email address*</label>
                        <input type="email"
                               name="email"
                               id="email"
                               required>
                    </div>

                    <div class="form-block">
                        <label for="your_last_name">Fullname*</label>
                        <input type="text"
                               name="name"
                               id="your_last_name"
                               required>
                    </div>

                    <div class="form-block">
                        <label for="adress">Address*</label>
                        <input type="text"
                               name="address"
                               id="adress"
                               required>
                    </div>

                    <div class="form-block">
                        <label for="phone">Phone*</label>
                        <input type="text"
                               name="phoneNumber"
                               id="phone"
                               required>
                    </div>
                    <div class="form-block">
                        <label for="password">Password*</label>
                        <input type="password"
                               name="password"
                               id="password"
                               required>
                    </div>
                    <div class="form-block">
                        <label for="password">Password Confirm*</label>
                        <input type="password"
                               name="passwordConfirm"
                               id="phone"
                               required>
                    </div>
                    <div class="form-block">
                        <button type="submit"
                                class="btn btn-primary">Register</button>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </form>
    </div> <!-- #content -->
</div>
@endsection