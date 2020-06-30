<?php
// load data konfigurasi website
$site = $this->konfigurasi_model->listing();
$nav_produk_footer = $this->konfigurasi_model->nav_produk();
?>
<footer class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-6 col-lg-3">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">KONTAK KAMI</h2>
                    <p>
                        <?php echo nl2br($site->alamat) ?><br>
                        <i class="fas fa-envelope"></i> <?= $site->email; ?>
                    </p>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
                        <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                        <li class="ftco-animate"><a href="<?php echo $site->facebook ?>"><span class="icon-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="<?php echo $site->instagram ?>"><span class="icon-instagram"></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">KATEGORI PRODUK</h2>
                    <ul class="list-unstyled open-hours">
                        <?php foreach ($nav_produk_footer as $nav_produk_footer) { ?>
                            <li class="d-flex"><span><a href="<?php echo base_url('produk/kategori/' . $nav_produk_footer->slug_kategori) ?>"><?php echo $nav_produk_footer->nama_kategori ?></a></span></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">JAM OPERASIONAL</h2>
                    <ul class="list-unstyled open-hours">
                        <li class="d-flex"><span>Monday</span><span>9:00 - 24:00</span></li>
                        <li class="d-flex"><span>Tuesday</span><span>9:00 - 24:00</span></li>
                        <li class="d-flex"><span>Wednesday</span><span>9:00 - 24:00</span></li>
                        <li class="d-flex"><span>Thursday</span><span>9:00 - 24:00</span></li>
                        <li class="d-flex"><span>Friday</span><span>9:00 - 02:00</span></li>
                        <li class="d-flex"><span>Saturday</span><span>9:00 - 02:00</span></li>
                        <li class="d-flex"><span>Sunday</span><span> 9:00 - 02:00</span></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Newsletter</h2>
                    <p>Far far away, behind the word mountains, far from the countries.</p>
                    <form action="#" class="subscribe-form">
                        <div class="form-group">
                            <input type="text" class="form-control mb-2 text-center" placeholder="Enter email address">
                            <input type="submit" value="Subscribe" class="form-control submit px-3">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">

                <p>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </div>
    </div>
</footer>


<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" /></svg></div>


<script src="<?php echo base_url() ?>assets/template/js/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/template/js/jquery-migrate-3.0.1.min.js"></script>
<script src="<?php echo base_url() ?>assets/template/js/popper.min.js"></script>
<script src="<?php echo base_url() ?>assets/template/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/template/js/jquery.easing.1.3.js"></script>
<script src="<?php echo base_url() ?>assets/template/js/jquery.waypoints.min.js"></script>
<script src="<?php echo base_url() ?>assets/template/js/jquery.stellar.min.js"></script>
<script src="<?php echo base_url() ?>assets/template/js/owl.carousel.min.js"></script>
<script src="<?php echo base_url() ?>assets/template/js/jquery.magnific-popup.min.js"></script>
<script src="<?php echo base_url() ?>assets/template/js/aos.js"></script>
<script src="<?php echo base_url() ?>assets/template/js/jquery.animateNumber.min.js"></script>
<script src="<?php echo base_url() ?>assets/template/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url() ?>assets/template/js/jquery.timepicker.min.js"></script>
<script src="<?php echo base_url() ?>assets/template/js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="<?php echo base_url() ?>assets/template/js/google-map.js"></script>
<script src="<?php echo base_url() ?>assets/template/js/main.js"></script>

</body>

</html>