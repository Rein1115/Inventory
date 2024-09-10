<!-- Modal -->
<input type="hidden" value="0" id="hiddensaveup">
<div class="modal fade" id="exampleModalCenter"  aria-hidden="true">
    
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Product Information</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
 

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="pay">Payment</label>
                        <input type="number" class="form-control" id="pay">
                      </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="paymentmethod">Payment Method</label><br>
                        <select class="form-control form-control-sm" style="width: 100%;" id="paymentmethod" name="paymentmethod">
                          <option id="Cash" value="Cash">Cash</option>
                          <option id="Gcash" value="Gcash">Gcash</option>
                          <option id="Paymaya" value="Paymaya">Paymaya</option>    
                          <option id="Paypal" value="Paypal">Paypal</option>
                          <option id="banktransfer" value="banktransfer">Bank Transfers</option>
                      </select>
                    </div>
                </div>
            </div>

            <div class="row num d-none" id="hidenum">
                <div class="col">
                    <div class="form-group">
                        <label for="serialnumber">Serial Number</label>
                        <input type="serialnumber" class="form-control" id="serialnumber" >
                      </div>
                </div>
            </div>

            <div class="row">
              <div class="col">
                  <div class="form-group">
                      <label for="serialnumber">Payment Date</label>
                      <input type="date" class="form-control" id="pay_date" >
                    </div>
              </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button class="btn btn-success" type="button" id ="btnaddup">Save</button>
        </div>
      </div>
    </div>
  </div>

  