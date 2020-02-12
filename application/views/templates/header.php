<html>

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script></script>

<style>
    .headFootCol{
      background-color: #1D6F42;
    }
</style>

<script>

  var position = $(window).scrollTop();
  $(window).scroll(function() {
      var scroll = $(window).scrollTop();
      if(scroll > position) {
          // console.log('scrollDown');
          // alert('Scrolling Down Scripts');
          $('#navBarDropFix').addClass('fixed-top');
      } else {
           // console.log('scrollUp');
           // alert('Scrolling Up Scripts');
           $('#navBarDropFix').removeClass('fixed-top');

      }
      position = scroll;
  });

</script>

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark headFootCol" id="navBarDropFix" >
    <a class="navbar-brand" href="#"><?php echo $title ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <?php if(($_SESSION['role'])==="camphost"){?>
          <li class="nav-item">
            <a class="nav-link" href="#">Camp Maintenance</a>
          </li>
        <?php }?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Membership Maintenance
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="<?php echo site_url("Members/memberR") ?>">Register Member</a>
            <a class="dropdown-item" href="<?php echo site_url("Members") ?>">Member's List</a>
            <a class="dropdown-item" href="#">Bulk Member Registration</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Room</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Payments</a>
        </li>
        <li class="nav-item left">
          <a class="nav-link" href="<?php echo site_url("Home/logout") ?>">Log Out</a>
        </li>
      </ul>
    </div>
  </nav>
