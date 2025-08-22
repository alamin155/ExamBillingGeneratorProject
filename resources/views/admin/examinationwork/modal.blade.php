<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
  <form method="post" action=""  id="addexaminationworkForm">
   @csrf
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel">Add Rate of Remuneration for Examination Work</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="errMsgContainer"></div>
      <div class="errMsgContainer"></div>
      <div class="form-group">
        <input type="hidden" name="exam" id="exam" class="form-control" value="{{$id}}" readonly>
      </div>
      <div class="form-group">
        <label for="numberofday">Details</label>
        <input type="text" name="details" id="details" class="form-control" placeholder="Details">
      </div>
      <div class="form-group">
        <label for="numberofday">Name and description of award sector of examination</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Name and description">
      </div>
      <div class="form-group">
        <label for="numberofday">Amount of Money</label>
        <input type="number" name="amountofmoney" id="amountofmoney" class="form-control" placeholder="Amount of Money">
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary add_examinationwork">Add Rate of Remuneration for Examination Work</button>
      </div>
    </div>
  </div>
</form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


