<!DOCTYPE html>
<html lang="{{ session()->get('locale') }}" dir="{{  session()->get('locale') == 'en' ? 'ltr':'rtl' }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="elham sadeghi">
    <link href="{{asset('img/favicon.ico')}}" rel="icon">
    <link href="{{asset('img/favicon.ico')}}" rel="shortcut icon" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('css')
    <title>{{env('APP_NAME')}}</title>

    <link rel="stylesheet" href="{{asset('/assets/css/vendors/font-awesome.css')}}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/vendors/icofont.css')}}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/vendors/themify.css')}}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/vendors/flag-icon.css')}}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/vendors/feather-icon.css')}}">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/vendors/scrollbar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/vendors/prism.css')}}">

    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/vendors/bootstrap.css')}}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/custom_style.css')}}">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/rating.css')}}">
    <link href="{{asset('css/persian-datepicker.min.css')}}" rel="stylesheet">

</head>

<body class="{{ session()->get('locale') == 'en' ? 'ltr' : 'rtl'}}">
<div class="loader-wrapper">
    <div class="loader">
        <div class="loader-bar"></div>
        <div class="loader-bar"></div>
        <div class="loader-bar"></div>
        <div class="loader-bar"></div>
        <div class="loader-bar"></div>
        <div class="loader-ball"></div>
    </div>
