<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $title; ?>  </title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="http://kodingku.com/wp-content/uploads/2017/02/cropped-Bannersnack-HTML5-editor-192x192.png" sizes="192x192" />
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <div class="container">
  <?php if(validation_errors()){ ?>
    <div class="alert alert-warning alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>Masukan Yang Benar!!</strong> 
      <?php echo validation_errors(); ?>
    </div>
  <?php } ?> 
  <?php if($this->session->flashdata('success')){?>
    <div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <?php echo $this->session->flashdata('success'); ?>
      </div>
  <?php } ?> 
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4">
        <h2 class="text-danger text-center">Silahkan Register</h2>
        <?php echo form_open(); ?>
          <div class="form-group">
            <input type="fullname" class="form-control" name="fullname" placeholder="fullname">
          </div>
          <div class="form-group">
            <input type="nama" class="form-control" name="nama" placeholder="nama">
          </div>
          <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="email">
          </div>
          <div class="form-group">  
            <?php echo $captcha; ?> 
          </div>
          <div class="form-group">  
            <input type="text" name="captcha_code" placeholder="Enter captcha_code" class="form-control">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="password">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="retypepassword" placeholder="Retypepassword">
          </div>
          <div class="form-group">
            <input type="submit" class="form-control btn btn-danger" name="submit" value="REGISTER">
          </div>
        <?php form_close() ?>
          <a href="<?php echo site_url('user/login'); ?>">LOGIN &raquo;</a>
      </div>
      <div class="col-md-4"></div>
    </div>
  </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url(); ?>bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
