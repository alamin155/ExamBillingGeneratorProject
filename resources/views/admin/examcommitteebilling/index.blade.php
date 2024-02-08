@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css" integrity="sha512-hwwdtOTYkQwW2sedIsbuP1h0mWeJe/hFOfsvNKpRB3CkRxq8EW7QMheec1Sgd8prYxGm1OM9OZcGW7/GUud5Fw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<body>
  <div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="background-color:sandybrown; width:215px; font-size:14px;" id="mySidebar">
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
                <span class="menu-title">Examination Teacher</span>
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
                <span class="menu-title"> Department List</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{URL::to('/addteacher')}}">
                <i class="mdi mdi-repeat menu-icon"></i>
                <span class="menu-title">Teacher List</span>
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
            
            <!--main pages end-->
           
            
          </ul>
        </nav>
      </div>
      <div class="container  col-ml-6 col-8" >
              
      @if(Session::has('msg'))
      <h2 class="text-danger">{{session('msg')}}</h2>
      @endif
              <h2 class="">All Exam Committee List</h2>
              <div class="">
                      <a href="{{URL::to('examcommitteebilling/create')}}"><button  class="btn btn-warning btn-sm deleteStudentBtn">Create New Exam Committee Billing</button></a> 
                    </div>

                  <table  class="table table-striped" style="background-color:gainsboro;">
                    <thead >
                      <tr >
                          
                          <th>Department Name</th>
                          <th>Degree Name</th>
                          <th>Semester</th>
                          <th>Year</th>
                          <th>Exam Year</th>
                          <th>Admission Year</th>
                          <th>Academic Year</th>
                          <th>Exam Start Date</th>
                          <th>Exam End Date</th>
                          <th>Status</th>
                          <th>Action</th>
                          <th>Created Time</th>
                          <th>Show</th>
                          <th>Delete</th>
                          <th>Update</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if($data)
                      @foreach($data as $d)
                      <tr>
                          <td>{{$d->department->department_name}}</td>
                          <td>{{$d->degree->degree_name}}</td>
                          <td>
                            @if($d->semester == 1 ) 
                            1st 
                            @elseif($d->semester == 2) 
                            2nd 
                            @elseif($d->semester == 3) 
                            3rd 
                            @elseif($d->semester == 4) 
                            4th 
                            @else 
                            5th
                            @endif 
                          </td>
                          <td>@if($d->year == 1 ) 
                            1st 
                            @elseif($d->year == 2) 
                            2nd 
                            @elseif($d->year == 3) 
                            3rd 
                            @elseif($d->year == 4) 
                            4th 
                            @else 
                            5th
                            @endif </td>
                          </td>
                          <td>
                            @if($d->exam_year == 1 ) 
                            2013 
                            @elseif($d->exam_year == 2) 
                            2014 
                            @elseif($d->exam_year == 3) 
                            2015
                            @elseif($d->exam_year == 4) 
                            2016 
                            @elseif($d->exam_year == 5) 
                            2017
                            @elseif($d->exam_year == 6) 
                            2018
                            @elseif($d->exam_year == 7) 
                            2019
                            @elseif($d->exam_year == 8) 
                            2020
                            @elseif($d->exam_year == 9) 
                            2021
                            @elseif($d->exam_year == 10) 
                            2022
                            @elseif($d->exam_year == 11) 
                            2023  
                            @elseif($d->exam_year == 12) 
                            2024  
                            @elseif($d->exam_year == 13) 
                            2025 
                            @elseif($d->exam_year == 14) 
                            2026 
                            @elseif($d->exam_year == 15) 
                            2027 
                            @elseif($d->exam_year == 16) 
                            2028  
                            @elseif($d->exam_year == 17) 
                            2029  
                            @else 
                            2030
                            @endif 
                          </td>
                          <td>
                            @if($d->addmission_year == 1 ) 
                            2012-2013 
                            @elseif($d->addmission_year == 2) 
                            2013-2014 
                            @elseif($d->addmission_year == 3) 
                            2014-2015
                            @elseif($d->addmission_year == 4) 
                            2015-2016 
                            @elseif($d->addmission_year == 5) 
                            2016-2017
                            @elseif($d->addmission_year == 6) 
                            2017-2018
                            @elseif($d->addmission_year == 7) 
                            2018-2019
                            @elseif($d->addmission_year == 8) 
                            2019-2020
                            @elseif($d->addmission_year == 9) 
                            2020-2021
                            @elseif($d->addmission_year == 10) 
                            2021-2022
                            @elseif($d->addmission_year == 11) 
                            2022-2023  
                            @elseif($d->addmission_year == 12) 
                            2023-2024   
                            @else 
                            2024-2025
                            @endif 
                          </td>
                          <td>
                            @if($d->academic_year == 1 ) 
                            2012-2013 
                            @elseif($d->academic_year == 2) 
                            2013-2014 
                            @elseif($d->academic_year == 3) 
                            2014-2015
                            @elseif($d->academic_year == 4) 
                            2015-2016 
                            @elseif($d->academic_year == 5) 
                            2016-2017
                            @elseif($d->academic_year == 6) 
                            2017-2018
                            @elseif($d->academic_year == 7) 
                            2018-2019
                            @elseif($d->academic_year == 8) 
                            2019-2020
                            @elseif($d->academic_year == 9) 
                            2020-2021
                            @elseif($d->academic_year == 10) 
                            2021-2022
                            @elseif($d->academic_year == 11) 
                            2022-2023  
                            @elseif($d->academic_year == 12) 
                            2023-2024   
                            @else 
                            2024-2025
                            @endif 
                          </td>
                          <td>{{$d->exam_start_date}}</td>
                          <td>{{$d->exam_end_date}}</td>
                          <td>
                            @if($d->staff_status==1) Active @else Inactive @endif</td>
                            <td>
                            <div class="form-check form-switch">
                            @if($d->staff_status==1)
                            <input type="checkbox" class="form-check-input" id="flexSwitchCheckChecked" checked>
                            @elseif($d->staff_status==2)
                            <input type="checkbox" class="form-check-input" id="flexSwitchCheckDefault">
                          </div>
                            @endif
                          </td>
                          <td>{{$d->created_at}}</td>
                          <td>  
                            <a href="{{url('examcommitteebilling/'.$d->id.'/show')}}"><button  class="btn btn-primary btn-sm" id="delete" onclick="confirmation(event)">View</button></a> 
                          </td>

                          <td>  
                            <a href="{{url('examcommitteebilling/'.$d->id.'/delete')}}"><button  class="btn btn-danger btn-sm">delete</button></a> 
                          </td>
                          <td>
                            <a href="{{url('examcommitteebilling/'.$d->id.'/edit')}}"><button  class="btn btn-success btn-sm deleteStudentBtn">Update</button></a>
                          </td>
                      </tr>
                      @endforeach
                      @endif
                    
                    </tbody>
                  </table>
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
  <script type="text/javascript">
    $(document).on("click","#delete",function(e)){
    e.preventDefault();
    var link=$(this).atrr("href");
    Swal.fire({
  title: "Are you sure?",
  text: "You won't be able to revert this!",
  icon: "warning",
  showCancelButton: true,
  confirmButtonColor: "#3085d6",
  cancelButtonColor: "#d33",
  confirmButtonText: "Yes, delete it!"
})
  .then((result) => {
  if (result.isConfirmed) {
    Swal.fire({
      title: "Deleted!",
      text: "Your file has been deleted.",
      icon: "success"
    });
  }
});
  

  </script>
     
</body>
</html>
@endsection

