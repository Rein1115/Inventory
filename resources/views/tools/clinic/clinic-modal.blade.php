<!-- Modal -->
<input type="hidden" value="0" id="hiddensaveup">
<div class="modal fade" id="exampleModalCenter"  aria-hidden="true">
    
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Create Clinic</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
     
            <div class="form-group">
              <label for="fname">First Name</label>
              <input type="text" class="form-control" id="fname" placeholder="Enter First Name">
            </div>
            <div class="form-group">
                <label for="lname">Last Name</label>
                <input type="text" class="form-control" id="lname" placeholder="Enter Last Name">
            </div>

            <div class="form-group">
                <label for="contactno">Contact No.</label>
                <input type="number" class="form-control" id="contactno" placeholder="Enter Contact no.">
            </div>

            <div class="form-group">
                <label for="clinicname">Clinic Name</label>
                <input type="text" class="form-control" id="clinicname" placeholder="Enter Clinic Name">
            </div>

         


            <div class="row">
                <div class="col-sm">
                    <div class="form-group">
                        <label for="contactno">Address</label>
                        <input type="text" class="form-control" id="address" placeholder="Enter Address">
                    </div>
                </div>
                <div class="col-sm">
                    <div class="form-group">
                        <label for="zipcode">ZipCode</label>
                        <input type="number" class="form-control" id="zipcode" placeholder="Enter zipcode">
                    </div>
                </div>
            </div>
            

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button id="saveandupdate"></button>
        </div>
      </div>
    </div>
  </div>

  