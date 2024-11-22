<?php?>


<?php
if (isset($_GET['okmsg'])) {
    ?>
    <div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Success!  </strong><?php echo base64_decode($_GET['okmsg']);?>
</div>
<?php
}

else if (isset($_GET['errormsg'])) {
    ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Oh no!  </strong><?php echo base64_decode($_GET['errormsg']);?>
</div>
<?php
}
?>