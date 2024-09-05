<!-- Modal -->
<input type="hidden" value="0" id="hiddensaveup">
<div class="modal fade" id="exampleModalCenter"  aria-hidden="true">
    
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Create User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
    
               <!-- First Name -->
            <div class="form-group">
                <label for="fname">First Name</label>
                <input type="text" class="form-control" id="fname" placeholder="Enter first name">
            </div>
            
            <!-- Last Name -->
            <div class="form-group">
                <label for="lname">Last Name</label>
                <input type="text" class="form-control" id="lname" placeholder="Enter last name">
            </div>

            <!-- Gender -->
            <div class="form-group">
                <label for="gender">Gender</label>
                <select name="gender" id="gender" class="form-control">
                    <option selected>Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>

            <!-- Role -->
            <div class="form-group">
                <label for="role">Role</label>
                <select name="role" id="role" class="form-control">
                    <option selected>Select Role</option>
                    <option value="Admin">Male</option>
                    <option value="Employee">Employee</option>
                </select>
            </div>

            <!-- Status -->
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                    <option selected>Select Status</option>
                    <option value="A">Active</option>
                    <option value="I">Inactive</option>
                </select>
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email">
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Enter password">
            </div>

            <!-- Confirm Password -->
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" placeholder="Confirm password">
            </div>
    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="saveandupdate" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
    
  </div>

  