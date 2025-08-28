<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true" style="margin-top: 60px;">
  <form method="post" action=""  id="addexamininganswerscriptForm">
   @csrf
  <div class="modal-dialog">
    <div class="modal-content" style="width:700px;">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel">Add Examining Answerscript</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="errMsgContainer"></div>
      <div class="errMsgContainer"></div>
      <div class="form-group">
     <label for="exampleInputPassword1">Course Code</label>
    <select class="form-control p-input" name="cous" id="cous">
    <option>--select Course Code--</option> 
   @foreach($couse as $cous)
  <option  value="{{$cous->id}}">{{$cous->course_code}}</option>
    @endforeach
    </select>
    </div>
    
    <div style="float:left; padding-left:20px; width: 300px;">
      <div class="form-group">
     <label for="exampleInputPassword1">Internal Teacher Name:</label>
    <select class="form-control"  name="internal" id="internal">
    <option>--Select Teacher--</option>
   @php
    $uniqueInternals = $internals->unique('tech_id');
@endphp

@foreach($uniqueInternals as $internal)
    <option  
        data-item_des="{{ $internal->teacher->teacher_designation }}" 
        data-item_dep="{{ $internal->teacher->department->department_name }}" 
        data-item_add="{{ $internal->teacher->teacher_address }}" 
        value="{{ $internal->id }}">
        {{ $internal->teacher->teacher_name }}
    </option>
@endforeach
    </select>
    </div>
      <div class="form-group">
        <label for="designation">Teacher Designation</label>
        <input type="text" name="designation" id="designation" class="form-control" placeholder="Teacher Designation" readonly value="">
      </div>
      <div class="form-group">
        <label for="department">Teacher Department</label>
        <input type="text" name="department" id="department" class="form-control" placeholder="Teacher Department" readonly value="">
      </div>
      <div class="form-group">
        <label for="address">Teacher Address</label>
        <input type="text" name="address" id="address" class="form-control" placeholder="Teacher Address" readonly value="">
      </div>
    </div>
    <div style="float:left; padding-left:20px; width: 300px;">
      <div class="form-group">
     <label for="exampleInputPassword1">Exteranl Teacher Name:</label>
    <select class="form-control"  name="external" id="external">
    <option>--Select Teacher--</option>
    @php
    $uniqueexternals = $externals->unique('tech_id');
    @endphp
   @foreach($uniqueexternals as $external)
  <option  data-item_edes="{{$external->teacher->teacher_designation}}" data-item_edep="{{$external->teacher->department->department_name}}" data-item_eadd="{{$external->teacher->teacher_address}}" value="{{$external->id}}">{{$external->teacher->teacher_name}} </option>
    @endforeach
    </select>
    </div>
      <div class="form-group">
        <label for="designation">Teacher Designation</label>
        <input type="text" name="edesignation" id="edesignation" class="form-control" placeholder="Teacher Designation" readonly value="">
      </div>
      <div class="form-group">
        <label for="department">Teacher Department</label>
        <input type="text" name="edepartment" id="edepartment" class="form-control" placeholder="Teacher Department" readonly value="">
      </div>
      <div class="form-group">
        <label for="address">Teacher Address</label>
        <input type="text" name="eaddress" id="eaddress" class="form-control" placeholder="Teacher Address" readonly value="">
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
        <button type="button" class="btn btn-primary add_examininganswerscript">Add Examining Answerscript</button>
      </div>
    </div>
  </div>
</form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


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
      
      // Set the values of designation and address fields based on the selected option's data attributes
      $('#edesignation').val(selectedOption.data('item_edes'));
      $('#edepartment').val(selectedOption.data('item_edep'));
      $('#eaddress').val(selectedOption.data('item_eadd'));
    });
  });
</script>

