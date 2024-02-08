<table class="table table-bordered">
                        <thead>
                         <tr>
                           <th>SL.</th>
                          <th>Teacher Name</th>
                          <th>Designation & Address</th>
                          <th>Remarks</th>
                          <th>Action</th>
                        
                        </tr>
                        </thead>
                        <tbody>
                         @foreach($data as $key=>$d)
                       <tr>  
                       <th>{{$key+1}}</th>
                       <td>{{$d->teacher->teacher_name}}</td>
                       <td>{{$d->designation}},{{$d->department}}</br>{{$d->address}}</td>
                        <td>{{$d->remark->remark_title}}</td>
                       <td>
                      <a href="#" class="btn btn-primary update_committee_form" 
                      data-bs-toggle="modal" 
                      data-bs-target="#updateModal"
                      data-id="{{$d->id}}"
                      data-serial="{{$d->serial}}"
                      data-designation="{{$d->designation}}"
                      data-department="{{$d->department}}"
                      data-address="{{$d->address}}"
                      data-tech="{{$d->tech_id}}"
                      data-remk="{{$d->remk_id}}"
                      >
                        <i class="las la-edit"></i></a>
                      <a href="#" class="btn btn-danger delete_committee" data-id="{{$d->id}}" >
                        <i class="las la-times"></i></a>
                     </td>
                      </tr>
                    @endforeach
                       </tbody>
                   </table>
                  {!! $data->links() !!}