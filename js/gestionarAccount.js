$(document).ready(() => {
    tablaPersonas = $('#tablaPersonas').DataTable({
        columnDefs: [{
            targets: -1,
            data: null,
            defaultContent: "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditar'>Editar</button><button class='btn btn-danger btnBorrar'>Borrar</button></div></div>",
            targets: -1,
        }, ],
        language: {
            lengthMenu: 'Mostrar _MENU_ registros',
            zeroRecords: 'No se encontraron resultados',
            info: 'Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros',
            infoEmpty: 'Mostrando registros del 0 al 0 de un total de 0 registros',
            infoFiltered: '(filtrado de un total de _MAX_ registros)',
            sSearch: 'Buscar:',
            oPaginate: {
                sFirst: 'Primero',
                sLast: 'Último',
                sNext: 'Siguiente',
                sPrevious: 'Anterior',
            },
            sProcessing: 'Procesando...',
        },
    });

    $(document).on('click', '.btnEditar', function() {
        if (confirm('esta seguro?')) {
            fila = $(this).closest('tr');

            email = fila.find('td:eq(0)').text();
            pass = fila.find('td:eq(2)').text();
            estado = fila.find('td:eq(3)').text();
            $.ajax({
                url: '../php/HandlingAccounts.php',
                type: 'POST',
                data: { id: email, estadofun: estado },
                success: function(data) {
                    console.log(data); // Inspect this in your console
                }
            });
        };
    });
    $(document).on('click', '.btnBorrar', function() {
        if (confirm('esta seguro?')) {
            fila = $(this).closest('tr');

            email = fila.find('td:eq(0)').text();
            pass = fila.find('td:eq(2)').text();
            estado = fila.find('td:eq(3)').text();
            //alert(estado);
            $.ajax({
                url: '../php/HandlingAccounts.php',
                type: 'POST',
                data: { id: email, estadofun: estado },
                success: function(data) {
                    console.log(data); // Inspect this in your console
                }
            });
        };
    });
});