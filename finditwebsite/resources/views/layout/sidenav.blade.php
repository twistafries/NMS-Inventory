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
            <a href="{!! url('/inventory') !!}">
                <i class="fas fa-warehouse"></i>
                <span class="hide-menu">Inventory</span>
            </a>
        </li>
        @if ($user_type=="admin")
          <li id="associates">
              <a href="{!! url('/associates') !!}">
                  <i class="fas fa-users"></i>
                  <span class="hide-menu">Associates</span>
              </a>
          </li>

          <li id="employees">
              <a href="{!! url('/employees') !!}">
                  <i class="fas fa-vcard"></i>
                  <span class="hide-menu">Employees</span>
              </a>
          </li>
          @endif


        <li id="issuance">
          <a href="{!! url('/issuance') !!}">
                <i class="fas fa-hand-holding"></i>
                <span class="hide-menu">Issuance</span>
            </a>
        </li>
<!--
        <li id="issuableItems">
            <a href="{!! url('/issuableItems') !!}">
                <i class="fas fa-desktop"></i>
                <span class="hide-menu">Issuable Items</span>
            </a>
        </li> -->
@if ($user_type=="admin")
        <li id="activityLogs">
            <a href="{!! url('/activitylogs') !!}">
                <i class="fas fa-list-alt"></i>
                <span class="hide-menu">Activity Logs</span>
            </a>
        </li>

        <li id="report">
            <a href="{!! url('/reportpage') !!}">
                <i class="fas fa-file-export"></i>
                <span class="hide-menu">Generate Reports</span>
            </a>
        </li>
          @endif
    </ul>
</nav>
