<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="{{ route('admin.index') }}" class="nav-link" id="dashboard">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    {{ __('Dashboard') }}
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('admin.profile.edit') }}" class="nav-link" id="profile">
                <i class="nav-icon fas fa-user-circle"></i>
                <p>
                    {{ __('Profile') }}
                </p>
            </a>
        </li>

        @canany(['view_student_management', 'view_parent_management'])
            <li class="nav-item has-treeview" id="users_roles">
                <a href="#" class="nav-link" id="users_roles_link">
                    <i class="nav-icon fas fa-list"></i>
                    <p>
                        {{ __('System') }}
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @can('view_student_management')
                        <li class="nav-item has-treeview" id="security_management">
                            <a href="#" class="nav-link" id="users_roles_link">
                                <i class="nav-icon fas fa fa-users"></i>
                                <p>
                                    {{ __('Student Management') }}
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                        </li>
                    @endcan
                    @can('view_parent_management')
                        <li class="nav-item has-treeview" id="security_management">
                            <a href="#" class="nav-link" id="users_roles_link">
                                <i class="nav-icon fas fa-address-book"></i>
                                <p>
                                    {{ __('Parent Management') }}
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="" class="nav-link" id="cultures_prices">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('Block') }}</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link" id="cultures_prices">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('Documents') }}</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link" id="cultures_prices">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('Progress & Attainment') }}</p>
                                    </a>
                                </li>

                                <li class="nav-item has-treeview" id="prices">
                                    <a href="#" class="nav-link" id="prices_link">
                                        <i class="nav-icon fas fa fa-car"></i>
                                        <p>
                                            {{ __('Transportation') }}
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">


                                        <li class="nav-item">
                                            <a href="" class="nav-link" id="tests_prices">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>{{ __('Area Code') }}</p>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="" class="nav-link"
                                                id="cultures_prices">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>{{ __('Bus') }}</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="" class="nav-link"
                                                id="cultures_prices">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>{{ __('Bus Applications') }}</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="" class="nav-link"
                                                id="cultures_prices">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>{{ __('Bus Applications Yearly') }}</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="" class="nav-link"
                                                id="cultures_prices">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>{{ __('Bus Personnel') }}</p>
                                            </a>
                                        </li>


                                    </ul>
                                </li>
                                <li class="nav-item has-treeview" id="prices">
                                    <a href="#" class="nav-link" id="prices_link">
                                        <i class="nav-icon fas fa-book-open"></i>
                                        <p>
                                            {{ __('Reports') }}
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">


                                        <li class="nav-item">
                                            <a href="" class="nav-link" id="tests_prices">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>{{ __('Bus Passenger Seats') }}</p>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="" class="nav-link"
                                                id="cultures_prices">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>{{ __('Fetcher App Report') }}</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="" class="nav-link"
                                                id="cultures_prices">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>{{ __('Transportation') }}</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="" class="nav-link"
                                                id="cultures_prices">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>{{ __('Transportation Pt. 2') }}</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="" class="nav-link"
                                                id="cultures_prices">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>{{ __('Uniform') }}</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan


        @canany(['view_user', 'view_role','view_gender'])
            <li class="nav-item has-treeview" id="users_roles">
                <a href="#" class="nav-link" id="users_roles_link">
                    <i class="nav-icon fas fa-tools"></i>
                    <p>
                        {{ __('Maintenance') }}
                        <i class="right fas fa-angle-left" ></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @canany(['view_role'])
                        <li class="nav-item has-treeview" id="security_management">
                            <a href="#" class="nav-link" id="users_roles_link">
                                <i class="nav-icon fas fa-lock"></i>
                                <p>
                                    {{ __('Security Management') }}
                                    <i class="right fas fa-angle-left" ></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.roles.index') }}" class="nav-link" id="roles">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('Roles') }}</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endcan
                    @canany(['view_user', 'view_gender'])
                        <li class="nav-item has-treeview" id="security_management">
                            <a href="#" class="nav-link" id="users_roles_link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    {{ __('User Management') }}
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            @can('view_user')
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.users.index') }}" class="nav-link" id="users">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('User') }}</p>
                                    </a>
                                </li>
                            </ul>
                            @endcan
                            @can('view_gender')
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.genders.index') }}" class="nav-link" id="users">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('Gender') }}</p>
                                    </a>
                                </li>
                            </ul>
                            @endcan
                            @can('view_nationality')
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.nationalities.index') }}" class="nav-link" id="users">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('Nationality') }}</p>
                                    </a>
                                </li>
                            </ul>
                            @endcan
                            @can('view_birthcountry')
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.birthcountries.index') }}" class="nav-link" id="users">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('Birth Country') }}</p>
                                    </a>
                                </li>
                            </ul>
                            @endcan
                            @can('view_religion')
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.religions.index') }}" class="nav-link" id="users">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('Religion') }}</p>
                                    </a>
                                </li>
                            </ul>
                            @endcan
                            @can('view_category')
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.categories.index') }}" class="nav-link" id="users">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('Category') }}</p>
                                    </a>
                                </li>
                            </ul>
                            @endcan
                            @can('view_status')
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.statuses.index') }}" class="nav-link" id="users">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('Status') }}</p>
                                    </a>
                                </li>
                            </ul>
                            @endcan
                        </li>
                    @endcan


                </ul>
            </li>
        @endcan



    </ul>
</nav>
