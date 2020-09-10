$(document).ready(function() {

    var rechazoinc_id, opcion;
    opcion = 4;

    tablaUsuarios4 = $('#tabladatos4').DataTable({
        //Buscar
        //bProcessing: true,
        //bDeferRender: true,
        //bServerSide: true,
        orderCellsTop: true,
        //fixedHeader: true,

        language: {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "sProcessing": "Procesando...",
        },


        //para usar los botones   
        responsive: {
            details: true
        },
        dom: 'Bfrtilp',
        buttons: [{
                id: 'btnNuevo',
                type: 'button',
                className: 'btn btn-info',
                text: '<i class="material-icons" style="font-size: 16px;">library_add</i>',
                titleAttr: 'Agregar',
                attr: {
                    title: 'Add',
                    id: 'btnNuevo',
                    dataToggle: 'modal',
                }
            },
            {
                extend: 'excelHtml5',
                text: '<i class="fas fa-file-excel"></i> ',
                titleAttr: 'Exportar a Excel',
                className: 'btn btn-success',
                exportOptions: {
                    columns: [0, 1, 2, 3]
                },
            },
            {
                extend: 'pdfHtml5',
                orientation: 'landscape',
                pageSize: 'A2',
                text: '<i class="fas fa-file-pdf"></i> ',
                titleAttr: 'Exportar a PDF',
                className: 'btn btn-danger',
                download: 'open',
                margin: '30px auto',
                padding: '30mm',
                exportOptions: {
                    columns: [0, 1, 2, 3]
                },
            },
            {
                extend: 'print',
                text: '<i class="fa fa-print"></i> ',
                titleAttr: 'Imprimir',
                className: 'btn btn-primary',
                size: 'landscape',
                margin: '30px auto',
                padding: '30mm',
                exportOptions: {

                    columns: [0, 1, 2, 3],

                },
            },

        ],
        "ajax": {
            "url": "bd/crud4.php",
            "method": 'POST', //usamos el metodo POST
            "data": { opcion: opcion }, //enviamos opcion 4 para que haga un SELECT
            "dataSrc": ""
        },
        "columns": [
            { "data": "rechazoinc_id" },
            { "data": "rechazoinc_arg" },
            { "data": "rechazoinc_fecha" },
            { "data": "usuario_id" },

            { "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button></div></div>" }
        ]
    });
    //Creamos una fila en el head de la tabla y lo clonamos para cada columna
    $('#tabladatos4 thead tr').clone(true).appendTo('#tabladatos4 thead');

    $('#tabladatos4 thead tr:eq(1) th').each(function(i) {
        var title = $(this).text(); //es el nombre de la columna
        $(this).html('<input type="text" placeholder="Buscar en..' + title + '" />');

        $('input', this).on('keyup change', function() {
            if (tablaUsuarios4.column(i).search() !== this.value) {
                tablaUsuarios4
                    .column(i)
                    .search(this.value)
                    .draw();
            }
        });
    });
    var fila; //captura la fila, para editar o eliminar
    //submit para el Alta y Actualización
    $('#formUsuarios4').submit(function(e) {
        e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
        rechazoinc_id = $.trim($('#rechazo_id').val());
        rechazoinc_arg = $.trim($('#rechazoinc_arg').val());
        rechazoinc_fecha = $.trim($('#rechazoinc_fecha').val());
        usuario_id = $.trim($('#usuario_id').val());
        $.ajax({
            url: "bd/crud4.php",
            type: "POST",
            datatype: "json",
            data: { rechazoinc_id: rechazoinc_id, rechazoinc_arg: rechazoinc_arg, rechazoinc_fecha: rechazoinc_fecha, usuario_id: usuario_id, opcion: opcion },
            success: function(data) {
                tablaUsuarios.ajax.reload(null, false);
            }
        });
        $('#modalCRUD').modal('hide');
    });

    //para limpiar los campos antes de dar de Alta una Persona
    $("#btnNuevo").click(function() {
        opcion = 1; //alta           
        rechazoinc_id = null;
        $("#formUsuarios4").trigger("reset");
        $(".modal-header").css("background-color", "#17a2b8");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("INGRESAR NUEVO DATO");
        $('#modalCRUD').modal('show');
    });
    //Editar        
    $(document).on("click", ".btnEditar", function() {
        opcion = 2; //editar
        fila = $(this).closest("tr");
        rechazoinc_id = parseInt(fila.find('td:eq(0)').text());
        rechazoinc_arg = fila.find('td:eq(1)').text();
        rechazoinc_fecha = fila.find('td:eq(2)').text();
        usuario_id = fila.find('td:eq(3)').text();
        $("#rechazoinc_id").val(rechazoinc_id);
        $("#rechazoinc_arg").val(rechazoinc_arg);
        $("#rechazoinc_fecha").val(rechazoinc_fecha);
        $("#usuario_id").val(usuario_id);
    });
    //Borrar
    $(document).on("click", ".btnBorrar", function() {
        fila = $(this);
        rechazoinc_id = parseInt($(this).closest('tr').find('td:eq(0)').text());
        opcion = 3; //eliminar        
        var respuesta = confirm("¿Está seguro de borrar el registro " + rechazoinc_id + "? luego no habrá forma de recuperarlo");
        if (respuesta) {
            $.ajax({
                url: "bd/crud4.php",
                type: "POST",
                datatype: "json",
                data: { opcion: opcion, rechazoinc_id: rechazoinc_id },
                success: function() {
                    tablaUsuarios.row(fila.parents('tr')).remove().draw();
                }
            });
        }
    });


});