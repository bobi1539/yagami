<!--start footer bottom-->
<div class="footer-btm text-center">
    <div class="container">
        <p>&copy; 2021 Yagami. All Rights Reserved By <a target="_blank" href="https://www.instagram.com/bobi_arvl">Bobi Ahmad Rival</a></p>
    </div>
</div>
<!--end footer bottom-->
</div>

<!--jQuery js-->
<script src="<?= base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
<!--proper js-->
<script src="<?= base_url(); ?>assets/js/popper.min.js"></script>
<!--bootstrap js-->
<script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
<!--magnic popup js-->
<script src="<?= base_url(); ?>assets/js/magnific-popup.min.js"></script>
<!--owl carousel js-->
<script src="<?= base_url(); ?>assets/js/owl.carousel.min.js"></script>
<!--scrollIt js-->
<script src="<?= base_url(); ?>assets/js/scrollIt.min.js"></script>
<!--contact js-->
<script src="<?= base_url(); ?>assets/js/contact.js"></script>
<!--validator js-->
<script src="<?= base_url(); ?>assets/js/validator.min.js"></script>
<!--main js-->
<script src="<?= base_url(); ?>assets/js/custom.js"></script>


<script>
    function previewImg() {
        const sampul = document.querySelector('#sampul');
        const sampulLabel = document.querySelector('.custom-file-label');
        const imgPreview = document.querySelector('.img-preview');

        sampulLabel.textContent = sampul.files[0].name;

        const fileSampul = new FileReader();
        fileSampul.readAsDataURL(sampul.files[0]);

        fileSampul.onload = function(e) {
            imgPreview.src = e.target.result;
        }

    }
</script>
</body>

</html>