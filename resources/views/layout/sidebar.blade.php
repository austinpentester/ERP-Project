<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <?php
            use Illuminate\Support\Facades\DB;
            $company_dts = DB::table('company_dts')->first();
        ?>
      <div class="brand-logo d-flex align-items-center justify-content-between">
        <a href="/" class="text-nowrap logo-img">
          @if ($company_dts)
                <img src="{{ asset($company_dts->company_logo) }}" width="180" height="70px" alt="" />
                @endif
        </a>
        <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
          <i class="ti ti-x fs-8"></i>
        </div>
      </div>
      <!-- Sidebar navigation-->
      <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
        <ul id="sidebarnav">
            <li class="nav-small-cap">
                <i class="fas fa-ellipsis-h nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Menus</span>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="/" aria-expanded="false">
                    <span>
                        <i class="fas fa-tachometer-alt"></i>
                    </span>
                    <span class="hide-menu">Dashboard</span>
                </a>
            </li>

                <!-- Parties submenu -->
                <li class="sidebar-item">
                    <a class="sidebar-link" href="#" data-toggle="collapse" data-target="#partiesSubmenu" aria-expanded="false">
                        <span><i class="fas fa-users"></i></span>
                        <span class="hide-menu">Parties</span>
                    </a>
                    <ul id="partiesSubmenu" class="collapse sidebar-submenu">
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/C_Table" aria-expanded="false">
                                <span class="hide-menu">Customer</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/S_Table" aria-expanded="false">
                                <span class="hide-menu">Supplier</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/D_Table" aria-expanded="false">
                                <span class="hide-menu">Distributor</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Inventory submenu -->
                <li class="sidebar-item">
                    <a class="sidebar-link" href="#" data-toggle="collapse" data-target="#inventorySubmenu" aria-expanded="false">
                        <span><i class="fas fa-warehouse"></i></span>
                        <span class="hide-menu">Inventory</span>
                    </a>
                    <ul id="inventorySubmenu" class="collapse sidebar-submenu">
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/P_Table" aria-expanded="false">
                                <span class="hide-menu">Products</span>
                            </a>
                        </li>
                    </ul>
                </li>

            <!-- Other menu items -->
            <li class="sidebar-item">
                <a class="sidebar-link" href="./ui-card.html" aria-expanded="false">
                    <span>
                        <i class="fas fa-shipping-fast"></i>
                    </span>
                    <span class="hide-menu">Supply Chain</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="#" data-toggle="collapse" data-target="#supplier" aria-expanded="false">
                    <span><i class="fas fa-file-invoice"></i></span>
                    <span class="hide-menu">Supplier</span>
                </a>
                <ul id="supplier" class="collapse sidebar-submenu">
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ url('sup_products') }}" aria-expanded="false">
                            <span class="hide-menu">Products</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ url('a') }}" aria-expanded="false">
                            <span class="hide-menu">Purchase Insert</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ url('a') }}" aria-expanded="false">
                            <span class="hide-menu">Purchase Return</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ url('a') }}" aria-expanded="false">
                            <span class="hide-menu">Billing Management</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="./ui-typography.html" aria-expanded="false">
                    <span>
                        <i class="fas fa-dollar-sign"></i>
                    </span>
                    <span class="hide-menu">Sales</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="./authentication-login.html" aria-expanded="false">
                    <span>
                        <i class="fas fa-cash-register"></i>
                    </span>
                    <span class="hide-menu">Finance/ Admin</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="./authentication-register.html" aria-expanded="false">
                    <span>
                        <i class="fas fa-users-cog"></i>
                    </span>
                    <span class="hide-menu">HRMS</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="./authentication-register.html" aria-expanded="false">
                    <span>
                        <i class="fas fa-user-circle"></i>
                    </span>
                    <span class="hide-menu">My Space</span>
                </a>
            </li>

            <!-- Settings submenu -->
                <!-- Settings submenu -->
                <li class="sidebar-item">
                    <a class="sidebar-link" href="#" data-toggle="collapse" data-target="#settingsSubmenu" aria-expanded="false">
                        <span><i class="fas fa-cogs"></i></span>
                        <span class="hide-menu">Settings</span>
                    </a>
                    <ul id="settingsSubmenu" class="collapse sidebar-submenu">
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="#" data-toggle="collapse" data-target="#companySettingsSubmenu" aria-expanded="false">
                                <span class="hide-menu">Company Settings</span>
                            </a>
                            <ul id="companySettingsSubmenu" class="collapse sidebar-submenu">
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="{{ url('companyprofile') }}">
                                        <span class="hide-menu">Company Profile</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="{{ url('branch_Table') }}">
                                        <span class="hide-menu">Branch</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./roles-permission.html">
                                <span class="hide-menu">Roles and Permission</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="#" data-toggle="collapse" data-target="#mastersSubmenu" aria-expanded="false">
                                <span class="hide-menu">Masters</span>
                            </a>
                            <ul id="mastersSubmenu" class="collapse sidebar-submenu">
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="/T_Category">
                                        <span class="hide-menu">Category</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="/T_Units">
                                        <span class="hide-menu">Units</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="/TMajor_Heads">
                                        <span class="hide-menu">Major Heads</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="/T_color">
                                        <span class="hide-menu">Colors</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="/T_Position">
                                        <span class="hide-menu">Position</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="/T_Volume">
                                        <span class="hide-menu">Volume</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="/T_Taxes">
                                        <span class="hide-menu">Taxes</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="/T_Currencies">
                                        <span class="hide-menu">Currencies</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="/T_Payment">
                                        <span class="hide-menu">Payment Modes</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

            </ul>

    </nav>

      <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
  </aside>
<!-- Include jQuery if not already included -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script>
$(document).ready(function(){
    // Handle click event on main link to prevent default action
    $('.sidebar-link[data-toggle="collapse"]').on('click', function(e) {
        e.preventDefault();
    });
});
</script>
