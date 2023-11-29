@extends('layouts.index')
@section('css')
    <style>
        input[type=number] {
            -moz-appearance: textfield;
        }

        .reload {
            background-color: initial;
        }

        .reload {
            position: absolute;
            right: 8px;
        }
        .captcha {
            position: absolute;
            left: 0;
            top: 12px;
        }

        #captcha {
            padding-right: 85px;
        }

    </style>
@endsection
@section('content')
    <section> </section>
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="login-card">
                    <form method="post" action="{{route('login')}}" class="theme-form login-form">
                        @csrf
                        <h4>ورود</h4>
                        <h6>خوش آمدید! به حساب کاربری خود وارد شوید.</h6>
                        <div class="form-group">
                            <label>آدرس ایمیل</label>
                            <div class="input-group"><span class="input-group-text"><i class="icon-email"></i></span>
                                <input class="form-control" name="email" type="email" required="" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>رمز عبور</label>
                            <div class="input-group"><span class="input-group-text"><i class="icon-lock"></i></span>
                                <input class="form-control"  type="password" name="password" required="" placeholder="*********">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                                <input id="checkbox1" type="checkbox">
                                <label for="checkbox1">مرا به خاطر بسپار</label>
                            </div>
{{--
                            <a class="link" href="forget-password.html">فراموشی رمز عبور؟</a>
--}}
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-block" type="submit">وارد شوید</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>    <!-- end section -->
@endsection
