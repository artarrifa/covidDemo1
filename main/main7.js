$(document).ready(function() {

    var tXd_id, opcion;
    opcion = 4;

    tablaUsuarios7 = $('#tabladatos7').DataTable({
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
                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14]
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
                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14]
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

                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14]
                },
            },

        ],
        "ajax": {
            "url": "bd/crud7.php",
            "method": 'POST', //usamos el metodo POST
            "data": { opcion: opcion }, //enviamos opcion 4 para que haga un SELECT
            "dataSrc": ""
        },
        "columns": [
            { "data": "tXd_id" },
            { "data": "date" },
            { "data": "msb_d" },
            { "data": "msm_d" },
            { "data": "ti_d" },
            { "data": "dc_d" },
            { "data": "sc_d" },
            { "data": "telTra_d" },
            { "data": "ofi_d" },
            { "data": "reu_d" },
            { "data": "perLab_d" },
            { "data": "pub_d" },
            { "data": "par_d" },
            { "data": "bic_d" },
            { "data": "aTra_d" },

            { "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button></div></div>" }
        ]
    });
    //Creamos una fila en el head de la tabla y lo clonamos para cada columna
    $('#tabladatos7 thead tr').clone(true).appendTo('#tabladatos7 thead');

    $('#tabladatos7 thead tr:eq(1) th').each(function(i) {
        var title = $(this).text(); //es el nombre de la columna
        $(this).html('<input type="text" placeholder="Buscar en..' + title + '" />');

        $('input', this).on('keyup change', function() {
            if (tablaUsuarios7.column(i).search() !== this.value) {
                tablaUsuarios7
                    .column(i)
                    .search(this.value)
                    .draw();
            }
        });
    });
    var fila; //captura la fila, para editar o eliminar
    //submit para el Alta y Actualización
    $('#formUsuarios7').submit(function(e) {
        e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
        tXd_id = $.trim($('#tXd_id').val());
        date = $.trim($('#date').val());
        msb_d = $.trim($('#msb_d').val());
        msm_d = $.trim($('#msm_d').val());
        ti_d = $.trim($('#ti_d').val());
        dc_d = $.trim($('#dc_d').val());
        sc_d = $.trim($('#sc_d').val());
        telTra_d = $.trim($('#telTra_d').val());
        ofi_d = $.trim($('#ofi_d').val());
        reu_d = $.trim($('#reu_d').val());
        perLab_d = $.trim($('#perLab_d').val());
        pub_d = $.trim($('#pub_d').val());
        par_d = $.trim($('#par_d').val());
        bic_d = $.trim($('#bic_d').val());
        aTra_d = $.trim($('#aTra_d').val());
        $.ajax({
            url: "bd/crud7.php",
            type: "POST",
            datatype: "json",
            data: { tXd_id: tXd_id, date: date, msb_d: msb_d, msm_d: msm_d, ti_d: ti_d, dc_d: dc_d, sc_d: sc_d, telTra_d: telTra_d, ofi_d: ofi_d, reu_d: reu_d, perLab_d: perLab_d, pub_d: pub_d, par_d: par_d, bic_d: bic_d, aTra_d: aTra_d, opcion: opcion },
            success: function(data) {
                tablaUsuarios7.ajax.reload(null, false);
            }
        });
        $('#modalCRUD').modal('hide');
    });

    //para limpiar los campos antes de dar de Alta una Persona
    $("#btnNuevo").click(function() {
        opcion = 1; //alta           
        tXd_id = null;
        $("#formUsuarios7").trigger("reset");
        $(".modal-header").css("background-color", "#17a2b8");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("INGRESAR NUEVO DATO");
        $('#modalCRUD').modal('show');
    });
    //Editar        
    $(document).on("click", ".btnEditar", function() {
        opcion = 2; //editar
        fila = $(this).closest("tr");
        tXd_id = parseInt(fila.find('td:eq(0)').text());
        date = fila.find('td:eq(1)').text();
        msb_d = fila.find('td:eq(2)').text();
        msm_d = fila.find('td:eq(3)').text();
        ti_d = fila.find('td:eq(4)').text();
        dc_d = fila.find('td:eq(5)').text();
        sc_d = fila.find('td:eq(6)').text();
        telTra_d = fila.find('td:eq(7)').text();
        ofi_d = fila.find('td:eq(8)').text();
        reu_d = fila.find('td:eq(9)').text();
        perLab_d = fila.find('td:eq(10)').text();
        pub_d = fila.find('td:eq(11)').text();
        par_d = fila.find('td:eq(12)').text();
        bic_d = fila.find('td:eq(13)').text();
        aTra_d = fila.find('td:eq(14)').text();
        $("#tXd_id").val(tXd_id);
        $("#date").val(date);
        $("#msb_d").val(msb_d);
        $("#msm_d").val(msm_d);
        $("#ti_d").val(ti_d);
        $("#dc_d").val(dc_d);
        $("#sc_d").val(sc_d);
        $("#telTra_d").val(telTra_d);
        $("#ofi_d").val(ofi_d);
        $("#reu_d").val(reu_d);
        $("#perLab_d").val(perLab_d);
        $("#pub_d").val(pub_d);
        $("#par_d").val(par_d);
        $("#bic_d").val(bic_d);
        $("#aTra_d").val(aTra_d);

        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("EDITAR FILA");
        $('#modalCRUD').modal('show');
    });
    //Borrar
    $(document).on("click", ".btnBorrar", function() {
        fila = $(this);
        tXd_id = parseInt($(this).closest('tr').find('td:eq(0)').text());
        opcion = 3; //eliminar        
        var respuesta = confirm("¿Está seguro de borrar el registro " + tXd_id + "? luego no habrá forma de recuperarlo");
        if (respuesta) {
            $.ajax({
                url: "bd/crud7.php",
                type: "POST",
                datatype: "json",
                data: { opcion: opcion, tXd_id: tXd_id },
                success: function() {
                    tablaUsuarios7.row(fila.parents('tr')).remove().draw();
                }
            });
        }
    });


});