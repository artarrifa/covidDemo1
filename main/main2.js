jQuery(document).ready(function() {

    var ausencia_id, opcion;
    opcion = 4;


    tablaUsuarios2 = $('#tabladatos2').DataTable({
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
                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
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
                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
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

                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10],

                },
            },

        ],
        "ajax": {
            "url": "bd/crud2.php",
            "method": 'POST', //usamos el metodo POST
            "data": { opcion: opcion }, //enviamos opcion 4 para que haga un SELECT
            "dataSrc": ""
        },
        "columns": [
            { "data": "ausencia_id" },
            { "data": "ausencia_usuario_id" },
            { "data": "ausencia_tipo" },
            { "data": "ausencia_inicio" },
            { "data": "ausencia_fin" },
            { "data": "ausencia_horas" },
            { "data": "ausencia_fecha_creacion" },
            { "data": "ausencia_estado" },
            { "data": "ausencia_responsable_ath" },
            { "data": "ausencia_observaciones" },
            { "data": "ausencia_sin_soporte" },
            { "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button></div></div>" }
        ]
    });
    //Creamos una fila en el head de la tabla y lo clonamos para cada columna
    $('#tabladatos2 thead tr').clone(true).appendTo('#tabladatos2 thead');

    $('#tabladatos2 thead tr:eq(1) th').each(function(i) {
        var title = $(this).text(); //es el nombre de la columna
        $(this).html('<input type="text" placeholder="Buscar en..' + title + '" />');

        $('input', this).on('keyup change', function() {
            if (tablaUsuarios2.column(i).search() !== this.value) {
                tablaUsuarios2
                    .column(i)
                    .search(this.value)
                    .draw();
            }
        });
    });
    var fila;
    $('#formUsuarios2').submit(function(e) {
        e.preventDefault();
        ausencia_id = $.trim($('#ausencia_id').val());
        ausencia_usuario_id = $.trim($('#ausencia_usuario_id').val());
        ausencia_tipo = $.trim($('# ausencia_tipo').val());
        ausencia_inicio = $.trim($('#ausencia_inicio ').val());
        ausencia_fin = $.trim($('#ausencia_fin').val());
        ausencia_horas = $.trim($('#ausencia_horas').val());
        ausencia_fecha_creacion = $.trim($('# ausencia_fecha_creacion').val());
        ausencia_estado = $.trim($('# ausencia_estado').val());
        ausencia_responsable_ath = $.trim($('# ausencia_responsable_ath').val());
        ausencia_observaciones = $.trim($('#ausencia_observaciones ').val());
        ausencia_sin_soporte = $.trim($('# ausencia_sin_soporte').val());
        $.ajax({
            url: "bd/crud2.php",
            type: "POST",
            datatype: "json",
            data: { ausencia_id: ausencia_id, ausencia_usuario_id: ausencia_usuario_id, ausencia_tipo: ausencia_tipo, ausencia_inicio: ausencia_inicio, ausencia_fin: ausencia_fin, ausencia_horas: ausencia_horas, ausencia_fecha_creacion: ausencia_fecha_creacion, ausencia_estado: ausencia_estado, ausencia_responsable_ath: ausencia_responsable_ath, ausencia_observaciones: ausencia_observaciones, ausencia_sin_soporte: ausencia_sin_soporte, opcion: opcion },
            success: function(data) {
                tablaUsuarios.ajax.reload(null, false);
            }
        });
        $('#modalCRUD').modal('hide');
    });
    $("#btnNuevo").click(function() {
        opcion = 1;
        ausencia_id = null;
        $("#formUsuarios2").trigger("reset");
        $(".modal-header").css("background-color", "#17a2b8");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("INGRESAR NUEVO DATO");
        $('#modalCRUD').modal('show');
    });

    //Editar        
    $(document).on("click", ".btnEditar", function() {
        opcion = 2;
        fila = $(this).closest("tr");
        ausencia_id = parseInt(fila.find('td:eq(0)').text());
        ausencia_usuario_id = fila.find('td:eq(1)').text();
        ausencia_tipo = fila.find('td:eq(2)').text();
        ausencia_inicio = fila.find('td:eq(3)').text();
        ausencia_fin = fila.find('td:eq(4)').text();
        ausencia_horas = fila.find('td:eq(5)').text();
        ausencia_fecha_creacion = fila.find('td:eq(6)').text();
        ausencia_estado = fila.find('td:eq(7)').text();
        ausencia_responsable_ath = fila.find('td:eq(8)').text();
        ausencia_observaciones = fila.find('td:eq(9)').text();
        ausencia_sin_soporte = fila.find('td:eq(10)').text();
        $("#ausencia_id").val(ausencia_id);
        $("#ausencia_usuario_id").val(ausencia_usuario_id);
        $("#ausencia_tipo").val(ausencia_tipo);
        $("#ausencia_inicio").val(ausencia_inicio);
        $("#ausencia_fin").val(ausencia_fin);
        $("#ausencia_horas").val(ausencia_horas);
        $("#ausencia_fecha_creacion").val(ausencia_fecha_creacion);
        $("#ausencia_estado").val(ausencia_estado);
        $("#ausencia_responsable_ath").val(ausencia_responsable_ath);
        $("#ausencia_observaciones").val(ausencia_observaciones);
        $("#ausencia_sin_soporte").val(ausencia_sin_soporte);
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("EDITAR FILA");
        $('#modalCRUD').modal('show');
    });

    //Borrar
    $(document).on("click", ".btnBorrar", function() {
        fila = $(this);
        ausencia_id = parseInt($(this).closest('tr').find('td:eq(0)').text());
        opcion = 3;
        var respuesta = confirm("¿Está seguro de borrar el registro " + ausencia_id + "?");
        if (respuesta) {
            $.ajax({
                url: "bd/crud2.php",
                type: "POST",
                datatype: "json",
                data: { opcion: opcion, ausencia_id: ausencia_id },
                success: function() {
                    tablaUsuarios.row(fila.parents('tr')).remove().draw();
                }
            });
        }
    });

});