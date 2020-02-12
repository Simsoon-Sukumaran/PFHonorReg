<div class="container">
  <!--Grid row-->
<table align="center" class="table table-striped">
<tr>
<td>
<?php echo form_open('Home/eform'); ?>
      <div align = "center">

        <h2>11th SAUM International Pathfinder Camporee</h2>
        <br/>
        
        <div class = "container">
        <table>
          <tr>
            <p style="color:red;">
              <?php
               if(isset(($err))){
                 echo $err;
               }
              ?>
           </p>
            <td><input type = "text" name="uniqK" value="" placeholder="Enter your unique id"/></td>
            <td><input type="submit" name ="submit" value = "Next" class="btn btn-primary"/></td>
          </tr>
        </table>
        </div>
      </div>
</form>
</td>
</tr>
</table>
</div>
