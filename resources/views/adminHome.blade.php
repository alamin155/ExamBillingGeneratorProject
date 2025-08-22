@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

  <style type="text/css">
    .card{
      margin-top: 10px;
      margin-bottom: 20px;
      border-radius: 25px;
      background-color: #FFF;
      width: 255px;
      height: 70px;
      margin-left:10px ;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
    }
p{
  font-size: 14px;
  color: black;
  font-style: italic;
}

.card:hover {
  transform: scale(1.02);
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}
  
 .chirman{
  clip-path: circle();
  width: 200px;
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
.row{
margin-left:240px; 
width:1100px; 
height:100%; 
background:#F6F7F7; 
border: 2px solid #A8D08D;
}

.custom-carousel-btn {
  width: 60px;
  height: 60px;
  background-color: rgba(0, 0, 0, 0.6); /* semi-transparent background */
  border-radius: 50%;
  top: 50%;
  transform: translateY(-50%);
  z-index: 10;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: background-color 0.3s ease;
}

.custom-carousel-btn:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

.custom-icon {
  color: white;
  font-size: 24px;
}

/* Optional positioning tweaks */
.carousel-control-prev {
  left: 20px;
}

.carousel-control-next {
  right: 20px;
}

  </style>
<body>


  @include('nav')
    <div class="row"style="background-color:#e7e6e6;margin-left: 263px; width: 1070px;">
  <div class="col-sm-12" >
       
  <div class="card-deck">
  <div class="card bg-primary">
    <div class="card-body text-center">
      <p>Total Number Of Teacher:{{ count($teachers ?? []) }}</p>
    </div>
  </div>
  <div class="card bg-success">
    <div class="card-body text-center">
      <p class="card-text">Total Number Of Stuff: {{ count($staffs ?? []) }}</p>
    </div>
  </div>
  <div class="card bg-warning">
    <div class="card-body text-center">
      <p class="card-text">Number Of Departments: {{ count($departments ??[]) }}</p>
    </div>
  </div>
  <div class="card bg-danger">
    <div class="card-body text-center">
      <p class="card-text">Total Number Of Course: {{ count($courses ?? []) }}</p>
    </div>
  </div>
</div>
      <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
  <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
   <!-- 
  <div class="carousel-inner">
    @php $activeSet = false; @endphp
    @foreach($teachers as $item)
        @php
            $imagePath = public_path('image/' . $item->teacher_image);
            $hasImage = $item->teacher_image && file_exists($imagePath);
        @endphp

        @if($hasImage)
            <div class="carousel-item {{ !$activeSet ? 'active' : '' }}">
                <img src="{{ asset('image/' . $item->teacher_image) }}"
                     class="d-block w-100"
                     style="height: 400px; border-radius: 90%; margin:5px"
                     alt="{{ $item->teacher_name ?? 'Teacher Image' }}">
                
                <div class="carousel-caption d-none d-md-block">
                    <h5>{{ $item->teacher_name }} ({{ $item->teacher_designation }})</h5>
                </div>
            </div>
            @php $activeSet = true; @endphp
        @endif
    @endforeach
  </div>
-->
  <!-- Controls -->
  <!-- Prev Button -->
  <!--
<button class="carousel-control-prev custom-carousel-btn" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
  <span class="custom-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
  <span class="visually-hidden">Previous</span>
</button>
-->
<!-- Next Button -->
<!--
<button class="carousel-control-next custom-carousel-btn" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
  <span class="custom-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
  <span class="visually-hidden">Next</span>
</button>
-->
<img src="{{ asset('image/We beli.png') }}"
                     class="d-block w-100"
                     style="height: 400px;">

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
