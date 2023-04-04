<aside class="main-sidebar">
    <section class="sidebar" style="height: auto;">
        <ul class="sidebar-menu tree" data-widget="tree">
            <li>
                <a href="{{ route("admin.home") }}">
                    <i class="fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            @can('user_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-users">

                        </i>
                        <span>{{ trans('cruds.userManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('permission_access')
                            <li class="{{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                <a href="{{ route("admin.permissions.index") }}">
                                    <i class="fa-fw fas fa-unlock-alt">

                                    </i>
                                    <span>{{ trans('cruds.permission.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="{{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                <a href="{{ route("admin.roles.index") }}">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span>{{ trans('cruds.role.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="{{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                <a href="{{ route("admin.users.index") }}">
                                    <i class="fa-fw fas fa-user">

                                    </i>
                                    <span>{{ trans('cruds.user.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('boat_engine_phase_one_access')
                <li class="{{ request()->is("admin/boat-engine-phase-ones") || request()->is("admin/boat-engine-phase-ones/*") ? "active" : "" }}">
                    <a href="{{ route("admin.boat-engine-phase-ones.index") }}">
                        <i class="fa-fw fas fa-ship">

                        </i>
                        <span>{{ trans('cruds.boatEnginePhaseOne.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('boat_engine_phase_two_access')
                <li class="{{ request()->is("admin/boat-engine-phase-twos") || request()->is("admin/boat-engine-phase-twos/*") ? "active" : "" }}">
                    <a href="{{ route("admin.boat-engine-phase-twos.index") }}">
                        <i class="fa-fw fas fa-ship">

                        </i>
                        <span>{{ trans('cruds.boatEnginePhaseTwo.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('development_project_access')
                <li class="{{ request()->is("admin/development-projects") || request()->is("admin/development-projects/*") ? "active" : "" }}">
                    <a href="{{ route("admin.development-projects.index") }}">
                        <i class="fa-fw fas fa-chalkboard-teacher">

                        </i>
                        <span>{{ trans('cruds.developmentProject.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('list_of_ministry_project_access')
                <li class="{{ request()->is("admin/list-of-ministry-projects") || request()->is("admin/list-of-ministry-projects/*") ? "active" : "" }}">
                    <a href="{{ route("admin.list-of-ministry-projects.index") }}">
                        <i class="fa-fw fas fa-clipboard-check">

                        </i>
                        <span>{{ trans('cruds.listOfMinistryProject.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('fish_center_access')
                <li class="{{ request()->is("admin/fish-centers") || request()->is("admin/fish-centers/*") ? "active" : "" }}">
                    <a href="{{ route("admin.fish-centers.index") }}">
                        <i class="fa-fw fas fa-fish">

                        </i>
                        <span>{{ trans('cruds.fishCenter.title') }}</span>

                    </a>
                </li>
            @endcan
            @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                @can('profile_password_edit')
                    <li class="{{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}">
                        <a href="{{ route('profile.password.edit') }}">
                            <i class="fa-fw fas fa-key">
                            </i>
                            {{ trans('global.change_password') }}
                        </a>
                    </li>
                @endcan
            @endif
            <li>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
        </ul>
    </section>
</aside>