</div>
<!-- tap on top starts-->
<div class="tap-top"><i data-feather="chevrons-up"></i></div>
<!-- tap on tap ends-->
<!-- page-wrapper Start-->
<div class="page-wrapper compact-wrapper" id="pageWrapper">
    <!-- Page Header Start-->
    <div class="page-header">
        <div class="header-wrapper row m-0">
            <div class="header-logo-wrapper col-auto p-0">
                <div class="logo-wrapper"><a href="{{route('index')}}"><img class="img-fluid"
                                                                                    src="{{asset('img/LogoLight.png')}}"
                                                                                    alt=""></a></div>
                <div class="toggle-sidebar">
                    <div class="status_toggle sidebar-toggle d-flex">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <g>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M21.0003 6.6738C21.0003 8.7024 19.3551 10.3476 17.3265 10.3476C15.2979 10.3476 13.6536 8.7024 13.6536 6.6738C13.6536 4.6452 15.2979 3 17.3265 3C19.3551 3 21.0003 4.6452 21.0003 6.6738Z"
                                          stroke="#130F26" stroke-width="1.5" stroke-linecap="round"
                                          stroke-linejoin="round"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M10.3467 6.6738C10.3467 8.7024 8.7024 10.3476 6.6729 10.3476C4.6452 10.3476 3 8.7024 3 6.6738C3 4.6452 4.6452 3 6.6729 3C8.7024 3 10.3467 4.6452 10.3467 6.6738Z"
                                          stroke="#130F26" stroke-width="1.5" stroke-linecap="round"
                                          stroke-linejoin="round"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M21.0003 17.2619C21.0003 19.2905 19.3551 20.9348 17.3265 20.9348C15.2979 20.9348 13.6536 19.2905 13.6536 17.2619C13.6536 15.2333 15.2979 13.5881 17.3265 13.5881C19.3551 13.5881 21.0003 15.2333 21.0003 17.2619Z"
                                          stroke="#130F26" stroke-width="1.5" stroke-linecap="round"
                                          stroke-linejoin="round"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M10.3467 17.2619C10.3467 19.2905 8.7024 20.9348 6.6729 20.9348C4.6452 20.9348 3 19.2905 3 17.2619C3 15.2333 4.6452 13.5881 6.6729 13.5881C8.7024 13.5881 10.3467 15.2333 10.3467 17.2619Z"
                                          stroke="#130F26" stroke-width="1.5" stroke-linecap="round"
                                          stroke-linejoin="round"></path>
                                </g>
                            </g>
                        </svg>
                    </div>
                </div>
            </div>
            {{--
                        <div class="left-side-header col ps-0 d-none d-md-block">
                            <div class="input-group"><span class="input-group-text" id="basic-addon1">
                          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g>
                              <g>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M11.2753 2.71436C16.0029 2.71436 19.8363 6.54674 19.8363 11.2753C19.8363 16.0039 16.0029 19.8363 11.2753 19.8363C6.54674 19.8363 2.71436 16.0039 2.71436 11.2753C2.71436 6.54674 6.54674 2.71436 11.2753 2.71436Z"
                                      stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M19.8987 18.4878C20.6778 18.4878 21.3092 19.1202 21.3092 19.8983C21.3092 20.6783 20.6778 21.3097 19.8987 21.3097C19.1197 21.3097 18.4873 20.6783 18.4873 19.8983C18.4873 19.1202 19.1197 18.4878 19.8987 18.4878Z"
                                      stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                              </g>
                            </g>
                          </svg></span>
                                <input class="form-control" type="text" placeholder="جستجو کنید ..." aria-label="search"
                                       aria-describedby="basic-addon1">
                            </div>
                        </div>
            --}}
            <div class="nav-right col-10 col-sm-6 pull-right right-header p-0">
                <ul class="nav-menus">
                    <li>
                        <div class="mode animated backOutRight">
                            <svg class="lighticon" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <g>
                                    <g>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M18.1377 13.7902C19.2217 14.8742 16.3477 21.0542 10.6517 21.0542C6.39771 21.0542 2.94971 17.6062 2.94971 13.3532C2.94971 8.05317 8.17871 4.66317 9.67771 6.16217C10.5407 7.02517 9.56871 11.0862 11.1167 12.6352C12.6647 14.1842 17.0537 12.7062 18.1377 13.7902Z"
                                              stroke="#130F26" stroke-width="1.5" stroke-linecap="round"
                                              stroke-linejoin="round"></path>
                                    </g>
                                </g>
                            </svg>
                            <svg class="darkicon" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M17 12C17 14.7614 14.7614 17 12 17C9.23858 17 7 14.7614 7 12C7 9.23858 9.23858 7 12 7C14.7614 7 17 9.23858 17 12Z">
                                </path>
                                <path
                                    d="M18.3117 5.68834L18.4286 5.57143M5.57144 18.4286L5.68832 18.3117M12 3.07394V3M12 21V20.9261M3.07394 12H3M21 12H20.9261M5.68831 5.68834L5.5714 5.57143M18.4286 18.4286L18.3117 18.3117"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </div>
                    </li>
                    {{--<li class="d-md-none resp-serch-input">
                        <div class="resp-serch-box"><i data-feather="search"></i></div>
                        <div class="form-group search-form">
                            <input type="text" placeholder="جستجو کنید ...">
                        </div>
                    </li>--}}
                    <li class="maximize"><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <g>
                                    <g>
                                        <path d="M2.99609 8.71995C3.56609 5.23995 5.28609 3.51995 8.76609 2.94995"
                                              stroke="#130F26"
                                              stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path
                                            d="M8.76616 20.99C5.28616 20.41 3.56616 18.7 2.99616 15.22L2.99516 15.224C2.87416 14.504 2.80516 13.694 2.78516 12.804"
                                            stroke="#130F26" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                        <path
                                            d="M21.2446 12.804C21.2246 13.694 21.1546 14.504 21.0346 15.224L21.0366 15.22C20.4656 18.7 18.7456 20.41 15.2656 20.99"
                                            stroke="#130F26" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                        <path d="M15.2661 2.94995C18.7461 3.51995 20.4661 5.23995 21.0361 8.71995"
                                              stroke="#130F26"
                                              stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </g>
                                </g>
                            </svg>
                        </a></li>
                </ul>
            </div>

        </div>
    </div>
    <!-- Page Header Ends-->
    <!-- Page Body Start-->
    <div class="page-body-wrapper horizontal-menu">
        <!-- Page Sidebar Start-->
    @include('partials.sidebar')
    <!-- Page Sidebar Ends-->
        <div class="page-body">
        @yield('content')
        <!-- Container-fluid Ends-->
        </div>
        <!-- footer start-->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 footer-copyright text-center">
                        <p class="mb-0">{{ __('panel.copy_right') }} </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<!-- latest jquery-->
<script src="{{asset('/assets/js/jquery-3.5.1.min.js')}}"></script>
<!-- Bootstrap js-->
<script src="{{asset('assets/js/bootstrap/bootstrap.bundle.min.js')}}"></script>

<!-- feather icon js-->
<script src="{{asset('assets/js/icons/feather-icon/feather.min.js')}}"></script>

<script src="{{asset('assets/js/icons/feather-icon/feather-icon.js')}}"></script>

<!-- scrollbar js-->
<script src="{{asset('assets/js/scrollbar/simplebar.js')}}"></script>

<script src="{{asset('assets/js/scrollbar/custom.js')}}"></script>

<!-- Sidebar jquery-->
<script src="{{asset('assets/js/config.js')}}"></script>

<!-- Plugins JS start-->
<script src="{{asset('assets/js/sidebar-menu.js')}}"></script>

<script src="{{asset('assets/js/prism/prism.min.js')}}"></script>

<script src="{{asset('assets/js/clipboard/clipboard.min.js')}}"></script>

