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
     
            <div class="container col-6 card-body" style="width:1400px">
              <div>
                <a href="{{URL::to('/download')}}" class="btn btn-primary">Download</a>
              </div>
              <h2 class="card-title">1.Examiantion Committee</h2>
                  <table  class="table table-striped" style="width:1400px">
                    <thead>
                      <tr>
                          <th>SL</th>
                          <th>Name</th>
                          <th>examinationcommittee_Designation</th>
                          <th>examinationcommittee_Address</th>
                          <th>Remark</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($examinationcommittees as $data)
                      <tr>
                          <td>{{$data->examinationcommittee_sl}}</td>
                          <td>{{$data->examinationcommittee_name}}</td>
                          <td>{{$data->examinationcommittee_designation}}</td>
                          <td>{{$data->examinationcommittee_address}}</td>
                          <td>
                            @if($data->examinationcommittee_remark==1)
                            <span class="label label-success">{{'Chairman'}}</span>
                            @elseif($data->examinationcommittee_remark==2)
                            <span class="label label-success">{{'Member'}}</span>
                            @elseif($data->examinationcommittee_remark==3)
                            <span class="label label-success">{{'Member(External)'}}</span>
                            
                            @endif
                          </td>
                          <td>
                            
                            <a href="{{URL::to('')}}" id="pdelete"><button  class="btn btn-danger deleteStudentBtn">delete</button></a>
                          </td>
                      </tr>
                      @endforeach
                    
                    </tbody>
                    <thead>
                      <tr><td style="color: red; ">2.Moderation Committee</td></tr>
                      <tr>
                          <th>SL</th>
                          <th>Name</th>
                          <th>ModerationCommittee Designation</th>
                          <th>Moderation Committee Address</th>
                          <th>Remark</th>
                      </tr>
                    </thead>

                    <tbody>
                      @foreach($moderationcommittees as $data)
                      <tr>
                          <td>{{$data->moderationcommittee_sl}}</td>
                          <td>{{$data->moderationcommittee_name}}</td>
                          <td>{{$data->moderationcommittee_designation}}</td>
                          <td>{{$data->moderationcommittee_address}}</td>
                          <td>
                            @if($data->moderationcommittee_remark==1)
                            <span class="label label-success">{{'Chairman'}}</span>
                            @elseif($data->moderationcommittee_remark==2)
                            <span class="label label-success">{{'Member'}}</span>
                            @elseif($data->moderationcommittee_remark==3)
                            <span class="label label-success">{{'Member(External)'}}</span>
                            
                            @endif
                          </td>
                          <td>
                            
                            <a href="{{URL::to('')}}" id="pdelete"><button  class="btn btn-danger deleteStudentBtn">delete</button></a>
                          </td>
                      </tr>
                      
                      @endforeach
                    
                    </tbody>
                    <thead>
                      <tr><td style="color: blue; ">3.Question Paper Setter (Internal)</td></tr>
                      <tr>
                          <th>Serial No</th>
                          <th>Course Code</th>
                          <th>Quantity </th>
                          <th>Name</th>
                          <th>Designation</th>
                      </tr>
                    </thead>

                    <tbody>
                      @foreach($questionpapersetterinternals as $data)
                      <tr>
                          <td>{{$data->questionpapersetterinternal_sl}}</td>
                          <td>{{$data->questionpapersetterinternal_coursecode}}</td>
                          <td>{{$data->questionpapersetterinternal_quantity}}</td>
                          <td>{{$data->questionpapersetterinternal_name}}</td>
                          <td>{{$data->questionpapersetterinternal_designation}}</td>
                          <td>
                            
                            <a href="{{URL::to('')}}" id="pdelete"><button  class="btn btn-danger deleteStudentBtn">delete</button></a>
                          </td>
                      </tr>
                      
                      @endforeach
                    
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
     
</body>
</html>
@endsection

