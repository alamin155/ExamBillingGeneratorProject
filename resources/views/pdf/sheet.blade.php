<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">

  <title>Download Sheet</title>
  <style>
    .div1{
      
      width: 50%;
      float: left;
    }
    .div2{
      width: 50%;
      float: right;
      
      
    }
  </style>
  </head>
  <body>
    <div class="container"><h2 class="card-title text-center">Department of Computer Science & Engineering
Jashore University of Science & Technology
Jessore 7408</h2></div>
<div class="container"><h4 class="card-title text-center">Description of Work of Semester Final Examination<br>
B.Sc. (Engg) 4th Year 1st Semester Examination-2023</h4></div>
<div class="div1"><h6 class="card-title text-center">Admission Year: @foreach($examcommitteebilling as $data)
<h3>
  @if($data->addmission_year==1)
        <span class="label label-success">{{'2012-2013'}}</span>
        @elseif($data->addmission_year==2)
        <span class="label label-success">{{'2021-2014'}}</span>
        @elseif($data->addmission_year==3)
        <span class="label label-success">{{'2014-2015'}}</span>
        @elseif($data->addmission_year==4)
        <span class="label label-success">{{'2015-2016'}}</span>
        @elseif($data->addmission_year==5)
        <span class="label label-success">{{'2016-2017'}}</span>
        @elseif($data->addmission_year==6)
        <span class="label label-success">{{'2017-2018'}}</span>
        @elseif($data->addmission_year==7)
        <span class="label label-success">{{'2018-2019'}}</span>
                            
        @endif
</h3></h6>
@endforeach <br>
Exam Start: 13-05– 2023 </h6></div>
<div class="div2"><h6 class="card-title text-center">Academic Year: 2018-2019 <br>
Exam Start: 13-05– 2023 </h6></div>


    <div class="content-wraper">
      <h3 class="card-title ">1.Examiantion Committee</h3>
      <table id="example" class="table table-striped  " style="width:100%;border: 2px solid black; font-size: 15px;">
        <thead>
        <tr>
        <th>SL</th>
        <th>Name</th>
        <th>Designation</th>
        <th>Address</th>
        <th>Remark</th>
        </tr>
        </thead>
        <tbody>
        @foreach($examinationcommittees as $data)
        <tr>
        <td>{{$data->examinationcommittee_sl}}</td>
        <td>{{$data->examinationcommittee_name}}</td>
        <td>{{$data->examinationcommittee_designation}}</td>
        <td>{{$data->examinationcommittee_address}}</td>
        <td>
        @if($data->examinationcommittee_remark==1)
        <span class="label label-success">{{'Chairman'}}</span>
        @elseif($data->examinationcommittee_remark==2)
        <span class="label label-success">{{'Member'}}</span>
        @elseif($data->examinationcommittee_remark==3)
        <span class="label label-success">{{'Member(External)'}}</span>
                            
        @endif
        </td>
        </tr>
        @endforeach
                    
        </tbody>
    </table>
    <h3 class="card-title">2.Moderation Committee</h3>
      <table id="example" class="table table-striped" style="width:100%;font-size:15px">
        <thead>
        <tr>
        <th>SL</th>
        <th>Name</th>
        <th>Designation</th>
        <th>Address</th>
        <th>Remark</th>
        </tr>
        </thead>
        <tbody>
        @foreach($moderationcommittees as $data)
        <tr>
        <td>{{$data->moderationcommittee_sl}}</td>
        <td>{{$data->moderationcommittee_name}}</td>
        <td>{{$data->moderationcommittee_designation}}</td>
        <td>{{$data->moderationcommittee_address}}</td>
      <td>
      @if($data->moderationcommittee_remark==1)
      <span class="label label-success">{{'Chairman'}}</span>
      @elseif($data->moderationcommittee_remark==2)
      <span class="label label-success">{{'Member'}}</span>
      @elseif($data->moderationcommittee_remark==3)
      <span class="label label-success">{{'Member(External)'}}</span>
                            
      @endif
      </td>                    
      </tr>                    
      @endforeach              
      </tbody>
      </table>
      <h3 class="card-title">3.Question Paper Setter (Internal)</h3>
      <table id="example" class="table table-striped" style="width:100%;font-size:15px">
        <thead>
        <tr>
        <th>SL</th>
        <th>Course Code</th>
        <th>Quantity</th>
        <th>Name</th>
        <th>Designation</th>
        </tr>
        </thead>
        <tbody>
                      @foreach($questionpapersetterinternals as $data)
                      <tr>
                          <td>{{$data->questionpapersetterinternal_sl}}</td>
                          <td>{{$data->questionpapersetterinternal_coursecode}}</td>
                          <td>{{$data->questionpapersetterinternal_quantity}}</td>
                          <td>{{$data->questionpapersetterinternal_name}}</td>
                          <td>{{$data->questionpapersetterinternal_designation}}</td>
                          <td>
                          </td>
                      </tr>
                      
                      @endforeach
                    
                    </tbody>

      </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>