@extends('layouts.index')
@section('content')
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-7"><img class="bg-img-cover bg-center" src="{{asset('assets/images/login/2.jpg')}}"
                                           alt="looginpage">
                </div>
                <div class="col-xl-5 p-0">
                    <div class="login-card">
                        <form method="post" action="{{route('login')}}" class="theme-form login-form">
                            @csrf
                            <h4>ورود</h4>
                            <h6>خوش آمدید! به حساب کاربری خود وارد شوید.</h6>
                            <div class="form-group">
                                <label>آدرس ایمیل</label>
                                <div class="input-group"><span class="input-group-text"><i
                                            class="icon-email"></i></span>
                                    <input class="form-control" name="email" type="email" required="" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>رمز عبور</label>
                                <div class="input-group"><span class="input-group-text"><i class="icon-lock"></i></span>
                                    <input class="form-control" type="password" name="password" required=""
                                           placeholder="*********">
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
        </div>
    </section>
@endsection
@section('js')
    <script src=" {{asset('assets/js/script.js')}} "></script>
@endsection
