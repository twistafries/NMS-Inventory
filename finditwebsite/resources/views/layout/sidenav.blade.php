<nav id="sidebar">
    <!-- Sidebar Toggle Button -->
    <div class="sidebar-header">
        <button type="button" id="sidebarCollapse" class="btn btn-info float-right">
            <i class="fas fa-align-left"></i>
            <span></span>
        </button>
    </div>

    <!-- Sidebar User Info -->
    <div class="sidebar-user">
        <img src="../assets/images/user/squidward.jpg" class="img-avatar" alt="" srcset="">
        <span class="hide-menu">
            <ul class="list-unstyled avatar">
                <li class="list-email"><small>john_doe@nms.ph</small></li>
                <li><small>Admin</small></li>
            </ul>
        </span>
        <a class="nav-link dropdown-tobggle navbar-toggler-right dropdown-avatar" href="#"
            id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        </a>
        <!-- Dropdown Menu -->
        <div class="dropdown-menu dropdown-menu-right animated flipInY">
            <a class="dropdown-item dropdown-item-avatar" href="#">Settings</a>
            <a class="dropdown-item dropdown-item-avatar" href="#">Log Out</a>
        </div>
    </div>

    <!-- Menu List -->
    <ul class="list-unstyled components">
        <li id="dashboard">
            <a href="{!! url('/dashboard') !!}">
                <i class="fas fa-chart-line"></i>
                <span class="hide-menu">Dashboard</span>
            </a>
        </li>

        <li id="inventory">
            <a href="{!! url('/inventory') !!}">
                <i class="fas fa-warehouse"></i>
                <span class="hide-menu">Inventory</span>
            </a>
        </li>

        <li id="associates">
            <a href="{!! url('/associates') !!}">
                <i class="fas fa-users"></i>
                <span class="hide-menu">Associates</span>
            </a>
        </li>

        <li id="issuance">
            <a href="#">
                <i class="fas fa-hand-holding"></i>
                <span class="hide-menu">Issuance</span>
            </a>
        </li>

        <li id="issuable items">
            <a href="#">
                <i class="fas fa-desktop"></i>
                <span class="hide-menu">Issuable Items</span>
            </a>
        </li>

        <li id="inventoryconcern">
            <a href="#">
                <i class="fas fa-exclamation-circle"></i>
                <span class="hide-menu">Inventory Concerns</span>
            </a>
        </li>

        <li id="activityLog">
            <a href="#">
                <i class="fas fa-list-alt"></i>
                <span class="hide-menu">Activity Logs</span>
            </a>
        </li>

        <li id="report">
            <a href="#">
                <i class="fas fa-file-export"></i>
                <span class="hide-menu">Generate Reports</span>
            </a>
        </li>
    </ul>
</nav>
