// Obtener el controlador desde la URL actual
let controller = window.location.pathname;
function sendRequest(action, parameters, callback) {

    // Realizar la solicitud AJAX
    $.ajax({
        url: '/manager',
        type: 'POST',
        data: {
            controller: controller,
            action: action,
            parameters: parameters
        },
        success: function (response) {
            callback(null, response);
        },
        error: function (xhr, status, error) {
            callback(error, null);
        }
    });
}

// Ejemplo de uso para listar
sendRequest('list', '', function (error, response) {
    if (error) {
        console.error('Error:', error);
    } else {
        // Asumiendo que el nombre de la función es "desarrollos"
        dynamicFunction = controller.substring(1);
        if (typeof window[dynamicFunction] === 'function') {
            // Verificar si la función existe
            res = JSON.parse(response);
            window[dynamicFunction](res);
        } else {
            console.error(`La función ${controller} no está definida.`);
        }
        // Procesar la respuesta para mostrar los datos en la interfaz
    }
});

// Ejemplo de uso para agregar
// Puedes invocar sendRequest cuando se envíe el formulario de agregar
// sendRequest('add', formData, function (error, response) { ... });

//Desarrollos list
function desarrollos(res) {
    let desarrollos = document.getElementById('desarrollos');
    let html = '';
    res.forEach(item => {
        html += `
            <tr>
                <th scope="row">${item.nombre}</th>
                <td>${item.dataCreation}</td>
                <td>${item.status === 1 ? 'Activo' : 'Inactivo'}</td>
                <td class="text-center">
                    <button class="btn btn-info m-r-5" data-id="${item.id}">Ver Etapas</button>
                    <button class="btn btn-warning m-r-5" data-id="${item.id}">Editar</button>
                    <button class="btn btn-danger m-r-5" data-id="${item.id}">Eliminar</button>
                </td>
            </tr>
        `;
    });
    desarrollos.innerHTML = html;
}
//Desarrollos add
$('#add-desarrollo').submit(function(event) {
    // Evitar que el formulario se envíe automáticamente
    event.preventDefault();

    // Serializar el formulario con jQuery
    var formData = $(this).serializeArray();

    // Enviar la solicitud con los datos serializados
    sendRequest('agregar', formData, function (error, response) {
        // Manejar la respuesta aquí
        if (error) {
            console.error('Error:', error);
        } else {
            console.log('Respuesta:', response);
            // Puedes realizar acciones adicionales con la respuesta recibida
        }
    });
});
