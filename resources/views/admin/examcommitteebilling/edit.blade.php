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
footer {
  text-align: center;
  padding: 3px;
  background-color: black;
  color: white;
}
footer p{
  color: white;
}
footer p a {
  color: white;
}
#mySidebar{
  border: 4px solid #A8D08D;
}
.menu-title{
  color: #FFFFFF;
  font-size: 17px;
}
.row{
margin-left:240px; 
width:1100px; 
height:100%; 
background:#F6F7F7; 
border: 2px solid #A8D08D;
}
  </style>
<body>
@include('usernave')
      <div class="container col-6 card-body"  style=" margin-left:265px; width:1070px; background-color:#e7e6e6; border: 2px solid #A8D08D">
     <div class="container card col-6 ml-center" style="background-color:khaki;margin-bottom: 20px;">
      @if($errors->any())
      @foreach($errors->all() as $error)
      <p class="text-danger">{{$error}}</p>
      @endforeach
      @endif
      @if(Session::has('msg'))
      <h3 class="text-success">{{session('msg')}}</h3>
      @endif
      <a href="{{URL::to('/allexamcommitteebilling')}}">
                                <button class="btn btn-primary btn-ml">Show All Exam Committee Billing List</button>
                              </a>
                          <h2 class="card-title">Exam Committee Billing Updated</h2>
                          
                          <form class="forms-sample" method="post" s action="{{URL::to('update_examcommitteebilling/'.$data->id)}}" enctype="multipart/form-data" style="width:100%; font-size: 15px;">
                            @method('put')
                            {{csrf_field()}}
                              <div class="form-group">
                                <label for="exampleInputPassword1">Select Department</label>
                                <select class="form-control p-input" name="depart">
                                  <option>--select department--</option>
                                  @foreach($departs as $depart)
                                  <option @if($depart->id==$data->dept_id) selected @endif value="{{$depart->id}}">{{$depart->department_name}}</option>
                                  @endforeach
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Select Department</label>
                                <select class="form-control p-input" name="degre">
                                  <option>--select degree--</option>
                                  @foreach($degres as $degre)
                                  <option @if($degre->id==$data->deg_id) selected @endif value="{{$degre->id}}">{{$degre->degree_name}}</option>
                                  @endforeach
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Semester</label>
                                <select class="form-control p-input" name="semester">
                                  <option @if($data->semester==1) selected @endif value="1">1st</option>
                                  <option @if($data->semester==2) selected @endif value="2">2nd</option>
                                  <option @if($data->semester==3) selected @endif value="3">3rd</option>
                                  <option @if($data->semester==4) selected @endif value="4">4th</option>
                                  <option @if($data->semester==5) selected @endif value="5">5th</option>
                                </select>
                              </div>
                               <div class="form-group">
                                <label for="exampleInputPassword1">Year</label>
                                <select class="form-control p-input" name="year">
                                  <option @if($data->year==1) selected @endif value="1">1st</option>
                                  <option @if($data->year==2) selected @endif value="2">2nd</option>
                                  <option @if($data->year==3) selected @endif value="3">3rd</option>
                                  <option @if($data->year==4) selected @endif value="4">4th</option>
                                  <option @if($data->year==5) selected @endif value="5">5th</option>
                                </select>
                              </div>
                               <div class="form-group">
                                <label for="exampleInputPassword1">Exam Year</label>
                                <select class="form-control p-input" name="exam_year">
                                  <option @if($data->exam_year==1) selected @endif value="1">2013</option>
                                  <option @if($data->exam_year==2) selected @endif value="2">2014</option>
                                  <option @if($data->exam_year==3) selected @endif value="3">2015</option>
                                  <option @if($data->exam_year==4) selected @endif value="4">2016</option>
                                  <option @if($data->exam_year==5) selected @endif value="5">2017</option>
                                  <option @if($data->exam_year==6) selected @endif value="6">2018</option>
                                  <option @if($data->exam_year==7) selected @endif value="7">2019</option>
                                  <option @if($data->exam_year==8) selected @endif value="8">2020</option>
                                  <option @if($data->exam_year==9) selected @endif value="9">2021</option>
                                  <option @if($data->exam_year==10) selected @endif value="10">2022</option>
                                  <option @if($data->exam_year==11) selected @endif value="11">2023</option>
                                  <option @if($data->exam_year==12) selected @endif value="12">2024</option>
                                  <option @if($data->exam_year==13) selected @endif value="13">2025</option>
                                  <option @if($data->exam_year==14) selected @endif value="14">2026</option>
                                  <option @if($data->exam_year==15) selected @endif value="15">2027</option>
                                  <option @if($data->exam_year==16) selected @endif value="16">2028</option>
                                  <option @if($data->exam_year==17) selected @endif value="17">2029</option>
                                  <option @if($data->exam_year==18) selected @endif value="18">2030</option>
                                </select>
                              </div>
                             
                              <div class="form-group">
                                <label for="exampleInputPassword1">Admission Year</label>
                                <select class="form-control p-input" name="addmission_year">
                                  <option @if($data->addmission_year==1) selected @endif value="1">2012-2013</option>
                                  <option @if($data->addmission_year==2) selected @endif value="2">2013-2014</option>
                                  <option @if($data->addmission_year==3) selected @endif value="3">2014-2015</option>
                                  <option @if($data->addmission_year==4) selected @endif value="4">2015-2016</option>
                                  <option @if($data->addmission_year==5) selected @endif value="5">2016-2017</option>
                                  <option @if($data->addmission_year==6) selected @endif value="6">2017-2018</option>
                                  <option @if($data->addmission_year==7) selected @endif value="7">2018-2019</option>
                                  <option @if($data->addmission_year==8) selected @endif value="8">2019-2020</option>
                                  <option @if($data->addmission_year==9) selected @endif value="9">2020-2021</option>
                                  <option @if($data->addmission_year==10) selected @endif value="10">2021-2022</option>
                                  <option @if($data->addmission_year==11) selected @endif value="11">2022-2023</option>
                                  <option @if($data->addmission_year==12) selected @endif value="12">2023-2024</option>
                                  <option @if($data->addmission_year==13) selected @endif value="13">2024-2025</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Academic Year</label>
                                <select class="form-control p-input" name="academic_year">
                                  <option @if($data->academic_year==1) selected @endif value="1">2012-2013</option>
                                  <option @if($data->academic_year==2) selected @endif value="2">2013-2014</option>
                                  <option @if($data->academic_year==3) selected @endif value="3">2014-2015</option>
                                  <option @if($data->academic_year==4) selected @endif value="4">2015-2016</option>
                                  <option @if($data->academic_year==5) selected @endif value="5">2016-2017</option>
                                  <option @if($data->academic_year==6) selected @endif value="6">2017-2018</option>
                                  <option @if($data->academic_year==7) selected @endif value="7">2018-2019</option>
                                  <option @if($data->academic_year==8) selected @endif value="8">2019-2020</option>
                                  <option @if($data->academic_year==9) selected @endif value="9">2020-2021</option>
                                  <option @if($data->academic_year==10) selected @endif value="10">2021-2022</option>
                                  <option @if($data->academic_year==11) selected @endif value="11">2022-2023</option>
                                  <option @if($data->academic_year==12) selected @endif value="12">2023-2024</option>
                                  <option @if($data->academic_year==13) selected @endif value="13">2024-2025</option>
                                </select>
                              </div>
                              
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Exam Start Date</label>
                                  <input type="date" class="form-control p-input" name="exam_start_date"
                                  value="{{$data->exam_start_date}}" aria-describedby="emailHelp" >
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Exam End Date</label>
                                  <input type="date" class="form-control p-input" name="exam_end_date"
                                  value="{{$data->exam_end_date}}" aria-describedby="emailHelp" >
                              </div>
                            <div class="form-group">
                            <label for="versityname">Varsity Name:</label>
                           <input type="text" name="versityname" value="{{$data->versityname}}" class="form-control" placeholder="versity name">
                            </div>
                             
                              <div class="form-group">
                                <label for="exampleInputPassword1">Status</label>
                                <select class="form-control p-input" name="staff_status">
                                  <option @if($data->staff_status==1) selected @endif value="1">Active</option>
                                  <option @if($data->staff_status==2) selected @endif value="2">Inactive</option>
                                </select>
                              </div>
                              
                              <div class="card-footer">
                              <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                          </form>
                      </div>
                      <footer>
  <p>Copyright &copy;2024: Designed By <span>Md. Alamin Gazi</span> <br>
  <a href="md.alamingazi190@gmail.com">md.alamingazi190@gmail.com</a></p>
</footer>
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

