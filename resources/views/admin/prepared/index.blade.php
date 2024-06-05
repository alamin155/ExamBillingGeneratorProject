@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<title>W3.CSS</title>
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
  <div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="background-color:sandybrown; width:250px; font-size:14px;" id="mySidebar">
 <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="{{URL::to('/allexamcommitteebilling')}}">
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                <span class="menu-title">Exam Committee Billing</span>
              </a>
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
     <div class="container col-6 card-body" style=" margin-left:270px; width:960px; height:650px; background:skyblue; border: 2px solid">
      <div class="col-md-14 card-body" style="width:960px">
        <h2 class="my-2 text-center">prepared</h2>
          <a href="" class="btn btn-primary my-2" data-bs-toggle="modal" data-bs-target="#addModal">Add New prepared</a>
          @foreach($exams as $d)
              <a href="{{url('examcommitteebilling/'.$d->id.'/show')}} " class="btn btn-success my-2">Goto Back</a>
              @endforeach
      <div class="data-table col-md-10" style="width:956px">
            <table class="table table-bordered" style="border: 2px;">
                        <thead>
                         <tr>
                           <th>Name</th>
                          <th>Designation</th>
                          <th>Year</th>
                          <th>Semester</th>
                          <th>Admission Year</th>
                          <th>Department</th>
                          <th>Varsity Name</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                         @foreach($data as $key=>$d)
                      <tr> 
                       <td>{{$d->name}}</td>
                       <td>{{$d->designation}}</td>
                       <td>@if($d->Examcommitteebilling->year == 1 ) 
                            1st 
                            @elseif($d->Examcommitteebilling->year == 2) 
                            2nd 
                            @elseif($d->Examcommitteebilling->year == 3) 
                            3rd 
                            @elseif($d->Examcommitteebilling->year == 4) 
                            4th 
                            @else 
                            5th
                            @endif
                          </td>
                          <td>
                            @if($d->Examcommitteebilling->semester == 1 ) 
                            1st 
                            @elseif($d->Examcommitteebilling->semester == 2) 
                            2nd 
                            @elseif($d->Examcommitteebilling->semester == 3) 
                            3rd 
                            @elseif($d->Examcommitteebilling->semester == 4) 
                            4th 
                            @else 
                            5th
                            @endif 
                          </td>
                          <td>
                            @if($d->Examcommitteebilling->addmission_year == 1 ) 
                            2012-2013 
                            @elseif($d->Examcommitteebilling->addmission_year == 2) 
                            2013-2014 
                            @elseif($d->Examcommitteebilling->addmission_year == 3) 
                            2014-2015
                            @elseif($d->Examcommitteebilling->addmission_year == 4) 
                            2015-2016 
                            @elseif($d->Examcommitteebilling->addmission_year == 5) 
                            2016-2017
                            @elseif($d->Examcommitteebilling->addmission_year == 6) 
                            2017-2018
                            @elseif($d->Examcommitteebilling->addmission_year == 7) 
                            2018-2019
                            @elseif($d->Examcommitteebilling->addmission_year == 8) 
                            2019-2020
                            @elseif($d->Examcommitteebilling->addmission_year == 9) 
                            2020-2021
                            @elseif($d->Examcommitteebilling->addmission_year == 10) 
                            2021-2022
                            @elseif($d->Examcommitteebilling->addmission_year == 11) 
                            2022-2023  
                            @elseif($d->Examcommitteebilling->addmission_year == 12) 
                            2023-2024   
                            @else 
                            2024-2025
                            @endif 
                          </td>
                       <td>{{$d->Examcommitteebilling->department->department_name}}</td>
                       <td>{{$d->Examcommitteebilling->versityname}}</td>
                       <td>
                      
                      <a href="#" class="btn btn-danger delete_prepared" data-id="{{$d->id}}" >
                        <i class="las la-times"></i></a>
                     </td>
                      </tr>
                    @endforeach
                       </tbody>
                   </table>
                  
              </div>

            </div>
          </div>
          <div class="row">
            @yield('content')
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <!-- partial -->
      </div>
      <!-- row-offcanvas ends -->
    
</div>
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
  @include('admin.prepared.modal')
  @include('admin.prepared.ajax')
  {!! Toastr::message() !!}
  <!--delete message js file-->
</body>
</html>
@endsection

