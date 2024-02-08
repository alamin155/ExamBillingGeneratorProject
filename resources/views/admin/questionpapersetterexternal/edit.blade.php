<!-- Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
  <form method="post" action=""  id="updatequestionpapersetterexternalForm">
   @csrf
   <input type="hidden" id="up_id">

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateModalLabel">Question Paper Setter External</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="errMsgContainer"></div>
      <div class="errMsgContainer"></div>
      <div class="form-group">
    <label for="exampleInputPassword1">Select Course Code</label>
  
    <select class="form-control p-input" name="cous" id="up_cous">
      @foreach($couse as $cous)
      <option @if($cous->cous_id==$cous->id) selected @endif value="{{$cous->id}}">{{$cous->course_code}}</option>
      @endforeach
                                            
    </select>
</div>
      <div class="form-group">
    <label for="exampleInputPassword1">Select Teacher</label>
    <select class="form-control p-input" name="tech" id="up_tech">
      @foreach($etechs as $tech)
      <option @if($tech->tech_id==$tech->id) selected @endif value="{{$tech->id}}">{{$tech->name}}</option>
      @endforeach
                                            
    </select>
</div>
      <div class="form-group">
        <label for="designation">Teacher Designation</label>
        <input type="text" name="up_designation" id="up_designation" class="form-control" placeholder="Teacher Designation">
      </div>
      <div class="form-group">
        <label for="department">Teacher Department</label>
        <input type="text" name="up_department" id="up_department" class="form-control" placeholder="Teacher Department">
      </div>
      <div class="form-group">
        <label for="address">Teacher Address</label>
        <input type="text" name="up_address" id="up_address" class="form-control" placeholder="Teacher Address">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary update_questionpapersetterexternal">Update Question Paper Setter Internal</button>
      </div>
    </div>
  </div>
</form>
</div>