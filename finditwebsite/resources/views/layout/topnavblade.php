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
                                <a class="navbar-brand">FindIT</a>
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
                            <button class="dropdown-item dropdown-item-custom" data-toggle="modal" data-target="#profile-modal"><span class="fas fa-user-circle icon"></span>View Profile</button>
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
                <!--View Profile-->
                               <div class="modal fade" id="profile-modal" tabindex="-1" role="dialog">
                                 <div class="modal-dialog modal-lg row">
                                   <div class="modal-content">
                                     <div class="modal-body row" style="padding: 0 !important; height: 37rem;">
                                       <div class="col col-4" style="background: #555555;">
                                         <hr style="color: #FDAD4E; background: #FDAD4E; height: 1px; margin-top: 4.5rem;">
                                         <div class="profile-pic text-center" style="margin-top: 2.5rem; margin-bottom: 5px;">
                                             <img src="../assets/images/user/user.png" class="img-avatar" alt="avatar" srcset="" style="width: 5rem; height: 5rem; border-width: 2px;">
                                         </div>
                                         <div class="text-center" style="color: white; font-size: 18px; margin-bottom: 0 !important;"><?=$name?>
                                           <p style=""><?=$user_type?></p>
                                         </div>
                                         <hr style="color: #FDAD4E; background: #FDAD4E; height: 1px;">
                                         <div class="">
                                         </div>
                                       </div>
                                       <div class="col col-8" style="padding: 1rem;">
                                         <div class="" style="margin-top: 1rem; margin-left: 1rem;">
                                           <span class="fas fa-times-circle" data-dismiss="modal" aria-label="Close" aria-hidden="true"></span>
                                           <h5 class="account-settings">Account Settings</h5>
                                           <hr style="color: #FDAD4E; background: #FDAD4E; height: 1px; margin-right: 2rem;">
                                         </div>
                                         <div class="" style="margin-left: 1rem; margin-right: 2rem;">
                                           <form class="profile-form" id="profile-form">
                                         <!--name-->
                                         <div class="" id="divname">
                                           <div class="row row-details">
                                             <div class="col col-4 detail-header">NAME</div>
                                             <div class="col col-7 details" id="fullname"><?=$name?></div>
                                             <div class="col col-1 edit" id="name-edit"><u>Edit</u></div>
                                           </div>
                                             <div class="display" id="name">
                                               <div class="margin row">
                                                 <div class="form-group col col-6">
                                                   <label for="label" class="col-form-label label">First Name</label>
                                                   <input type="text" class="form-inline input" value="<?=$fname?>">
                                                 </div>
                                                 <div class="form-group col col-6">
                                                   <label for="label" class="col-form-label label">Last Name</label>
                                                   <input type="text" class="form-inline input" value="<?=$lname?>">
                                                 </div>
                                               </div>
                                             </div>
                                           </div>
                                           <!--Department-->
                                           <div id="divdepartment">
                                             <div class="row row-details">
                                               <div class="col col-4 detail-header">DEPARTMENT</div>
                                               <div class="col col-7 details" id="department-info"><?=$dept_id?></div>
                                               <div class="col col-1 edit" id="department-edit"><u>Edit</u></div>
                                             </div>
                                             <!--department collapse-->
                                             <div class="display" id="department">
                                               <div class="margin">
                                                 <div class="form-group row">
                                                     <select class="exampleFormControlSelect1 select">
                                                       <option></option>
                                                       <option value="dept1">IT Department</option>
                                                       <option value="dept2">Department 2</option>
                                                       <option value="dept3">Department 3</option>
                                                       <option value="dept4">Department 4</option>
                                                     </select>
                                                 </div>
                                               </div>
                                             </div>
                                           </div>
                                           <!--User Type-->
                                           <div id="divtype">
                                             <div class="row row-details">
                                               <div class="col col-4 detail-header">USER TYPE</div>
                                               <div class="col col-7 details" id="typet-info"><?=$user_type?></div>
                                             </div>
                                           </div>
                                           <!--Email-->
                                           <div id="divemail">
                                             <div class="row row-details">
                                               <div class="col col-4 detail-header">EMAIL</div>
                                               <div class="col col-7 details" id="email-add"><?=$email?></div>
                                               <div class="col col-1 edit" id="email-edit"><u>Edit</u></div>
                                             </div>
                                             <!--email collapse-->
                                             <div class="text-center display remove-padding" id="email">
                                               <div class="margin">
                                                 <div class="form-group row">
                                                   <div class="col col-2">
                                                     <label for="label" class="col-form-label label">Email</label>
                                                   </div>
                                                   <div class="col col-10">
                                                     <input type="email" name="inputEmail" class="form-inline input">
                                                   </div>
                                                 </div>
                                               </div>
                                             </div>
                                           </div>
                                           <!--password-->
                                           <div id="divpassword">
                                             <div class="row row-details">
                                               <div class="col col-4 detail-header">PASSWORD</div>
                                               <div class="col col-7 details" id="password-info">***********</div>
                                               <div class="col col-1 edit"><a href data-toggle="modal" data-target="#change-password">Edit</a></div>
                                             </div>
                                             <!--password modal-->
                                             <div class="text-center display remove-padding" id="change-password">
                                               <div class="margin">
                                                 <div class="form-group row">
                                                   <div class="col col-4">
                                                     <label for="" class="col-form-label label">Old Password</label>
                                                   </div>
                                                   <div class="col col-8">
                                                     <input type="password" class="form-inline input" id="" name="oldPassword">
                                                   </div>
                                                 </div>
                                               </div>
                                               <div class="margin">
                                                 <div class="form-group row">
                                                   <div class="col col-4">
                                                     <label for="" class="col-form-label label">New Password</label>
                                                   </div>
                                                   <div class="col col-8">
                                                     <input type="password" class="form-inline input" id="" name="newPassword">
                                                   </div>
                                                 </div>
                                               </div>
                                               <div class="margin">
                                                 <div class="form-group row">
                                                   <div class="col col-4">
                                                     <label for="" class="col-form-label label">Repeat Password</label>
                                                   </div>
                                                   <div class="col col-8">
                                                     <input type="password" class="form-inline input" id="" name="repeat">
                                                   </div>
                                                 </div>
                                               </div>
                                             </div>
                                             <div class="text-center display" id="cancel-save">
                                                <button type="button" class="btn btn-danger b password-cancel cancel" id="buttons" name="">Cancel</button>
                                                <button type="button" class="btn btn-success b cancel" id="buttons">Save</button>
                                            </div>
                                           </div>
                                         </form>
                                         </div>
                                       </div>
                                     </div>
                                   </div>
                                 </div>
                               </div>

                               <!-- Breadcrumbs -->
                               <!-- <div class="breadcrumbs"> -->
                            <div class="sidebar-user"></div>
                               <script>
       jQuery.validator.setDefaults({
         debug: true,
         success: "valid"
       });

       $.validator.addMethod("passwordcheck", function(value) {
          return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // consists of only these
              && /[a-z]/.test(value) // has a lowercase letter
              && /\d/.test(value) // has a digit
       },
       'Password must consist of uppercase, lowercase, number, and a special character ()');

       $("#profile-form" ).validate({
         rules: {
           oldPassword: {
             required: true,
             passwordcheck: true,
             maxlength: 15,
           },

           newPassword: {
             required: true,
             passwordcheck: true,
             maxlength: 15,
             minlength: 8,
           },

           repeat: {
             required: true,
             equalTo: "inputNew",
             minlength: 8,
           },

           inputEmail: {
             email: true,
             maxlength: 30,
             minlength: 11,
           },
         },
       });
   </script>
   <script>
     $(document).ready(function(){
         $.fn.showInfo = function(elementsHideID, elementsShowID) {
             $("#" + elementsHideID + " > .display").show();
             $.each(elementsShowID, function(index, value) {
               $("#" + value + " > .display").hide();
             });
         }

         $("#divname .edit").click(function(){
             $.fn.showInfo("divname", ["divdepartment", "divemail", "divtype", "divpassword"]);
             $("#cancel-save").show();
             $(".password-cancel").click(function(){
                 $("#name").hide();
                 $("#cancel-save").hide();
             });
         });

         $("#divdepartment .edit").click(function(){
             $.fn.showInfo("divdepartment", ["divname", "divemail", "divtype", "divpassword"]);
             $("#cancel-save").show();
             $(".password-cancel").click(function(){
                 $("#department").hide();
                 $("#cancel-save").hide();
             });
         });

         $("#divtype .edit").click(function(){
             $.fn.showInfo("divtype", ["divname", "divdepartment", "divemail", "divpassword"]);
             $("#cancel-save").show();
             $(".password-cancel").click(function(){
                 $("#type").hide();
                 $("#cancel-save").hide();
             });
         });

         $("#divemail .edit").click(function(){
             $.fn.showInfo("divemail", ["divname", "divdepartment", "divtype", "divpassword"]);
             $("#cancel-save").show();
             $(".password-cancel").click(function(){
                 $("#email").hide();
                 $("#cancel-save").hide();
             });
         });

         $("#divpassword .edit").click(function(){
             $.fn.showInfo("divpassword", ["divname", "divdepartment", "divemail", "divtype"]);
             $("#cancel-save").show();
             $(".password-cancel").click(function(){
                 $("#password").hide();
                 $("#cancel-save").hide();
             });
         });
     });
     //   //name
     //   $("#name-edit").click(function(){
     //     $("#fullname").hide();
     //     $("#name-edit").hide();
     //     $("#name").show();
     //   });
     //   $(".name-cancel").click(function(){
     //     $("#name").hide();
     //     $("#fullname").show();
     //     $("#name-edit").show();
     //   });
     //
     //   //department
     //   $("#department-edit").click(function(){
     //     $("#department-info").hide();
     //     $("#department-edit").hide();
     //     $("#department").show();
     //   });
     //   $(".department-cancel").click(function(){
     //     $("#department").hide();
     //     $("#department-info").show();
     //     $("#department-edit").show();
     //   });
     //
     //   //email
     //   $("#email-edit").click(function(){
     //     $("#email-add").hide();
     //     $("#email-edit").hide();
     //     $("#email").show();
     //   });
     //   $(".email-cancel").click(function(){
     //     $("#email").hide();
     //     $("#email-add").show();
     //     $("#email-edit").show();
     //   });
     //
     //     //password
     //   $("#password-edit").click(function(){
     //     $("#password-info").hide();
     //     $("#password-edit").hide();
     //     $("#password").show();
     //   });
     //   $(".password-cancel").click(function(){
     //     $("#password").hide();
     //     $("#password-info").show();
     //     $("#password-edit").show();
     //   });
     // });
   </script>
