$(document).ready(function() {

    var usuario_id, opcion;
    opcion = 4;

    tablaUsuarios11 = $('#tabladatos11').DataTable({
        //Buscar
        bProcessing: true,
        bDeferRender: true,
        bServerSide: true,
        orderCellsTop: true,
        fixedHeader: true,

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
                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15]
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
                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15]
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
                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15]
                },
            },

        ],
        "ajax": {
            "url": "bd/crud11.php",
            "method": 'POST', //usamos el metodo POST
            "data": { opcion: opcion }, //enviamos opcion 4 para que haga un SELECT
            "dataSrc": ""
        },
        "columns": [
            { "data": "usuario_id" },
            { "data": "usuario_nombre" },
            { "data": "usuario_password" },
            { "data": "usuario_estado_registro" },
            { "data": "usuario_apellido" },
            { "data": "usuario_tipo_documento" },
            { "data": "usuario_documento" },
            { "data": "usuario_cargo" },
            { "data": "usuario_empresa" },
            { "data": "usuario_foto" },
            { "data": "usuario_responsable_ath_id" },
            { "data": "usuario_celular" },
            { "data": "usuario_email" },
            { "data": "usuario_estado_ausencia" },
            { "data": "usuario_salario_mensual" },
            { "data": "usuario_rol" },

            { "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button></div></div>" }
        ]
    });
    //Creamos una fila en el head de la tabla y lo clonamos para cada columna
    $('#tabladatos11 thead tr').clone(true).appendTo('#tabladatos11 thead');

    $('#tabladatos11 thead tr:eq(1) th').each(function(i) {
        var title = $(this).text(); //es el nombre de la columna
        $(this).html('<input type="text" placeholder="Buscar en..' + title + '" />');

        $('input', this).on('keyup change', function() {
            if (tablaUsuarios11.column(i).search() !== this.value) {
                tablaUsuarios11
                    .column(i)
                    .search(this.value)
                    .draw();
            }
        });
    });
    var fila; //captura la fila, para editar o eliminar
    //submit para el Alta y Actualización
    $('#formUsuarios11').submit(function(e) {
        e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
        usuario_id = $.trim($('#usuario_id').val());
        usuario_nombre = $.trim($('#usuario_nombre').val());
        usuario_password = $.trim($('#usuario_password').val());
        usuario_estado_registro = $.trim($('#usuario_estado_registro').val());
        usuario_apellido = $.trim($('#usuario_apellido').val());
        usuario_tipo_documento = $.trim($('#usuario_tipo_documento').val());
        usuario_documento = $.trim($('#usuario_documento').val());
        usuario_cargo = $.trim($('#usuario_cargo').val());
        usuario_empresa = $.trim($('#usuario_empresa').val());
        usuario_foto = $.trim($('#usuario_foto').val());
        usuario_responsable_ath_id = $.trim($('#usuario_responsable_ath_id').val());
        usuario_celular = $.trim($('#usuario_celular').val());
        usuario_email = $.trim($('#usuario_email').val());
        usuario_estado_ausencia = $.trim($('#usuario_estado_ausencia').val());
        usuario_salario_ausencia = $.trim($('#usuario_salario_ausencia').val());
        usuario_salario_mensual = $.trim($('#usuario_salario_mensual').val());
        usuario_rol = $.trim($('#usuario_rol').val());

        $.ajax({
            url: "bd/crud11.php",
            type: "POST",
            datatype: "json",
            data: { usuario_id: usuario_id, usuario_nombre: usuario_nombre, usuario_password: usuario_password, usuario_estado_registro: usuario_estado_registro, usuario_apellido: usuario_apellido, usuario_tipo_documento: usuario_tipo_documento, usuario_documento: usuario_documento, usuario_cargo: usuario_cargo, usuario_empresa: usuario_empresa, usuario_foto: usuario_foto, usuario_responsable_ath_id: usuario_responsable_ath_id, usuario_celular: usuario_celular, usuario_email: usuario_email, usuario_estado_ausencia: usuario_estado_ausencia, usuario_salario_ausencia: usuario_salario_ausencia, usuario_salario_mensual: usuario_salario_mensual, usuario_rol: usuario_rol, opcion: opcion },
            success: function(data) {
                tablaUsuarios11.ajax.reload(null, false);
            }
        });
        $('#modalCRUD').modal('hide');
    });

    //para limpiar los campos antes de dar de Alta una Persona
    $("#btnNuevo").click(function() {
        opcion = 1; //alta           
        usuario_id = null;
        $("#formUsuarios11").trigger("reset");
        $(".modal-header").css("background-color", "#17a2b8");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("INGRESAR NUEVO DATO");
        $('#modalCRUD').modal('show');
    });
    //Editar        
    $(document).on("click", ".btnEditar", function() {
        opcion = 2; //editar
        fila = $(this).closest("tr");
        usuario_id = parseInt(fila.find('td:eq(0)').text());
        usuario_nombre = fila.find('td:eq(1)').text();
        usuario_password = fila.find('td:eq(2)').text();
        usuario_estado_registro = fila.find('td:eq(3)').text();
        usuario_apellido = fila.find('td:eq(4)').text();
        usuario_tipo_documento = fila.find('td:eq(5)').text();
        usuario_documento = fila.find('td:eq(6)').text();
        usuario_cargo = fila.find('td:eq(7)').text();
        usuario_empresa = fila.find('td:eq(8)').text();
        usuario_foto = fila.find('td:eq(9)').text();
        usuario_responsable_ath_id = fila.find('td:eq(10)').text();
        usuario_celular = fila.find('td:eq(11)').text();
        usuario_email = fila.find('td:eq(12)').text();
        usuario_estado_ausencia = fila.find('td:eq(13)').text();
        usuario_salario_ausencia = fila.find('td:eq(14)').text();
        usuario_salario_mensual = fila.find('td:eq(15)').text();
        usuario_rol = fila.find('td:eq(16)').text();
        $("#usuario_id").val(usuario_id);
        $("#usuario_nombre").val(usuario_nombre);
        $("#usuario_password").val(usuario_password);
        $("#usuario_estado_registro").val(usuario_estado_registro);
        $("#usuario_apellido").val(usuario_apellido);
        $("#usuario_tipo_documento").val(usuario_tipo_documento);
        $("#usuario_documento").val(usuario_documento);
        $("#usuario_cargo").val(usuario_cargo);
        $("#usuario_empresa").val(usuario_empresa);
        $("#usuario_foto").val(usuario_foto);
        $("#usuario_responsable_ath_id").val(usuario_responsable_ath_id);
        $("#usuario_celular").val(usuario_celular);
        $("#usuario_email").val(usuario_email);
        $("#usuario_estado_ausencia").val(usuario_estado_ausencia);
        $("#usuario_salario_ausencia").val(usuario_salario_ausencia);
        $("#usuario_salario_mensual").val(usuario_salario_mensual);
        $("#usuario_rol").val(usuario_rol);
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("EDITAR FILA");
        $('#modalCRUD').modal('show');
    });
    //Borrar
    $(document).on("click", ".btnBorrar", function() {
        fila = $(this);
        usuario_id = parseInt($(this).closest('tr').find('td:eq(0)').text());
        opcion = 3; //eliminar        
        var respuesta = confirm("¿Está seguro de borrar el registro " + usuario_id + "? luego no habrá forma de recuperarlo");
        if (respuesta) {
            $.ajax({
                url: "bd/crud11.php",
                type: "POST",
                datatype: "json",
                data: { opcion: opcion, usuario_id: usuario_id },
                success: function() {
                    tablaUsuarios11.row(fila.parents('tr')).remove().draw();
                }
            });
        }
    });


});