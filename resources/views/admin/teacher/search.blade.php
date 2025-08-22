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
                   <td>  
                            <a href="{{url('teacher/'.$d->id.'/show')}}"><button  class="btn btn-primary btn-sm" id="delete" onclick="confirmation(event)">Show</button></a> 
                          </td>
                          <td>
                            <a href="{{url('teacher/'.$d->id.'/edit')}}"><button  class="btn btn-success btn-sm deleteStudentBtn">Update</button></a>
                          </td>
                          <td>  
                            <a href="{{url('teacher/'.$d->id.'/delete')}}"><button  class="btn btn-danger btn-sm" id="delete" onclick="confirmation(event)">delete</button></a> 
                          </td>
                    </div>
                  </div>

                  @endforeach
                  @endif
                 </div>
                </div>
                </div>
                </div>
              </div>