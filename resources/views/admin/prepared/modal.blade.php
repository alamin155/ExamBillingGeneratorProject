<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
  <form method="post" action=""  id="addpreparedForm">
   @csrf
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel">Add Leadership</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="errMsgContainer"></div>
      <div class="errMsgContainer"></div>
      <div class="form-group">
        <label for="name">Teacher Name:</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="name">
      </div>
      <div class="form-group">
        <label for="designation">Teacher Designation:</label>
        <input type="text" name="designation" id="designation" class="form-control" placeholder="designation">
      </div>
      <div class="form-group">
     <label for="exampleInputPassword1">Varsity Name:</label>
    <select class="form-control"  name="exam" id="exam">
    <option>--Select Varsity Name--</option>
   @foreach($exams as $exam)
  <option  data-item_yer="{{$exam->year}}" 
    data-item_dep="{{$exam->department->department_name}}"data-item_sem="{{$exam->semester}}" data-item_adm="{{$exam->addmission_year}}" value="{{$exam->id}}">{{$exam->versityname}} </option>
    @endforeach
    </select>
    </div>
      <div class="form-group">
        <label for="year">Exam Year</label>
        <select class="form-control p-input" name="year" id="year"readonly  >
        <option>--select year--</option>
        <option value="1">1st</option>
                                  <option value="2">2nd</option>
                                  <option value="3">3rd</option>
                                  <option value="4">4th</option>
                                  <option value="5">5th</option>
                                </select>

      </div>
      <div class="form-group">
        <label for="semester">Semester</label>
        <select class="form-control p-input" name="semester" id="semester">
                                  <option>--select Semester--</option>
                                  <option value="1">1st</option>
                                  <option value="2">2nd</option>
                                  <option value="3">3rd</option>
                                  <option value="4">4th</option>
                                  <option value="5">5th</option>
                                </select>
      </div>
      <div class="form-group">
        <label for="addmission_year">Addmission Year</label>
        <select class="form-control p-input" name="addmission_year" id="addmission_year">
                                  <option>--select addmission year--</option>
                                  <option value="1">2012-2013</option>
                                  <option value="2">2013-2014</option>
                                  <option value="3">2014-2015</option>
                                  <option value="4">2015-2016</option>
                                  <option value="5">2016-2017</option>
                                  <option value="6">2017-2018</option>
                                  <option value="7">2018-2019</option>
                                  <option value="8">2019-2020</option>
                                  <option value="9">2020-2021</option>
                                  <option value="10">2021-2022</option>
                                  <option value="11">2022-2023</option>
                                  <option value="12">2023-2024</option>
                                  <option value="13">2024-2025</option>
                                </select>
      </div>
      <div class="form-group">
        <label for="department">Department Name:</label>
        <input type="text" name="department" id="department" class="form-control" placeholder="department">
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary add_prepared">Add prepared</button>
      </div>
    </div>
  </div>
</form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    // On change of select option
    $('#exam').change(function() {
      // Get the selected option
      var selectedOption = $(this).find(':selected');
      
      // Set the values of designation and address fields based on the selected option's data attributes
      $('#year').val(selectedOption.data('item_yer'));
      $('#semester').val(selectedOption.data('item_sem'));
      $('#addmission_year').val(selectedOption.data('item_adm'));
      $('#department').val(selectedOption.data('item_dep'));
    });
  });
</script>

