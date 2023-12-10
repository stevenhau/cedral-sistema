//Desarrollos
// Obtener la parte de la URL después del dominio
let controlador = window.location.pathname;



$.ajax({
    url: '/manager', // URL a la que se envía la petición
    type: 'POST', // Tipo de petición (GET, POST, etc.)
    data: {
        controlador: controlador,
        parametros: ""
    }, // Datos que se envían al servidor
    success: function(response) {
        // Función que se ejecuta si la petición es exitosa
        console.log('Respuesta del servidor:', response);
        // Aquí puedes manejar la respuesta del servidor
    },
    error: function(xhr, status, error) {
        // Función que se ejecuta si hay un error en la petición
        console.error('Error en la petición:', error);
        // Aquí puedes manejar el error
    }
});