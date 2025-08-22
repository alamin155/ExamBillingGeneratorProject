<table class="table table-bordered " style="border: 2px;width:1060px;">
                    <thead >
                      <tr >
                          
                          <th>Department Name</th>
                          <th>Department Status</th>
                          <th>Action</th>
                          <th>Created Time</th>
                          <th>Show</th>
                          <th>Delete</th>
                          <th>Update</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if($data)
                      @foreach($data as $d)
                      <tr>
                          
                          <td>{{$d->department_name}}</td>
                          <td>
                            @if($d->department_status==1) Active @else Inactive @endif</td>
                            <td>
                            <div class="form-check form-switch">
                            @if($d->department_status==1)
                            <input type="checkbox" class="form-check-input" id="flexSwitchCheckChecked" checked>
                            @elseif($d->department_status==2)
                            <input type="checkbox" class="form-check-input" id="flexSwitchCheckDefault">
                          </div>
                            @endif
                            <td>{{$d->created_at}}</td>

                          <td>  
                            <a href="{{url('department/'.$d->id.'/show')}}"><button  class="btn btn-primary btn-sm" id="delete" onclick="confirmation(event)">Show</button></a> 
                          </td>
                          <td>  
                            <a href="{{url('department/'.$d->id.'/delete')}}"><button  class="btn btn-danger btn-sm" id="delete" onclick="confirmation(event)">delete</button></a> 
                          </td>
                          <td>
                            <a href="{{url('department/'.$d->id.'/edit')}}"><button  class="btn btn-success btn-sm deleteStudentBtn">Update</button></a>
                          </td>
                      </tr>
                      @endforeach
                      @endif
                    
                    </tbody>
                  </table>
                