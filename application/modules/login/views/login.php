<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>.:Login | System:. </title>

    <!-- Bootstrap -->
    <link href="<?php echo duddin();?>bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo duddin();?>font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo duddin();?>nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo duddin();?>animate.css/animate.min.css" rel="stylesheet">
<link rel="shortcut icon" href="<?php echo duddin_img('logo.png')?>">
    <!-- Custom Theme Style -->
    <link href="<?php echo duddin();?>build/css/custom.min.css" rel="stylesheet">
    <link href="<?php echo duddin();?>bootstrap-sweetalert-master/dist/sweetalert.css" rel="stylesheet">
    <style>
    .fullscreen_bg {
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background-size: cover;
        background-position: 50% 50%;
        background-image: url('<?php echo duddin_img('bg1.jpg')?>');
        background-repeat:repeat;
      }
    </style>
  </head>

  <body class="login" >
<div  class="fullscreen_bg"/>

<div class="container">
    <div>



      <div class="login_wrapper">
        <div class="animate form login_form">

          <section class="login_content">
          <form class="" action="<?php echo site_url('home/cek')?>" method="post">
              <h1>Login Form</h1>


              <div>
                <input type="text" class="form-control" placeholder="Username" name="username" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" name="pass" required="" />
              </div>
              <div>


              </div>
<input type="submit" class='btn btn-success'   value="Log-in">

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">

                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1> </h1>
                  <p><font color="white"> ©2017 All Rights Reserved. <?php $url=prep_url("www.rumahkreasikita.com"); ?><a href="<?php echo $url?>" target="_blank">Rumah Kreasi Kita </a>. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>


        </div>
      </div>
    </div>
<script src="<?php echo duddin();?>bootstrap-sweetalert-master/dist/sweetalert.min.js"></script>

<?php if ($this->session->flashdata('gagal')): ?>
<script>swal(
  {title: "Password Atau Username Salah!", text: "Silakan coba lagi", timer: 3000, type: "error", showConfirmButton: false }
)</script>
<?php endif; ?>



  </body>
</html>
