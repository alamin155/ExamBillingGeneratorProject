<!-- Modal -->
<div class="modal fade"  id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
  <form method="post" action="" id="addexamininganswerscriptForm">
   @csrf
  <div class="modal-dialog">
    <div class="modal-content" style="width:700px;">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel">Save New Examining Answer Scripts</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="errMsgContainer"></div>
      <div class="errMsgContainer"></div>
      
      <div class="form-group">
     <label for="exampleInputPassword1">Course Code</label>
    <select class="form-control p-input"  name="cous" id="cous">
    <option>--select Course Code--</option> 
  @foreach($courses as $course )
  <option 
   data-item_name="{{$course->teacher->teacher_name}}"
   data-item_ename="{{$course->name}}"
   data-item_des="{{$course->teacher->teacher_designation}}"
   data-item_dep="{{$course->teacher->department->department_name}}"
   data-item_edep="{{$course->department}}"
   data-item_edes="{{$course->designation}}"
   data-item_add=" {{$course->teacher->teacher_address}}"
   data-item_eadd="{{$course->address}}" 
   value="{{$course->id}}">{{$course->course->course_code}}</option>
    @endforeach
    </select>
    </div>
      <div style="width:95%;"> 
    <div style="float:left; padding-left:20px; width: 300px;">
      <div class="form-group">
     <label for="exampleInputPassword1">Internal Teacher Name</label>
    <select class="form-control"   name="internal" id="internal">
    <option >--Select Internalteacher--</option>
   @foreach($internals as $internal)
  <option data-item_des="{{$internal->designation}}" data-item_dep="{{$internal->department}}" data-item_add=" {{$internal->address}}" value="{{$course->id}}" >{{$internal->teacher->teacher_name}} </option>
  
    @endforeach
    </select>
    </div>
      <div class="form-group">
        <label for="designation">Internal Teacher Designation</label>
        <input type="text" name="designation" id="designation" class="form-control" placeholder="Teacher Designation" readonly value="">
      </div>
      <div class="form-group">
        <label for="department">Internal Teacher Department</label>
        <input type="text" name="department" id="department" class="form-control" placeholder="Teacher Department" readonly value="">
      </div>
      <div class="form-group">
        <label for="address">Internal Teacher Address</label>
        <input type="text" name="address" id="address" class="form-control" placeholder="Teacher Address" readonly value="">
      </div>
    </div> 
    <div style="float:right; width: 300px;">
      <div class="form-group">
     <label for="exampleInputPassword1">External Teacher Name</label>
    <select class="form-control"  name="external" id="external">
    <option >--Select  Externalteacher--</option>
   @foreach($externals as $external)
  <option data-item_edes="{{$external->designation}}" data-item_edep="{{$external->department}}" data-item_eadd="{{$external->externalteacher->address}}" value="{{$course->id}}">{{$external->externalteacher->name}} </option>
    @endforeach
    </select>
    </div>
      <div class="form-group">
        <label for="designation">External Teacher Designation</label>
        <input type="text" name="edesignation" id="edesignation" class="form-control" placeholder="Teacher Designation" readonly value="">
      </div>
      <div class="form-group">
        <label for="department">External Teacher Department</label>
        <input type="text" name="edepartment" id="edepartment" class="form-control" placeholder="Teacher Department" readonly value="">
      </div>
      <div class="form-group">
        <label for="address">External Teacher Address</label>
        <input type="text" name="eaddress" id="eaddress" class="form-control" placeholder="Teacher Address" readonly value="">
      </div>
    </div>
    </div> 
      <div class="form-group">
        <label for="noscript">No.of Scripts</label>
        <input type="number" name="noscript" id="noscript" class="form-control" placeholder="No.of Scripts">
      </div>
      <div class="form-group">
        <input type="hidden" name="exam" id="exam" class="form-control" value="{{$id}}" readonly>
      </div>
      </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary add_examininganswerscript">Save Examining Answer Scripts</button>
      
  </div>
</form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
  // On change of select option for course code
  $('#cous').change(function() {
    var selectedOption = $(this).find(':selected');

    // Internal Teacher
    $('#internal').val(selectedOption.data('item_name'));
    $('#designation').val(selectedOption.data('item_des'));
    $('#department').val(selectedOption.data('item_dep'));
    $('#address').val(selectedOption.data('item_add'));
    
    // External Teacher
    $('#external').val(selectedOption.data('item_ename'));
    $('#edesignation').val(selectedOption.data('item_edes'));
    $('#edepartment').val(selectedOption.data('item_edep'));
    $('#eaddress').val(selectedOption.data('item_eadd'));
  });
});

</script>
<script>
  $(document).ready(function() {
    // On change of select option
    $('#internal').change(function() {
      // Get the selected option
      var selectedOption = $(this).find(':selected');
      
      // Set the values of designation and address fields based on the selected option's data attributes
      $('#designation').val(selectedOption.data('item_des'));
      
      $('#department').val(selectedOption.data('item_dep'));
      $('#address').val(selectedOption.data('item_add'));
    });
  });
</script>
<script>
  $(document).ready(function() {
    // On change of select option
    $('#external').change(function() {
      // Get the selected option
      var selectedOption = $(this).find(':selected');
      // Set the values of designation and address fields based on the selected option's data attribute
      $('#edesignation').val(selectedOption.data('item_edes'));
      $('#edepartment').val(selectedOption.data('item_edep'));
      $('#eaddress').val(selectedOption.data('item_eadd'));
    });
  });
</script>

