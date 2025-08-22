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
   @include('nav')
    <div class="container card"  style=" margin-left:265px; width:1065px;  background-color:#e7e6e6; border: 2px solid #A8D08D">
    <div class="container ">
       @if(Session::has('msg'))
      <h2 class="text-danger">{{session('msg')}}</h2>
      @endif
              <h1 class="card-title" style="text-align: center; color:blue;">
                Number Of Users: {{ \App\Models\User::where('is_admin', 0)->count() }}
            </h1>

              

                  <div class="table-data">                  
                    <table class="table table-bordered " style="border: 2px;width:1060px;">
                    <thead >
                      <tr >
                          
                          <th>User Name</th>
                          <th>User Email</th>
                          <th>User Request Status</th>
                          <th>Request/Account Status</th>
                          <th>User Request Time</th>
                          <th>User Delete</th>
                          
                      </tr>
                    </thead>
                    <tbody>
                      @if($user)
                      @foreach($user as $d)
                      <tr>
                          
                          <td>{{$d->name}}</td>
                          <td>{{$d->email}}</td>
                            <td>
        @if($d->status==1) 
            Active 
        @else 
            pending 
        @endif
    </td>
    <td>
        <div class="form-check form-switch">
            @if($d->status == 1)
                <input type="checkbox" class="form-check-input" data-id="{{$d->id}}" checked>
            @else
                <input type="checkbox" class="form-check-input" data-id="{{$d->id}}">
            @endif
        </div>
    </td>
                            <td>{{$d->created_at}}</td>
                          
                          <td>  
                            <a href="{{url('user/'.$d->id.'/delete')}}"><button  class="btn btn-danger btn-sm" id="delete" onclick="confirmation(event)">delete</button></a> 
                          </td>
                          
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
    $(document).ready(function () {
        $('.form-check-input').on('change', function () {
            const userId = $(this).data('id');
            const status = $(this).is(':checked') ? 1 : 0;

            $.ajax({
                url: `/update-status/${userId}`,
                type: 'PATCH',
                data: {
                    status: status,
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    Swal.fire({
                        icon: 'success',
                        title: status ? 'User Login Accepted successfully!' : 'User Login Pending!',
                        showConfirmButton: true
                    }).then(() => {
                        // Reload the current page or redirect if needed
                        window.location.reload();
                        // Or use: window.location.href = '/useraccepted';
                    });
                },
                error: function () {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'An error occurred while updating the status.',
                        showConfirmButton: true
                    });
                }
            });
        });
    });
</script>





</body>
</html>
@endsection

