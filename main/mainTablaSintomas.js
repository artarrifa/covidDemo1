$(document).ready(function() {

    var sintomas_id, opcion;
    opcion = 4;

    tablaUsuarios5 = $('#tabladatos5').DataTable({
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
                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19]
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
                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19]
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

                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19]
                },
            },

        ],
        "ajax": {
            "url": "bd/crud5.php",
            "method": 'POST', //usamos el metodo POST
            "data": { opcion: opcion }, //enviamos opcion 4 para que haga un SELECT
            "dataSrc": ""
        },
        "columns": [
            { "data": "sintomas_id" },
            { "data": "usuario_id" },
            { "data": "date" },
            { "data": "fatiga" },
            { "data": "dolorMuscular" },
            { "data": "escalofrios" },
            { "data": "dolorDeCabeza" },
            { "data": "diarrea" },
            { "data": "dolorDeGarganta" },
            { "data": "perdidaGusto" },
            { "data": "nauseas" },
            { "data": "diagnosticoCovid" },
            { "data": "sospechaCovid" },
            { "data": "otraEnfermedad" },
            { "data": "tengoIncapacidad" },
            { "data": "alta" },
            { "data": "normal" },
            { "data": "sinInformacion" },
            { "data": "meSientoBien" },
            { "data": "meSientoMal" },

            { "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button></div></div>" }
        ]
    });
    //Creamos una fila en el head de la tabla y lo clonamos para cada columna
    $('#tabladatos5 thead tr').clone(true).appendTo('#tabladatos5 thead');

    $('#tabladatos5 thead tr:eq(1) th').each(function(i) {
        var title = $(this).text(); //es el nombre de la columna
        $(this).html('<input type="text" placeholder="Buscar en..' + title + '" />');

        $('input', this).on('keyup change', function() {
            if (tablaUsuarios5.column(i).search() !== this.value) {
                tablaUsuarios5
                    .column(i)
                    .search(this.value)
                    .draw();
            }
        });
    });
    var fila; //captura la fila, para editar o eliminar
    //submit para el Alta y Actualización
    $('#formUsuarios5').submit(function(e) {
        e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
        sintomas_id = $.trim($('#sintomas_id').val());
        usuario_id = $.trim($('#usuario_id').val());
        date = $.trim($('#date').val());
        fatiga = $.trim($('#fatiga').val());
        dolorMuscular = $.trim($('#dolorMuscular').val());
        escalofrios = $.trim($('#escalofrios').val());
        dolorDeCabeza = $.trim($('#dolorDeCabeza').val());
        diarrea = $.trim($('#diarrea').val());
        dolorDeGarganta = $.trim($('#dolorDeGarganta').val());
        perdidaGusto = $.trim($('#perdidaGusto').val());
        nauseas = $.trim($('#nauseas').val());
        diagnosticoCovid = $.trim($('#diagnosticoCovid').val());
        sospechaCovid = $.trim($('#sospechaCovid').val());
        otraEnfermedad = $.trim($('#otraEnfermedad').val());
        tengoIncapacidad = $.trim($('#tengoIncapacidad').val());
        alta = $.trim($('#alta').val());
        normal = $.trim($('#normal').val());
        sinInformacion = $.trim($('#sinInformacion').val());
        meSientoBien = $.trim($('#meSientoBien').val());
        meSientoMal = $.trim($('#meSientoMal').val());

        $.ajax({
            url: "bd/crud5.php",
            type: "POST",
            datatype: "json",
            data: { sintomas_id: sintomas_id, usuario_id: usuario_id, date: date, fatiga: fatiga, dolorMuscular: dolorMuscular, escalofrios: escalofrios, dolorDeCabeza: dolorDeCabeza, diarrea: diarrea, dolorDeGarganta: dolorDeGarganta, perdidaGusto: perdidaGusto, nauseas: nauseas, diagnosticoCovid: diagnosticoCovid, sospechaCovid: sospechaCovid, otraEnfermedad: otraEnfermedad, tengoIncapacidad: tengoIncapacidad, alta: alta, normal: normal, sinInformacion: sinInformacion, meSientoBien: meSientoBien, meSientoMal: meSientoMal, opcion: opcion },
            success: function(data) {
                tablaUsuarios.ajax.reload(null, false);
            }
        });
        $('#modalCRUD').modal('hide');
    });

    //para limpiar los campos antes de dar de Alta una Persona
    $("#btnNuevo").click(function() {
        opcion = 1; //alta           
        sintomas_id = null;
        $("#formUsuarios5").trigger("reset");
        $(".modal-header").css("background-color", "#17a2b8");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("INGRESAR NUEVO DATO");
        $('#modalCRUD').modal('show');
    });
    //Editar        
    $(document).on("click", ".btnEditar", function() {
        opcion = 2; //editar
        fila = $(this).closest("tr");
        sintomas_id = parseInt(fila.find('td:eq(2)').text());
        usuario_id = fila.find('td:eq(3)').text();
        date = fila.find('td:eq(4)').text();
        fatiga = fila.find('td:eq(5)').text();
        dolorMuscular = fila.find('td:eq(6)').text();
        escalofrios = fila.find('td:eq(7)').text();
        dolorDeCabeza = fila.find('td:eq(8)').text();
        diarrea = fila.find('td:eq(9)').text();
        dolorDeGarganta = fila.find('td:eq(10)').text();
        perdidaGusto = fila.find('td:eq(11)').text();
        nauseas = fila.find('td:eq(12)').text();
        diagnosticoCovid = fila.find('td:eq(13)').text();
        sospechaCovid = fila.find('td:eq(14)').text();
        otraEnfermedad = fila.find('td:eq(15)').text();
        tengoIncapacidad = fila.find('td:eq(16)').text();
        alta = fila.find('td:eq(17)').text();
        normal = fila.find('td:eq(18)').text();
        sinInformacion = fila.find('td:eq(19)').text();
        meSientoBien = fila.find('td:eq(20)').text();
        meSientoMal = fila.find('td:eq(21)').text();

        $("#sintomas_id").val(sintomas_id);
        $("#usuario_id").val(usuario_id);
        $("#date").val(date);
        $("#fatiga").val(fatiga);
        $("#dolorMuscular").val(dolorMuscular);
        $("#escalofrios").val(escalofrios);
        $("#dolorDeCabeza").val(dolorDeCabeza);
        $("#diarrea").val(diarrea);
        $("#dolorDeGarganta").val(dolorDeGarganta);
        $("#perdidaGusto").val(perdidaGusto);
        $("#nauseas").val(nauseas);
        $("#diagnosticoCovid").val(diagnosticoCovid);
        $("#sospechaCovid").val(sospechaCovid);
        $("#otraEnfermedad").val(otraEnfermedad);
        $("#tengoIncapacidad").val(tengoIncapacidad);
        $("#alta").val(alta);
        $("#normal").val(normal);
        $("#sinInformacion").val(sinInformacion);
        $("#meSientoBien").val(meSientoBien);
        $("#meSientoMal").val(meSientoMal);
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("EDITAR FILA");
        $('#modalCRUD').modal('show');
    });
    //Borrar
    $(document).on("click", ".btnBorrar", function() {
        fila = $(this);
        sintomas_id = parseInt($(this).closest('tr').find('td:eq(0)').text());
        opcion = 3; //eliminar        
        var respuesta = confirm("¿Está seguro de borrar el registro " + sintomas_id + "? luego no habrá forma de recuperarlo");
        if (respuesta) {
            $.ajax({
                url: "bd/crud5.php",
                type: "POST",
                datatype: "json",
                data: { opcion: opcion, sintomas_id: sintomas_id },
                success: function() {
                    tablaUsuarios5.row(fila.parents('tr')).remove().draw();
                }
            });
        }
    });


});