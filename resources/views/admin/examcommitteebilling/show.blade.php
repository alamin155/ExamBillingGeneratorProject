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
  margin-top: 20px;
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
      <div class="container " style="text-align: center; margin-left:265px; width:1075px; background-color:#e7e6e6; border: 2px solid #A8D08D">
  <div class="row row-cols-ml-4 row-cols-md-3 g-4">
  <div class="col" style="margin-top:30px; " >
    <div class="card">
    <div class="card col-ml-6" style="margin-top:20px;margin-bottom: 30px; width:260px; margin-left: 40px;">
    <a href="{{url('committee/'.$data['id'].'/show')}}" class="btn btn-success">Examination Committee</a>
  </div>
  <div class="card col-ml-6" style="margin-top:20px;margin-bottom: 30px;width:260px; margin-left: 40px;">
       <a href="{{url('moderation/'.$data['id'].'/show')}}" class="btn btn-success">Moderation Committee</a>
      </div>
      <div class="card col-ml-6" style="margin-top:20px;margin-bottom: 30px;width:260px; margin-left: 40px;">
       <a href="{{url('questiontypingpublishing/'.$data['id'].'/show')}}" class="btn btn-success">Question Typing & Publishing</a>
      </div>
      <div class="card col-ml-6" style="margin-top:20px;margin-bottom: 30px;width:260px; margin-left: 40px;">
       <a href="{{url('tabulation/'.$data['id'].'/show')}}" class="btn btn-success">Add Tabulation</a>
      </div>
      <div class="card col-ml-6"style="margin-top:20px;margin-bottom: 30px;width:260px; margin-left: 40px;">
       <a href="{{url('scrutinize/'.$data['id'].'/show')}}" class="btn btn-success">Add Scrutinize</a>
      </div>
      <div class="card col-ml-6" style="margin-top:20px;margin-bottom: 30px;width:260px; margin-left: 40px;">
       <a href="{{url('verificationofresult/'.$data['id'].'/show')}}" class="btn btn-success">Verification of Results Sheet</a>
      </div>

      <div class="card col-ml-6" style="margin-top:20px;margin-bottom: 30px;width:260px; margin-left: 40px;">
       <a href="{{url('classtest/'.$data['id'].'/show')}}" class="btn btn-success">Class Test</a>
      </div>
      <div class="card col-ml-6" style="margin-top:20px;margin-bottom: 30px;width:260px; margin-left: 40px;">
       <a href="{{url('examinationwork/'.$data['id'].'/show')}}" class="btn btn-success">Rate of Remuneration for Examination Work</a>
      </div>
    </div>
  </div>
  <div class="col" style="margin-top:30px; background-color: " >
    <div class="card h-100">
      <div class="card col-ml-6" style="margin-top:20px;margin-bottom: 30px;width:260px; margin-left: 40px;">
       <a href="{{url('questionpaperinternal/'.$data['id'].'/show')}}" class="btn btn-success">Question Paper Setter Internal</a>
      </div>
      <div class="card col-ml-6" style="margin-top:20px;margin-bottom: 30px;width:260px; margin-left: 40px;">
       <a href="{{url('questionpapersetterexternal/'.$data['id'].'/show')}}" class="btn btn-success">Question Paper Setter External</a>
      </div>
      <div class="card col-ml-6" style="margin-top:20px;margin-bottom: 30px;width:260px; margin-left: 40px;">
       <a href="{{url('examininganswerscript/'.$data['id'].'/show')}}" class="btn btn-success">Examining Answer Scripts</a>
      </div>
      <div class="card col-ml-6" style="margin-top:20px;margin-bottom: 30px;width:260px; margin-left: 40px;">
       <a href="{{url('thirdexaminationscript/'.$data['id'].'/show')}}" class="btn btn-success">Third Examination of Scripts</a>
      </div>
      <div class="card col-ml-6" style="margin-top:20px;margin-bottom: 30px;width:260px; margin-left: 40px;">
       <a href="{{url('examinationdutyteacher/'.$data['id'].'/show')}}" class="btn btn-success">Examination Duty Teachers</a>
      </div>
      <div class="card col-ml-6" style="margin-top:20px;margin-bottom: 30px;width:260px; margin-left: 40px;">
       <a href="{{url('examinationdutystuff/'.$data['id'].'/show')}}" class="btn btn-success">Examination Duty Stuff</a>
      </div>
      <div class="card col-ml-6" style="margin-top:20px;margin-bottom: 30px;width:260px; margin-left: 40px;">
       <a href="{{url('laboratoryexamteacher/'.$data['id'].'/show')}}" class="btn btn-success">Laboratory Exam Teachers</a>
      </div>
      <div class="card col-ml-6" style="margin-top:20px;margin-bottom: 30px;width:260px; margin-left: 40px;">
       <a href="{{url('document/'.$data->id.'/show')}}" class="btn btn-success">Semester Final Examination PDF</a>
      </div>
    </div>
  </div>
  <div class="col" style="margin-top:30px; background-color: " >
    <div class="card h-100">
      <div class="card col-ml-6" style="margin-top:20px;margin-bottom: 10px;width:260px; margin-left: 40px;">
       <a href="{{url('laboratoryexamlabattendantlabtechnician/'.$data['id'].'/show')}}" class="btn btn-success">Laboratory Exam Lab Attendant & Lab Technician</a>
      </div>
       <div class="card col-ml-6" style="margin-top:20px;margin-bottom: 10px;width:260px; margin-left: 40px;">
       <a href="{{url('oralexamination/'.$data['id'].'/show')}}" class="btn btn-success">Oral Examination ( Central Viva)</a>
      </div>
       <div class="card col-ml-6" style="margin-top:20px;margin-bottom: 10px;width:260px; margin-left: 40px;">
       <a href="{{url('supervisiongraduate/'.$data['id'].'/show')}}" class="btn btn-success">Supervision,Thesis/Project/Plant Design(Graduate)</a>
      </div>
       <div class="card col-ml-6" style="margin-top:20px;margin-bottom: 10px;width:260px; margin-left: 40px;">
       <a href="{{url('supervisionpostgraduate/'.$data['id'].'/show')}}" class="btn btn-success">Supervision,Thesis/Project(Post Graduate)</a>
      </div>
       <div class="card col-ml-6" style="margin-top:20px;margin-bottom: 10px;width:260px; margin-left: 40px;">
       <a href="{{url('supervisionmphilphd/'.$data['id'].'/show')}}" class="btn btn-success">Supervision,Thesis/Project(Mphil/PhD)</a>
      </div>
       <div class="card col-ml-6" style="margin-top:20px;margin-bottom: 10px;width:260px; margin-left: 40px;">
       <a href="{{url('thesisevaluation/'.$data['id'].'/show')}}" class="btn btn-success">Thesis Evaluation (Graduate/Post Graduate/Mphil/PhD)</a>
      </div>
       <div class="card col-ml-6" style="margin-top:20px;margin-bottom: 10px;width:260px; margin-left: 40px;">
       <a href="{{url('presentation/'.$data['id'].'/show')}}" class="btn btn-success">Presentation (Graduate/Post Graduate/Mphil/PhD)</a>
      </div>
      <div class="card col-ml-6" style="margin-top:20px;margin-bottom: 10px;width:260px; margin-left: 40px;">
       <a href="{{url('examinationworkpdf/'.$data['id'].'/show')}}" class="btn btn-success">Rate of Remuneration for Examination Work PDF File Download</a>
      </div>
    </div>
  </div>
</div>
  
  <div class="col-mg-15 mt-4">
    <div >
      <div class="card-body"  >
        <a href="{{URL::to('/allexamcommitteebilling')}}" class="btn btn-success btn-lg">Goto Exam Committee Billing Page</a>
        <a href="{{url('documentfile/'.$data->id.'/show')}}" class="btn btn-danger btn-lg" style="width:200px;m">Word File</a>
       <!-- <a href="{{url('download/'.$data->id.'/show')}}" class="btn btn-success btn-lg" style="width:200px;m">HTML Page</a>
      </div>
    -->

    </div>
  </div>
  <footer style="width: 1050px;">
  <p>Copyright &copy;2024: Designed By <span>Md. Alamin Gazi</span> <br>
  <a href="md.alamingazi190@gmail.com">md.alamingazi190@gmail.com</a></p>
</footer>
  </div>

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

