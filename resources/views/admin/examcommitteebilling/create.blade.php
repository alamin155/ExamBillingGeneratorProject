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
  <style type="text/css">
  .menu-title{
  color: #FFFFFF;
  font-size: 17px;
}
#mySidebar{
  border: 4px solid #A8D08D;
}
footer {
  text-align: center;
  padding: 3px;
  background-color: black;
  color: white;
  width: 1075px;
  margin-left: 270px;
}
footer p{
  color: white;
}
footer p a {
  color: white;
}
  </style>
<body>
  <div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="background-color:#005D4B; width:270px;" id="mySidebar">
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
                <span class="menu-title">Committee Role List</span>
              </a>
            </li>
            
            <!--main pages end-->
           
            
          </ul>
        </nav>
      </div>
      <div class="container col-6 card-body"  style=" margin-left:270px; width:1075px; height:100%; background-color:#e7e6e6; border: 2px solid #A8D08D">
     <div class="container card col-6 ml-center " style="background-color:khaki; margin-top: 20px;margin-bottom: 10px; width: 600px;">
      @if($errors->any())
      @foreach($errors->all() as $error)
      <p class="text-danger">{{$error}}</p>
      @endforeach
      @endif
      @if(Session::has('msg'))
      <h3 class="text-success">{{session('msg')}}</h3>
      @endif
      <a href="{{URL::to('/allexamcommitteebilling')}}" style="margin-top: 2px;" >
                                <button class="btn btn-primary " >Show All Exam Committee Billing List</button>
                              </a>
                          <h2 class="card-title" style="text-align:center;">Exam Committee Billing Add List</h2>
                          
                          <form class="forms-sample" method="post" action="{{URL::to('examcommitteebilling/strore')}}" enctype="multipart/form-data" style="width:100%; font-size: 15px;">
                            {{csrf_field()}}
                  <tr>
                  <td>
                  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="GrayBlue12">
                    <tbody>
                      <tr>
                      
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
      <select class="form-control p-input" name="addmission_year" id="admissionYearSelect">
        <option>--select admission year--</option>
      </select>
    </td>
    
    <td width="2%" height="35" align="left" valign="middle" class="bdr01">&nbsp;</td>
    
    <td width="14%" height="35" align="left" valign="middle" class="bdr01">Academic Year:</td>
    <td width="34%" height="35" align="left" valign="middle" class="bdr01">
      <select class="form-control p-input" name="academic_year" id="academicYearSelect">
        <option>--select academic year--</option>
      </select>
    </td>
                      </tr>
                    </tbody>
                  </table>
                </td>
                  </tr>
                              
                               
                              <div class="form-group">
  <label for="exampleInputPassword1">Exam Year</label>
  <select class="form-control p-input" name="exam_year" id="examYearSelect">
    <option>--select Exam year--</option>
  </select>
</div>

                              <div class="form-group">
                            <label for="versityname">Varsity Name:</label>
                           <input type="text" name="versityname" id="versityname" class="form-control" placeholder="varsity name">
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
                    </div>
                    <footer>
  <p>Copyright &copy;2024: Designed By <span>Md. Alamin Gazi</span> <br>
  <a href="md.alamingazi190@gmail.com">md.alamingazi190@gmail.com</a></p>
</footer>

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
<script>
  function populateDropdown(selectId, startYear, endYear, isAcademic=false) {
    const select = document.getElementById(selectId);
    const currentYear = new Date().getFullYear();
    // শেষ year হবে current year
    const finalYear = Math.min(endYear, currentYear);

    for (let year = startYear; year <= finalYear; year++) {
      const option = document.createElement('option');
      option.value = year;
      option.text = isAcademic ? `${year}-${year + 1}` : year;
      select.appendChild(option);
    }
  }

  // Populate Admission & Academic Year
  populateDropdown('admissionYearSelect', 2012, new Date().getFullYear(), true);
  populateDropdown('academicYearSelect', 2012, new Date().getFullYear(), true);
  // Populate Exam Year only up to current year
  populateDropdown('examYearSelect', 2013, 2030, false);
</script>
</body>
</html>
@endsection

