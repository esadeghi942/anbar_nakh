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
                    @if(auth()->user()->role == 'admin' || auth()->user()->role == 'carpet')
                        <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title" href="#">
                                <i class="fa fa-puzzle-piece"></i><span class="">مرکز تنظیم ساختار انبار فرش</span>
                                <div class="according-menu"></div>
                            </a>
                            <ul class="sidebar-submenu">
                                <li><a class="{{ $route == 'carpet.anbar.index' ? 'active' : '' }}"
                                       href="{{route('carpet.anbar.index')}}">{{ __('panel.anbars') }}</a></li>

                                <li><a class="{{ $route == 'carpet.cell.index' ? 'active' : '' }}"
                                       href="{{route('carpet.cell.index')}}">{{ __('panel.cells') }}</a></li>

                                <li><a class="submenu-title" href="#">اشخاص<span class="sub-arrow"><i
                                                class="fa fa-angle-left"></i></span></a>
                                    <ul class="nav-sub-childmenu submenu-content">
                                        <li><a class="{{ $route == 'customer.index' ? 'active' : '' }}"
                                               href="{{route('customer.index')}}">{{ __('panel.customers') }}</a></li>

                                        <li><a class="{{ $route == 'weaver.index' ? 'active' : '' }}"
                                               href="{{route('weaver.index')}}">{{ __('panel.weavers') }}</a></li>
                                    </ul>
                                </li>
                                <li><a class="submenu-title" href="#">فرش<span class="sub-arrow"><i
                                                class="fa fa-angle-left"></i></span></a>
                                    <ul class="nav-sub-childmenu submenu-content">
                                        <li><a class="{{ $route == 'carpet.color.index' ? 'active' : '' }}"
                                               href="{{route('carpet.color.index')}}">{{ __('panel.colors') }}</a></li>

                                        <li><a class="{{ $route == 'carpet.size.index' ? 'active' : '' }}"
                                               href="{{route('carpet.size.index')}}">{{ __('panel.size') }}</a>
                                        </li>

                                        <li><a class="{{ $route == 'carpet.map.index' ? 'active' : '' }}"
                                               href="{{route('carpet.map.index')}}">{{ __('panel.map') }}</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    @endif
                    {{--  @if(auth()->user()->role == 'admin' || auth()->user()->role == 'carpet')
                          <li class="sidebar-list">
                              <a class="sidebar-link sidebar-title" href="#">
                                  <i class="fa fa-users"></i><span class="">مرکز تنظیم ساختار انبار فرش </span>
                                  <div class="according-menu"></div>
                              </a>
                              <ul class="sidebar-submenu">
                                  <li><a class="{{ $route == 'carpet.anbar.index' ? 'active' : '' }}"
                                         href="{{route('carpet.anbar.index')}}">{{ __('panel.anbars') }}</a></li>

                                  <li><a class="{{ $route == 'carpet.cell.index' ? 'active' : '' }}"
                                         href="{{route('carpet.cell.index')}}">{{ __('panel.cells') }}</a></li>

                                  <li><a class="{{ $route == 'customer.index' ? 'active' : '' }}"
                                         href="{{route('customer.index')}}"><span>{{ __('panel.customers') }}</span></a>
                                  </li>
                              </ul>
                          </li>
                          <li class="sidebar-list">
                              <a class="sidebar-link sidebar-title" href="#">
                                  <i class="fa fa-search"></i><span class="">ورود به انبار فرش</span>
                                  <div class="according-menu"></div>
                              </a>
                              <ul class="sidebar-submenu">
                                  <li><a href="{{route('carpet.qr_code.one')}}">یک محصول</a></li>
                                  <li><a href="{{route('carpet.qr_code.multi')}}">چند محصول</a></li>
                              </ul>
                          </li>
                      @endif--}}
                    @if(auth()->user()->role == 'admin' || auth()->user()->role == 'string')
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#">
                                <i class="fa fa-exchange"></i>
                                مرکز نقل و انتقال انبار</a>
                            <ul class="sidebar-submenu">
                                <li><a class="sidebar-link {{ $route == 'string.enter.create' ? 'active' : '' }}"
                                       href="{{route('string.enter.create')}}"><span>ورود</span></a></li>
                                <li><a class="sidebar-link {{ $route == 'string.export.index' ? 'active' : '' }}"
                                       href="{{route('string.export.index')}}"><span>خروج</span></a></li>

                                <li><a class="sidebar-link {{ $route == 'string.transfer.index' ? 'active' : '' }}"
                                       href="{{route('string.transfer.index')}}"><span>جا به جایی</span></a></li>

                                <li><a class="submenu-title" href="#">لیبل<span class="sub-arrow"><i
                                                class="fa fa-angle-left"></i></span></a>
                                    <ul class="nav-sub-childmenu submenu-content">
                                        <li><a href="{{route('string.group_qr_code.create')}}">تولید لیبل</a></li>
                                        <li><a href="{{route('string.group_qr_code.index')}}"> لیبل ها</a></li>
                                    </ul>
                                </li>

                                <li><a class="submenu-title" href="#">آزاد کردن سلول<span class="sub-arrow"><i
                                                class="fa fa-angle-left"></i></span></a>
                                    <ul class="nav-sub-childmenu submenu-content">
                                        <li><a href="{{route('string.cell.free_total')}}">کلی</a></li>
                                        <li><a href="{{route('string.cell.free_one')}}">موردی</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title" href="#">
                                <i class="fa fa-puzzle-piece"></i><span class="">مرکز تنظیم ساختار انبار نخ</span>
                                <div class="according-menu"></div>
                            </a>
                            <ul class="sidebar-submenu">
                                <li><a class="{{ $route == 'string.anbar.index' ? 'active' : '' }}"
                                       href="{{route('string.anbar.index')}}">{{ __('panel.anbars') }}</a></li>

                                <li><a class="{{ $route == 'string.cell.index' ? 'active' : '' }}"
                                       href="{{route('string.cell.index')}}">{{ __('panel.cells') }}</a></li>

                                <li><a class="submenu-title" href="#">اشخاص<span class="sub-arrow"><i
                                                class="fa fa-angle-left"></i></span></a>
                                    <ul class="nav-sub-childmenu submenu-content">
                                        <li><a class="{{ $route == 'person.index' ? 'active' : '' }}"
                                               href="{{route('person.index')}}">{{ __('panel.persons') }}</a></li>

                                        <li><a class="{{ $route == 'seller.index' ? 'active' : '' }}"
                                               href="{{route('seller.index')}}">{{ __('panel.sellers') }}</a></li>
                                    </ul>
                                </li>
                                <li><a class="submenu-title" href="#">نخ<span class="sub-arrow"><i
                                                class="fa fa-angle-left"></i></span></a>
                                    <ul class="nav-sub-childmenu submenu-content">
                                        <li><a class="{{ $route == 'string.color.index' ? 'active' : '' }}"
                                               href="{{route('string.color.index')}}">{{ __('panel.colors') }}</a></li>

                                        <li><a class="{{ $route == 'string.material.index' ? 'active' : '' }}"
                                               href="{{route('string.material.index')}}">{{ __('panel.materials') }}</a>
                                        </li>

                                        <li><a class="{{ $route == 'string.grade.index' ? 'active' : '' }}"
                                               href="{{route('string.grade.index')}}">{{ __('panel.grades') }}</a></li>

                                        <li><a class="{{ $route == 'string.layer.index' ? 'active' : '' }}"
                                               href="{{route('string.layer.index')}}">{{ __('panel.layers') }}</a></li>
                                    </ul>
                                </li>
                                <li><a class="{{ $route == 'device.index' ? 'active' : '' }}"
                                       href="{{route('device.index')}}">{{ __('panel.devices') }}</a></li>

                                <li><a class="sidebar-link {{ $route == 'string.string_group.index' ? 'active' : '' }}"
                                       href="{{route('string.string_group.index')}}">نقطه سفارش ها</a></li>
                            </ul>
                        </li>

                        <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#">
                                <i class="fa fa-bar-chart"></i>
                                مرکز آمار</a>
                            <ul class="sidebar-submenu">
                                <li><a class="sidebar-link {{ $route == 'string.export.index' ? 'active' : '' }}"
                                       href="{{route('string.export.index')}}"><span>گزارش</span></a></li>
                                <li><a class="sidebar-link {{ $route == 'string.string_group.index' ? 'active' : '' }}"
                                       href="#"><span>جستجو</span></a></li>
                                <li><a class="submenu-title" href="#">آمارها<span class="sub-arrow"><i
                                                class="fa fa-angle-left"></i></span></a>
                                    <ul class="nav-sub-childmenu submenu-content">
                                        <li><a href="{{route('string.report.struct_cell')}}">انبار ها در یک نگاه</a>
                                        </li>
                                        <li><a href="#">نمودارها</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        @if(auth()->user()->role == 'admin' || auth()->user()->role == 'carpet')
                            <li><a class="sidebar-link {{ $route == 'string.receipt.index' ? 'active' : '' }}"
                                   href="{{route('string.receipt.index')}}"> <i
                                        class="fa fa-list"></i><span>{{ __('panel.receipt') }} </span></a></li>
                        @endif
                    @endif
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

