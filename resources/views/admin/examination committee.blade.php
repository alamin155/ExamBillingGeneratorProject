@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="{{asset('node_modules/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css')}}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="node_modules/rickshaw/rickshaw.min.css" />
  <link rel="stylesheet" href="bower_components/chartist/dist/chartist.min.css" />
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
<body>
<div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="width:300px;" id="mySidebar">
 <ul class="nav">
<li class="nav-item">
              <a class="nav-link" href="{{URL::to('/Allexaminationteacher')}}">
                <i class="mdi mdi-gauge menu-icon"></i>
                <span class="menu-title">All Examination Teacher</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#layoutsSubmenu" aria-expanded="false" aria-controls="layoutsSubmenu">
                <i class="mdi mdi-arrow-expand-all menu-icon"></i>
                <span class="menu-title">Add Examination Teacher</span>
                <i class="mdi mdi-chevron-down menu-arrow"></i>
              </a>
              <div class="collapse" id="layoutsSubmenu">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{URL::to('/addexaminationcommitee')}}">Examination Committee<span class="badge badge-danger badge-pill ml-auto">New</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{URL::to('/addmoderationcommitee')}}">Moderation Committee<span class="badge badge-danger badge-pill ml-auto">New</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{URL::to('/addquestionpapersetterinternal')}}">Question Paper Setter (Internal)<span class="badge badge-danger badge-pill ml-auto">New</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pages/layout/rtl-layout.html">Question Paper Setter (External)<span class="badge badge-danger badge-pill ml-auto">New</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pages/layout/rtl-layout.html">Examining Answer Scripts<span class="badge badge-danger badge-pill ml-auto">New</span></a>
                  </li>
                   <li class="nav-item">
                    <a class="nav-link" href="pages/layout/rtl-layout.html">Third Examination of Scripts<span class="badge badge-danger badge-pill ml-auto">New</span></a>
                  </li>
                   <li class="nav-item">
                    <a class="nav-link" href="pages/layout/rtl-layout.html">
                   Class Test
                   <span class="badge badge-danger badge-pill ml-auto">New</span></a>
                  </li>
                   <li class="nav-item">
                    <a class="nav-link" href="pages/layout/rtl-layout.html">Laboratory Exam(Teachers)
                  <span class="badge badge-danger badge-pill ml-auto">New</span></a>
                  </li>
                   <li class="nav-item">
                    <a class="nav-link" href="pages/layout/rtl-layout.html">Laboratory Exam (Lab Attendant & Lab Technician)<span class="badge badge-danger badge-pill ml-auto">New</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pages/layout/rtl-layout.html">Question Typing & Publishing<span class="badge badge-danger badge-pill ml-auto">New</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pages/layout/rtl-layout.html">Examination Duty (Teachers<span class="badge badge-danger badge-pill ml-auto">New</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pages/layout/rtl-layout.html">Examination Duty (Stuff)

                  <span class="badge badge-danger badge-pill ml-auto">New</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pages/layout/rtl-layout.html">Tabulation
                  <span class="badge badge-danger badge-pill ml-auto">New</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pages/layout/rtl-layout.html">Scrutinize<span class="badge badge-danger badge-pill ml-auto">New</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pages/layout/rtl-layout.html">Verification of Results<span class="badge badge-danger badge-pill ml-auto">New</span></a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#sidebar_layouts" aria-expanded="false" aria-controls="sidebar_layouts">
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                <span class="menu-title">Exam Committee Billing</span>
                <i class="mdi mdi-chevron-down menu-arrow"></i>
              </a>
              <div class="collapse" id="sidebar_layouts">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{URL::to('/allexamcommitteebilling')}}">Add New</a>
                  </li>
                  
                </ul>
              </div>
            </li>

           <li class="nav-item">
              <a class="nav-link" href="{{URL::to('/alldepartment')}}">
                <i class="mdi mdi-repeat menu-icon"></i>
                <span class="menu-title">Show All Departments</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{URL::to('/addteacher')}}">
                <i class="mdi mdi-repeat menu-icon"></i>
                <span class="menu-title">Show All Teachers</span>
              </a>
            </li>

           <!--forms start-->
          <li class="nav-item">
              <a class="nav-link" href="{{URL::to('/alldegree')}}">
                <i class="mdi mdi-gauge menu-icon"></i>
                <span class="menu-title">Add new Degrees</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{URL::to('/allcourses')}}">
                <i class="mdi mdi-gauge menu-icon"></i>
                <span class="menu-title">Add new Courses </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{URL::to('/allstaff')}}">
                <i class="mdi mdi-gauge menu-icon"></i>
                <span class="menu-title">Add All new Staffs</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{URL::to('/allremark')}}">
                <i class="mdi mdi-repeat menu-icon"></i>
                <span class="menu-title">Add New Remarks</span>
              </a>
            </li>
            
            <!--main pages end-->
           
            
          </ul>
        </nav>
      </div>
     <div class="container col-6 card ml-center">
                          <h2 class="card-title">Examination Committee Add List</h2>
                          <p class="alert-dark">
                          <?php 
                          $exception=Session::get('exception');
                          if($exception){
                          echo $exception;
                          Session::put('exception',null);
                         }
                         ?>
                         </p>
                          <form class="forms-sample" method="post" action="{{URL::to('/save-examinationcommitee')}}" enctype="multipart/form-data">
                          	{{csrf_field()}}
                            <div class="form-group">
                                  <label for="exampleInputEmail1">Serial No</label>
                                  <input type="text" class="form-control p-input" name="examinationcommittee_sl" aria-describedby="emailHelp" placeholder="Enter Student Serial No">
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Name</label>
                                  <input type="text" class="form-control p-input" name="examinationcommittee_name" aria-describedby="emailHelp" placeholder="Enter Student Name">
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Designation</label>
                                  <input type="text" class="form-control p-input" name="examinationcommittee_designation" aria-describedby="emailHelp" placeholder="Enter Designation">
                              </div>
                              
                              
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Address</label>
                                  <input type="text" class="form-control p-input" name="examinationcommittee_address" aria-describedby="emailHelp" placeholder="Enter Address">
                              </div>
                             
                              <div class="form-group">
                              	<label for="exampleInputPassword1">Select Remarks</label>
                              	<select class="form-control p-input" name="examinationcommittee_remark">
                              		<option value="1">Chairman</option>
                              		<option value="2">Member</option>
                              		<option value="3">Member(External)</option>
                              	</select>
                              </div>
                              <button type="submit" class="btn btn-success btn-block">Submit</button>
                          </form>
                      </div>
  <script src="{{asset('node_modules/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('node_modules/popper.js/dist/umd/popper.min.js')}}"></script>
  <script src="{{asset('node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="{{asset('node_modules/flot/jquery.flot.js')}}"></script>
  <script src="{{asset('node_modules/flot/jquery.flot.resize.js')}}"></script>
  <script src="{{asset('node_modules/flot/jquery.flot.categories.js')}}"></script>
  <script src="{{asset('node_modules/flot/jquery.flot.pie.js')}}"></script>
  <script src="{{asset('node_modules/rickshaw/vendor/d3.v3.js')}}"></script>
  <script src="{{asset('node_modules/rickshaw/rickshaw.min.js')}}"></script>
  <script src="{{asset('bower_components/chartist/dist/chartist.min.js')}}"></script>
  <script src="{{asset('node_modules/chartist-plugin-legend/chartist-plugin-legend.js')}}"></script>
  <script src="{{asset('node_modules/chart.js/dist/Chart.min.js')}}"></script>
  <script src="{{asset('node_modules/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{asset('js/off-canvas.js')}}"></script>
  <script src="{{asset('js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('js/misc.js')}}"></script>
  <script src="{{asset('js/settings.js')}}"></script>
  <!-- endinject -->
  <script src="{{asset('node_modules/datatables.net/js/jquery.dataTables.js')}}"></script>
  <script src="{{asset('node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js')}}"></script>
  <script src="{{asset('js/data-table.js')}}"></script>
  <!-- Custom js for this page-->
  <script src="{{asset('js/dashboard_1.js')}}"></script>
     
</body>
</html>
@endsection

