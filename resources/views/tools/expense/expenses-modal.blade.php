<!-- Modal -->
<input type="hidden" value="0" id="hiddensaveup">
<div class="modal fade" id="exampleModalCenter" data-id="0" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Create Expenses</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="category">Category<span class="text-danger">*</span></label>
          <input type="text" class="form-control" id="category" placeholder="Enter Category">
        </div>
        <div class="form-group">
          <label for="amount">Amount<span class="text-danger">*</span></label>
          <input type="number" class="form-control" id="amount" placeholder="Enter Amount">
        </div>
        <div class="form-group">
          <label for="modalInputName">Expenses Date<span class="text-danger">*</span></label>
          <input type="date" class="form-control" id="expensedate" placeholder="Enter Expenses Date">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="saveandupdate" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Expenses Details -->
<div class="modal fade" id="expensesmodal" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="expensestitle">Expenses Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
          <table class="table" id="expenseslists">
            <thead>
              <tr>
                <th></th>
                <th>Category</th>
                <th>Amount</th>
                <th>Created By</th>
                <th>Date</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <!-- Dynamic content here -->
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer" style="margin: 0;">
        <div class="container">
          <div class="row">
            <div class="col">
              <div class="d-flex align-items-center">
                <button type="button" class="btn btn-primary me-2">
                  <i class="fa fa-fw fa-money me-2"></i>Total amount
                </button>
                <button type="button" class="btn btn-danger" id="totalAmount">0.00</button>
              </div>
            </div>
          </div>
        </div>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
