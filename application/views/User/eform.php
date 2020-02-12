<div class="container">
  <!--Grid row-->
  <br/><br/><br/>
  <table class="table table-striped" align="center">
  <tr>
  <td>
<?php echo form_open("Home/registerHonor","onsubmit='return onFormSubmit()'")?>

<!-- <form action="localhost/ACC" method="POST" onsubmit="return confirm('are you sure?')" /> -->

      <div align = "center">
        <p style="color:red;">
          <?php
           if(isset(($err))){
             echo $err;
           }
          ?>
        </p>
        <h4>Hi <?php echo $usrnm?>, please choose your Honors below:</h4>
      </div>
    <br/><br/>
    <div align = "center">
      <div class="form-group">
        <label for="day1">Day 2 - (12th December 2019):</label>
        <?php
          if(!$disable1){
         ?>
        <select name='day1'>
          <option value="">--select your honor--</option>
          <?php foreach($honor_day1 as $honor) { ?>
            <option value="<?=$honor['id']?>"><?=$honor['honor_nm']?></option>
          <?php } ?>
        </select>
        <?php
      }else{
        ?>
          <p>You're an instructor on this day.</p>
      <?php
      }
         ?>
      </div>

      <div class="form-group">
        <label for="day2">Day 3 - (13th December 2019):</label>
        <?php
          if(!$disable2){
         ?>
        <select name='day2'>
          <option value="">--select your honor--</option>
          <?php foreach($honor_day2 as $honor) { ?>
            <option value="<?=$honor['id']?>"><?=$honor['honor_nm']?></option>
          <?php } ?>
        </select>
        <?php
      }else{
        ?>
          <p>You're an instructor on this day.</p>
      <?php
      }
         ?>
      </div>

      <div class="form-group">
        <label for="day3">Day 4 - (14th December 2019):</label>
        <?php
          if(!$disable3){
         ?>
        <select name='day3'>
          <option value="">--select your honor--</option>
          <?php foreach($honor_day3 as $honor) { ?>
            <option value="<?=$honor['id']?>"><?=$honor['honor_nm']?></option>
          <?php } ?>
        </select>
        <?php
      }else{
        ?>
          <p>You're an instructor on this day.</p>
      <?php
      }
         ?>
      </div>
    </div>

  <div align = "center">
    <input type='hidden' value='<?php echo $usrnm?>' name='usr'/>
    <input type='hidden' value='<?php echo $uniq?>' name='id'/>
    <?php if($disable1 && $disable2 && $disable3){ ?>
      <strong>The form ends here since you're an instructor for all three days.</strong>
    <?php }else{ ?>
      <button type="submit" class="btn btn-primary" >Submit</button>
    <?php } ?>
  </div>

</form>
</td>
</tr>
</table>
</div>
