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
  <div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="background-color:sandybrown; width:225px; font-size:13px;" id="mySidebar">
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
                <span class="menu-title">Department List</span>
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
     <div class="container card col-6 ml-center " style="background-color:gainsboro;">
      @if($errors->any())
      @foreach($errors->all() as $error)
      <p class="text-danger">{{$error}}</p>
      @endforeach
      @endif
      @if(Session::has('msg'))
      <h3 class="text-success">{{session('msg')}}</h3>
      @endif
      <a href="{{URL::to('/allexamcommitteebilling')}}">
                                <button class="btn btn-info ">Show All Exam Committee Billing List</button>
                              </a>
                          <h2 class="card-title">Exam Committee Billing Add List</h2>
                          
                          <form class="forms-sample" method="post" action="{{URL::to('examcommitteebilling/strore')}}" enctype="multipart/form-data" style="width:100%; font-size: 15px;">
                            {{csrf_field()}}
                  <tr>
                  <td>
                  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="GrayBlue12">
                    <tbody><tr>
                      
                      <td width="2%" height="35" align="left" valign="middle" class="bdr01">&nbsp;</td>
                      <td width="14%" height="35" align="left" valign="middle" class="bdr01">Department:</td>
                      <td width="34%" height="35" align="left" valign="middle" class="bdr01">
                      <select class="form-control p-input" name="depart">
                                  <option>--select department--</option>
                                  @foreach($departments as $depart)
                                  <option value="{{$depart->id}}">{{$depart->department_name}}</option>
                                  @endforeach
                                </select>
                      </td>
                      <td width="2%" height="35" align="left" valign="middle" class="bdr01">&nbsp;</td>
                      <td width="14%" height="35" align="left" valign="middle" class="bdr01">Degree:</td>
                      <td width="34%" height="35" align="left" valign="middle" class="bdr01">
                        <select class="form-control p-input" name="depart1">
                                  <option>--select degree--</option>
                                  @foreach($degrees as $depart1)
                                  <option value="{{$depart1->id}}">{{$depart1->degree_name}}</option>
                                  @endforeach
                             </select>
                      </td>
                      </tr>
                    </tbody>
                  </table>
                </td>
                  </tr>
                  <tr>
                  <td>
                  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="GrayBlue12">
                    <tbody><tr>
                      <td width="3%" height="35" align="left" valign="middle" class="bdr01">&nbsp;</td>
                      <td width="14%" height="35" align="left" valign="middle" class="bdr01">Semester:</td>
                      <td width="34%" height="35" align="left" valign="middle" class="bdr01">
                      <select class="form-control p-input" name="semester">
                                  <option>--select Semester--</option>
                                  <option value="1">1st</option>
                                  <option value="2">2nd</option>
                                  <option value="3">3rd</option>
                                  <option value="4">4th</option>
                                  <option value="5">5th</option>
                                </select>
                      </td>
                      <td width="2%" height="35" align="left" valign="middle" class="bdr01">&nbsp;</td>
                      <td width="14%" height="35" align="left" valign="middle" class="bdr01">Year:</td>
                      <td width="34%" height="35" align="left" valign="middle" class="bdr01">
                      <select class="form-control p-input" name="year">
                                  <option>--select year--</option>
                                  <option value="1">1st</option>
                                  <option value="2">2nd</option>
                                  <option value="3">3rd</option>
                                  <option value="4">4th</option>
                                  <option value="5">5th</option>
                                </select>
                      </td>
                      </tr>
                    </tbody>
                  </table>
                </td>
                  </tr>

                  <tr>
                  <td>
                  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="GrayBlue12">
                    <tbody><tr>
                      <td width="3%" height="35" align="left" valign="middle" class="bdr01">&nbsp;</td>
                      <td width="14%" height="35" align="left" valign="middle" class="bdr01">Admission Year:</td>
                      <td width="34%" height="35" align="left" valign="middle" class="bdr01">
                      <select class="form-control p-input" name="addmission_year">
                                  <option>--select addmission year--</option>
                                  <option value="1">2012-2013</option>
                                  <option value="2">2013-2014</option>
                                  <option value="3">2014-2015</option>
                                  <option value="4">2015-2016</option>
                                  <option value="5">2016-2017</option>
                                  <option value="6">2017-2018</option>
                                  <option value="7">2018-2019</option>
                                  <option value="8">2019-2020</option>
                                  <option value="9">2020-2021</option>
                                  <option value="10">2021-2022</option>
                                  <option value="11">2022-2023</option>
                                  <option value="12">2023-2024</option>
                                  <option value="13">2024-2025</option>
                                </select>
                      </td>
                      <td width="2%" height="35" align="left" valign="middle" class="bdr01">&nbsp;</td>
                      <td width="14%" height="35" align="left" valign="middle" class="bdr01">Academic Year:</td>
                      <td width="34%" height="35" align="left" valign="middle" class="bdr01">
                      <select class="form-control p-input" name="academic_year">
                                  <option>--select academic year--</option>
                                  <option value="1">2012-2013</option>
                                  <option value="2">2013-2014</option>
                                  <option value="3">2014-2015</option>
                                  <option value="4">2015-2016</option>
                                  <option value="5">2016-2017</option>
                                  <option value="6">2017-2018</option>
                                  <option value="7">2018-2019</option>
                                  <option value="8">2019-2020</option>
                                  <option value="9">2020-2021</option>
                                  <option value="10">2021-2022</option>
                                  <option value="11">2022-2023</option>
                                  <option value="12">2023-2024</option>
                                  <option value="13">2024-2025</option>
                                </select>
                      </td>
                      </tr>
                    </tbody>
                  </table>
                </td>
                  </tr>
                              
                               
                              <div class="form-group">
                                <label for="exampleInputPassword1">Exam Year</label>
                                <select class="form-control p-input" name="exam_year">
                                  <option>--select Exam year--</option>
                                  <option value="1">2013</option>
                                  <option value="2">2014</option>
                                  <option value="3">2015</option>
                                  <option value="4">2016</option>
                                  <option value="5">2017</option>
                                  <option value="6">2018</option>
                                  <option value="7">2019</option>
                                  <option value="8">2020</option>
                                  <option value="9">2021</option>
                                  <option value="10">2022</option>
                                  <option value="11">2023</option>
                                  <option value="12">2024</option>
                                  <option value="13">2025</option>
                                  <option value="14">2026</option>
                                  <option value="15">2027</option>
                                  <option value="16">2028</option>
                                  <option value="17">2029</option>
                                  <option value="18">2030</option>
                                </select>
                              </div>
                               
                               
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Exam Start Date</label>
                                  <input type="date" class="form-control p-input" name="exam_start_date" aria-describedby="emailHelp" >
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Exam End Date</label>
                                  <input type="date" class="form-control p-input" name="exam_end_date" aria-describedby="emailHelp" >
                              </div>
  
                              <div class="form-group">
                                <label for="exampleInputPassword1">Status</label>
                                <select class="form-control p-input" name="staff_status">
                                  <option>--select Status--</option>
                                  <option value="1">Active</option>
                                  <option value="2">Inactive</option>
                                </select>
                              </div>
                             
                              <div class="card-footer">
                              <button type="submit" class="btn btn-success">Submit</button>
                            </div>
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

