<div class="sidebar-wrapper">
    <div>
        <div class="logo-wrapper"><a href="#"><img class="img-fluid for-light" src="{{ asset('dashboard/assets/images/logo/logo.png') }}" alt=""><img class="img-fluid for-dark" src="{{ asset('dashboard/assets/images/logo/logo_dark.png') }}" alt=""></a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
        </div>
        <div class="logo-icon-wrapper"><a href="#"><img class="img-fluid" src="{{ asset('dashboard/assets/images/logo/logo-icon.png') }}" alt=""></a></div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn"><a href="#"><img class="img-fluid" src="{{ asset('dashboard/assets/images/logo/logo-icon.png') }}" alt=""></a>
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6 class="lan-1">General</h6>
                            <p class="lan-2">Dashboards,widgets & layout.</p>
                        </div>
                    </li>
{{--                    <li class="sidebar-list">--}}
{{--                        <label class="badge badge-success">2</label><a class="sidebar-link sidebar-title" href="#"><i data-feather="home"></i><span class="lan-3">Dashboard              </span></a>--}}
{{--                        <ul class="sidebar-submenu">--}}
{{--                            <li><a class="lan-4" href="index.html">Default</a></li>--}}
{{--                            <li><a class="lan-5" href="dashboard-02.html">Ecommerce</a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                    ADMIN ROLE         --}}
                    @role('admin')
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.users.index') }}"><i data-feather="git-pull-request"> </i><span>Managerlar</span></a></li>
                    @endrole
{{--                    MANAGER ROLE       --}}
                    @role('manager')
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{ route('manager.news.index') }}"><i data-feather="git-pull-request"> </i><span>Yangiliklar</span></a></li>
                    @endrole

                    @hasanyrole('admin|manager')
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{ route('persons.index') }}"><i data-feather="git-pull-request"> </i><span>Ro`yxatdan o'tganlar</span></a></li>
                    @endhasanyrole

{{--                    @role('user','person')--}}
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{ route('congratulations.index') }}"><i data-feather="git-pull-request"> </i><span>Tabiklar</span></a></li>
{{--                    @endrole--}}
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
