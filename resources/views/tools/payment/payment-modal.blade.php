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
                          <option id="Banktransfer" value="Bank Transfers">Bank Transfers</option>

                           <!-- Philippine Universal and Commercial Banks -->
                          <option id="BDO" value="BDO Unibank">BDO Unibank</option>
                          <option id="Metrobank" value="Metropolitan Bank & Trust Company (Metrobank)">Metropolitan Bank & Trust Company (Metrobank)</option>
                          <option id="BPI" value="Bank of the Philippine Islands (BPI)">Bank of the Philippine Islands (BPI)</option>
                          <option id="LandBank" value="Land Bank of the Philippines">Land Bank of the Philippines</option>
                          <option id="PNB" value="Philippine National Bank">Philippine National Bank</option>
                          <option id="ChinaBank" value="China Banking Corporation">China Banking Corporation</option>
                          <option id="SecurityBank" value="Security Bank Corporation">Security Bank Corporation</option>
                          <option id="UnionBank" value="Union Bank of the Philippines">Union Bank of the Philippines</option>
                          <option id="RCBC" value="Rizal Commercial Banking Corporation (RCBC)">Rizal Commercial Banking Corporation (RCBC)</option>
                          <option id="AUB" value="Asia United Bank">Asia United Bank</option>
                          <option id="PBCOM" value="Philippine Bank of Communications">Philippine Bank of Communications</option>
                          <option id="EastWestBank" value="East West Banking Corporation">East West Banking Corporation</option>
                          <option id="RobinsonsBank" value="Robinsons Bank Corporation">Robinsons Bank Corporation</option>

                          <!-- Government-Owned Banks -->
                          <option id="LandBank" value="Land Bank of the Philippines">Land Bank of the Philippines</option>
                          <option id="DBP" value="Development Bank of the Philippines">Development Bank of the Philippines (DBP)</option>

                          <!-- Foreign Banks in the Philippines -->
                          <option id="Citibank" value="Citibank">Citibank, N.A.</option>
                          <option id="HSBC" value="HSBC">Hongkong and Shanghai Banking Corporation (HSBC)</option>
                          <option id="StandardChartered" value="Standard Chartered">Standard Chartered Bank</option>
                          <option id="JPMorgan" value="JPMorgan Chase">JP Morgan Chase Bank</option>
                          <option id="BankOfAmerica" value="Bank of America">Bank of America, N.A.</option>
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

  