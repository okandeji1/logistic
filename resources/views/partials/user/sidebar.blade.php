<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#"><span class="logo-name">Coach-Admin</span></a>
        </div>
        <div class="sidebar-user">
            <div class="sidebar-user-picture">
                <img alt="image" src="{{ asset('assets/img/avat.png') }}">
            </div>
            <div class="sidebar-user-details">
                <div class="user-name">{{ Auth::user()->fullname }}</div>
                {{-- <div class="user-role">{{ Auth::user()->role->user }}</div>
                --}}
            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="active">
                <a href="user-dashboard" class="menu-toggle nav-link"><i
                        data-feather="airplay"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="box"></i><span>Orders</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="/create-order">Create Order</a></li>
                    @can('isAdmin')
                        <li><a class="nav-link" href="/pending-orders">Pending Orders</a></li>
                        <li><a class="nav-link" href="/incomplete-orders">Incomplete Orders</a></li>
                        <li><a class="nav-link" href="/deleted-orders">Cancelled Orders</a></li>
                    @endcan
                    <li><a class="nav-link" href="/all-order">All Orders</a></li>
                </ul>
            </li>
            @can('isAdmin')
                <li class="menu-header">Users</li>
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><i
                            data-feather="user-check"></i><span>Customers</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="/create-customer">Register customer</a></li>
                        <li><a class="nav-link" href="/manage-customer">Manage Customer</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="user-check"></i><span>Admin
                            Users</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="/create-admin">Register admin</a></li>
                        <li><a class="nav-link" href="/manage-admin">Manage admin users</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="user"></i><span>Riders</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="/create-rider">Register Riders</a></li>
                        <li><a class="nav-link" href="/manage-rider">Manage Riders</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="user"></i><span>SLA
                            Clients</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="/manage-sla-clients">Manage SLA Clients</a></li>
                        <li><a class="nav-link" href="/customer-transactions">Customer Transactions</a></li>
                    </ul>
                </li>
                <li class="menu-header">Bike</li>
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="layout"></i><span>Bike
                            Management</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="/create-bike">Register Bike</a></li>
                        <li><a class="nav-link" href="/manage-bike">Manage Bike</a>
                        <li><a class="nav-link" href="/bike-maintenance">Bike Maintenance</a>
                        <li><a class="nav-link" href="/bike-accident">Bike Accident</a>
                        </li>
                    </ul>
                </li>
                <li class="menu-header">Financials</li>
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><i
                            data-feather="briefcase"></i><span>Transactions</span></a>
                    <ul class="dropdown-menu">
                        {{-- <li><a class="nav-link" href="/generate-transaction">Generate
                                Transaction</a></li> --}}
                        <li><a class="nav-link" href="/all-transactions">All Transaction</a></li>
                        {{-- <li><a class="nav-link" href="#">Transaction Report</a></li>
                        --}}
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="file"></i><span>Receipts &
                            Invoices</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="/view-receipts">View Receipts</a></li>
                        {{-- <li><a class="nav-link" href="/generate-receipt">Generate
                                Receipts</a></li> --}}
                        {{-- <li><a class="nav-link" href="#">Generate Quote</a></li>
                        --}}
                    </ul>
                </li>
            @endcan
            <li class="menu-header">Account</li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="layout"></i><span>User
                        settings</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="/user-profile">My profile</a></li>
                    <li><a class="nav-link" href="/auth-password-reset/{{ Auth::user()->uuid }}">Change Password</a>
                    </li>
                </ul>
            </li>
        </ul>
    </aside>
</div>
