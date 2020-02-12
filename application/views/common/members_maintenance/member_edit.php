<div class="container">

<h3>Church Member registration</h3>

<?php echo form_open('Members/member_edit_action'); ?>
    <div class="form-row">
      <div class="col">
        <label>First Name</label>
        <input type="text" name="firstNm" class="form-control" id="firstnm" placeholder="First Name" value="<?php echo $memberEditData['0']['fName']; ?>">
      </div>

      <div class="col">
        <label>Middle Name</label>
        <input type="text" name="middleNm" class="form-control" id="middleNm" placeholder="Middle Name" value="<?php echo $memberEditData['0']['mName']; ?>">
      </div>

      <div class="col">
        <label>Last Name</label>
        <input type="text" name="lastNm" class="form-control" id="lastnm" placeholder="Last Name" value="<?php echo $memberEditData['0']['lName']; ?>">
      </div>
    </div>

    <div class="form-group">
      <label>IC No</label>
      <!-- need to add regex for ICNo-->
      <input type="text" name="icno" class="form-control" id="icno" placeholder="IC No." value="<?php echo $memberEditData['0']['icNo']; ?>">
    </div>

    <div class="form-group">
      <label>Date Of Birth</label>
      <input type="date" name="dob" class="form-control" id="dob" value="<?php echo $memberEditData['0']['dob']; ?>">
    </div>

    <div class="form-group">
      <label>Home Address</label>
      <input type="text" name="add1" class="form-control" id="add" placeholder="Home Address" value="<?php echo $memberEditData['0']['addr']; ?>">
    </div>

    <div class="form-row">
      <div class="col">
        <input type="text" name="city" class="form-control" id="city" placeholder="City" value="<?php echo $memberEditData['0']['city']; ?>">
      </div>
      <div class="col">
        <input type="text" name="zipCode" class="form-control" id="zipCode" placeholder="Zip Code" value="<?php echo $memberEditData['0']['zcode']; ?>" >
      </div>
      <div class="col">
        <input type="text" name="state" class="form-control" id="state" placeholder="State" value="<?php echo $memberEditData['0']['state']; ?>">
      </div>
    </div>

    <div class="form-group">
      <label>Status</label>
      <select class="form-control" name="status" value="<?php echo $memberEditData['0']['status']; ?>">
        <!--<option>--Select--</option>-->
        <option value="Single" <?php if(trim($memberEditData['0']['status'])==='Single'):?> Selected <?php endif;?>>Single</option>
        <option value="Married" <?php if(trim($memberEditData['0']['status'])==='Married'):?> Selected <?php endif;?>>Married</option>
        <option value="Widow/widower" <?php if(trim($memberEditData['0']['status'])==='Church Member'):?> Selected <?php endif;?>>Widow/widower</option>
      </select>
    </div>

    <div class="form-group">
      <label>Email Address</label>
      <input type="email" name="email" class="form-control" id="email" placeholder="Email Address" value="<?php echo $memberEditData['0']['email']; ?>">
    </div>

    <div class="form-group">
      <label>Mobile Tel-No</label>
      <input type="tel" name="telNo" class="form-control" id="telNo" placeholder="Telephone number" value="<?php echo $memberEditData['0']['telNo']; ?>">
    </div>
    <div class="form-group">
      <label>Home Tel-No</label>
      <input type="tel" name="homeNo" class="form-control" id="homeNo" placeholder="Home Telephone number" value="<?php echo $memberEditData['0']['homeNo']; ?>">
    </div>
    <div class="form-group">
      <label>Member Status</label>
      <select class="form-control" name="member_stat">
        <!--<option>--Select--</option>-->
        <option value="Church Member" <?php if(trim($memberEditData['0']['member_stat'])==='Church Member'):?> Selected <?php endif;?>>Church Member</option>
        <option value="Non - Member" <?php if(trim($memberEditData['0']['member_stat'])==='Non - Member'):?> Selected <?php endif;?>>Non - Member</option>
        <option value="others" <?php if(trim($memberEditData['0']['member_stat'])==='others'):?> Selected <?php endif;?>>others</option>
      </select>
    </div>

    <input type="hidden" name="id" value="<?php echo $memberEditData['0']['id']; ?>" />

    <button type="submit" class="btn btn-primary">Update</button>
  </form>
</div>
