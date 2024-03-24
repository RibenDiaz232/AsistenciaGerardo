// Script.js

// JavaScript para cargar los roles dinámicamente
$(document).ready(function() {
    // Realiza una solicitud AJAX para obtener los roles
    $.ajax({
        url: 'obtener_roles.php',
        type: 'GET',
        dataType: 'json',
        success: function(data){
            // Itera sobre los datos recibidos y agrega opciones al select
            $.each(data, function(index, cargo){
                $('#roles').append('<option>', {
                    value: cargo.id,
                    text: cargo.nombre
                });
            });
        },
        error: function(xhr, status, error){
            console.error('Error al obtener los roles', error);
        }
    });
});
