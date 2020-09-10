$(document).ready(function() {

    var trabajarinicio_id, opcion;
    opcion = 4;

    tablaUsuarios8 = $('#tabladatos8').DataTable({
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

                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
                },
            },

        ],
        "ajax": {
            "url": "bd/crud8.php",
            "method": 'POST', //usamos el metodo POST
            "data": { opcion: opcion }, //enviamos opcion 4 para que haga un SELECT
            "dataSrc": ""
        },
        "columns": [
            { "data": "trabajarInicio_id" },
            { "data": "usuario_id" },
            { "data": "date" },
            { "data": "teleTrabajo" },
            { "data": "oficina" },
            { "data": "reunion" },
            { "data": "permisoLaboral" },
            { "data": "publico" },
            { "data": "particular" },
            { "data": "bicicleta" },
            { "data": "aTrabajar" },

            { "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button></div></div>" }
        ]
    });
    //Creamos una fila en el head de la tabla y lo clonamos para cada columna
    $('#tabladatos8 thead tr').clone(true).appendTo('#tabladatos8 thead');

    $('#tabladatos8 thead tr:eq(1) th').each(function(i) {
        var title = $(this).text(); //es el nombre de la columna
        $(this).html('<input type="text" placeholder="Buscar en..' + title + '" />');

        $('input', this).on('keyup change', function() {
            if (tablaUsuarios8.column(i).search() !== this.value) {
                tablaUsuarios8
                    .column(i)
                    .search(this.value)
                    .draw();
            }
        });
    });
    var fila; //captura la fila, para editar o eliminar
    //submit para el Alta y Actualización
    $('#formUsuarios8').submit(function(e) {

        e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
        trabajarinicio_id = $.trim($('#trabajarinicio_id').val());
        usuario_id = $.trim($('#usuario_id').val());
        date = $.trim($('#date').val());
        teleTrabajo = $.trim($('#teleTrabajo').val());
        oficina = $.trim($('#oficina').val());
        reunion = $.trim($('#reunion').val());
        permisoLaboral = $.trim($('#permisoLaboral').val());
        publico = $.trim($('#publico').val());
        particular = $.trim($('#particular').val());
        bicicleta = $.trim($('#bicicleta').val());
        aTrabajar = $.trim($('#aTrabajar').val());

        $.ajax({
            url: "bd/crud8.php",
            type: "POST",
            datatype: "json",
            data: { trabajarinicio_id: trabajarinicio_id, usuario_id: usuario_id, date: date, teleTrabajo: teleTrabajo, oficina: oficina, reunion: reunion, permisoLaboral: permisoLaboral, publico: publico, particular: particular, bicicleta: bicicleta, aTrabajar: aTrabajar, opcion: opcion },
            success: function(data) {
                tablaUsuarios8.ajax.reload(null, false);
            }
        });
        $('#modalCRUD').modal('hide');
    });

    //para limpiar los campos antes de dar de Alta una Persona
    $("#btnNuevo").click(function() {
        opcion = 1; //alta           
        trabajarinicio_id = null;
        $("#formUsuarios8").trigger("reset");
        $(".modal-header").css("background-color", "#17a2b8");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("INGRESAR NUEVO DATO");
        $('#modalCRUD').modal('show');
    });
    //Editar        
    $(document).on("click", ".btnEditar", function() {
        opcion = 2; //editar
        fila = $(this).closest("tr");
        trabajarinicio_id = parseInt(fila.find('td:eq(0)').text());
        usuario_id = fila.find('td:eq(1)').text();
        date = fila.find('td:eq(2)').text();
        teleTrabajo = fila.find('td:eq(3)').text();
        oficina = fila.find('td:eq(4)').text();
        reunion = fila.find('td:eq(5)').text();
        permisoLaboral = fila.find('td:eq(6)').text();
        publico = fila.find('td:eq(7)').text();
        particular = fila.find('td:eq(8)').text();
        bicicleta = fila.find('td:eq(9)').text();
        aTrabajar = fila.find('td:eq(10)').text();
        $("#trabajarinicio_id").val(trabajarinicio_id);
        $("#usuario_id").val(usuario_id);
        $("#date").val(date);
        $("#teleTrabajo").val(teleTrabajo);
        $("#oficina").val(oficina);
        $("#reunion").val(reunion);
        $("#permisoLaboral").val(permisoLaboral);
        $("#publico").val(publico);
        $("#particular").val(particular);
        $("#bicicleta").val(bicicleta);
        $("#aTrabajar").val(aTrabajar);

        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("EDITAR FILA");
        $('#modalCRUD').modal('show');
    });
    //Borrar
    $(document).on("click", ".btnBorrar", function() {
        fila = $(this);
        trabajarinicio_id = parseInt($(this).closest('tr').find('td:eq(0)').text());
        opcion = 3; //eliminar        
        var respuesta = confirm("¿Está seguro de borrar el registro " + trabajarinicio_id + "? luego no habrá forma de recuperarlo");
        if (respuesta) {
            $.ajax({
                url: "bd/crud8.php",
                type: "POST",
                datatype: "json",
                data: { opcion: opcion, trabajarinicio_id: trabajarinicio_id },
                success: function() {
                    tablaUsuarios8.row(fila.parents('tr')).remove().draw();
                }
            });
        }
    });


});