<!-- Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
  <form method="post" action=""  id="updateteacherForm">
   @csrf
   <input type="hidden" id="up_id">

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateModalLabel">Update External Teacher</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="errMsgContainer"></div>
      <div class="errMsgContainer"></div>
      <div class="form-group mt-6">
        <label for="name">Teacher Name</label>
        <input type="text" name="up_name" id="up_name" class="form-control" placeholder="Teacher Name">
      </div>
      <div class="form-group">
        <label for="designation">Teacher Designation</label>
        <input type="text" name="up_designation" id="up_designation" class="form-control" placeholder="Teacher Designation">
      </div>
      <div class="form-group">
        <label for="address">Teacher Address</label>
        <input type="text" name="up_address" id="up_address" class="form-control" placeholder="Teacher Address">
      </div>
       <div class="form-group">
        <label for="up_mobile">Teacher Mobile</label>
        <input type="text" name="up_mobile" id="up_mobile" class="form-control" placeholder="Teacher Mobile No">
      </div>
      <div class="form-group">
        <label for="email">Teacher Email</label>
        <input type="text" name="up_email" id="up_email" class="form-control" placeholder="Teacher Email">
      </div>
      <div class="form-group">
        <label for="bankname">Teacher Bank Name</label>
        <input type="text" name="up_bankname" id="up_bankname" class="form-control" placeholder="Teacher Bank Name">
      </div>
       <div class="form-group">
        <label for="bankaccount">Teacher Bank Account</label>
        <input type="text" name="up_bankaccount" id="up_bankaccount" class="form-control" placeholder="Teacher Bank Account">
      </div>
     
     <div class="form-group">
    <label for="exampleInputPassword1">Select Department</label>
  
    <select class="form-control p-input" name="depart" id="up_depart">
      @foreach($departs as $depart)
      <option @if($depart->dept_id==$depart->id) selected @endif value="{{$depart->id}}">{{$depart->department_name}}</option>
      @endforeach
                                            
    </select>
</div>
       
        <div class="form-group">
        <label for="exampleInputPassword1">Teacher Status</label>
        <select class="form-control p-input" name="up_status" id="up_status">
          <option>--select Status--</option>
          <option value="1">Active</option>
          <option value="2">Inactive</option>
          </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary update_teacher">Update External Teacher</button>
      </div>
    </div>
  </div>
</form>
</div>