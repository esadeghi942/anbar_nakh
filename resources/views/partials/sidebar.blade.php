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

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="#">
                            <i class="fa fa-users"></i><span class="">اطلاعات انبار فرش</span>
                            <div class="according-menu"></div>
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a class="{{ $route == 'carpet.anbar.index' ? 'active' : '' }}"
                                   href="{{route('carpet.anbar.index')}}">{{ __('panel.anbars') }}</a></li>

                            <li><a class="{{ $route == 'carpet.cell.index' ? 'active' : '' }}"
                                   href="{{route('carpet.cell.index')}}">{{ __('panel.cells') }}</a></li>


                        </ul>
                    </li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="#">
                            <i class="fa fa-users"></i><span class="">اطلاعات پایه</span>
                            <div class="according-menu"></div>
                        </a>
                        <ul class="sidebar-submenu">

                            <li><a class="{{ $route == 'seller.index' ? 'active' : '' }}"
                                   href="{{route('seller.index')}}"><span>{{ __('panel.sellers') }}</span></a></li>

                            <li><a class="{{ $route == 'customer.index' ? 'active' : '' }}"
                                   href="{{route('customer.index')}}"><span>{{ __('panel.customers') }}</span></a></li>

                            <li><a class="{{ $route == 'person.index' ? 'active' : '' }}"
                                   href="{{route('person.index')}}"><span>{{ __('panel.persons') }}</span></a></li>

                            <li><a class="{{ $route == 'device.index' ? 'active' : '' }}"
                                   href="{{route('device.index')}}"><span>{{ __('panel.devices') }}</span></a></li>
                        </ul>
                    </li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="#">
                            <i class="fa fa-users"></i><span class="">اطلاعات انبار نخ</span>
                            <div class="according-menu"></div>
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a class="{{ $route == 'string.anbar.index' ? 'active' : '' }}"
                                   href="{{route('string.anbar.index')}}">{{ __('panel.anbars') }}</a></li>

                            <li><a class="{{ $route == 'string.cell.index' ? 'active' : '' }}"
                                   href="{{route('string.cell.index')}}">{{ __('panel.cells') }}</a></li>

                            <li><a class="{{ $route == 'string.color.index' ? 'active' : '' }}"
                                   href="{{route('string.color.index')}}">{{ __('panel.colors') }}</a></li>

                            <li><a class="{{ $route == 'string.material.index' ? 'active' : '' }}"
                                   href="{{route('string.material.index')}}">{{ __('panel.materials') }}</a></li>

                            <li><a class="{{ $route == 'string.grade.index' ? 'active' : '' }}"
                                   href="{{route('string.grade.index')}}">{{ __('panel.grades') }}</a></li>
                        </ul>
                    </li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="#">
                            <i class="fa fa-search"></i><span class="">ورود به انبار فرش</span>
                            <div class="according-menu"></div>
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="">یک محصول</a></li>
                            <li><a href="">چند محصول</a></li>
                        </ul>
                    </li>

                    <li><a class="sidebar-link {{ $route == 'string.item.create' ? 'active' : '' }}"
                           href="{{route('string.item.create')}}"> <i
                                class="fa fa-arrow-down"></i><span>ورود به انبار نخ</span></a></li>

                    <li><a class="sidebar-link {{ $route == 'string.export.index' ? 'active' : '' }}"
                           href="{{route('string.export.index')}}"> <i
                                class="fa fa-arrow-up"></i><span>خروج/جستجو از انبار نخ</span></a></li>

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

