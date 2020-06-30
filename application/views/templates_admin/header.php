<?php  //$this->simple_login->cek_login(); 
?>
<?php
// load konfigurasi website
$site = $this->konfigurasi_model->listing();
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta name="author" content="">

  <title><?php echo $title ?></title>
  <!-- DATATABLES -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/jquery.dataTables.css">
  <script src="<?php echo base_url() ?>assets/jquery-3.2.1.slim.min.js"></script>
  <script type="text/javascript" charset="utf8" src="<?php echo base_url() ?>assets/jquery.dataTables.js"></script>

  <!-- Custom fonts for this template-->
  <!-- ICON DIAMBIL DARI KONFIGURASI WEBSITE -->
  <link rel="icon" type="image/png" href="<?php echo base_url('assets/upload/image/' . $site->icon) ?> ">
  <!-- SEO Google  -->
  <meta name="keywords" content="<?php echo $site->keywords ?>">
  <!-- <meta name="description" content=""> -->
  <meta name="description" content="<?php echo $title ?>, <?php echo $site->deskripsi ?> ">

  <link href="<?php echo base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
  <!-- ckeditor -->
  <script src="<?php echo base_url() ?>assets/ckeditor/ckeditor.js" type="text/javascript"></script>
  <script src="<?php echo base_url() ?>assets/ckeditor/samples/js/sample.js" type="text/javascript"></script>

</head>