<!-- Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
  <form method="post" action=""  id="updateexaminationworkForm">
   @csrf
   <input type="hidden" id="up_id">

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateModalLabel">Update Rate of Remuneration for Examination Work</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="errMsgContainer"></div>
      <div class="errMsgContainer"></div>
      <div class="form-group">
        <label for="numberofexam">Details</label>
        <input type="text" name="up_details" id="up_details" class="form-control" placeholder="Details">
      </div>
      <div class="form-group">
        <label for="examdutycarriedout">Name and description of award sector of examination</label>
        <input type="text" name="up_name" id="up_name" class="form-control" placeholder="Name and description of award sector of examination">
      </div>
      <div class="form-group">
        <label for="examdutycarriedout">Amount of Money</label>
        <input type="number" name="up_amountofmoney" id="up_amountofmoney" class="form-control" placeholder="Amount of Money">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary update_examinationwork">Update Rate of Remuneration for Examination Work</button>
      </div>
    </div>
  </div>
</form>
</div>