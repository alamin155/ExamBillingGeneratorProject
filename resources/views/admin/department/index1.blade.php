@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
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
   @include('usernave')
    <div class="container card"  style=" margin-left:265px; width:1065px;  background-color:#e7e6e6; border: 2px solid #A8D08D">
    <div class="container ">
       @if(Session::has('msg'))
      <h2 class="text-danger">{{session('msg')}}</h2>
      @endif
              <h1 class="card-title" style="text-align: center;">Total Number Of Department:  {{ count($data) }}</h1>

              
<input type="text" name="search" id="search" class="mb-3 form-control" placeholder="Deparment Search Here....">
                  <div class="table-data">                  
                    <table class="table table-bordered " style="border: 2px;width:1060px;">
                    <thead >
                      <tr >
                          
                          <th>Department Name</th>
                          <th>Department Status</th>
                          <th>Action</th>
                          <th>Created Time</th>
                          
                      </tr>
                    </thead>
                    <tbody>
                      @if($data)
                      @foreach($data as $d)
                      <tr>
                          
                          <td>{{$d->department_name}}</td>
                          <td>
                            @if($d->department_status==1) Active @else Inactive @endif</td>
                            <td>
                            <div class="form-check form-switch">
                            @if($d->department_status==1)
                            <input type="checkbox" class="form-check-input" id="flexSwitchCheckChecked" checked>
                            @elseif($d->department_status==2)
                            <input type="checkbox" class="form-check-input" id="flexSwitchCheckDefault">
                          </div>
                            @endif
                            <td>{{$d->created_at}}</td>

                          
                          
                      </tr>
                      @endforeach
                      @endif
                    </tbody>
                  </table>
                 
                </div>
                </div>
                </div>
                <footer style="width:1065px;margin-left: 265px;" >
  <p>Copyright &copy;2024: Designed By <span>Md. Alamin Gazi</span> <br>
  <a href="md.alamingazi190@gmail.com">md.alamingazi190@gmail.com</a></p>
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
    
    // Search functionality with AJAX
    $(document).on('keyup', '#search', function(e) {
        e.preventDefault(); // Prevent form submission on enter key
        let search_string = $(this).val(); // Get the current input value

        $.ajax({
            url: "{{route('search.department')}}", // URL to send the request
            method: 'GET', // Use GET method
            data: { search_string: search_string }, // Data to send in the request
            success: function(res) {
                if (res.status === 'nothing_found') {
                    $('.table-data').html('<span class="text-danger">Nothing found</span>');
                } else {
                    $('.table-data').html(res); // Update table data with the response
                }
            },
            error: function(xhr, status, error) {
                console.error("Error occurred: ", error); // Log any error
            }
        });
    });
</script>




</body>
</html>
@endsection

