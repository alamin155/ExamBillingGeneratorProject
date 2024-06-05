<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
  <form method="post" action="" id="addlaboratoryexamlabattendantlabtechnicianForm">
    @csrf
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addModalLabel">Add New Laboratory Exam Lab Attendant Labtechnician</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="errMsgContainer"></div>
          <div class="errMsgContainer">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Course Code</label>
            <select class="form-control p-input" name="cous" id="cous">
              <option>--select Course Code--</option>
              @foreach($couse as $cous)
              <option value="{{$cous->id}}">{{$cous->course_code}}</option>
              @endforeach
            </select>
          </div>
          <div class="staf-fields"style="padding: 20px;background-color:#33FFC1;margin-bottom: 5px; margin-top: 5px;">
            <div class="form-group">
              <label for="exampleInputPassword1">Staff Name</label>
              <select class="form-control" name="staf[]" id="staf">
                <option>--Select Staff--</option>
                @foreach($staffs as $staf)
                <option data-item_des="{{$staf->staff_designation}}" data-item_dep="{{$staf->department->department_name}}" data-item_add="{{$staf->staff_address}}" value="{{$staf->id}}">{{$staf->staff_name}} </option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="designation">Staff Designation</label>
              <input type="text" name="designation[]" class="form-control designation" placeholder="Staff Designation" readonly value="">
            </div>
            <div class="form-group">
              <label for="department"> Department</label>
              <input type="text" name="department[]" class="form-control department" placeholder=" Department" readonly value="">
            </div>
            <div class="form-group">
              <label for="address">Staff Address</label>
              <input type="text" name="address[]" class="form-control address" placeholder="Staff Address" readonly value="">
            </div>
            <div class="form-group">
              <button type="button" class="btn btn-danger remove-staf">Remove</button>
            </div>
          </div>
          <button type="button" class="btn btn-success add-staf" style="margin-left: 320px;">Add More Stuffs</button>
          <div class="form-group">
            <input type="hidden" name="exam" id="exam" class="form-control" value="{{$id}}" readonly>
          </div>
          <div class="form-group">
            <label for="numberofday">No.of Days</label>
            <input type="number" name="numberofday" id="numberofday" class="form-control" placeholder="No.of days">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary add_laboratoryexamlabattendantlabtechnician">Add Laboratory Exam Lab Attendant Labtechnician</button>
        </div>
      </div>
    </div>
  </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    // On change of select option
    $(document).on('change', '.staf-fields select', function() {
      var selectedOption = $(this).find(':selected');
      var fieldsContainer = $(this).closest('.staf-fields');
      fieldsContainer.find('.designation').val(selectedOption.data('item_des'));
      fieldsContainer.find('.department').val(selectedOption.data('item_dep'));
      fieldsContainer.find('.address').val(selectedOption.data('item_add'));
    });

    // Add more teacher fields
    $('.add-staf').click(function() {
      var stafFields = $('.staf-fields').first().clone();
      stafFields.find('select').val('');
      stafFields.find('.designation, .department, .address').val('');
      stafFields.find('.remove-staf').show();
      $('.staf-fields').last().after(stafFields);
    });

    // Remove staff field
    $(document).on('click', '.remove-staf', function() {
      if ($('.staf-fields').length > 1) {
        $(this).closest('.staf-fields').remove();
      } else {
        alert('At least one staff field is required.');
      }
    });
  });
</script>
