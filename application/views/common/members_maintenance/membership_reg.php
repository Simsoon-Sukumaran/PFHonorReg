<div class="container" style="padding:bottom:-20px;">

<h3>Church Member registration</h3>

<?php echo form_open('Members/registerMember'); ?>
    <div class="form-row">
      <div class="col">
        <label>First Name</label>
        <input type="text" name="firstNm" class="form-control" id="firstnm" placeholder="First Name">
      </div>

      <div class="col">
        <label>Middle Name</label>
        <input type="text" name="middleNm" class="form-control" id="middleNm" placeholder="Middle Name">
      </div>

      <div class="col">
        <label>Last Name</label>
        <input type="text" name="lastNm" class="form-control" id="lastnm" placeholder="Last Name" >
      </div>
    </div>

    <div class="form-group">
      <label>IC No</label>
      <!-- need to add regex for ICNo-->
      <input type="text" name="icno" class="form-control" id="icno" placeholder="IC No.">
    </div>

    <div class="form-group">
      <label>Date Of Birth</label>
      <input type="date" name="dob" class="form-control" id="dob">
    </div>

    <div class="form-group">
      <label>Home Address</label>
      <input type="text" name="add1" class="form-control" id="add" placeholder="Home Address">
    </div>

    <div class="form-row">
      <div class="col">
        <input type="text" name="city" class="form-control" id="city" placeholder="City">
      </div>
      <div class="col">
        <input type="text" name="zipCode" class="form-control" id="zipCode" placeholder="Zip Code">
      </div>
      <div class="col">
        <input type="text" name="state" class="form-control" id="state" placeholder="State">
      </div>
    </div>

    <div class="form-group">
      <label>Status</label>
      <select class="form-control" name="status">
        <!--<option>--Select--</option>-->
        <option value="Single">Single</option>
        <option value="Married">Married</option>
        <option value="Widow/widower">Widow/widower</option>
      </select>
    </div>

    <div class="form-group">
      <label>Email Address</label>
      <input type="email" name="email" class="form-control" id="email" placeholder="Email Address">
    </div>

    <div class="form-group">
      <label>Mobile Tel-No</label>
      <input type="tel" name="telNo" class="form-control" id="telNo" placeholder="Telephone number">
    </div>
    <div class="form-group">
      <label>Home Tel-No</label>
      <input type="tel" name="homeNo" class="form-control" id="homeNo" placeholder="Home Telephone number">
    </div>
    <div class="form-group">
      <label>Member Status</label>
      <select class="form-control" name="member_stat">
        <!--<option>--Select--</option>-->
        <option value="Church Member">Church Member</option>
        <option value="Non - Member">Non - Member</option>
        <option value="others">others</option>
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Register</button>

</form>
</div>
