<?php
  use Carbon\Carbon;
  $session=Session::get('loggedIn');
  $user_id = $session['id'];
  $dept_id = $session['dept_id'];
  $email = $session['email'];
  $fname = $session['fname'];
  $lname = $session['lname'];
  $name = $session['fname'] . " " . $session['lname'];
  $user_type = $session['user_type'];
  // $img_path = $session['img_path'];
?>

<nav class="navbar sticky-top navbar-expand-lg navbar-custom">
                    <ul class="navbar-nav pr-4">
                        <li class="nav-item">
                            <div class="navbar-header">
                                <!-- Needs logo -->
                                <a class="navbar-brand"><img src="../assets/images/logo/logo3.png" class="img-avatar" alt="avatar" srcset="" style="height:85px; width:110px;"></a>
                            </div>
                        </li>
                    </ul>

                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                        </li>
                    </ul>

                    <div class="d-flex flex-row-reverse bd-highlight settings">
                      <div class="p-2 bd-highlight">
                        <a class="fas fa-ellipsis-v" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                        <!-- Dropdown Menu -->
                        <div class="dropdown-menu dropdown-menu-right animated flipInY">
                            <!-- <button class="dropdown-item dropdown-item-custom" data-toggle="modal" data-target="#profile-modal"><span class="fas fa-user-circle icon"></span>View Profile</button> -->
                            <a href="/logout" class="dropdown-item dropdown-item-custom"><span class="fas fa-sign-out-alt icon"></span>Logout</a>
                        </div>
                      </div>
                      <div class="p-2 bd-highlight name"><?=$name?></div>
                      <div class="p-2 bd-highlight">
                        <div class="profile-pic">
                            <img src="../assets/images/user/user.png" class="img-avatar" alt="avatar" srcset="">
                        </div>
                      </div>
                    </div>
                </nav>

                               <!-- Breadcrumbs -->
                               <!-- <div class="breadcrumbs"> -->
                            <div class="sidebar-user"></div>

