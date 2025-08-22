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
    .content-wrapper {
    display: flex;
    justify-content: space-between;
    margin: 20px 0;
}
    .div1{
      
      
      float: left;
      margin-left: 120px;
      
      
    }
    .div2{
      
      float: right;
      margin-right: 120px;
      
      
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
    @if($committees->isNotEmpty())
     <table class="table" style="border:2px solid; margin-left: 30px; width: 650px;">
      <caption style="font-size: 20px; margin-left:30px;color:black;"><b>Examiantion Committee</b></caption>
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
    @endif
    @if($moderations->isNotEmpty())
      <table  class="table" style="border:2px solid;margin-left: 30px;width: 650px;">
        <caption style="font-size: 20px; margin-left:30px;color:black;"><b>Moderation Committee</b></caption>
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
      @endif
      @if($questionpaperinternals->isNotEmpty())
      <table  class="table" style="border:2px solid;margin-left: 30px;width: 650px;">
        <caption style="font-size: 20px; margin-left:30px;color:black;"><b>Question Paper Setter (Internal)</b></caption>
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
      @endif
      @if($questionpapersetterexternals->isNotEmpty())
      <table  class="table table-bordered" style="border:2px solid;margin-left: 30px;width: 650px;">
        <caption style="font-size: 20px; margin-left:30px;color:black;"><b>Question Paper Setter (External)</b></caption>
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
      @endif
      @if($examininganswerscripts->isNotEmpty())
      <table  class="table table-bordered" style="border:2px solid;margin-left: 30px;width: 650px;">
        <caption style="font-size: 20px; margin-left:30px;color:black;"><b>Examining Answer Scripts</b></caption>
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
      @endif
      @if($thirdexaminationscripts->isNotEmpty())
      <table  class="table table-bordered" style="border:2px solid;margin-left: 30px;width: 650px;">
        <caption style="font-size: 20px; margin-left:30px;color:black;"><b>Third examination Scripts</b></caption>
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
      @endif
      @if($classtests->isNotEmpty())
      <table class="table table-bordered" style="border:2px solid;margin-left: 30px;width: 650px;">
        <caption style="font-size: 20px; margin-left:30px;color:black;"><b>Class Tests</b></caption>
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
      @endif
      @if($laboratoryexamteachers->isNotEmpty())
      <table class="table table-bordered" style="border:2px solid;margin-left: 30px;width: 650px;">
         <caption style="font-size: 20px; margin-left:30px;color:black;"><b>Laboratory Exam Teachers</b></caption>
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
      @endif
      @if($laboratoryexamlabattendantlabtechnicians->isNotEmpty())
      <table class="table table-bordered" style="border:2px solid;margin-left: 30px;width: 650px;">
        <caption style="font-size: 20px; margin-left:30px;color:black;"><b>Laboratory (Lab Attendant & Lab Technician)</b></caption>
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
      @endif
      @if($questiontypingpublishings->isNotEmpty())
      <table  class="table table-bordered" style="border:2px solid;margin-left: 30px;width: 650px;">
        <caption style="font-size: 20px; margin-left:30px;color:black;"><b>Question Typing & Publishing</b></caption>
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
      @endif
      @if($examinationdutyteachers->isNotEmpty())
      <table  class="table table-bordered" style="border:2px solid;margin-left: 30px;width: 650px;">
        <caption style="font-size: 20px; margin-left:30px;color:black;"><b>Examination Duty(Teachers)</b></caption>
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
      @endif
      @if($examinationdutystuffs->isNotEmpty())
      <table  class="table table-bordered" style="border:2px solid;margin-left: 30px;width: 650px;">
        <caption style="font-size: 20px; margin-left:30px;color:black;"><b>Examination Duty(Stuff)</b></caption>
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
      @endif
      @if($tabulations->isNotEmpty())
    <table class="table table-bordered" style="border:2px solid; margin-left: 30px; width: 650px;">
        <caption style="font-size: 20px; margin-left:30px;color:black;"><b>Tabulation</b></caption>
        <thead>
            <tr style="border:1px solid;">
                <th style="border:1px solid;">SL.</th>
                <th style="border:1px solid;">Name of Teacher and Designation</th>
                <th style="border:1px solid;">No. of Students</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tabulations as $key => $d)
                <tr style="border:1px solid;">
                    <th style="border:1px solid;">{{$key + 1}}</th>
                    <td style="border:1px solid;">
                        {{$d->teacher->teacher_name}},
                        {{$d->teacher->teacher_designation}},
                        {{$d->teacher->department->department_name}},
                        {{$d->teacher->teacher_address}}
                    </td>
                    <td style="border:1px solid;">{{$d->numberofstudent}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif
      @if($scrutinizes->isNotEmpty())
      <table class="table table-bordered" style="border:2px solid;margin-left: 30px;width: 650px;">
        <caption style="font-size: 20px; margin-left:30px;color:black;"><b>Scrutinize</b></caption>
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
      @endif
      @if($oralexaminations->isNotEmpty())
      <table class="table table-bordered" style="border:2px solid;margin-left: 30px;width: 650px;">
        <caption style="font-size: 20px; margin-left:30px;color:black;"><b>Oral Examination (Central Viva)</b></caption>
        <thead>
        <tr style="border:1px solid;">
          <th style="border:1px solid;">SL.</th>
          <th style="border:1px solid;">Name of Teacher and Designation</th>
          <th style="border:1px solid;">No. of Students</th>
        </tr>
        </thead>
        <tbody>
          
        @foreach($oralexaminations as $key=>$d)
                      <tr style="border:1px solid;"> 
                       <th style="border:1px solid;">{{$key+1}}</th>
                       <td style="border:1px solid;">{{$d->teacher->teacher_name}},{{$d->teacher->teacher_designation}},{{$d->teacher->department->department_name}},{{$d->teacher->teacher_address}}</td>
                       <td style="border:1px solid;">{{$d->numberofstudent}}</td>
                    
                      </tr>
                    
                    @endforeach  
      </tbody>
      </table>
      @endif
      
      @if($supervisiongraduates->isNotEmpty())
      <table class="table table-bordered" style="border:2px solid;margin-left: 30px;width: 650px;">
        <caption style="font-size: 20px; margin-left:30px;color:black;"><b>Supervision Thesis/Project/Plant Design (Graduate)</b></caption>
        <thead>
        <tr style="border:1px solid;">
          <th style="border:1px solid;">SL.</th>
          <th style="border:1px solid;">Name of Teacher and Designation</th>
          <th style="border:1px solid;">No. of Students</th>
        </tr>
        </thead>
        <tbody>
          
        @foreach($supervisiongraduates as $key=>$d)
                      <tr style="border:1px solid;"> 
                       <th style="border:1px solid;">{{$key+1}}</th>
                       <td style="border:1px solid;">{{$d->teacher->teacher_name}},{{$d->teacher->teacher_designation}},{{$d->teacher->department->department_name}},{{$d->teacher->teacher_address}}</td>
                       <td style="border:1px solid;">{{$d->numberofstudent}}</td>
                    
                      </tr>
                    
                    @endforeach  
      </tbody>
      </table>
      @endif
            @if($supervisionpostgraduates->isNotEmpty())
      <table class="table table-bordered" style="border:2px solid;margin-left: 30px;width: 650px;">
        <caption style="font-size: 20px; margin-left:30px;color:black;"><b>Supervision Thesis/Project (Post Graduate)</b></caption>
        <thead>
        <tr style="border:1px solid;">
          <th style="border:1px solid;">SL.</th>
          <th style="border:1px solid;">Name of Teacher and Designation</th>
          <th style="border:1px solid;">No. of Students</th>
        </tr>
        </thead>
        <tbody>
          
        @foreach($supervisionpostgraduates as $key=>$d)
                      <tr style="border:1px solid;"> 
                       <th style="border:1px solid;">{{$key+1}}</th>
                       <td style="border:1px solid;">{{$d->teacher->teacher_name}},{{$d->teacher->teacher_designation}},{{$d->teacher->department->department_name}},{{$d->teacher->teacher_address}}</td>
                       <td style="border:1px solid;">{{$d->numberofstudent}}</td>
                    
                      </tr>
                    
                    @endforeach  
      </tbody>
      </table>
      @endif
            @if($supervisionmphilphds->isNotEmpty())
      <table class="table table-bordered" style="border:2px solid;margin-left: 30px;width: 650px;">
        <caption style="font-size: 20px; margin-left:30px;color:black;"><b>Supervision Thesis/Project (Mphil/PhD)</b></caption>
        <thead>
        <tr style="border:1px solid;">
          <th style="border:1px solid;">SL.</th>
          <th style="border:1px solid;">Name of Teacher and Designation</th>
          <th style="border:1px solid;">No. of Students</th>
        </tr>
        </thead>
        <tbody>
          
        @foreach($supervisionmphilphds as $key=>$d)
                      <tr style="border:1px solid;"> 
                       <th style="border:1px solid;">{{$key+1}}</th>
                       <td style="border:1px solid;">{{$d->teacher->teacher_name}},{{$d->teacher->teacher_designation}},{{$d->teacher->department->department_name}},{{$d->teacher->teacher_address}}</td>
                       <td style="border:1px solid;">{{$d->numberofstudent}}</td>
                    
                      </tr>
                    
                    @endforeach  
      </tbody>
      </table>
      @endif
            @if($thesisevaluations->isNotEmpty())
      <table class="table table-bordered" style="border:2px solid;margin-left: 30px;width: 650px;">
        <caption style="font-size: 20px; margin-left:30px;color:black;"><b>Thesis Evaluations (Graduate/Post Graduate/Mphil/PhD)</b></caption>
        <thead>
        <tr style="border:1px solid;">
          <th style="border:1px solid;">SL.</th>
          <th style="border:1px solid;">Name of Teacher and Designation</th>
          <th style="border:1px solid;">No. of Students</th>
        </tr>
        </thead>
        <tbody>
          
        @foreach($thesisevaluations as $key=>$d)
                      <tr style="border:1px solid;"> 
                       <th style="border:1px solid;">{{$key+1}}</th>
                       <td style="border:1px solid;">{{$d->teacher->teacher_name}},{{$d->teacher->teacher_designation}},{{$d->teacher->department->department_name}},{{$d->teacher->teacher_address}}</td>
                       <td style="border:1px solid;">{{$d->numberofstudent}}</td>
                    
                      </tr>
                    
                    @endforeach  
      </tbody>
      </table>
      @endif
            @if($presentations->isNotEmpty())
      <table class="table table-bordered" style="border:2px solid;margin-left: 30px;width: 650px;">
        <caption style="font-size: 20px; margin-left:30px;color:black;"><b>Presentation (Graduate/Post Graduate/Mphil/PhD)</b></caption>
        <thead>
        <tr style="border:1px solid;">
          <th style="border:1px solid;">SL.</th>
          <th style="border:1px solid;">Name of Teacher and Designation</th>
          <th style="border:1px solid;">No. of Students</th>
        </tr>
        </thead>
        <tbody>
          
        @foreach($presentations as $key=>$d)
                      <tr style="border:1px solid;"> 
                       <th style="border:1px solid;">{{$key+1}}</th>
                       <td style="border:1px solid;">{{$d->teacher->teacher_name}},{{$d->teacher->teacher_designation}},{{$d->teacher->department->department_name}},{{$d->teacher->teacher_address}}</td>
                       <td style="border:1px solid;">{{$d->numberofstudent}}</td>
                    
                      </tr>
                    
                    @endforeach  
      </tbody>
      </table>
      @endif

      @if($verificationofresults->isNotEmpty())
      <table  class="table table-bordered" style="border:2px solid;margin-left: 30px;width: 650px;">
        <caption style="font-size: 20px; margin-left:30px;color:black;"><b>Verification of Results</b></caption>
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
      @endif
                  </div>
                  <div class="" style="margin-left:50px; margin-top: 30px;">
        <h5><u>Prepared By</u></h5>
        @foreach($prepareds as $key=>$d)
        <p>({{$d->teacher->teacher_name}})</br>Chairman</br>Examination Committee </br>
        @endforeach
         @foreach($exambillings as $key=>$d)
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
                            @endif</br>Department of {{$d->department->department_name}}</br> {{$d->versityname}}</p>
         @endforeach
      </div>
      </tbody>
      </table>
      </div>
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>