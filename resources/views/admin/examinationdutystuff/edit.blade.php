<!-- Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
  <form method="post" action=""  id="updateexaminationdutystuffForm">
   @csrf
   <input type="hidden" id="up_id">

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateModalLabel">Update Examination Duty Stuff</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="errMsgContainer"></div>
      <div class="errMsgContainer"></div>
      
    <div class="form-group">
    <label for="exampleInputPassword1">Stuff Name:</label>
    <select class="form-control p-input" name="staf" id="up_staf">
      @foreach($staffs as $staff)
      <option @if($staff->staf_id==$staff->id) selected @endif value="{{$staff->id}}">{{$staff->staff_name}}</option>
      @endforeach
                                            
    </select>
</div>
      <div class="form-group">
        <label for="designation">Stuff Designation</label>
        <input type="text" name="up_designation" id="up_designation" class="form-control" placeholder="Stuff Designation" readonly>
      </div>
      <div class="form-group">
        <label for="department">Stuff Department</label>
        <input type="text" name="up_department" id="up_department" class="form-control" placeholder="Stuff Department" readonly>
      </div>
      <div class="form-group">
        <label for="address">Stuff Address</label>
        <input type="text" name="up_address" id="up_address" class="form-control" placeholder="Stuff Address" readonly>
      </div>
      <div class="form-group">
        <label for="numberofexam">No.of Total Exam</label>
        <input type="number" name="up_numberofexam" id="up_numberofexam" class="form-control" placeholder="No.of total exam">
      </div>
      <div class="form-group">
        <label for="examdutycarriedout">Exam Duty Carried Out</label>
        <input type="number" name="up_examdutycarriedout" id="up_examdutycarriedout" class="form-control" placeholder="exam duty carried out">
      </div>
      <div class="form-group">
        <label for="examdutycarriedout">Hours</label>
        <input type="number" name="up_hours" id="up_hours" class="form-control" placeholder="hours">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary update_examinationdutystuff">Update Examination Duty Stuff</button>
      </div>
    </div>
  </div>
</form>
</div>