@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.urbanui.com/salt/jquery/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 Dec 2017 12:31:57 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Student Enrollment</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="node_modules/mdi/css/materialdesignicons.min.css">
  
  <!-- endinject -->
  <!-- plugin css for this page -->
  
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
  <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
  <!-- endinject -->
  
</head>
<body>
<div class="container-fluid">
      <div class="row  row-offcanvas-right card">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" style="background-color:sandybrown;" >
          <div class="user-info">
            <div class="profile">
              <img class="image" src="image/alamin.jpg">
            </div>
            <div class="details">
              <p class="user-name">Md. Alamin Gazi</p>
              <p class="designation">Developer</p>
            </div>
          </div>
          <ul class="nav">
           <li>
              <a class="nav-link" href="{{URL::to('/Allexaminationteacher')}}">
                <i class="mdi mdi-gauge menu-icon"></i>
                <span class="menu-title">All Examination Teacher</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#layoutsSubmenu" aria-expanded="false" aria-controls="layoutsSubmenu">
                <i class="mdi mdi-arrow-expand-all menu-icon"></i>
                <span class="menu-title" style="color: green;">Add Examination Teacher</span>
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
                <span class="menu-title" style="color:blue;">Exam Committee Billing</span>
                <i class="mdi mdi-chevron-down menu-arrow"></i>
              </a>
              <div class="collapse" id="sidebar_layouts">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{URL::to('/allexamcommitteebilling')}}" style="color: green;">Add New</a>
                  </li>
                  
                </ul>
              </div>
            </li>

           <li class="nav-item">
              <a class="nav-link" href="{{URL::to('/alldepartment')}}">
                <i class="mdi mdi-repeat menu-icon"></i>
                <span class="menu-title" style="color: brown;">Department List</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{URL::to('/addteacher')}}">
                <i class="mdi mdi-repeat menu-icon"></i>
                <span class="menu-title" style="color:royalblue;">Teacher List</span>
              </a>
            </li>

           <!--forms start-->
          <li class="nav-item">
              <a class="nav-link" href="{{URL::to('/alldegree')}}">
                <i class="mdi mdi-gauge menu-icon"></i>
                <span class="menu-title">Degree List</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{URL::to('/allcourses')}}">
                <i class="mdi mdi-gauge menu-icon"></i>
                <span class="menu-title">Course List</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{URL::to('/allstaff')}}">
                <i class="mdi mdi-gauge menu-icon"></i>
                <span class="menu-title">Staff List</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{URL::to('/allremark')}}">
                <i class="mdi mdi-repeat menu-icon"></i>
                <span class="menu-title">Remark List</span>
              </a>
            </li>  
          </ul>
        </nav>
        <!-- partial -->
        <div class="content-wrapper">
        	<div class="row">
        		<div class="col-md-4"></div>
        		<div class="col-md-10">
        			<h2 class="my-2 text-center">External Teacher</h2>
        			<a href="" class="btn btn-primary my-2" data-bs-toggle="modal" data-bs-target="#addModal">Add New External Teacher</a>
              <a href="{{URL::to('/addteacher')}}" class="btn btn-secondary my-2" >Back To</a>
        			<div class="data-table col-md-10">
        				<table class="table table-bordered">
                        <thead>
                         <tr>
        
                          <th>Teacher Name</th>
                          <th>Teacher Designation</th>
                          <th>Teacher Address</th>
                          <th>Teacher Mobile</th>
                          <th>Teacher Email</th>
                          <th>Teacher Bank Name</th>
                          <th>Teacher Bank Account</th>
                          <th>Department</th>
                          <th>Teacher Status</th>
                          <th>Created Time</th>
                          <th>Action</th>
                          
                        
                        </tr>
                        </thead>
                        <tbody>
                          @foreach($data as $key=>$d)
                         <tr>
                       <th>{{$key+1}}</th>
                        <td>{{$d->name}}</td>
                        <td>{{$d->designation}}</td>
                        <td>{{$d->address}}</td>
                        <td>{{$d->mobile}}</td>
                        <td>{{$d->email}}</td>
                        <td>{{$d->bankname}}</td>
                        <td>{{$d->bankaccount}}</td>
                        <td>{{$d->department->department_name}}</td>
                        <td>
                            @if($d->status==1) Active @else Inactive @endif</td>
                            
                           <td>{{$d->created_at}}</td>
                       <td>
                     	<a href="{{URL::to('/edit-teacher')}}" class="btn btn-primary update_teacher_form" 
                      data-bs-toggle="modal" 
                      data-bs-target="#updateModal"
                      data-id="{{$d->id}}"
                      data-name="{{$d->name}}"
                      data-designation="{{$d->designation}}"
                      data-address="{{$d->address}}"
                      data-mobile="{{$d->mobile}}"
                      data-email="{{$d->email}}"
                      data-bankname="{{$d->bankname}}"
                      data-bankaccount="{{$d->bankaccount}}"
                      data-depart="{{$d->dept_id}}"
                      data-status="{{$d->status}}"
                      >
                        <i class="las la-edit"></i></a>
                     	<a href="#" class="btn btn-danger delete_teacher" data-id="{{$d->id}}">
                        <i class="las la-times"></i></a>
                     </td>
                      </tr>
                      @endforeach
                       </tbody>
                   </table>
                  {!! $data->links() !!}
        			 
        			</div>

        		</div>
        	</div>
          <div class="row">
            @yield('content')
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <div class="container-fluid " style="width:100%;">
          <footer class="footer">
          <div class="container-fluid">
            <span class="float">
                <a href="#">Md.Alamin Gazi</a> &copy; 2023
            </span>
          </div>
        </footer>
        </div>
        <!-- partial -->
      </div>
      <!-- row-offcanvas ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
</div>
</div>
 

  <!-- plugins:js -->
  <script src="node_modules/jquery/dist/jquery.min.js"></script>
  <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="node_modules/flot/jquery.flot.js"></script>
  <script src="node_modules/flot/jquery.flot.resize.js"></script>
  <script src="node_modules/flot/jquery.flot.categories.js"></script>
  <script src="node_modules/flot/jquery.flot.pie.js"></script>
  <script src="node_modules/rickshaw/vendor/d3.v3.js"></script>
  <script src="node_modules/rickshaw/rickshaw.min.js"></script>
  <script src="bower_components/chartist/dist/chartist.min.js"></script>
  <script src="node_modules/chartist-plugin-legend/chartist-plugin-legend.js"></script>
  <script src="node_modules/chart.js/dist/Chart.min.js"></script>
  <script src="node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/misc.js"></script>
  <script src="js/settings.js"></script>
  <!-- endinject -->
  <script src="{{asset('node_modules/datatables.net/js/jquery.dataTables.js')}}"></script>
  <script src="{{asset('node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js')}}"></script>
  <script src="{{asset('js/data-table.js')}}"></script>
  <!-- Custom js for this page-->
  <script src="js/dashboard_1.js"></script>
  <!-- End custom js for this page-->


  @include('admin.externalteacher.modal')
  @include('admin.externalteacher.edit')
  @include('admin.externalteacher.ajax')
  {!! Toastr::message() !!}
  <!--delete message js file-->
  
</body>
<!-- Mirrored from www.urbanui.com/salt/jquery/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 Dec 2017 12:32:50 GMT -->
</html>

@endsection