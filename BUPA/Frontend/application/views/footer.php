  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>BUPA</strong>. All Rights Reserved
      </div>
      <div class="credits">

        Designed by <a href="/">BUPA</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?= base_url().'assets/vendor/aos/aos.js' ?>"></script>
  <script src="<?= base_url().'assets/vendor/bootstrap/js/bootstrap.bundle.min.js' ?>"></script>
  <script src="<?= base_url().'assets/vendor/glightbox/js/glightbox.min.js' ?>' ?>"></script>
  <script src="<?= base_url().'assets/vendor/isotope-layout/isotope.pkgd.min.js' ?>"></script>
  <script src="<?= base_url().'assets/vendor/swiper/swiper-bundle.min.js' ?>"></script>
  <script src="<?= base_url().'assets/vendor/php-email-form/validate.js' ?>"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url().'assets/js/main.js ' ?>"></script>
<script>
    var faq = document.getElementsByClassName("faq-page");
var i;
for (i = 0; i < faq.length; i++) {
    faq[i].addEventListener("click", function () {
        /* Toggle between adding and removing the "active" class,
        to highlight the button that controls the panel */
        this.classList.toggle("active");
        /* Toggle between hiding and showing the active panel */
        var body = this.nextElementSibling;
        if (body.style.display === "block") {
            body.style.display = "none";
        } else {
            body.style.display = "block";
        }
    });
}
</script>