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

                    @if(auth()->user()->role == 'admin')
                        <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title" href="#">
                                <i class="fa fa-list"></i><span class="">اطلاعات پایه</span>
                                <div class="according-menu"></div>
                            </a>
                            <ul class="sidebar-submenu">
                                <li><a class="{{ $route == 'company.index' ? 'active' : '' }}"
                                       href="{{route('company.index')}}">{{ __('panel.companies') }}</a></li>
                            </ul>
                        </li>
                    @endif
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
                                <li><a class="submenu-title" href="#">فرش
                                        <span class="sub-arrow"><i
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
                                <li><a class="submenu-title" href="#">سفارشات
                                        <span class="sub-arrow"><i
                                                class="fa fa-angle-left"></i></span></a>
                                    <ul class="nav-sub-childmenu submenu-content">
                                        <li><a class="{{ $route == 'carpet.color.index' ? 'active' : '' }}"
                                               href="{{route('carpet.order.index')}}">{{ __('panel.List_orders') }}</a></li>

                                        <li><a class="{{ $route == 'carpet.size.index' ? 'active' : '' }}"
                                               href="{{route('carpet.order.create')}}">{{ __('panel.new_order') }}</a>
                                        </li>

                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title" href="#">
                                <i class="fa fa-puzzle-piece"></i><span class="">مرکز تنظیم ساختار انبار رول</span>
                                <div class="according-menu"></div>
                            </a>
                            <ul class="sidebar-submenu">

                                <li><a class="{{ $route == 'carpet.factor.index' ? 'active' : '' }}"
                                       href="{{route('carpet.factor.index')}}">{{ __('panel.receipt') }}</a></li>

                                <li><a class="{{ $route == 'carpet.device.index' ? 'active' : '' }}"
                                       href="{{route('carpet.device.index')}}">{{ __('panel.devices') }}</a></li>

                                <li><a class="submenu-title" href="#">رول<span class="sub-arrow"><i
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
                                <li><a class="submenu-title" href="#">ورود<span class="sub-arrow"><i
                                                class="fa fa-angle-left"></i></span></a>
                                    <ul class="nav-sub-childmenu submenu-content">
                                        <li><a href="{{route('string.enter.create')}}">وزنی</a></li>
                                        <li><a href="{{route('string.group_qr_code.enter')}}">با کد QR</a></li>
                                    </ul>
                                </li>
                                <li><a class="submenu-title" href="#">خروج<span class="sub-arrow"><i
                                                class="fa fa-angle-left"></i></span></a>
                                    <ul class="nav-sub-childmenu submenu-content">
                                        <li><a href="{{route('string.export.index')}}">وزنی</a></li>
                                        <li><a href="{{route('string.export_multi_qr_codes')}}">با کد QR</a></li>
                                    </ul>
                                </li>
                                <li><a class="sidebar-link {{ $route == 'string.qr_code.index' ? 'active' : '' }}"
                                       href="{{route('string.qr_code.index')}}"><span>جستجوی کد QR</span></a></li>

                                {{--     <li><a class="sidebar-link {{ $route == 'string.transfer.index' ? 'active' : '' }}"
                                            href="{{route('string.transfer.index')}}"><span>جا به جایی</span></a></li>
     --}}
                                <li>
                                    <a class="sidebar-link {{ $route == 'string.group_qr_code.create' ? 'active' : '' }}"
                                       href="{{route('string.group_qr_code.create')}}">تولید لیبل</a></li>

                                <li>
                                    <a class="sidebar-link {{ $route == 'string.cell.free_one' ? 'active' : '' }}"
                                       href="{{route('string.cell.free_one')}}">آزاد کردن سلول</a></li>


                                {{--  <li><a class="submenu-title" href="#">آزاد کردن سلول<span class="sub-arrow"><i
                                                  class="fa fa-angle-left"></i></span></a>
                                      <ul class="nav-sub-childmenu submenu-content">
                                          <li><a href="{{route('string.cell.free_total')}}">کلی</a></li>
                                          <li><a href="{{route('string.cell.free_one')}}">موردی</a></li>
                                      </ul>
                                  </li> --}}
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

                                <li><a class="submenu-title" href="#">ورودی ها<span class="sub-arrow"><i
                                                class="fa fa-angle-left"></i></span></a>
                                    <ul class="nav-sub-childmenu submenu-content">
                                        <li><a href="{{route('string.group_qr_code.list','label')}}">با لیبل</a></li>
                                        <li><a href="{{route('string.group_qr_code.list','weight')}}">وزنی</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#">
                                <i class="fa fa-bar-chart"></i>
                                مرکز آمار</a>
                            <ul class="sidebar-submenu">
                                <li><a class="submenu-title" href="#">گزارش<span class="sub-arrow"><i
                                                class="fa fa-angle-left"></i></span></a>
                                    <ul class="nav-sub-childmenu submenu-content">
                                        <li><a href="{{route('string.report.index')}}">فیلتر دار</a></li>
                                        <li><a href="{{route('string.report.total')}}">کلی</a></li>
                                    </ul>
                                </li>


                                <li><a class="sidebar-link {{ $route == 'string.string_group.index' ? 'active' : '' }}"
                                       href="{{ route('string.report.search_in_cell') }}"><span>جستجو</span></a></li>
                                <li><a class="submenu-title" href="#">آمارها<span class="sub-arrow"><i
                                                class="fa fa-angle-left"></i></span></a>
                                    <ul class="nav-sub-childmenu submenu-content">
                                        <li><a href="{{route('string.report.struct_cell')}}">انبار ها در یک نگاه</a>
                                        </li>
                                        <li><a href="#">نمودارها</a></li>
                                    </ul>
                                </li>

                                <li><a class="submenu-title" href="#">گزارش انبار<span class="sub-arrow"><i
                                                class="fa fa-angle-left"></i></span></a>
                                    <ul class="nav-sub-childmenu submenu-content">
                                        @foreach(App\Models\String\Anbar::all() as $anbar)
                                            <li>
                                                <a href="{{route('string.report.anbar',$anbar->id)}}">{{$anbar->name}}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </li>
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

