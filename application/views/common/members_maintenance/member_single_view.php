
<br/><br/>
<div class="table-responsive-lg">
    <table class="table-striped table-hover">
      <tr>
        <td>First Name</td>
        <td><p id="firstnm"> <?php echo $memberEditData['0']['fName']; ?></p></td>
      </tr>
      <tr>
        <td>Middle Name</td>
        <td><p id="firstnm"> <?php echo $memberEditData['0']['mName']; ?></p></td>
      </tr>
      <tr>
        <td>Last Name</td>
        <td><p id="firstnm"> <?php echo $memberEditData['0']['lName']; ?></p></td>
      </tr>
      <tr>
        <td>IC No</td>
        <td><p id="firstnm"> <?php echo $memberEditData['0']['icNo']; ?></p></td>
      </tr>
      <tr>
        <td>Date Of Birth</td>
        <td><p id="firstnm"> <?php echo $memberEditData['0']['dob']; ?></p></td>
      </tr>
      <tr>
        <td>Home Address</td>
        <td><p id="firstnm"> <?php echo $memberEditData['0']['addr']; ?></p></td>
      </tr>
      <tr>
        <td>Date Of Birth</td>
        <td><p id="firstnm"> <?php echo $memberEditData['0']['dob']; ?></p></td>
      </tr>
      <tr>
        <td>City</td>
        <td><p id="firstnm"> <?php echo $memberEditData['0']['city']; ?></p></td>
      </tr>
      <tr>
        <td>Zip Code</td>
        <td><p id="firstnm"> <?php echo $memberEditData['0']['zcode']; ?></p></td>
      </tr>
      <tr>
        <td>State</td>
        <td><p id="firstnm"> <?php echo $memberEditData['0']['state']; ?></p></td>
      </tr>
      <tr>
        <td>Status</td>
        <td><p id="firstnm"> <?php echo $memberEditData['0']['status']; ?></p></td>
      </tr>
      <tr>
        <td>Email Address</td>
        <td><p id="firstnm"> <?php echo $memberEditData['0']['email']; ?></p></td>
      </tr>
      <tr>
        <td>Mobile Tel-No</td>
        <td><p id="firstnm"> <?php echo $memberEditData['0']['telNo']; ?></p></td>
      </tr>
      <tr>
        <td>Home Tel-No</td>
        <td><p id="firstnm"> <?php echo $memberEditData['0']['homeNo']; ?></p></td>
      </tr>
      <tr>
        <td>Member Status</td>
        <td><p id="firstnm"> <?php echo $memberEditData['0']['member_stat']; ?></p></td>
      </tr>
      <tr>
        <td>
          <div class="row">
            <?php echo form_open('Members/member_edit_view/'. $memberEditData['0']['id']) ?>
              <button type="submit" class="btn btn-primary">Edit</button>
            </form>
            <?php echo form_open('Members/member_delete/'. $memberEditData['0']['id']) ?>
              <button type="submit" class="btn btn-primary">Delete</button>
            </form>
            <?php echo form_open('Members') ?>
              <button type="submit" class="btn btn-primary">Back</button>
            </form>
          </div>
        </td>
      </tr>
    </table>


</div>
