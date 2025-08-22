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
  <style type="text/css">
    footer {
  text-align: center;
  padding: 3px;
  background-color: black;
  color: white;
}
.custom-table th, 
.custom-table td {
    width: 50%; /* দুই column থাকলে প্রতিটা 50% */
    text-align: center; /* text center */
    vertical-align: middle; /* উভয় টেবিলের text vertical same */
}

/* টেবিল spacing */
.card-body table {
    table-layout: fixed; /* column width fix রাখবে */
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
      <div class="container" style="margin-left:255px; width:1080px; background-color:#e7e6e6; border:2px solid #A8D08D; padding:15px;">

  <table class="table table-striped text-center custom-table">
    <thead>
        <tr>
            <th>Teacher Name</th>
            <th>Exam Bill Generator</th>
        </tr>
    </thead>
    <tbody>
        @foreach($uniqueTeachers as $item)
    <tr>
        <td>{{ $item->teacher->teacher_name ?? class_basename($item) }}</td>
        <td>
    <a href="{{ url('examinationworkpdf/teacher/'.$item->exam_id.'/'.$item->tech_id.'/show') }}">
        <button class="btn btn-primary btn-sm">Individual Bill Generator PDF</button>
    </a>
</td>
    </tr>
@endforeach
    </tbody>
</table>

<!-- Employees Table -->
<table class="table table-striped text-center custom-table">
    <thead>
        <tr>
            <th>Employee Name</th>
            <th>Exam Bill Generator</th>
        </tr>
    </thead>
    <tbody>
        @foreach($uniqueStaff as $item)
        <tr>
            <td>{{ $item->staff->staff_name ?? class_basename($item) }}</td>
            <td>
                <a href="{{ url('examinationworkpdf/staff/'.$item->exam_id.'/'.$item->staf_id.'/show') }}">
        <button class="btn btn-success btn-sm">Individual Bill Generator PDF</button>
    </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
<!-- Footer -->
<footer style="width:1080px; margin-left:255px; text-align:center; padding:3px; background-color:black; color:white;">
  <p>
    Copyright &copy;2024: Designed By <span>Md. Alamin Gazi</span><br>
    <a href="mailto:md.alamingazi190@gmail.com">md.alamingazi190@gmail.com</a>
  </p>
</footer>
                
                    
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
  <script src="{{asset('https://cdn.jsdelivr.net/npm/sweetalert2@11')}}"></script>
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

