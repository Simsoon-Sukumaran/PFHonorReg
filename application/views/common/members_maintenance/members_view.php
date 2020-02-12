<br/><br/>
<div class="container">
  <!--
  <a href="<?php //echo site_url("Members/memberR") ?>" >Register New Member..</a>
  <a style="float:right" href="<?php //echo site_url("Home/logout") ?>" >Log Out..</a>
  -->
  <table class="table table-striped">
    <tr>
      <td>No.</td>
      <td>Name</td>
      <td>IC No</td>
      <td>Address</td>
      <td>Email</td>
      <td>Telephone Number</td>
      <td>Member Status</td>
      <td></td>
      <td></td>
    </tr>
    <?php
      $count = 1;
      foreach($membersList as $member):
    ?>
      <tr>
        <td><?php echo $count++; ?></td>
        <td><a href='<?php echo base_url('Members/member_single_view/'. $member['id'])?>'><?php echo $member['fName'].' '.$member['mName'].' '.$member['lName']; ?></a></td>
        <td><?php echo $member['icNo']; ?></td>
        <td><?php echo $member['addr']; ?></td>
        <td><?php echo $member['email']; ?></td>
        <td><?php echo $member['telNo']; ?></td>
        <td><?php echo $member['member_stat']; ?></td>
        <?php echo form_open('Members/member_edit_view/'. $member['id']) ?>
          <td><button type="" class="btn btn-primary">Edit</button></td>
        </form>
        <?php echo form_open('Members/member_delete/'. $member['id']) ?>
          <td><button onclick="return confirm('Do you really want to delete <?php echo $member['fName']?>  details?');" type="" class="btn btn-danger">Delete</button></td>
        </form>
      </tr>
    <?php endforeach; ?>
  </table>
</div>
