<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
  <form method="post" action=""  id="addteacherForm">
   @csrf
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel">Add External Teacher</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="errMsgContainer"></div>
      <div class="errMsgContainer"></div>
      <div class="form-group mt-6">
        <label for="name">Teacher Name</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Teacher Name">
      </div>
      <div class="form-group">
        <label for="designation">Teacher Designation</label>
        <input type="text" name="designation" id="designation" class="form-control" placeholder="Teacher Designation">
      </div>
      <div class="form-group">
        <label for="address">Teacher Address</label>
        <input type="text" name="address" id="address" class="form-control" placeholder="Teacher Address">
      </div>
       <div class="form-group">
        <label for="mobile">Teacher Mobile</label>
        <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Teacher Mobile No">
      </div>
      <div class="form-group">
        <label for="email">Teacher Email</label>
        <input type="text" name="email" id="email" class="form-control" placeholder="Teacher Email">
      </div>
      <div class="form-group">
        <label for="bankname">Teacher Bank Name</label>
        <input type="text" name="bankname" id="bankname" class="form-control" placeholder="Teacher Bank Name">
      </div>
       <div class="form-group">
        <label for="bankaccount">Teacher Bank Account</label>
        <input type="text" name="bankaccount" id="bankaccount" class="form-control" placeholder="Teacher Bank Account">
      </div>
     
     <div class="form-group">
                                <label for="exampleInputPassword1">Select Department</label>
                                <select class="form-control p-input" name="depart" id="depart">
                                  <option>--select department--</option>
                                  @foreach($departs as $depart)
                                  <option value="{{$depart->id}}">{{$depart->department_name}}</option>
                                  @endforeach
                                </select>
                              </div>
       
        <div class="form-group">
        <label for="exampleInputPassword1">Teacher Status</label>
        <select class="form-control p-input" name="status" id="status">
          <option>--select Status--</option>
          <option value="1">Active</option>
          <option value="2">Inactive</option>
          </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary add_teacher">Save Teacher</button>
      </div>
    </div>
  </div>
</form>
</div>