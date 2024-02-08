<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
  <form method="post" action=""  id="addcommitteeForm">
   @csrf
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel">Add Examination Committee</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="errMsgContainer"></div>
      <div class="errMsgContainer"></div>
      <div class="form-group">
     <label for="exampleInputPassword1">Teacher Name</label>
    <select class="form-control"  name="tech" id="tech">
    <option>--Select Teacher--</option>
   @foreach($techs as $tech)
  <option  data-item_des="{{$tech->teacher_designation}}" data-item_dep="{{$tech->department->department_name}}" data-item_add="{{$tech->teacher_address}}" value="{{$tech->id}}">{{$tech->teacher_name}} </option>
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
      
      <div class="form-group">
     <label for="exampleInputPassword1">Reamrks</label>
    <select class="form-control p-input" name="remk" id="remk">
    <option>--select Remarks--</option> 
   @foreach($remks as $remk)
  <option value="{{$remk->id}}">{{$remk->remark_title}}</option>
    @endforeach
    </select>
    </div>
    <div class="form-group">
        <input type="hidden" name="exam" id="exam" class="form-control" value="{{$id}}" readonly>
      </div>
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary add_committee">Save Examination Committee</button>
      </div>
    </div>
  </div>
</form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    // On change of select option
    $('#tech').change(function() {
      // Get the selected option
      var selectedOption = $(this).find(':selected');
      
      // Set the values of designation and address fields based on the selected option's data attributes
      $('#designation').val(selectedOption.data('item_des'));
      $('#department').val(selectedOption.data('item_dep'));
      $('#address').val(selectedOption.data('item_add'));
    });
  });

</script>

