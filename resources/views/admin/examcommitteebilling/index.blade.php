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
      width: 325px;
      margin-left:20px ;
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
      height: 70px;
      width: 100%;
      background-color: #1FC981;
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
      background-color: #1FC981;
    }
    .overlay::after{
      border-radius: 0 25px 0 0;
      background-color: #FFF;
    }
.menu-title{
  color: #FFFFFF;
  font-size: 18px;
}
#mySidebar{
  border: 4px solid #A8D08D;
}
footer {
  text-align: center;
  padding: 3px;
  background-color: black;
  color: white;
  width: 1070px;
  margin-left: 265px;
}
footer p{
  color: white;
}
footer p a {
  color: white;
}
  </style>
<body>
  @include('usernave')
      <div class="container " style=" margin-left:265px; width:1070px; background:#e7e6e6;; border: 2px solid #A8D08D">
              
      @if(Session::has('msg'))
      <h2 class="text-danger">{{session('msg')}}</h2>
      @endif
              <h1 class="" style="text-align:center;">All Exam Committee Billing List</h1>
              <div class="" style="width:210px; margin: 15px;">
                      <a href="{{URL::to('examcommitteebilling/create')}}"><button  class="btn btn-primary btn-lg ">Add Exam Billing Committee</button></a> 
                    </div>
                  <div class="row"> 
                  @if($data)
                  @foreach($data as $d)
                  <div class="card" style="margin-bottom: 20px;">
                    <div class="image-content">
                      <span class="overlay"><h4 style="margin-left:35px;">{{$d->versityname}}</h4></span>
                    <div class="card-image"><img class="card-img" >
                    </div>
                  </div>
                    <div class="card-content" style="margin-top: 25px;">
                   <h4>Department: {{$d->department->department_name}}</h4>
                   <h4>Degree: {{$d->degree->degree_name}}</h4>
                   <h5>Semester: @if($d->semester == 1 ) 
                            1st 
                            @elseif($d->semester == 2) 
                            2nd 
                            @elseif($d->semester == 3) 
                            3rd 
                            @elseif($d->semester == 4) 
                            4th 
                            @else 
                            5th
                            @endif </h5>
                            <h5>Year: @if($d->year == 1 ) 
                            1st 
                            @elseif($d->year == 2) 
                            2nd 
                            @elseif($d->year == 3) 
                            3rd 
                            @elseif($d->year == 4) 
                            4th 
                            @else 
                            5th
                            @endif </h5>
                            <h5>Exam Year: @if($d->exam_year == 1 ) 
                            2013 
                            @elseif($d->exam_year == 2) 
                            2014 
                            @elseif($d->exam_year == 3) 
                            2015
                            @elseif($d->exam_year == 4) 
                            2016 
                            @elseif($d->exam_year == 5) 
                            2017
                            @elseif($d->exam_year == 6) 
                            2018
                            @elseif($d->exam_year == 7) 
                            2019
                            @elseif($d->exam_year == 8) 
                            2020
                            @elseif($d->exam_year == 9) 
                            2021
                            @elseif($d->exam_year == 10) 
                            2022
                            @elseif($d->exam_year == 11) 
                            2023  
                            @elseif($d->exam_year == 12) 
                            2024  
                            @elseif($d->exam_year == 13) 
                            2025 
                            @elseif($d->exam_year == 14) 
                            2026 
                            @elseif($d->exam_year == 15) 
                            2027 
                            @elseif($d->exam_year == 16) 
                            2028  
                            @elseif($d->exam_year == 17) 
                            2029  
                            @else 
                            2030
                            @endif </h5>
                            <h5>Addmission Year: @if($d->addmission_year == 1 ) 
                            2012-2013 
                            @elseif($d->addmission_year == 2) 
                            2013-2014 
                            @elseif($d->addmission_year == 3) 
                            2014-2015
                            @elseif($d->addmission_year == 4) 
                            2015-2016 
                            @elseif($d->addmission_year == 5) 
                            2016-2017
                            @elseif($d->addmission_year == 6) 
                            2017-2018
                            @elseif($d->addmission_year == 7) 
                            2018-2019
                            @elseif($d->addmission_year == 8) 
                            2019-2020
                            @elseif($d->addmission_year == 9) 
                            2020-2021
                            @elseif($d->addmission_year == 10) 
                            2021-2022
                            @elseif($d->addmission_year == 11) 
                            2022-2023  
                            @elseif($d->addmission_year == 12) 
                            2023-2024   
                            @else 
                            2024-2025
                            @endif </h5>
                            <h5>Academic Year: @if($d->academic_year == 1 ) 
                            2012-2013 
                            @elseif($d->academic_year == 2) 
                            2013-2014 
                            @elseif($d->academic_year == 3) 
                            2014-2015
                            @elseif($d->academic_year == 4) 
                            2015-2016 
                            @elseif($d->academic_year == 5) 
                            2016-2017
                            @elseif($d->academic_year == 6) 
                            2017-2018
                            @elseif($d->academic_year == 7) 
                            2018-2019
                            @elseif($d->academic_year == 8) 
                            2019-2020
                            @elseif($d->academic_year == 9) 
                            2020-2021
                            @elseif($d->academic_year == 10) 
                            2021-2022
                            @elseif($d->academic_year == 11) 
                            2022-2023  
                            @elseif($d->academic_year == 12) 
                            2023-2024   
                            @else 
                            2024-2025
                            @endif</h5>
                            <h5>Exam Start Date:{{$d->exam_start_date}}</h5>
                            <h5>Exam End Date:{{$d->exam_end_date}}</h5>
                   <h4>Created Time:{{$d->created_at}}</h4>
                   <td style="margin-left: 20px;">  
                            <a href="{{url('examcommitteebilling/'.$d->id.'/show')}}"><button  class="btn btn-primary btn-lm" id="delete" onclick="confirmation(event)">View</button></a> 
                          </td>

                          <td >  
                            <a href="{{url('examcommitteebilling/'.$d->id.'/delete')}}"><button  class="btn btn-danger btn-lm">delete</button></a> 
                          </td>
                          <td>
                            <a href="{{url('examcommitteebilling/'.$d->id.'/edit')}}"><button  class="btn btn-success btn-lm deleteStudentBtn">Update</button></a>
                          </td>
                    </div>
                  </div>
                  @endforeach
                  @endif
                 </div>
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

