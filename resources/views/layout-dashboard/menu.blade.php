 <div class="page-sidebar-wrapper">
            <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
            <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
            <div class="page-sidebar navbar-collapse collapse">
                <!-- BEGIN SIDEBAR MENU -->

                <ul class="page-sidebar-menu page-sidebar-menu-light" data-keep-expanded="false" data-auto-scroll="true"
                    data-slide-speed="200">
                    <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                    <li class="sidebar-toggler-wrapper">
                        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                        <div class="sidebar-toggler">
                        </div>
                        <!-- END SIDEBAR TOGGLER BUTTON -->
                    </li>
                    <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
                    <li style="margin-top:5px " class="@yield('home') start  ">
                        <a href="{{route('admin')}}">
                            <i class="icon-home"></i>
                            <span class="title">الصفحة الرئيسية</span>
                            {{-- <span class="selected"></span> --}}
                            {{-- <span class="arrow "></span> --}}
                        </a>
                    </li>

                    @if (auth::user()->role =='مدير')
                        <li style="margin-top:5px " class="@yield('users') start  ">
                            <a href="javascript:;">
                                <i class="icon-users"></i>
                                <span class="title">المستخدمين</span>
                                <span class="selected"></span>
                                <span class="arrow "></span>
                            </a>

                                <ul class="sub-menu">
                                    <li class="@yield('users.index')">
                                        <a href="{{route('users.index')}}">
                                            <i class="icon-"></i>
                                            عرض المستخدمين
                                            </a>
                                    </li>
                                    <li class="@yield('users.create')">
                                        <a href="{{route('users.create')}}">
                                            <i class="icon-"></i>
                                            إضافة مستخدم جديد
                                        </a>
                                    </li>
                                </ul>

                        </li>
                    @endif
                    <li style="margin-top:5px "class="@yield('sections') start  ">
                        <a href="javascript:;">
                            <i class="icon-puzzle"></i>
                            <span class="title">الاقسام</span>
                            <span class="selected"></span>
                            <span class="arrow "></span>
                        </a>

                            <ul class="sub-menu">
                                <li class="@yield('sections.index')">
                                    <a href="{{route('sections.index')}}">
                                        <i class=""></i>
                                        عرض الاقسام
                                        </a>
                                </li>
                                <li class="@yield('sections.create')">
                                    <a href="{{route('sections.create')}}">
                                        <i class=""></i>
                                        إضافة قسم جديد
                                    </a>
                                </li>
                            </ul>

                    </li>

                    <li style="margin-top:5px "class="@yield('services') start  ">
                        <a href="javascript:;">
                            <i class="icon-folder"></i>
                            <span class="title">الخدمات </span>
                            <span class="selected"></span>
                            <span class="arrow "></span>
                        </a>

                            <ul class="sub-menu">
                                <li class="@yield('services.index')">
                                    <a href="{{route('services.index')}}">
                                        <i class=""></i>
                                        عرض الخدمات
                                        </a>
                                </li>
                                <li class="@yield('services.create')">
                                    <a href="{{route('services.create')}}">
                                        <i class=""></i>
                                        إضافة خدمة جديدة
                                    </a>
                                </li>
                            </ul>

                    </li>

                    <li style="margin-top:5px "class="@yield('orders') start  ">
                        <a href="javascript:;">
                            <i class="icon-folder"></i>
                            <span class="title">الطلبات</span>
                            <span class="selected"></span>
                            <span class="arrow "></span>
                        </a>

                            <ul class="sub-menu">
                                <li class="@yield('orders.index')">
                                    <a href="{{route('orders.index')}}">
                                        <i class=""></i>
                                        كل الطلبات
                                        </a>
                                </li>
                                <li class="@yield('orders.accepted')">
                                    <a href="{{route('orders.accepted')}}">
                                        <i class=""></i>
                                        الطلبات المقبولة
                                    </a>
                                </li>
                                 <li class="@yield('orders.rejected')">
                                    <a href="{{route('orders.rejected')}}">
                                        <i class=""></i>
                                        الطلبات المرفوضة
                                    </a>
                                </li>
                                 <li class="@yield('orders.pending')">
                                    <a href="{{route('orders.pending')}}">
                                        <i class=""></i>
                                        الطلبات المعلقة
                                    </a>
                                </li>
                            </ul>

                    </li>

                    @if (auth::user()->role =='مدير')

                    <li style="margin-top:5px "class="@yield('setting') start  ">
                        <a href="javascript:;">
                            <i class="icon-settings"></i>
                            <span class="title">الاعدادات </span>
                            <span class="selected"></span>
                            <span class="arrow "></span>
                        </a>

                            <ul class="sub-menu">
                                <li class="@yield('setting.index')">
                                    <a href="{{route('setting.index')}}">
                                        <i class=""></i>
                                         الاعدادات العامة
                                        </a>
                                </li>

                            </ul>

                    </li>
                    @endif

                </ul>
                <!-- END SIDEBAR MENU -->
            </div>
        </div>
