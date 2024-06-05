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
    .hed1{
      text-align: center;
    }
    .hed2{
      text-align: center;
    }
  </style>
  </head>
  <body>
    @foreach($exambillings as $key=>$d)
    <div class="container"><h2 class="hed1">{{$d->department->department_name}}</br>
{{$d->versityname}}</h2>
<h4 class="hed1">Description of Work of Semester Final Examination<br>
{{$d->degree->degree_name}}.(Engg) @if($d->year == 1 ) 
                            1<sup>st</sup> 
                            @elseif($d->year == 2) 
                            2<sup>nd</sup>
                            @elseif($d->year == 3) 
                            3<sup>rd</sup>
                            @elseif($d->year == 4) 
                            4<sup>th
                            </sup> 
                            @else 
                            5<sup>th</sup>
                            @endif Year @if($d->semester == 1 ) 
                            1<sup>st</sup> 
                            @elseif($d->semester == 2) 
                            2<sup>nd</sup>
                            @elseif($d->semester == 3) 
                            3<sup>rd</sup> 
                            @elseif($d->semester == 4) 
                            4<sup>th</sup>
                            @else 
                            5<sup>th</sup>
                            @endif Semester Examination-                            @if($d->exam_year == 1 ) 
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
                            @endif </h4>
</div>
<div class="div1"><h6 class="card-title text-center"> 
Admission Year:@if($d->addmission_year == 1 ) 
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
                            @endif
</br>
Exam Start:{{$d->exam_start_date}}
@endforeach
</div>
<div class="div2"><h6 class="card-title text-center">Academic Year:                             @if($d->academic_year == 1 ) 
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
                            @endif 
