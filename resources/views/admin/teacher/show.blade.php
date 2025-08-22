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
   .card{
      margin-bottom: 40px;
      border-radius: 25px;
      background-color: #FFFFFF;
      width: 330px;
      margin-left:10px;
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
    background: #FFFFFF;
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
      background-color: #FFFFFF;
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
  font-size: 16px;
}
  </style>
<body>
  @include('nav')
  <div class="container col-6 card-body"  style=" margin-left:260px; width:1070px; background-color:#e7e6e6; border: 2px solid #A8D08D">
    <h3 style="text-align: center;">Only One Teacher Info</h3>
    <div class="card-title" style="margin:20px;">
<a href="{{URL::to('/addteacher')}}"><button  class="btn btn-success btn-ml deleteStudentBtn" style="size: 30px;">Show all Teacher List</button></a> 
</div> 
              <div class="row" style="margin-left:300px;"> 
                  @if($data)
                  <div class="card" >
                    <div class="image-content">
                      <span class="overlay"></span>
                    <div class="card-image"><img src="{{asset('image/'.$data->teacher_image)}} " class="card-img" >
                    </div>
                  </div>
                    <div class="card-content"><h6>Teacher Name: {{$data->teacher_name}}</h6>
                   <h6>Designation: {{$data->teacher_designation}}</h6>
                   <h6>Address: {{$data->teacher_address}}</h6>
                   <h6>Department: {{$data->department->department_name}}</h6>
                   <h6>Mobile Number: {{$data->mobile}}</h6>
                   <h6>Email: {{$data->email}}</h6>
                   <h6>Bank Account: {{$data->bankaccount}}</h6>
                   <h6>Bank Name: {{$data->bankname}}</h6>
                   <h6>Bank Received No:{{$data->receivedno}}</h6>
                   <h6>Branch Name:{{$data->Branchname}}</h6>
                   <h5>Teacher_type: @if($data->teacher_type == 1 ) 
                            Internal 
                            @elseif($d->teacher_type == 2) 
                            External
                        
                            @endif </h5>
                    </div>
                  </div>

                  @endif
                 </div>
                </div>
                </div>
                <footer style="width: 1070px;margin-left: 260px;">
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

