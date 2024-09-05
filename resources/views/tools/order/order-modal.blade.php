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
                <div class="col-12">
                    <div class="form-group">
                        <label for="prodname">Product Name</label><br>
                        <select class="form-control form-control-sm" style="width: 100%;" id="prodname" name="prodname">
                            <!-- Options will be dynamically added here -->
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="mg">Mg</label>
                        <input type="text" class="form-control" id="mg" readonly>
                      </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="brandname">Brand Name</label>
                        <input type="text" class="form-control" id="brandname" readonly>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="expirationdate">expirationDate</label>
                        <input type="text" class="form-control" id="expirationdate" readonly>
                      </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="availablequan">Available Quantity</label>
                        <input type="text" class="form-control" id="availablequan" readonly>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="company">Selling Price</label>
                        <input type="text" class="form-control" id="sellprice"  readonly>
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="text" class="form-control" id="quantity">
                      </div>
                </div>
           
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="company">Total Price</label>
                        <input type="text" class="form-control" id="totalpri" readonly>
                    </div>
                </div>
           
            </div>
            

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" id ="btnaddup"></button>
        </div>
      </div>
    </div>
  </div>

  