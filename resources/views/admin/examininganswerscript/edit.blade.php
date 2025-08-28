<!-- Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
  <form method="post" action=""  id="updateexamininganswerscriptForm">
   @csrf
   <input type="hidden" id="up_id">

  <div class="modal-dialog">
    <div class="modal-content" style="width:700px;">
      <div class="modal-header">
        <h5 class="modal-title" id="updateModalLabel">Update Examining Answerscript</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <div class="errMsgContainer"></div>
      <div class="errMsgContainer"></div>
      <div class="form-group">
    <label for="exampleInputPassword1">Course Code</label>
  
    <select class="form-control p-input" name="cous" id="up_cous">
      @foreach($couse as $cous)
      <option @if($cous->cous_id==$cous->id) selected @endif value="{{$cous->id}}">{{$cous->course_code}}</option>
      @endforeach
                                            
    </select>
</div>
    <div style="width:95%;"> 
    <div style="float:left; padding-left:20px; width: 300px;">
      <div class="form-group">
     <label for="exampleInputPassword1">External Teacher Name:</label>
    <select class="form-control p-input" name="internal" id="up_internal">
    @php
    $uniqueInternals = $internals->unique('tech_id');
    @endphp
      @foreach($uniqueInternals as $internal)
      <option @if($internal->internal_id==$internal->id) selected @endif value="{{$internal->id}}">{{$internal->teacher->teacher_name}}</option>
      @endforeach
                                            
    </select>
    </div>
      <div class="form-group">
        <label for="designation">Teacher Designation</label>
        <input type="text" name="up_designation" id="up_designation" class="form-control" placeholder="Teacher Designation" readonly value="">
      </div>
      <div class="form-group">
        <label for="department">Teacher Department</label>
        <input type="text" name="up_department" id="up_department" class="form-control" placeholder="Teacher Department" readonly value="">
      </div>
      <div class="form-group">
        <label for="address">Teacher Address</label>
        <input type="text" name="up_address" id="up_address" class="form-control" placeholder="Teacher Address" readonly value="">
      </div>
    </div>
    <div style="float:right;  width: 300px;">
      <div class="form-group">
     <label for="exampleInputPassword1">Exteranl Teacher Name:</label>
    <select class="form-control p-input" name="external" id="up_external">
      @php
    $uniqueexternals = $externals->unique('tech_id');
    @endphp
      @foreach($uniqueexternals as $external)
      <option @if($external->external_id==$external->id) selected @endif value="{{$external->id}}">{{$external->teacher->teacher_name}}</option>
      @endforeach
                                            
    </select>
    </div>
      <div class="form-group">
        <label for="designation">Teacher Designation</label>
        <input type="text" name="up_edesignation" id="up_edesignation" class="form-control" placeholder="Teacher Designation" readonly value="">
      </div>
      <div class="form-group">
        <label for="department">Teacher Department</label>
        <input type="text" name="up_edepartment" id="up_edepartment" class="form-control" placeholder="Teacher Department" readonly value="">
      </div>
      <div class="form-group">
        <label for="address">Teacher Address</label>
        <input type="text" name="up_eaddress" id="up_eaddress" class="form-control" placeholder="Teacher Address" readonly value="">
      </div>
    </div>
     <div class="form-group">
        <label for="noscript">No.of Scripts</label>
        <input type="number" name="up_noscript" id="up_noscript" class="form-control" placeholder="No.of Scripts">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary update_examininganswerscript">Update Examining Answerscript</button>
      </div>
    </div>
  </div>
</form>
</div>