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

  </style>
<body>
  @include('usernave')
     <div class="container col-6 card-body" style=" margin-left:263px; width:1055px; background-color:#e7e6e6; border: 2px solid #A8D08D">
      <div class="col-md-14 card-body" style="width:960px">
        <h2 class="my-2 text-center">All Presentation (Graduate/Post Graduate/Mphil/PhD) List</h2>
          <a href="" class="btn btn-primary my-2" data-bs-toggle="modal" data-bs-target="#addModal">Add New Presentation (Graduate/Post Graduate/Mphil/PhD)</a>
          @foreach($exams as $d)
              <a href="{{url('examcommitteebilling/'.$d->id.'/show')}} " class="btn btn-success my-2">Goto Back</a>
              @endforeach
      <div class="data-table col-md-10" style="width:1050px">
            <table class="table table-bordered" style="border: 2px;">
                        <thead>
                         <tr>
                           <th>SL.</th>
                          <th>Name of Teacher and Designation</th>
                          <th>No. of Students</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                         @foreach($data as $key=>$d)
                      <tr> 
                       <th>{{$key+1}}</th>
                       <td>{{$d->teacher->teacher_name}},{{$d->teacher->teacher_designation}},Dept. of {{$d->teacher->department->department_name}},{{$d->teacher->teacher_address}}</td>
                       <td>{{$d->numberofstudent}}</td>
                       <td>
                      <a href="#" class="btn btn-primary update_presentation_form" 
                      data-bs-toggle="modal" 
                      data-bs-target="#updateModal"
                      data-id="{{$d->id}}"
                      data-designation="{{$d->teacher->teacher_designation}}"
                      data-department="{{$d->teacher->department->department_name}}"
                      data-address="{{$d->teacher->teacher_address}}"
                      data-tech="{{$d->tech_id}}"
                      data-numberofstudent="{{$d->numberofstudent}}"
                      >
                        <i class="las la-edit"></i></a>
                      <a href="#" class="btn btn-danger delete_presentation" data-id="{{$d->id}}" >
                        <i class="las la-times"></i></a>
                     </td>
                      </tr>
                    @endforeach
                       </tbody>
                   </table>
                  
              </div>
            </div>
            <footer style="width: 1050px;">
  <p>Copyright &copy;2024: Designed By <span>Md. Alamin Gazi</span> <br>
  <a href="md.alamingazi190@gmail.com">md.alamingazi190@gmail.com</a></p>
</footer>
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
  @include('admin.presentation.modal')
  @include('admin.presentation.edit')
  @include('admin.presentation.ajax')
  {!! Toastr::message() !!}
  <!--delete message js file-->
</body>
</html>
@endsection