<br>
Exam End: {{$d->exam_end_date}} </h6></div>


    <div class="content-wraper">
    <h3 class="card-title " style="margin-left: 30px;">1.Examiantion Committee</h3>
     <table class="table" style="border:2px solid; margin-left: 30px; width: 650px;">
        <thead>
        <tr style="border:1px solid;">
        <th style="border:1px solid;">SL.</th>
        <th style="border:1px solid;">Teacher Name</th>
        <th style="border:1px solid;">Designation & Address</th>
        <th style="border:1px solid;">Remarks</th>
        </tr>
        </thead>
        <tbody>
        @foreach($committees as $key=>$d)
                         <tr style="border:1px solid;">  
                       <th style="border:1px solid;">{{$key+1}}</th>
                       <td style="border:1px solid;">{{$d->teacher->teacher_name}}</td>
                       <td style="border:1px solid;">{{$d->teacher->teacher_designation}},{{$d->teacher->department->department_name}},{{$d->teacher->teacher_address}}</td>
                        <td style="border:1px solid;">{{$d->remark->remark_title}}</td>
                      </tr>
                    @endforeach      
        </tbody>
    </table>
      <h3 class="card-title" style="margin-left: 30px;">2.Moderation Committee</h3>
      <table  class="table" style="border:2px solid;margin-left: 30px;width: 650px;">
        <thead>
        <tr style="border:1px solid;">
        <th style="border:1px solid;">SL</th>
        <th style="border:1px solid;">Name</th>
        <th style="border:1px solid;">Designation & Address</th>
        <th style="border:1px solid;">Remarks</th>
        </tr>
        </thead>
        <tbody>
        @foreach($moderations as $key=>$d)
                        <tr style="border:1px solid;">  
                       <th style="border:1px solid;">{{$key+1}}</th>
                       <td style="border:1px solid;" >{{$d->teacher->teacher_name}}</td>
                       <td style="border:1px solid;">{{$d->teacher->teacher_designation}},{{$d->teacher->department->department_name}},{{$d->teacher->teacher_address}}</td>
                        <td style="border:1px solid;">{{$d->remark->remark_title}}</td>
  
                      </tr>
                    @endforeach       
      </tbody>
      </table>
      <h3 class="card-title" style="margin-left: 30px;">3.Question Paper Setter (Internal)</h3>
      <table  class="table" style="border:2px solid;margin-left: 30px;width: 650px;">
        <thead>
        <tr style="border:1px solid;">
        <th style="border:1px solid;">SL</th>
        <th style="border:1px solid;">Course Code</th>
        <th style="border:1px solid;">Quantity</th>
        <th style="border:1px solid;">Name &Designation</th>
        </tr>
        </thead>
        <tbody>
        @foreach($questionpaperinternals as $key=>$d)
                         <tr style="border:1px solid;">  
                       <th style="border:1px solid;">{{$key+1}}</th>
                       <td style="border:1px solid;">{{$d->course->course_code}}</td>
                       <td style="border:1px solid;">{{$key=1}}</td>
                       <td style="border:1px solid;">{{$d->teacher->teacher_name}},{{$d->teacher->teacher_designation}},{{$d->teacher->department->department_name}} </br>{{$d->teacher->teacher_address}}</td>
                      </tr>
                    @endforeach      
      </tbody>
      </table>
      <h3 class="card-title" style="margin-left: 30px;">4.Question Paper Setter (External)</h3>
      <table  class="table table-bordered" style="border:2px solid;margin-left: 30px;width: 650px;">
        <thead>
        <tr style="border:1px solid;">
        <th style="border:1px solid;">SL</th>
        <th style="border:1px solid;">Course Code</th>
        <th style="border:1px solid;">Quantity</th>
        <th style="border:1px solid;">Name &Designation</th>
        </tr>
        </thead>
        <tbody>
        @foreach($questionpapersetterexternals as $key=>$d)
                      <tr style="border:1px solid;">  
                       <th style="border:1px solid;">{{$key+1}}</th>
                       <td style="border:1px solid;">{{$d->course->course_code}}</td>
                       <td style="border:1px solid;">{{$key=1}}</td>
                       <td style="border:1px solid;">{{$d->teacher->teacher_name}},{{$d->teacher->teacher_designation}},{{$d->teacher->department->department_name}},{{$d->teacher->teacher_address}}</td>
                      </tr>
                    @endforeach   
      </tbody>
      </table>
      <h3 class="card-title" style="margin-left: 30px;">5.Examining Answer Scripts</h3>
      <table  class="table table-bordered" style="border:2px solid;margin-left: 30px;width: 650px;">
        <thead>
        <tr style="border:1px solid;">
        <th style="border:1px solid;">SL.</th>
        <th style="border:1px solid;">Course Code</th>
        <th style="border:1px solid;">Name of Teacher & Designation</th>
        <th style="border:1px solid;">No. of Scripts</th>
        </tr>
        </thead>
        <tbody>
        @foreach($examininganswerscripts as $key=>$d)
                         <tr style="border:1px solid;">  
                       <th style="border:1px solid;">{{$key+1}}</th>
                       <td style="border:1px solid;">{{$d->course->course_code}}</td>
                       <td style="border:1px solid;">{{$d->questionpaperinternal->teacher->teacher_name}},{{$d->questionpaperinternal->teacher->teacher_designation}},{{$d->questionpaperinternal->teacher->department->department_name}},{{$d->questionpaperinternal->teacher->teacher_address}}</br>
                        {{$d->questionpapersetterexternal->teacher->teacher_name}},{{$d->questionpapersetterexternal->teacher->teacher_designation}},{{$d->questionpapersetterexternal->teacher->department->department_name}},{{$d->questionpapersetterexternal->teacher->teacher_address}}
                       </td>
                       <td style="border:1px solid;">{{$d->noscript}}</td>
                      </tr>
                    @endforeach 
      </tbody>
      </table>
      <h3 class="card-title" style="margin-left: 30px;">6.Third examination Scripts</h3>
      <table  class="table table-bordered" style="border:2px solid;margin-left: 30px;width: 650px;">
        <thead>
        <tr style="border:1px solid;">
        <th style="border:1px solid;">SL.</th>
        <th style="border:1px solid;">Course Code</th>
        <th style="border:1px solid;">Name of Teacher</th>
        <th style="border:1px solid;">Designation</th>
        <th style="border:1px solid;">No. of Scripts</th>
        </tr>
        </thead>
        <tbody>
        @foreach($thirdexaminationscripts as $key=>$d)
                      <tr style="border:1px solid;">  
                       <th style="border:1px solid;">{{$key+1}}</th>
                       <td style="border:1px solid;">{{$d->course->course_code}}</td>
                       <td style="border:1px solid;">{{$d->teacher->teacher_name}}</td>
                       <td style="border:1px solid;">{{$d->teacher->teacher_designation}},{{$d->teacher->department->department_name}},{{$d->teacher->teacher_address}}</td>
                       <td style="border:1px solid;">{{$d->noscript}}</td>
                      </tr>
                    @endforeach
      </tbody>
      </table>
      <h3 class="card-title" style="margin-left: 30px;">7.Class Tests</h3>
      <table  class="table table-bordered" style="border:2px solid;margin-left: 30px;width: 650px;">
        <thead>
        <tr style="border:1px solid;">
        <th style="border:1px solid;">SL.</th>
        <th style="border:1px solid;">Course Code</th>
        <th style="border:1px solid;">Name and Designation</th>
        <th style="border:1px solid;">No. of Class Test</th>
        <th style="border:1px solid;">No. of Students</th>
        </tr>
        </thead>
        <tbody>
       @foreach($classtests as $key=>$d)
                         
                      <tr style="border:1px solid;"> 
                       <th style="border:1px solid;">{{$key+1}}</th>
                       <td style="border:1px solid;">{{$d->course->course_code}}</td>
                       <td style="border:1px solid;">{{$d->teacher->teacher_name}},{{$d->teacher->teacher_designation}},{{$d->teacher->department->department_name}},{{$d->teacher->teacher_address}}</td>
                       <td style="border:1px solid;">{{$d->classtest}}</td>
                       <td style="border:1px solid;">{{$d->student}}</td>
                    
                      </tr>
                    
                    @endforeach  
      </tbody>
      </table>
      <h3 class="card-title" style="margin-left: 30px;">8.Laboratory Exam Teachers</h3>
      <table class="table table-bordered" style="border:2px solid;margin-left: 30px;width: 650px;">
        <thead>
        <tr style="border:1px solid;">
        <th style="border:1px solid;">SL.</th>
        <th style="border:1px solid;">Course Code</th>
        <th style="border:1px solid;">Name and Designation</th>
        <th style="border:1px solid;">No. of Days</th>
        <th style="border:1px solid;">No. of Students</th>
        </tr>
        </thead>
        <tbody>
       @foreach($laboratoryexamteachers->groupBy('cous_id') as $courseId => $courseData)
    <tr style="border:1px solid;">
        <th style="border:1px solid;">{{ $loop->index + 1 }}</th>
        <td style="border:1px solid;">{{ $courseData->first()->course->course_code }}</td>
            <td style="border:1px solid;">@foreach($courseData as $d)
                {{ $d->teacher->teacher_name }},
                {{ $d->teacher->teacher_designation }},
                {{ $d->teacher->department->department_name }},
                {{ $d->teacher->teacher_address }}
                @if (!$loop->last)
                    <br>
                @endif
            @endforeach</td>
            <td style="border:1px solid;">{{ $d->numberofday }}</td>
            <td style="border:1px solid;">{{ $d->student }}</td>
          </tr>
          @endforeach 
      </tbody>
      </table>
      <h3 class="card-title" style="margin-left: 30px;">9.Laboratory (Lab Attendant & Lab Technician)</h3>
      <table class="table table-bordered" style="border:2px solid;margin-left: 30px;width: 650px;">
        <thead>
        <tr style="border:1px solid;">
        <th style="border:1px solid;">SL.</th>
        <th style="border:1px solid;">Course Code</th>
        <th style="border:1px solid;">Name and Designation</th>
        <th style="border:1px solid;">No. of Days</th>
        </tr>
        </thead>
        <tbody>
       @foreach($laboratoryexamlabattendantlabtechnicians->groupBy('cous_id') as $courseId => $courseData)
    <tr style="border:1px solid;">
        <td style="border:1px solid;">{{ $loop->index + 1 }}</td>
        <td style="border:1px solid;">{{ $courseData->first()->course->course_code }}</td>
            <td style="border:1px solid;">@foreach($courseData as $d)
                {{ $d->staff->staff_name }},
                {{ $d->staff->staff_designation }},
                {{ $d->staff->department->department_name }},
                {{ $d->staff->staff_address }}
                @if (!$loop->last)
                    <br>
                @endif
            @endforeach</td>
            <td style="border:1px solid;">{{ $d->numberofday }}</td>
          </tr>
          @endforeach 
      </tbody>
      </table>
      <h3 class="card-title" style="margin-left: 30px;">10.Question Typing & Publishing</h3>
      <table  class="table table-bordered" style="border:2px solid;margin-left: 30px;width: 650px;">
        <thead>
        <tr style="border:1px solid;">
        <th style="border:1px solid;">SL.</th>
        <th style="border:1px solid;">Name of Teacher & Designation</th>
        <th style="border:1px solid;">No. of Questions</th>
        <th style="border:1px solid;">No. of Pages</th>
        </tr>
        </thead>
        <tbody>
        @foreach($questiontypingpublishings as $key=>$d)
        <tr style="border:1px solid;"> 
                       <th style="border:1px solid;">{{$key+1}}</th>
                       <td style="border:1px solid;">{{$d->teacher->teacher_name}},{{$d->teacher->teacher_designation}},{{$d->teacher->department->department_name}},{{$d->teacher->teacher_address}}</td>
                       <td style="border:1px solid;">{{$d->numberofquestion}}</td>
                       <td style="border:1px solid;">{{$d->numberofpage}}</td>
          </tr>
          @endforeach 
      </tbody>
      </table>
      <h3 class="card-title" style="margin-left: 30px;">11.Examination Duty(Teachers)</h3>
      <table  class="table table-bordered" style="border:2px solid;margin-left: 30px;width: 650px;">
        <thead>
        <tr style="border:1px solid;">
           <th style="border:1px solid;">SL.</th>
            <th style="border:1px solid;">Name of Teacher and Designation</th>
            <th style="border:1px solid;">No. of Total Exam</th>
            <th style="border:1px solid;">Exam Duty Carried Out</th>
            <th style="border:1px solid;">Invigilation</th>
            <th style="border:1px solid;">Hours</th>
        </tr>
        </thead>
        <tbody>
        @foreach($examinationdutyteachers as $key=>$d)
                      <tr style="border:1px solid;"> 
                       <th style="border:1px solid;">{{ $loop->index + 1 }}</th>
                       <td style="border:1px solid;">{{$d->teacher->teacher_name}},{{$d->teacher->teacher_designation}},{{$d->teacher->department->department_name}},{{$d->teacher->teacher_address}}</td>
                       <td style="border:1px solid;">{{$d->numberofexam}}</td>
                       <td style="border:1px solid;">{{$d->examdutycarriedout}}</td>
                       <td style="border:1px solid;">
                            @if($d->invigilation==1) Cheif Invigilation @else Invigilation @endif</td>
                       <td style="border:1px solid;">{{$d->hours}}</td>
          </tr>
          @endforeach 
      </tbody>
      </table>
      <h3 class="card-title" style="margin-left: 30px;">12.Examination Duty(Stuff)</h3>
      <table  class="table table-bordered" style="border:2px solid;margin-left: 30px;width: 650px;">
        <thead>
        <tr style="border:1px solid;">
             <th style="border:1px solid;">SL.</th>
            <th style="border:1px solid;">Name and Designation</th>
            <th style="border:1px solid;">No. of Total Exam</th>
            <th style="border:1px solid;">Exam Duty Carried Out</th>
            <th style="border:1px solid;">Hours</th>
        </tr>
        </thead>
        <tbody>
          @foreach($examinationdutystuffs as $key=>$d)
                      <tr style="border:1px solid;"> 
                       <th style="border:1px solid;">{{$key+1}}</th>
                       <td style="border:1px solid;">{{$d->staff->staff_name}},{{$d->staff->staff_designation}},{{$d->staff->department->department_name}},{{$d->staff->staff_address}}</td>
                       <td style="border:1px solid;">{{$d->numberofexam}}</td>
                       <td style="border:1px solid;">{{$d->examdutycarriedout}}</td>
                       <td style="border:1px solid;">{{$d->hours}}</td>
                    
                      </tr>
                    
                    @endforeach  
      </tbody>
      </table>
      <h3 class="card-title" style="margin-left: 30px;">13.Tabulation</h3>
      <table  class="table table-bordered" style="border:2px solid;margin-left: 30px;width: 650px;">
        <thead>
        <tr style="border:1px solid;">
          <th style="border:1px solid;">SL.</th>
          <th style="border:1px solid;">Name of Teacher and Designation</th>
          <th style="border:1px solid;">No. of Students</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tabulations as $key=>$d)
                      <tr style="border:1px solid;"> 
                       <th style="border:1px solid;">{{$key+1}}</th>
                       <td style="border:1px solid;">{{$d->teacher->teacher_name}},{{$d->teacher->teacher_designation}},{{$d->teacher->department->department_name}},{{$d->teacher->teacher_address}}</td>
                       <td style="border:1px solid;">{{$d->numberofstudent}}</td>
                    
                      </tr>
                    
                    @endforeach  
      </tbody>
      </table>
            <h3 class="card-title" style="margin-left: 30px;">14.Scrutinize</h3>
      <table class="table table-bordered" style="border:2px solid;margin-left: 30px;width: 650px;">
        <thead>
        <tr style="border:1px solid;">
          <th style="border:1px solid;">SL.</th>
          <th style="border:1px solid;">Name of Teacher and Designation</th>
          <th style="border:1px solid;">No. of Students</th>
        </tr>
        </thead>
        <tbody>
        @foreach($scrutinizes as $key=>$d)
                      <tr style="border:1px solid;"> 
                       <th style="border:1px solid;">{{$key+1}}</th>
                       <td style="border:1px solid;">{{$d->teacher->teacher_name}},{{$d->teacher->teacher_designation}},{{$d->teacher->department->department_name}},{{$d->teacher->teacher_address}}</td>
                       <td style="border:1px solid;">{{$d->numberofstudent}}</td>
                    
                      </tr>
                    
                    @endforeach  
      </tbody>
      </table>
            <h3 class="card-title" style="margin-left: 30px;">15.Verification of Results</h3>
      <table  class="table table-bordered" style="border:2px solid;margin-left: 30px;width: 650px;">
        <thead>
        <tr style="border:1px solid;">
          <th style="border:1px solid;">SL.</th>
          <th style="border:1px solid;">Name of Teacher and Designation</th>
          <th style="border:1px solid;">No. of Students</th>
        </tr>
        </thead>
        <tbody>
        @foreach($verificationofresults as $key=>$d)
                      <tr style="border:1px solid;"> 
                       <th style="border:1px solid;">{{$key+1}}</th>
                       <td style="border:1px solid;">{{$d->teacher->teacher_name}},{{$d->teacher->teacher_designation}},{{$d->teacher->department->department_name}},{{$d->teacher->teacher_address}}</td>
                       <td style="border:1px solid;">{{$d->numberofstudent}}</td>
                    
                      </tr>
                    
                    @endforeach  
      </tbody>
      </table>
      </div>
      <div class="card" style="margin-left:100px; margin-top: 40px;">
        <p><u>Prepared By:</u></p>
        Chairman:
      </br>
        @foreach($prepareds as $key=>$d)
        <p>{{$d->teacher->teacher_name}}</p>
        @endforeach
         @foreach($exambillings as $key=>$d)
         <p>{{$d->name}}
         {{$d->designation}}
         @if($d->year == 1 ) 
                            1<sup>st</sup> Year
                            @elseif($d->year == 2) 
                            2<sup>nd</sup> Year
                            @elseif($d->year == 3) 
                            3<sup>rd</sup> Year
                            @elseif($d->year == 4) 
                            4<sup>th</sup> Year
                            @else 
                            5<sup>th</sup> Year
                            @endif @if($d->semester == 1 ) 
                            1<sup>st</sup> semester
                            @elseif($d->semester == 2) 
                            2<sup>nd</sup> semester
                            @elseif($d->semester == 3) 
                            3<sup>rd</sup> semester
                            @elseif($d->semester == 4) 
                            4<sup>th</sup> semester
                            @else 
                            5<sup>th</sup> semester
                            @endif Admission Session:@if($d->addmission_year == 1 ) 
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
                            @endif</br>{{$d->department->department_name}}</br> {{$d->versityname}}</p>
         @endforeach
      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>