<script src="{{asset('assets/js/custom-card/custom-card.js')}}"></script>

{{--<script src="{{asset('assets/js/typeahead/handlebars.js')}}"></script>
<script src="{{asset('assets/js/typeahead/typeahead.bundle.js')}}"></script>

<script src="{{asset('/assets/js/typeahead/typeahead.custom.js')}}"></script>
<script src="{{asset('/assets/js/typeahead-search/typeahead-custom.js')}}"></script>

<script src="{{asset('assets/js/typeahead-search/handlebars.js')}}"></script>--}}


<script src="{{asset('assets/js/tooltip-init.js')}}"></script>
<script type="text/javascript" src="{{asset('js/sweetalert.min.js')}}"></script>

<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="{{asset('assets/js/script.js')}}"></script>
<script type="text/javascript" src="{{asset('js/select2.min.js')}}"></script>
<script src="{{asset('js/persian-date.min.js')}}"></script>
<script src="{{asset('js/persian-datepicker.min.js')}}"></script>

<link href="{{asset('css/toast.min.css')}}" rel="stylesheet"/>
<script src="{{asset('js/toast.min.js')}}"></script>

<!-- login js-->
<!-- Plugin used-->
<script>
    function log(str) {
        console.log(str);
    }

    $(document).ready(function () {
            if ($('#language li.active').length) {
                var elem = $('#language li.active a');
                $('#lang_title').html(elem.html());
            }
            if ($('.persian-date-picker').length > 0) {
                $('.persian-date-picker').persianDatepicker({
                    observer: true,
                    format: 'YYYY-MM-DD',
                    initialValue: false,
                    initialValueType: 'persian',
                    persianDigit:true,
                    autoClose: true,
                    toolbox: {
                        calendarSwitch:
                            {
                                enabled: false
                            }
                    }
                });
            }
            $('.select2').select2();

            if ($('.bs-timepicker').length > 0) {
                $('.bs-timepicker').timepicker();
            }
            @if($errors->any())
            swal("{{implode('\n',$errors->all())}}", {
                icon: "error",
                button: "{{ __('panel.close') }}"
            });
            @endif
            @if(session('danger'))
            swal("{{session('danger')}}", {
                icon: "error",
                button: "{{ __('panel.close') }}"
            });
            @endif

            @if(session('warninig'))
            swal("{{session('warninig') }}", {
                icon: "warning",
                timer: 2000,
                buttons: false,
            });
            @endif

            @if(session('success'))
            swal("{{ session('success') }}", {
                icon: "success",
                timer: 2000,
                buttons: false,
            });
            @endif

            @if(session('notification'))
            swal("{{ session('notification') }}", {
                icon: "success",
                buttons: false,
            });
            @endif
        });
    const handleErrorFunctionsWithToast = (e, form) => {
        var m = e.responseJSON.message;
        if (e.status == 422) {
            m = '';
            if (e.responseJSON.errors) {
                $.each(e.responseJSON.errors, function (i, error) {
                    m += "<li>" + error[0] + "</li>";
                    let input = form.find('input[name="' + i + '"],select[name="' + i + '"],select[name="' + i + '[]"]');
                    if (input.length) {
                        input.addClass('is-invalid');
                        input.closest('.form-group').append('<div class="errorinput">' + error[0] + '</div>');
                    } else {
                        form.find('label[for="' + i + '"],label[for="' + i + '[]"]').append('<div class="errorinput">' + error[0] + '</div>');
                    }
                });
            }
        }
        $.toast({
            heading: 'خطا !!!',
            text: "خطایی در انجام عملیات رخ داد!!!" + (m ? '<ul class="ul-errors"> ' + m + '</ul>' : ''),
            icon: 'error',
            hideAfter: 10000,
            textAlign: 'right',
            stack: false
        });
    }

    function ajax_form_request(form,event){
        form.find('input,select').removeClass('is-invalid');
        form.find('.errorinput').remove();
        const target = $(event.currentTarget);
        var data = new FormData(event.target);
        $.ajax({
            url: target.attr('action'),
            method: target.attr('method'),
            processData: false,
            contentType: false,
            data: data,
            success: function () {
                $.toast({
                    heading: 'Success',
                    text: 'اطلاعات با موفقیت ثبت شد',
                    showHideTransition: 'slide',
                    icon: 'success',
                    textAlign: 'right',
                    stack: false
                });
                window.location.reload();
            },
            error: function (e) {
                handleErrorFunctionsWithToast(e, form);
            },
        });
    }

</script>
@yield('js')
<script src="{{asset('js/my-js.js')}}"></script>

</body>

</html>
