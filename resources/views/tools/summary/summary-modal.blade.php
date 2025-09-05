<div class="modal fade" id="annualSummaryModal" data-id="0" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content modal-xl">
            <div class="modal-header text-center">
                <h3 class="modal-title fw-bold" id="annualSummaryModalTitle">2024</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row text-center">

                    <!-- Total Sales -->
                    <div class="col-md-4 mb-2">
                        <div class="card bg-light border-0 shadow-sm">
                            <div class="card-body">
                                <h6 class="card-title mb-2 text-primary">Total Sales</h6>
                                <p id="summaryTotalSales" class="card-text h5"></p>
                            </div>
                        </div>
                    </div>

                    <!-- Total Expenses -->
                    <div class="col-md-4 mb-2">
                        <div class="card bg-light border-0 shadow-sm">
                            <div class="card-body">
                                <h6 class="card-title mb-2 text-primary">Total Expenses</h6>
                                <p id="summaryTotalExpenses" class="card-text h5"></p>
                            </div>
                        </div>
                    </div>

                    <!-- Final Net Profit -->
                    <div class="col-md-4 mb-2">
                        <div class="card bg-light border-0 shadow-sm">
                            <div class="card-body">
                                <h6 class="card-title mb-2 text-primary">Final Net Profit</h6>
                                <p id="summaryFinalNetProfit" class="card-text h5"></p>
                            </div>
                        </div>
                    </div>


                    <div class="table-responsive">
                        <table id= "reports" class="table" style="text-align:center; width:100%; border-collapse:collapse;">
                            <thead >
                                <tr>
                                    <th style="text-align:center;">PO No.</th>
                                    <th style="text-align:center;">Fullname</th>
                                    <th style="text-align:center;">OR No.</th>
                                    <th style="text-align:center;">CR No.</th>
                                    <th style="text-align:center;">Total Amount</th>
                                    <th style="text-align:center;"></th>
                                </tr>
                            </thead>
                            <tbody>   
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <div class="modal-footer d-flex ">
                <button type="button" class="btn btn-secondary text-white" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>