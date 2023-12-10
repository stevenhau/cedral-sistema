<?php
include($_SERVER['DOCUMENT_ROOT'] . '/views/layouts/header.php');
?>

<!-- Page Container START -->
<div class="page-container">

    <!-- Content Wrapper START -->
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Plan De Pagos</h2>
        </div>
        <!-- Content goes Here -->
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="row">
                    <div class="col-12">
                        <label for="valor_total_inmueble">Valor Total del Inmueble:</label>
                        <input id="valor_total_inmueble" type="text" class="form-control peso" placeholder="Escribe el valor total del inmueble" required>
                    </div>
                    <div class="col-12">
                        <label for="enganche">Enganche:</label>
                        <input id="enganche" type="text" class="form-control peso" placeholder="Escribe el enganche">
                    </div>
                    <div class="col-12">
                        <label for="apertura_credito">Apertura de Credito:</label>
                        <input id="apertura_credito" type="text" class="form-control peso" placeholder="Escribe la apertura de credito">
                    </div>
                    <div class="col-12">
                        <label for="plazos">Plazo de:</label>
                        <input id="plazos" type="text" class="form-control peso" placeholder="Escribe el plazo en meses" minlength="1" maxlength="3" required>
                    </div>
                    <div class="col-12">
                        <label for="saldo">Saldo:</label>
                        <input id="saldo" type="text" class="form-control" disabled>
                    </div>
                    <div class="col-12">
                        <label for="mensualidades">Mensualidades de:</label>
                        <input id="mensualidades" type="text" class="form-control peso" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button id="calcular_plan_pago" type="button" class="btn btn-success mt-3 mx-3">Calcular</button>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-8">
                <div class="d-flex justify-content-between pb-3">
                    <h3>Vista Previa</h3>
                </div>
                
                <div class="table-responsive">
                    <table id="tabla_pagos" class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th scope="col">Numero de Pago</th>
                                <th scope="col">Mensualidad</th>
                                <th scope="col">Total Cobrado</th>
                                <th scope="col">Pendiente de Pago</th>
                            </tr>
                        </thead>
                        <tbody id="tabla_cuerpo"></tbody>
                    </table>
                </div>
            </div>
        </div>


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