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
      margin-top: 30px;
      border-radius: 25px;
      background-color: #FFF;
      width: 250px;
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
      background-color: #3BF0ED;
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
      background-color: #3BF0ED;
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
      <div class="container "  style=" margin-left:263px; width:1070px;background-color:#e7e6e6; border: 2px solid #A8D08D">
      <div class="container col-md-13 card-body" style="width:1090px" >
              
      @if(Session::has('msg'))
      <h2 class="text-danger">{{session('msg')}}</h2>
      @endif
              <h2 class="card-title" style="text-align: center;">All Courses List</h2>

                  
                  <div class="row"> 

                  @if($data)
                  @foreach($data as $d)
                  
                  <div class="card">
                    <div class="image-content">
                      <span class="overlay"><h2 style="margin-left: 60px;margin-top: 6px">{{$d->course_code}}</h2></span>
                    <div class="card-image"><img class="card-img" >
                    </div>
                  </div>
                    <div class="card-content"><h4>Course Title: {{$d->course_title}}</h4>
                   <h4>Course Credit: @if($d->course_credit == 1 ) 
                            3.00 
                            @elseif($d->course_credit == 2) 
                            2.00 
                            @elseif($d->course_credit == 3) 
                            1.50 
                            @else 
                            1.00 
                            @endif </h4>
                   <h5>Course Type:@if($d->course_type==1) Theory @else Lab @endif</h5>
                   <h4>Created Time:{{$d->created_at}}</h4>
                                             
                    </div>
                  </div>

                  @endforeach
                  @endif
                 </div>
                </div>
              </div>
              <footer style="width: 1070px;margin-left: 263px;">
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

