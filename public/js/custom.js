/* Scrip para plan de pagos */
document.addEventListener('DOMContentLoaded', function () {
    var inputs = document.querySelectorAll('.peso');

    inputs.forEach(function (input) {
        input.addEventListener('input', function (e) {
            var unformattedValue = e.target.value.replace(/,/g, '');
            var formattedValue = new Intl.NumberFormat().format(unformattedValue);
            e.target.value = formattedValue;
        });
    });
});

document.addEventListener('DOMContentLoaded', function () {
    var botonCalcular = document.getElementById('calcular_plan_pago');
    var inputValorTotal = document.getElementById('valor_total_inmueble');
    var inputEnganche = document.getElementById('enganche');
    var inputSaldo = document.getElementById('saldo');
    var inputPlazos = document.getElementById('plazos');
    var inputMensualidades = document.getElementById('mensualidades');

    botonCalcular.addEventListener('click', function () {
        var valorTotal = parseNumber(inputValorTotal.value);
        inputEnganche.value = inputEnganche.value === '' ? 0 : inputEnganche.value;
        var valorEnganche = parseNumber(inputEnganche.value);
        var plazos = parseNumber(inputPlazos.value);

        if (!isNaN(valorTotal) && !isNaN(valorEnganche) && !isNaN(plazos)) {
            var nuevoSaldo = valorTotal - valorEnganche;
            inputSaldo.value = formatNumber(nuevoSaldo);

            var mensualidades = valorTotal / plazos;
            debugger
            inputMensualidades.value = formatNumber(mensualidades.toFixed(2));
        } else {
            inputSaldo.value = "Error en el formato";
            inputMensualidades.value = "Error en el formato";
        }

        //Generar Tabla
        var plazos = parseInt(document.getElementById('plazos').value);
        var valorTotalInmueble = parseFloat(document.getElementById('valor_total_inmueble').value.replace(/,/g, ''));

        var tablaCuerpo = document.getElementById('tabla_cuerpo');
        tablaCuerpo.innerHTML = ''; // Limpiar el cuerpo de la tabla

        var mensualidad = calcularMensualidad(valorTotalInmueble, plazos);
        var numAnios = plazos / 12;

        for (var i = 1; i <= plazos; i++) {
            var totalCobrado = mensualidad * i;
            var pendientePago = nuevoSaldo - totalCobrado;

            if ((i - 1) % 12 === 0) {
                var rowAnio = document.createElement('tr');
                var cellAnio = document.createElement('td');
                cellAnio.textContent = 'Año ' + Math.ceil(i / 12);
                cellAnio.setAttribute('colspan', '4');
                rowAnio.appendChild(cellAnio);
                tablaCuerpo.appendChild(rowAnio);
            }

            var row = document.createElement('tr');
            var numPagoCell = document.createElement('td');
            var mensualidadCell = document.createElement('td');
            var totalCobradoCell = document.createElement('td');
            var pendientePagoCell = document.createElement('td');

            numPagoCell.textContent = i;
            mensualidadCell.textContent = formatNumber(mensualidad);
            totalCobradoCell.textContent = formatNumber(totalCobrado);
            pendientePagoCell.textContent = formatNumber(pendientePago);

            row.appendChild(numPagoCell);
            row.appendChild(mensualidadCell);
            row.appendChild(totalCobradoCell);
            row.appendChild(pendientePagoCell);

            if (pendientePago < 0) {
                pendientePagoCell.style.color = 'red'; // Cambia el color del texto a rojo
            }

            tablaCuerpo.appendChild(row);
        }



    });

    function parseNumber(value) {
        return parseFloat(value.replace(/,/g, '').replace(/[^0-9.-]/g, ''));
    }

    function formatNumber(value) {
        return new Intl.NumberFormat().format(value);
    }
    
    function calcularMensualidad(valorTotal, plazos) {
        return valorTotal / plazos;
    }

});




