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
<div class="w3-sidebar sidebar-offcanvas " style="background-color:sandybrown; width:225px; font-size:13px;" id="mySidebar">
 <ul class="nav ">
            <li class="nav-item">
              <a class="nav-link" href="{{URL::to('/allexamcommitteebilling')}}">
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                <span class="menu-title">Exam Committee Billing</span>
              </a>
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
      <div class="container col-6 card-body"  style=" margin-left:230px; width:960px; height:650px; background:khaki; border: 2px solid">
     <div class="container card col-8 ml-center " style="background-color:khaki; margin-top: 20px;">
      @if($errors->any())
      @foreach($errors->all() as $error)
      <p class="text-danger">{{$error}}</p>
      @endforeach
      @endif
      @if(Session::has('msg'))
      <h3 class="text-success">{{session('msg')}}</h3>
      @endif
      <a href="{{URL::to('/addteacher')}}">
                                <button class="btn btn-info ">Show All Teacher List</button>
                              </a>
                          <h2 class="card-title">Teacher Add List</h2>
                          
                          <form class="forms-sample" method="post" action="{{URL::to('teacher/strore')}}" enctype="multipart/form-data" style="width:100%; font-size: 15px;">
                            {{csrf_field()}}
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Teacher Name</label>
                                  <input type="text" class="form-control p-input" name="teacher_name" aria-describedby="emailHelp">
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Teacher Designation</label>
                                  <input type="text" class="form-control p-input" name="teacher_designation" aria-describedby="emailHelp" >
                              </div>
                  <tr>
                  <td>
                  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="GrayBlue12">
                    <tbody>
                      <tr>
                      <td width="2%" height="35" align="left" valign="middle" class="bdr01">&nbsp;</td>
                      <td width="8%" height="35" align="left" valign="middle" class="bdr01">Teacher Image</td>
                      <td width="34%" height="35" align="left" valign="middle" class="bdr01">
                      <input type="file" class="form-control p-input" name="teacher_image">
                      </td>
                      <td width="2%" height="35" align="left" valign="middle" class="bdr01">&nbsp;</td>
                      <td width="8%" height="35" align="left" valign="middle" class="bdr01">University Name</td>
                      <td width="34%" height="35" align="left" valign="middle" class="bdr01">
                      <input type="text" class="form-control p-input" name="teacher_address" aria-describedby="emailHelp" >
                      </td>
                      </tr>
                    </tbody>
                  </table>
                </td>
                  </tr>
                  <tr>
                  <td>
                  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="GrayBlue12">
                    <tbody>
                      <tr>
                      
                      <td width="2%" height="35" align="left" valign="middle" class="bdr01">&nbsp;</td>
                      <td width="10%" height="35" align="left" valign="middle" class="bdr01">Department:</td>
                      <td width="34%" height="35" align="left" valign="middle" class="bdr01">
                      <select class="form-control p-input" name="depart">
                                  <option>--select department--</option>
                                  @foreach($departments as $depart)
                                  <option value="{{$depart->id}}">{{$depart->department_name}}</option>
                                  @endforeach
                                </select>
                      </td>
                      <td width="2%" height="35" align="left" valign="middle" class="bdr01">&nbsp;</td>
                      <td width="10%" height="35" align="left" valign="middle" class="bdr01">Teacher Type:</td>
                      <td width="34%" height="35" align="left" valign="middle" class="bdr01">
                      <select class="form-control p-input" name="teacher_type">
                                  <option>--select Teacher Type--</option>
                                  <option value="1">Interanl</option>
                                  <option value="2">External</option>     </select>
                      </td>
                      </tr>
                    </tbody>
                  </table>
                </td>
                  </tr>

                  
                      
                    </tbody>
                  </table>
                </td>
                  </tr>
                  <div class="row">
                    <div class="card col-5" style="margin-bottom: 20px;margin-left: 20px;">
                             <div class="form-group">
                                <label for="exampleInputPassword1">Mobile</label>
                               <input type="mobile" maxlength="11" class="form-control p-input" name="mobile">
                              </div>
                            </div>
                            <div class="card col-6" style="margin-bottom:20px;margin-left: 20px;">
                               <div class="form-group" >
                                <label for="exampleInputPassword1">Email</label>
                                <input type="email" class="form-control p-input" name="email" >
                              </div>
                            </div>
                    <div class="card col-5" style="margin-bottom: 20px;margin-left: 20px;">
                             <div class="form-group">
                                <label for="exampleInputPassword1">Bank Account</label>
                                <input type="text" maxlength="20" class="form-control p-input" name="bankaccount" aria-describedby="emailHelp" >
                              </div>
                            </div>
                            <div class="card col-6" style="margin-bottom:20px;margin-left: 20px;">
                               <div class="form-group" >
                                <label for="exampleInputPassword1">Bank Name</label>
                                <input type="text" class="form-control p-input" name="bankname" aria-describedby="emailHelp" >
                              </div>
                            </div>
                            <div class="card col-5" style="margin-left: 20px;margin-bottom: 20px;">
                              <div class="form-group">
                                <label for="receivedno">Routing No:</label>
                                <input type="text" class="form-control p-input" name="receivedno" aria-describedby="emailHelp" >
                              </div>
                            </div>
                            <div class="card col-6" style="margin-bottom:20px;margin-left:20px">
                              <div class="form-group">
                                <label for="Branchname">Branch Name</label>
                                <input type="text" class="form-control p-input" name="Branchname" aria-describedby="emailHelp" >
                              </div>
                            </div>
                            </div>
                              <div class="card-footer">
                              <button type="submit" class="btn btn-success" >Add Teacher</button>
                            </div>
                          </form>
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

     
</body>
</html>
@endsection

