<!-- Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
  <form method="post" action=""  id="updatelaboratoryexamlabattendantlabtechnicianForm">
   @csrf
   <input type="hidden" id="up_id">

  <div class="modal-dialog">
    <div class="modal-content" style="width: 525px;margin-top: 80px;">
      <div class="modal-header">
        <h5 class="modal-title" id="updateModalLabel">Update Laboratory Exam Lab Attendant Labtechnician</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" >
        <div class="errMsgContainer"></div>
      <div class="errMsgContainer"></div>
      <div class="form-group">
    <label for="exampleInputPassword1">Course Code:</label>
  
    <select class="form-control p-input" name="cous" id="up_cous">
      @foreach($couse as $cous)
      <option @if($cous->cous_id==$cous->id) selected @endif value="{{$cous->id}}">{{$cous->course_code}}</option>
      @endforeach
                                            
    </select>
</div>
      <div class="form-group">
    <label for="exampleInputPassword1">Teacher Name:</label>
    <select class="form-control p-input" name="staf" id="up_staf">
      @foreach($staffs as $staf)
      <option @if($staf->staf_id==$staf->id) selected @endif value="{{$staf->id}}">{{$staf->staff_name}}</option>
      @endforeach
                                            
    </select>
</div>
      <div class="form-group">
        <label for="designation">Staff Designation</label>
        <input type="text" name="up_designation" id="up_designation" class="form-control" placeholder="staff Designation" readonly>
      </div>
      <div class="form-group">
        <label for="department">Department</label>
        <input type="text" name="up_department" id="up_department" class="form-control" placeholder="Department" readonly>
      </div>
      <div class="form-group">
        <label for="address">Staff Address</label>
        <input type="text" name="up_address" id="up_address" class="form-control" placeholder="Staff Address" readonly>
      </div>
      <div class="form-group">
        <label for="numberofday">No.of Days</label>
        <input type="number" name="up_numberofday" id="up_numberofday" class="form-control" placeholder="No.of days">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary update_update_laboratoryexamlabattendantlabtechnician">Update Laboratory Exam Lab Attendant Labtechnician</button>
      </div>
    </div>
  </div>
</form>
</div>