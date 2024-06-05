<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
  <form method="post" action=""  id="addexaminationdutystuffForm">
   @csrf
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel">Add Examination Duty Stuffs</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="errMsgContainer"></div>
      <div class="errMsgContainer"></div>
      <div class="form-group">
     <label for="exampleInputPassword1">Stuff Name</label>
    <select class="form-control"  name="staf" id="staf">
    <option>--Select Stuff--</option>
   @foreach($staffs as $staff)
  <option  data-item_des="{{$staff->staff_designation}}" data-item_dep="{{$staff->department->department_name}}" data-item_add="{{$staff->staff_address}}" value="{{$staff->id}}">{{$staff->staff_name}} </option>
    @endforeach
    </select>
    </div>
      <div class="form-group">
        <label for="designation">Teacher Designation</label>
        <input type="text" name="designation" id="designation" class="form-control" placeholder="Teacher Designation" readonly value="">
      </div>
      <div class="form-group">
        <label for="department">Stuff Department</label>
        <input type="text" name="department" id="department" class="form-control" placeholder="Stuff Department" readonly value="">
      </div>
      <div class="form-group">
        <label for="address">Stuff Address</label>
        <input type="text" name="address" id="address" class="form-control" placeholder="Stuff Address" readonly value="">
      </div>
      <div class="form-group">
        <input type="hidden" name="exam" id="exam" class="form-control" value="{{$id}}" readonly>
      </div>
      <div class="form-group">
        <label for="numberofday">No. of Total Exam</label>
        <input type="number" name="numberofexam" id="numberofexam" class="form-control" placeholder="No.of total exam">
      </div>
      <div class="form-group">
        <label for="numberofday">Exam Duty Carried Out</label>
        <input type="number" name="examdutycarriedout" id="examdutycarriedout" class="form-control" placeholder="Exam duty carried out">
      </div>
       <div class="form-group">
        <label for="numberofday">Hours</label>
        <input type="number" name="hours" id="hours" class="form-control" placeholder="hours">
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary add_examinationdutystuff">Add Examination Duty Stuff</button>
      </div>
    </div>
  </div>
</form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    // On change of select option
    $('#staf').change(function() {
      // Get the selected option
      var selectedOption = $(this).find(':selected');
      
      // Set the values of designation and address fields based on the selected option's data attributes
      $('#designation').val(selectedOption.data('item_des'));
      $('#department').val(selectedOption.data('item_dep'));
      $('#address').val(selectedOption.data('item_add'));
    });
  });
</script>

