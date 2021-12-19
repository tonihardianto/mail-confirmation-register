<?php
if ($this->session->has_userdata('msg')) { ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> You should check your email for confirmation.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php } ?>

<?php
if ($this->session->has_userdata('ggl')) { ?>
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Failed!</strong> You should check in on some of those fields below.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php } ?>

<?php if($this->session->has_userdata('success')){ ?>
  <div class="alert alert-info alert-dismissible toastrDefaultSuccess">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5>
      <i class="icon fas fa-check-circle"></i>
      Berhasil..
    </h5>
      <!-- <script>
        toastr.success('Berhasil');
      </script> -->
        <?php echo $this->session->flashdata('success');?>
</div>
<?php } ?>
<?php if($this->session->has_userdata('fail')){ ?>
  <div class="alert alert-danger alert-dismissible toastrDefaultSuccess">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5>
      <i class="icon fas fa-ban"></i>
      Access Denied !
    </h5>
      <!-- <script>
        toastr.success('Berhasil');
      </script> -->
        <?php echo $this->session->flashdata('fail');?>
</div>
<?php } ?>

<?php if($this->session->has_userdata('denied')){ ?>
  <div class="alert alert-warning alert-dismissible toastrDefaultSuccess">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5>
      <i class="icon fas fa-exclamation-circle"></i>
      Access Denied !
    </h5>
      <!-- <script>
        toastr.success('Berhasil');
      </script> -->
        <?php echo $this->session->flashdata('denied');?>
</div>
<?php } ?>

