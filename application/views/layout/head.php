<?php
// loading konfigurasi website
$site = $this->konfigurasi_model->listing();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $title; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes&display=swap" rel="stylesheet">

    <!-- Icon diambil dari konfigutasi model -->
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/upload/image/' . $site->icon) ?>">
    <!-- SEO Google -->
    <meta name="keywords" content="<?php echo $site->keywords ?>">
    <meta name="description" content="<?php echo $title ?>, <?php echo $site->deskripsi ?> ">
    <!-- Custom styles for this template-->
    <link href="<?php echo base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/css/animate.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/css/magnific-popup.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/css/aos.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/css/ionicons.min.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/css/jquery.timepicker.css">


    <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/css/flaticon.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/css/icomoon.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/css/style.css">
    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

</head>

<body>