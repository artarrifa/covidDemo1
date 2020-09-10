$(document).ready(function() {

    var incapacidad_id, opcion;
    opcion = 4;

    tablaUsuarios = $('#tabladatos3').DataTable({
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
            "url": "bd/crud3.php",
            "method": 'POST', //usamos el metodo POST
            "data": { opcion: opcion }, //enviamos opcion 4 para que haga un SELECT
            "dataSrc": ""
        },
        "columns": [
            { "data": "incapacidad_id" },
            { "data": "incapacidad_ausencia_id" },
            { "data": "usuario_id" },
            { "data": "incapacidad_estado" },
            { "data": "incapacidad_tipo_ausencia" },
            { "data": "incapacidad_diagnostico" },
            { "data": "incapacidad_entidad" },
            { "data": "incapacidad_compania" },
            { "data": "incapacidad_codigocie" },
            { "data": "incapacidad_perdidalaboral" },
            { "data": "incapacidad_medico_nombre" },
            { "data": "incapacidad_medico_codigo" },
            { "data": "incapacidad_responsable" },
            { "data": "incapacidad_responsable_ath_analista" },
            { "data": "incapacidad_responsable_ath_gerente" },
            { "data": "incapacidad_comentarios" },
            { "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button></div></div>" }
        ]
    });
    //Creamos una fila en el head de la tabla y lo clonamos para cada columna
    $('#tabladatos3 thead tr').clone(true).appendTo('#tabladatos3 thead');

    $('#tabladatos3 thead tr:eq(1) th').each(function(i) {
        var title = $(this).text(); //es el nombre de la columna
        $(this).html('<input type="text" placeholder="Buscar en..' + title + '" />');

        $('input', this).on('keyup change', function() {
            if (tablaUsuarios.column(i).search() !== this.value) {
                tablaUsuarios
                    .column(i)
                    .search(this.value)
                    .draw();
            }
        });
    });
    var fila; //captura la fila, para editar o eliminar
    //submit para el Alta y Actualización
    $('#formUsuarios3').submit(function(e) {
        e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
        incapacidad_id = $.trim($('#incapacidad_id').val());
        incapacidad_ausencia_id = $.trim($('#incapacidad_ausencia_id').val());
        usuario_id = $.trim($('#usuario_id').val());
        incapacidad_estado = $.trim($('#incapacidad_estado').val());
        incapacidad_tipo_ausencia = $.trim($('#incapacidad_tipo_ausencia').val());
        incapacidad_diagnostico = $.trim($('#incapacidad_diagnostico').val());
        incapacidad_entidad = $.trim($('#incapacidad_entidad').val());
        incapacidad_compania = $.trim($('#incapacidad_compania').val());
        incapacidad_codigocie = $.trim($('#incapacidad_codigocie').val());
        incapacidad_perdidalaboral = $.trim($('#incapacidad_perdidalaboral').val());
        incapacidad_medico_nombre = $.trim($('# incapacidad_medico_nombre').val());
        incapacidad_medico_codigo = $.trim($('#incapacidad_medico_codigo').val());
        incapacidad_responsable = $.trim($('#incapacidad_responsable').val());
        incapacidad_responsable_ath_analista = $.trim($('#incapacidad_responsable_ath_analista').val());
        incapacidad_responsable_ath_gerente = $.trim($('#incapacidad_responsable_ath_gerente').val());
        incapacidad_comentarios = $.trim($('#incapacidad_comentarios ').val());

        $.ajax({
            url: "bd/crud3.php",
            type: "POST",
            datatype: "json",
            data: { incapacidad_id: incapacidad_id, incapacidad_ausencia_id: incapacidad_ausencia_id, usuario_id: usuario_id, incapacidad_estado: incapacidad_estado, incapacidad_tipo_ausencia: incapacidad_tipo_ausencia, incapacidad_diagnostico: incapacidad_diagnostico, incapacidad_entidad: incapacidad_entidad, incapacidad_compania: incapacidad_compania, incapacidad_codigocie: incapacidad_codigocie, incapacidad_perdidalaboral: incapacidad_perdidalaboral, incapacidad_medico_nombre: incapacidad_medico_nombre, incapacidad_medico_codigo: incapacidad_medico_codigo, incapacidad_responsable: incapacidad_responsable, incapacidad_responsable_ath_analista: incapacidad_responsable_ath_analista, incapacidad_responsable_ath_gerente: incapacidad_responsable_ath_gerente, incapacidad_comentarios: incapacidad_comentarios, opcion: opcion },
            success: function(data) {
                tablaUsuarios.ajax.reload(null, false);
            }
        });
        $('#modalCRUD').modal('hide');
    });

    //para limpiar los campos antes de dar de Alta una Persona
    $("#btnNuevo").click(function() {
        opcion = 1; //alta           
        incapacidad_id = null;
        $("#formUsuarios3").trigger("reset");
        $(".modal-header").css("background-color", "#17a2b8");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("INGRESAR NUEVO DATO");
        $('#modalCRUD').modal('show');
    });
    //Editar        
    $(document).on("click", ".btnEditar", function() {
        opcion = 2; //editar
        fila = $(this).closest("tr");
        incapacidad_id = parseInt(fila.find('td:eq(0)').text());
        incapacidad_ausencia_id = fila.find('td:eq(1)').text();
        usuario_id = fila.find('td:eq(2)').text();
        incapacidad_estado = fila.find('td:eq(3)').text();
        incapacidad_tipo_ausencia = fila.find('td:eq(4)').text();
        incapacidad_diagnostico = fila.find('td:eq(5)').text();
        incapacidad_entidad = fila.find('td:eq(6)').text();
        incapacidad_compania = fila.find('td:eq(7)').text();
        incapacidad_codigocie = fila.find('td:eq(8)').text();
        incapacidad_perdidalaboral = fila.find('td:eq(9)').text();
        incapacidad_medico_nombre = fila.find('td:eq(10)').text();
        incapacidad_medico_codigo = fila.find('td:eq(11)').text();
        incapacidad_responsable = fila.find('td:eq(12)').text();
        incapacidad_responsable_ath_analista = fila.find('td:eq(13)').text();
        incapacidad_responsable_ath_gerente = fila.find('td:eq(14)').text();
        incapacidad_comentarios = fila.find('td:eq(15)').text();
        $("#incapacidad_id").val(incapacidad_id);
        $("#incapacidad_ausencia_id").val(incapacidad_ausencia_id);
        $("#usuario_id").val(usuario_id);
        $("#incapacidad_estado").val(incapacidad_estado);
        $("#incapacidad_tipo_ausencia").val(incapacidad_tipo_ausencia);
        $("#incapacidad_diagnostico").val(incapacidad_diagnostico);
        $("#incapacidad_entidad").val(incapacidad_entidad);
        $("#incapacidad_compania").val(incapacidad_compania);
        $("#incapacidad_codigocie").val(incapacidad_codigocie);
        $("#incapacidad_perdidalaboral").val(incapacidad_perdidalaboral);
        $("#incapacidad_medico_nombre ").val(incapacidad_medico_nombre);
        $("#incapacidad_medico_codigo").val(incapacidad_medico_codigo);
        $("#incapacidad_responsable").val(incapacidad_responsable);
        $("#incapacidad_responsable_ath_analista").val(incapacidad_responsable_ath_analista);
        $("#incapacidad_responsable_ath_gerente").val(incapacidad_responsable_ath_gerente);
        $("#incapacidad_comentarios ").val(incapacidad_comentarios);
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("EDITAR FILA");
        $('#modalCRUD').modal('show');
    });
    //Borrar
    $(document).on("click", ".btnBorrar", function() {
        fila = $(this);
        incapacidad_id = parseInt($(this).closest('tr').find('td:eq(0)').text());
        opcion = 3; //eliminar        
        var respuesta = confirm("¿Está seguro de borrar el registro " + incapacidad_id + "? luego no habrá forma de recuperarlo");
        if (respuesta) {
            $.ajax({
                url: "bd/crud3.php",
                type: "POST",
                datatype: "json",
                data: { opcion: opcion, incapacidad_id: incapacidad_id },
                success: function() {
                    tablaUsuarios.row(fila.parents('tr')).remove().draw();
                }
            });
        }
    });


});