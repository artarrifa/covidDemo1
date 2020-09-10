$(document).ready(function() {

    var vulnerabilidad_id, opcion;
    opcion = 4;

    tablaUsuarios12 = $('#tabladatos12').DataTable({
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
                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18]
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
                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18]
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

                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18]

                },
            },

        ],
        "ajax": {
            "url": "bd/crud12.php",
            "method": 'POST', //usamos el metodo POST
            "data": { opcion: opcion }, //enviamos opcion 4 para que haga un SELECT
            "dataSrc": ""
        },
        "columns": [
            { "data": "vulnerabilidad_id" },
            { "data": "usuario_id" },
            { "data": "mayor60" },
            { "data": "enfermedadRenal" },
            { "data": "enfermedadPulmonar" },
            { "data": "asma" },
            { "data": "hipertensionArterial" },
            { "data": "enfermedadCardiaca" },
            { "data": "sistemaInmunitario" },
            { "data": "obesidad" },
            { "data": "diabetes" },
            { "data": "enfermedadHepatica" },
            { "data": "tabaquismo" },
            { "data": "fallaRespiratoria" },
            { "data": "transplantes" },
            { "data": "cancer" },
            { "data": "embarazo" },
            { "data": "aceptoTerminos" },
            { "data": "aceptoTerminosFecha" },

            { "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button></div></div>" }
        ]
    });
    //Creamos una fila en el head de la tabla y lo clonamos para cada columna
    $('#tabladatos12 thead tr').clone(true).appendTo('#tabladatos12 thead');

    $('#tabladatos12 thead tr:eq(1) th').each(function(i) {
        var title = $(this).text(); //es el nombre de la columna
        $(this).html('<input type="text" placeholder="Buscar en..' + title + '" />');

        $('input', this).on('keyup change', function() {
            if (tablaUsuarios12.column(i).search() !== this.value) {
                tablaUsuarios12
                    .column(i)
                    .search(this.value)
                    .draw();
            }
        });
    });
    var fila; //captura la fila, para editar o eliminar
    //submit para el Alta y Actualización
    $('#formUsuarios12').submit(function(e) {
        e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página

        vulnerailidad_id = $.trim($('#vulnerabilidad_id').val());
        usuario_id = $.trim($('#usuario_id').val());
        mayor60 = $.trim($('#mayor60').val());
        enfermedadRenal = $.trim($('#enfermedadRenal').val());
        enfermedadPulmonar = $.trim($('#enfermedadPulmonar').val());
        asma = $.trim($('#asma').val());
        hipertensionArterial = $.trim($('#hipertensionArterial').val());
        enfermedadCardiaca = $.trim($('#enfermedadCardiaca').val());
        sistemaInmunitario = $.trim($('#sistemaInmunitario').val());
        obesidad = $.trim($('#obesidad').val());
        diabetes = $.trim($('#diabetes').val());
        enfermedadHepatica = $.trim($('#enfermedadHepatica').val());
        tabaquismo = $.trim($('#tabaquismo').val());
        fallaRespiratoria = $.trim($('#fallaRespiratoria').val());
        transplantes = $.trim($('#transplantes').val());
        cancer = $.trim($('#cancer').val());
        embarazo = $.trim($('#embarazo').val());
        aceptoTerminos = $.trim($('#aceptoTerminos').val());
        aceptoTerminosFecha = $.trim($('#aceptoTerminosFecha').val());


        $.ajax({
            url: "bd/crud12.php",
            type: "POST",
            datatype: "json",
            data: { vulnerabilidad_id: vulnerabilidad_id, usuario_id: usuario_id, mayor60: mayor60, enfermedadRenal: enfermedadRenal, enfermedadPulmonar: enfermedadPulmonar, asma: asma, hipertensionArterial: hipertensionArterial, enfermedadCardiaca: enfermedadCardiaca, sistemaInmunitario: sistemaInmunitario, obesidad: obesidad, diabetes: diabetes, enfermedadHepatica: enfermedadHepatica, tabaquismo: tabaquismo, fallaRespiratoria: fallaRespiratoria, transplantes: transplantes, cancer: cancer, embarazo: embarazo, aceptoTerminos: aceptoTerminos, aceptoTerminosFecha: aceptoTerminosFecha, opcion: opcion },
            success: function(data) {
                tablaUsuarios12.ajax.reload(null, false);
            }
        });
        $('#modalCRUD').modal('hide');
    });

    //para limpiar los campos antes de dar de Alta una Persona
    $("#btnNuevo").click(function() {
        opcion = 1; //alta           
        vulnerabilidad_id = null;
        $("#formUsuarios12").trigger("reset");
        $(".modal-header").css("background-color", "#17a2b8");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("INGRESAR NUEVO DATO");
        $('#modalCRUD').modal('show');
    });
    //Editar        
    $(document).on("click", ".btnEditar", function() {
        opcion = 2; //editar
        fila = $(this).closest("tr");
        vulnerabilidad_id = parseInt(fila.find('td:eq(0)').text());
        usuario_id = fila.find('td:eq(1)').text();
        mayor60 = fila.find('td:eq(2)').text();
        enfermedadRenal = fila.find('td:eq(3)').text();
        enfermedadPulmonar = fila.find('td:eq(4)').text();
        asma = fila.find('td:eq(5)').text();
        hipertensionArterial = fila.find('td:eq(6)').text();
        enfermedadCardiaca = fila.find('td:eq(7)').text();
        sistemaInmunitario = fila.find('td:eq(8)').text();
        obesidad = fila.find('td:eq(9)').text();
        diabetes = fila.find('td:eq(10)').text();
        enfermedadHepatica = fila.find('td:eq(11)').text();
        tabaquismo = fila.find('td:eq(12)').text();
        fallaRespiratoria = fila.find('td:eq(13)').text();
        transplantes = fila.find('td:eq(14)').text();
        cancer = fila.find('td:eq(15)').text();
        embarazo = fila.find('td:eq(16)').text();
        aceptoTerminos = fila.find('td:eq(17)').text();
        aceptoTerminosFecha = fila.find('td:eq(18)').text();
        $("#vulnerabilidad_id").val();
        $("#usuario_id").val();
        $("#mayor60").val();
        $("#enfermedadRenal").val();
        $("#enfermedadPulmonar").val();
        $("#asma").val();
        $("#hipertensionArterial").val();
        $("#enfermedadCardiaca").val();
        $("#sistemaInmunitario").val();
        $("#obesidad").val();
        $("#diabetes").val();
        $("#enfermedadHepatica").val();
        $("#tabaquismo").val();
        $("#fallaRespiratoria").val();
        $("#transplantes").val();
        $("#cancer").val();
        $("#embarazo").val();
        $("#aceptoTerminos").val();
        $("#aceptoTerminosFecha").val();
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("EDITAR FILA");
        $('#modalCRUD').modal('show');
    });
    //Borrar
    $(document).on("click", ".btnBorrar", function() {
        fila = $(this);
        vulnerabilidad_id = parseInt($(this).closest('tr').find('td:eq(0)').text());
        opcion = 3; //eliminar        
        var respuesta = confirm("¿Está seguro de borrar el registro " + vulnerabilidad_id + "? luego no habrá forma de recuperarlo");
        if (respuesta) {
            $.ajax({
                url: "bd/crud12.php",
                type: "POST",
                datatype: "json",
                data: { opcion: opcion, vulnerabilidad_id: vulnerabilidad_id },
                success: function() {
                    tablaUsuarios12.row(fila.parents('tr')).remove().draw();
                }
            });
        }
    });


});