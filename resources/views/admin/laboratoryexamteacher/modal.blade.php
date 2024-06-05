<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
  <form method="post" action=""  id="addlaboratoryexamteacherForm">
    @csrf
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addModalLabel" style="margin-left: 90px;color:black;">Add New Laboratory Exam Teacher</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="errMsgContainer">
          </div>
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
          <div class="tech-fields" style="padding: 20px;background-color:#33FFC1;margin-bottom: 5px; margin-top: 5px;">
            <div class="form-group" style="font-size: 16px;">
              <label for="exampleInputPassword1">Teacher Name</label>
              <select class="form-control"  name="tech[]" id="tech">
                <option>--Select Teacher--</option>
                @foreach($techs as $tech)
                <option  data-item_des="{{$tech->teacher_designation}}" data-item_dep="{{$tech->department->department_name}}" data-item_add="{{$tech->teacher_address}}" value="{{$tech->id}}">{{$tech->teacher_name}} </option>
                @endforeach
              </select>
            </div>
            <div class="form-group" style="font-size: 16px;">
              <label for="designation">Teacher Designation</label>
              <input type="text" name="designation[]" id="designation" class="form-control" placeholder="Teacher Designation" readonly value="">
            </div>
            <div class="form-group" style="font-size: 16px;">
              <label for="department">Teacher Department</label>
              <input type="text" name="department[]" id="department" class="form-control" placeholder="Teacher Department" readonly value="">
            </div>
            <div class="form-group" style="font-size: 16px;">
              <label for="address">Teacher Address</label>
              <input type="text" name="address[]" id="address" class="form-control" placeholder="Teacher Address" readonly value="">
            </div>
          </div>
          <button type="button" class="btn btn-primary add-tech" style="margin-left: 320px;">Add More Teacher</button>
          <div class="form-group">
            <input type="hidden" name="exam" id="exam" class="form-control" value="{{$id}}" readonly>
          </div>
          <div class="form-group">
            <label for="numberofday">No.of Days</label>
            <input type="number" name="numberofday" id="numberofday" class="form-control" placeholder="No.of days">
          </div>
          <div class="form-group">
            <label for="student">No.of Students</label>
            <input type="number" name="student" id="student" class="form-control" placeholder="No.of Students">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary add_laboratoryexamteacher">Add Laboratory Exam Teacher</button>
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
      var selectedOption = $(this).find(':selected');
      $('#designation').val(selectedOption.data('item_des'));
      $('#department').val(selectedOption.data('item_dep'));
      $('#address').val(selectedOption.data('item_add'));
    });

    // Add more teacher fields
    $('.add-tech').click(function() {
      var techFields = $('.tech-fields').first().clone();
      techFields.find('select').val('');
      techFields.find('input').val('');
      techFields.append('<button type="button" class="btn btn-danger remove-tech">Remove</button>');
      $('.tech-fields').last().after(techFields);
    });

    // Remove teacher fields
    $(document).on('click', '.remove-tech', function() {
      $(this).closest('.tech-fields').remove();
    });

    // Update Staff fields when select changes
    $(document).on('change', '.tech-fields select', function() {
      var selectedOption = $(this).find(':selected');
      var fieldsContainer = $(this).closest('.tech-fields');
      fieldsContainer.find('[name="designation[]"]').val(selectedOption.data('item_des'));
      fieldsContainer.find('[name="department[]"]').val(selectedOption.data('item_dep'));
      fieldsContainer.find('[name="address[]"]').val(selectedOption.data('item_add'));
    });
  });
</script>
