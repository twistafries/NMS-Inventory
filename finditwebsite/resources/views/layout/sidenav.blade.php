<?php
  use Carbon\Carbon;
  $session=Session::get('loggedIn');
  $user_id = $session['id'];
  $fname = $session['fname'];
  $lname = $session['lname'];
  $user_type = $session['user_type'];
  // $img_path = $session['img_path'];
?>

<nav id="sidebar">
    <!-- Sidebar Toggle Button -->
    <div class="sidebar-header sidebar-sticky">
                        <button type="button" id="sidebarCollapse" class="btn btn-info float-right">
                            <i class="fas fa-chevron-left"></i>
                            <span></span>
                        </button>
                    </div>
    <!-- Sidebar User Info -->

                <div class="sidebar-user"></div>

    <!-- Menu List -->
    <ul class="list-unstyled components">
        <li id="dashboard">
            <a href="{!! url('/dashboard') !!}">
                <i class="fas fa-chart-line"></i>
                <span class="hide-menu">Dashboard</span>
            </a>
        </li>

        <li id="inventory">
            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fas fa-warehouse"></i>
                <span class="hide-menu">Inventory</span>
            </a>
            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="{!! url('/inventory') !!}"><i class="fas fa-laptop"></i><span class="hide-menu">Items</span></a>
                      </li>
              <li>
                <a href="{!! url('/repair') !!}"><i class="fas fa-tools"></i><span class="hide-menu">For Repair</span></a>
              </li>
             <li>
              <a href="{!! url('/decommissioned') !!}"><i class="fas fa-trash"></i><span class="hide-menu">Decommissioned</span></a>
             </li>
            </ul>

        </li>


        <li id="issuance">
          <a href="#issueSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fas fa-hand-holding"></i>
                <span class="hide-menu">Issuance</span>
            </a>

            <ul class="collapse list-unstyled" id="issueSubmenu">
                <li>
                    <a href="{!! url('/issuance') !!}"><i class="fas fa-mobile-alt"></i><span class="hide-menu">Issued Items</span></a>
                  </li>
              <li>

                <a href="{!! url('/issue') !!}"><span class="hide-menu"><i class="fas fa-users"></i>Employee Issuance</span></a>
              </li>
            </ul>

        </li>

        <li>
          <a href="#purchaseSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fas fa-shopping-cart"></i>
                <span class="hide-menu">Purchase History</span>
            </a>

            <ul class="collapse list-unstyled" id="purchaseSubmenu">
            <li>
                <a href="{!! url('/purchaseHistory') !!}"><span class="hide-menu"><i class="fas fa-history"></i></i>History</span></a>
              </li>
              <li>
                <a href="{!! url('/purchasenumber') !!}"><span class="hide-menu"><i class="fas fa-clipboard-list"></i>Purchase Number</span></a>
              </li>
              <li>
                <a href="{!! url('/ornumber') !!}"><span class="hide-menu"><i class="fas fa-list-ol"></i>OR Number</span></a>
              </li>
            </ul>

        </li>

        <li id="activityLog">
            <a href="#">
                <i class="fas fa-list-alt"></i>
                <span class="hide-menu">Activity Logs</span>
            </a>
        </li>

        <li id="report">
            <a href="{!! url('/reportpage') !!}">
                <i class="fas fa-file-export"></i>
                <span class="hide-menu">Reports</span>
            </a>
        </li>
    </ul>
</nav>
