<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") && !request()->has('type') ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-users c-sidebar-nav-icon"></i>
                                All Users
                            </a>
                        </li>
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.type", 'admin') }}" class="c-sidebar-nav-link {{ request()->is("admin/users/admin") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user-shield c-sidebar-nav-icon"></i>
                                Admins
                            </a>
                        </li>
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.type", 'university') }}" class="c-sidebar-nav-link {{ request()->is("admin/users/university") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-university c-sidebar-nav-icon"></i>
                                Universities
                            </a>
                        </li>
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.type", 'user') }}" class="c-sidebar-nav-link {{ request()->is("admin/users/user") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon"></i>
                                Users
                            </a>
                        </li>
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.type", 'csos') }}" class="c-sidebar-nav-link {{ request()->is("admin/users/cso") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-building c-sidebar-nav-icon"></i>
                                CSOs
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('watch_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.watches.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/watches") || request()->is("admin/watches/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.watch.title') }}
                </a>
            </li>
        @endcan
        @can('category_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/categories") || request()->is("admin/categories/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.category.title') }}
                </a>
            </li>
        @endcan
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                        </i>
                        {{ trans('global.change_password') }}
                    </a>
                </li>
            @endcan
        @endif
        @if(auth()->user()->roles->contains('title', 'CSOs'))
            <li class="c-sidebar-nav-item">
                <a href="{{ route('cso.profile.show') }}" class="c-sidebar-nav-link {{ request()->is('cso/profile') ? 'c-active' : '' }}">
                    <i class="c-sidebar-nav-icon fas fa-user-circle"></i>
                    CSO Profile
                </a>
            </li>
        @elseif(auth()->user()->roles->contains('title', 'University'))
            <li class="c-sidebar-nav-item">
                <a href="{{ route('profile.show') }}" class="c-sidebar-nav-link {{ request()->is('profile') ? 'c-active' : '' }}">
                    <i class="c-sidebar-nav-icon fas fa-user-circle"></i>
                    University Profile
                </a>
            </li>
        @endif
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>