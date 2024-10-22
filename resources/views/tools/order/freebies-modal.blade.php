<!-- New Modal -->
<input type="hidden" value="0" id="hiddenSaveUpNew">
<div class="modal fade" id="modalfreebies" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document"> <!-- Added modal-lg class here -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newModalTitle">Freebies</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="freebies-prodname">Product Name <span class="text-danger">*</span></label><br>
                                <select class="form-control form-control-sm" style="width: 100%;" id="freebies-prodname" name="prodname" >
                                    <!-- Options will be dynamically added here -->
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="freebies-unit">Unit</label>
                                <input type="text" class="form-control" id="freebies-unit" readonly>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="freebies-brandname">Brand Name</label>
                                <input type="text" class="form-control" id="freebies-brandname" readonly>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="freebies-expirationdate">Expiration Date</label>
                                <input type="text" class="form-control" id="freebies-expirationdate" readonly>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="freebies-availablequan">Available Quantity</label>
                                <input type="text" class="form-control" id="freebies-availablequan" readonly>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="freebies-sellprice">Selling Price</label>
                                <input type="text" class="form-control" id="freebies-sellprice" readonly>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="freebies-quantity">Quantity<span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="freebies-quantity">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="freebiestable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product Name</th>
                                <th>Brand</th>
                                <th>Unit</th>
                                <th>Quantity</th>
                                <th>Total Amount</th>
                                <th>Created By</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Data will be populated here -->
                        </tbody>
                    </table>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="freebiessave" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
