<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('assets/logo/1-02.png') }}" alt="" height="70">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/logo/1-02.png') }}" alt="" height="150">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index.html" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('assets/logo/1-02.png') }}" alt="" height="70">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/logo/1-02.png') }}" alt="" height="150">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>

            <ul class="navbar-nav" id="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('admin.home') }}">
                        <i class="mdi mdi-view-grid-plus-outline"></i> <span data-key="t-widgets">لوحة التحكم</span>
                    </a>
                </li>
                <li class="menu-title"><span data-key="t-menu">لوحة لتحكم</span></li>
                @can('عرض زباين')
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="bx bx-user-circle "></i> <span data-key="t-dashboards">المستخدمين</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDashboards">
                        <ul class="nav nav-sm flex-column">

                            <li class="nav-item">
                                <a href="{{ route('admin.clients.index') }}" class="nav-link" data-key="t-analytics"> الزباين </a>
                            </li>

                            @can('عرض موظفين')
                            <li class="nav-item">
                                <a href="{{ route('admin.emploies.index') }}" class="nav-link" data-key="t-crm"> الموظفين </a>
                            </li>
                            @endcan
                        </ul>
                    </div>
                </li> <!-- end Dashboard Menu -->
                @endcan
                @can( 'عرض صلاحيات')

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="mdi mdi-cube-outline"></i> <span data-key="t-apps">صلاحيات</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarApps">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('admin.roles.index') }}" class="nav-link" data-key="t-calendar"> عرض الصلاحيات </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endcan





                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarAppsorder" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAppsorder">
                        <i class="bx bx-shopping-bag "></i> <span data-key="t-apps">طلبات</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarAppsorder">
                        <ul class="nav nav-sm flex-column">
                            @can( 'عرض طلبية')
                            <li class="nav-item">
                                <a href="{{ route('admin.orders.index') }}" class="nav-link" data-key="t-calendar"> عرض كل طلبات </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.waitorder') }}" class="nav-link" data-key="t-calendar">  طلبات قيد الانتظار</a>
                                <a href="{{ route('admin.buyorder') }}" class="nav-link" data-key="t-calendar"> عرض تم الشراء </a>
                                <a href="{{ route('admin.shopingorder') }}" class="nav-link" data-key="t-calendar"> تم الشحن  </a>
                                <a href="{{ route('admin.Deliveryprogresorder') }}" class="nav-link" data-key="t-calendar"> جاري التسليم  </a>
                                <a href="{{ route('admin.Deliveryorder') }}" class="nav-link" data-key="t-calendar">  تم التسليم  </a>
                                <a href="{{ route('admin.referenceorder') }}" class="nav-link" data-key="t-calendar"> مرجع </a>
                            </li>
                            @endcan

                        </ul>
                    </div>
                </li>


                @can( 'عرض ملاحظات')
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarAppsfeedback" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAppsfeedback">
                        <i class="bx bxs-user-account"></i> <span data-key="t-apps">ملاحظات</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarAppsfeedback">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('admin.feedback') }}" class="nav-link" data-key="t-calendar"> عرض الملاحظات </a>
                            </li>
                        </ul>
                    </div>
                </li>

                @endcan
                  @can( 'عرض مصاريف')

                  <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarAppscpost" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAppscpost">
                        <i class="ri-exchange-dollar-line display-6 text-muted"></i> <span data-key="t-apps">مصاريف</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarAppscpost">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('admin.costs.index') }}" class="nav-link" data-key="t-calendar"> عرض المصاريف </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endcan
                  {{-- @can( 'عرض مصاريف') --}}

                  <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarAppscpostsss" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAppscpostsss">
                        <i class="ri-exchange-dollar-line display-6 text-muted"></i> <span data-key="t-apps">مصاريف الطلبات</span>
                    </a>

                    @if (auth()->user()->role == 2)

                    <div class="collapse menu-dropdown" id="sidebarAppscpostsss">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href=" {{ route('admin.profits.show', auth()->user()->id) }}" class="nav-link" data-key="t-calendar"> عرض المصاريف الطلبات </a>
                            </li>
                        </ul>
                    </div>
                    @else
                    <div class="collapse menu-dropdown" id="sidebarAppscpostsss">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('admin.profits.index') }}" class="nav-link" data-key="t-calendar"> عرض المصاريف الطلبات </a>
                            </li>
                        </ul>
                    </div>


                    @endif
                </li>
                {{-- @endcan --}}

            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
