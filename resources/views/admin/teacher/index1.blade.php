@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<title>W3 CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css" integrity="sha512-hwwdtOTYkQwW2sedIsbuP1h0mWeJe/hFOfsvNKpRB3CkRxq8EW7QMheec1Sgd8prYxGm1OM9OZcGW7/GUud5Fw==" crossorigin="anonymous" referrerpolicy="no-referrer"/>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="{{asset('node_modules/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css')}}">
  <link rel="stylesheet" href="node_modules/rickshaw/rickshaw.min.css" />
  <link rel="stylesheet" href="bower_components/chartist/dist/chartist.min.css" />
  <link rel="stylesheet" href="css/style.css">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <style type="text/css">
    .card{
      margin-top: 30px;
      border-radius: 25px;
      background-color: #FFF;
      width: 330px;
      margin-left:10px ;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
     transition: all 0.3s ease;
    }
    .card-content {
    padding: 20px;
}

.card:hover {
  transform: scale(1.05);
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}
    .card-image{
    position:relative;
    height: 150px;
    width: 150px;
    border-radius: 50%;
    background: #FFF;
    padding: 3px;
    margin-left:80px;
  }
  .card-image .card-img{
    height: 100%;
    width: 100%;
    object-fit: cover;
    border-radius:50%;
    border: 4px solid #4070F4;
  }
  .image-content,
  .card-content{
      padding: 10px 14px;
    }
  .image-content{
      position: relative;
      row-gap: 5px;
    }
    .overlay{
      position: absolute;
      left: 0;
      top: 0;
      height: 100%;
      width: 100%;
      background-color: #4070F4;
      border-radius: 25px 25px 0 25px;
    }
     .overlay::before,
    .overlay::after{
      content: '';
      position: absolute;
      right: 0;
      bottom: -40px;
      height: 40px;
      width: 40px;
      background-color: #4070F4;
    }
    .overlay::after{
      border-radius: 0 25px 0 0;
      background-color: #FFF;
    }
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
      <div class="container "  style=" margin-left:265px; width:1070px;background-color:#e7e6e6; border: 2px solid #A8D08D">
      <div class="container col-md-13 card-body" style="width:1070px" >
              
      @if(Session::has('msg'))
      <h2 class="text-danger">{{session('msg')}}</h2>
      @endif
              <h1 style="text-align: center; color:blue;">Number Of Internal Teachers  ({{ count($data->where('teacher_type', '1')) }}) and External Teachers ({{ count($data->where('teacher_type', '2')) }})</h1>
              
  <div class="row">
  <div class="col-sm-4" >
    <div class=" ">
      
      <input type="text" name="search" id="search" class="mb-3 form-control" placeholder="Teacher Search Here...." style="width:1020px;">
    </div>
  </div>
  <div class="col-sm-4">
  </div>          
  <div class="table-data">
    <div class="table">
           <div class="row"> 

                  @if($data)
                  @foreach($data as $d)
                  
                  <div class="card" >
                    <div class="image-content">
                      <span class="overlay"></span>
                    <div class="card-image"><img src="{{asset('image/'.$d->teacher_image)}} " class="card-img" >
                    </div>
                  </div>
                    <div class="card-content"><h6>Teacher Name: {{$d->teacher_name}}</h6>
                   <h6>Designation: {{$d->teacher_designation}}</h6>
                   <h6>Address: {{$d->teacher_address}}</h6>
                   <h6>Department: {{$d->department->department_name}}</h6>
                   <h6>Mobile Number: {{$d->mobile}}</h6>
                   <h6>Email: {{$d->email}}</h6>
                   <h6>Bank Account: {{$d->bankaccount}}</h6>
                   <h6>Bank Name: {{$d->bankname}}</h6>
                   <h6>Bank Received No:{{$d->receivedno}}</h6>
                   <h6>Branch Name:{{$d->Branchname}}</h6>
                   <h5>Teacher_type: @if($d->teacher_type == 1 ) 
                            Internal 
                            @elseif($d->teacher_type == 2) 
                            External
                        
                            @endif </h5>
                            
                    </div>
                  </div>

                  @endforeach
                  @endif
                 </div>
                </div>
                </div>
                </div>
              </div>
            </div>
  <footer style="width: 1080px;margin-left: 255px;">
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
  <script type="text/javascript">
    
    // Search functionality with AJAX
    $(document).on('keyup', '#search', function(e) {
        e.preventDefault(); // Prevent form submission on enter key
        let search_string = $(this).val(); // Get the current input value

        $.ajax({
            url: "{{route('search.teacher')}}", // URL to send the request
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

