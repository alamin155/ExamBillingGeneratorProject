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
  <link rel="stylesheet" href="{{asset('node_modules/rickshaw/rickshaw.min.css')}}" />
  <link rel="stylesheet" href="{{asset('bower_components/chartist/dist/chartist.min.css')}}" />
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
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
  font-size: 18px;
}


  </style>
<body>
@include('nav')
      <div class="container "  style=" margin-left:265px; width:1070px;  background-color:#e7e6e6; border: 2px solid #A8D08D">     
     <div class="container card col-8 ml-center " style="margin-top: 20px; background-color: khaki;">
      @if($errors->any())
      @foreach($errors->all() as $error)
      <p class="text-danger">{{$error}}</p>
      @endforeach
      @endif
      @if(Session::has('msg'))
      <h3 class="text-success">{{session('msg')}}</h3>
      @endif
      <a href="{{URL::to('/alldepartment')}}">
                                <button class="btn btn-primary btn-lg">Show All Department List</button>
                              </a>
                          <h2 class="card-title" style="text-align:center;">Department Add List</h2>
                          
                          <form class="forms-sample" method="post" action="{{URL::to('department/strore')}}" enctype="multipart/form-data" style="width:100%;font-size: 15px;">
                            {{csrf_field()}}
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Department Name</label>
                                  <input type="text" class="form-control p-input" name="department_name" aria-describedby="emailHelp">
                              </div>
                             
                              <div class="form-group">
                                <label for="exampleInputPassword1">Department Status</label>
                                <select class="form-control p-input" name="department_status">
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
<footer style="width: 1070px; margin-top: 10px;margin-left: 265px;">
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
     
</body>
</html>
@endsection

