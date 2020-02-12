<div class="container">
  <!--Grid row-->
  <br/><br/><br/>
  <table class="table table-striped" align="center">
  <tr>
  <td>
<!-- <form action="localhost/ACC" method="POST" onsubmit="return confirm('are you sure?')" /> -->

      <div align = "center">
        <h4>Registration Result</h4>

    <br/><br/>

      <div class="form-group">
        <label for="day1">Name:</label>
        <p>
          <?php echo $usr?>
        </p>
      </div>

      <div class="form-group">
        <label for="day1">Day 1 - (12th December 2019):</label>
        <p>
           <?php echo $day1[0]['honor_nm']?>
        </p>
      </div>

      <div class="form-group">
        <label for="day1">Day 2 - (13th December 2019):</label>
        <p>
           <?php echo $day2[0]['honor_nm']?>
        </p>
      </div>

      <div class="form-group">
        <label for="day1">Day 3 - (14th December 2019):</label>
        <p>
           <?php echo $day3[0]['honor_nm']?>
        </p>
      </div>
    </div>

    </div>
  <div align = "center">
<!--     <button type="submit" class="btn btn-primary" >Register for others..</button> -->
  </div>
</td>
</tr>
</table>
</div>

<script>

  function loadInTheBeginning(){
    alert('Congratulation for your successful registration \n Please screenshot this registration result screen for Honor class purposes');
  }

  $( document ).ready(function() {
    loadInTheBeginning();
});

</script>
