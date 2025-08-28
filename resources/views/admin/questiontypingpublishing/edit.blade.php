<!-- Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
  <form method="post" action=""  id="updatequestiontypingpublishingForm">
   @csrf
   <input type="hidden" id="up_id">

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateModalLabel">Update Question Typing & Publishing</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="errMsgContainer"></div>
      <div class="errMsgContainer"></div>
      
    <div class="form-group">
    <label for="exampleInputPassword1">Teacher Name:</label>
    <select class="form-control p-input" name="tech" id="up_tech">
      @foreach($techs as $tech)
      <option @if($tech->tech_id==$tech->id) selected @endif value="{{$tech->id}}">{{$tech->teacher_name}}</option>
      @endforeach
                                            
    </select>
</div>
      <div class="form-group">
        <label for="designation">Teacher Designation</label>
        <input type="text" name="up_designation" id="up_designation" class="form-control" placeholder="teacher Designation" readonly>
      </div>
      <div class="form-group">
        <label for="department">Teacher Department</label>
        <input type="text" name="up_department" id="up_department" class="form-control" placeholder="Teacher Department" readonly>
      </div>
      <div class="form-group">
        <label for="address">Teacher Address</label>
        <input type="text" name="up_address" id="up_address" class="form-control" placeholder="Teacher Address" readonly>
      </div>
      <div class="form-group">
        <label for="numberofquestion">No.of Questions</label>
        <input type="number" name="up_numberofquestion" id="up_numberofquestion" class="form-control" placeholder="No.of Questions">
      </div>
      <div class="form-group">
        <label for="numberofpage">No.of Pages</label>
        <input type="number" name="up_numberofpage" id="up_numberofpage" class="form-control" placeholder="No.of Pages">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary update_questiontypingpublishing">Update Question Typing & Publishing</button>
      </div>
    </div>
  </div>
</form>
</div>