@php
    $route = \Illuminate\Support\Facades\Request::route()->getName();
@endphp
<div class="sidebar-wrapper">
    <div>
        <div class="logo-wrapper"><a href="{{route('index')}}"><img class="img-fluid for-light"
                                                                    src="{{asset('img/LogoLight.png')}}"
                                                                    alt=""><img
                    class="img-fluid for-dark"
                    src="{{asset('img/LogoLight.png')}}" alt=""></a>
            <label style="font-weight: bolder">
                {{ Auth::user()->name }}
            </label>
            <div class="back-btn"><i class="fa fa-angle-right"></i></div>
        </div>
        <div class="logo-icon-wrapper"><a href="{{route('index')}}"><img class="img-fluid"
                                                                         src="{{asset('img/LogoLight.png')}}"
                                                                         alt=""></a></div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn"><a href="{{route('index')}}"><img class="img-fluid"
                                                                           src="{{asset('img/LogoLight.png')}}"
                                                                           alt=""></a>
                        <div class="mobile-back text-end"><span>{{ __('panel.return') }}</span><i
                                class="fa fa-angle-left ps-2"
                                aria-hidden="true"></i></div>
                    </li>
                    <li><a class="sidebar-link {{ $route == 'index' ? 'active' : '' }}"
                           href="{{route('index')}}"> <i
                                class="fa fa-home"></i><span>{{ __('panel.dashboard') }} </span></a></li>

                    <li>
                        <form class="sidebar-link" action="{{route('logout')}}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item dropdown-footer">
                                <i class="fa fa-sign-out"></i>
                                {{ __('panel.logout') }}
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>

