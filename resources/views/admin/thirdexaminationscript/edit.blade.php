<!-- Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
  <form method="post" action=""  id="updatethirdexaminationscriptForm">
   @csrf
   <input type="hidden" id="up_id">

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateModalLabel">Third Examination Script</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
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
    <select class="form-control p-input" name="tech" id="up_tech">
      @foreach($techs as $tech)
      <option @if($tech->tech_id==$tech->id) selected @endif value="{{$tech->id}}">{{$tech->teacher_name}}</option>
      @endforeach
                                            
    </select>
</div>
      <div class="form-group">
        <label for="designation">Teacher Designation</label>
        <input type="text" name="up_designation" id="up_designation" class="form-control" placeholder="Teacher Designation" readonly>
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
        <label for="noscript">No.of Scripts</label>
        <input type="number" name="up_noscript" id="up_noscript" class="form-control" placeholder="No.of Scripts">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary update_thirdexaminationscript">Update Third Examination Scripts</button>
      </div>
    </div>
  </div>
</form>
</div>