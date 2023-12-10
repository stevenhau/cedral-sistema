<?php
include($_SERVER['DOCUMENT_ROOT'] . '/views/layouts/header.php');
?>

<!-- Page Container START -->
<div class="page-container">

    <!-- Content Wrapper START -->
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Titulo</h2>
        </div>
        <!-- Content goes Here -->

        
    </div>
    <!-- Content Wrapper END -->

    <!-- Footer START -->
    <footer class="footer">
        <div class="footer-content justify-content-between">
            <p class="m-b-0">Copyright © <?=date('Y')?> El Cedral Eco Habitat. Todos los derechos reservados.</p>
            <span>
                <a href="" class="text-gray m-r-15">Terminos &amp; Condiciones</a>
                <a href="" class="text-gray">Politicas &amp; Privacidad</a>
            </span>
        </div>
    </footer>
    <!-- Footer END -->

</div>
<!-- Page Container END -->


<?php
include($_SERVER['DOCUMENT_ROOT'] . '/views/layouts/footer.php');
?>