$(document).ready(function() {

    var user_id, opcion;
    opcion = 4;

    tablaUsuarios10 = $('#tabladatos10').DataTable({
        //Buscar
        /* bProcessing: true,
         bDeferRender: true,
         bServerSide: true,*/
        orderCellsTop: true,
        /*fixedHeader: true,*/

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
            "url": "bd/crud10.php",
            "method": 'POST', //usamos el metodo POST
            "data": { opcion: opcion }, //enviamos opcion 4 para que haga un SELECT
            "dataSrc": ""
        },
        "columns": [
            { "data": "user_id" },
            { "data": "fecha" },
            { "data": "mes" },
            { "data": "cedula" },
            { "data": "datosDelTrabajador" },
            { "data": "fechaIngreso" },
            { "data": "razonSocial" },
            { "data": "empresaUsuaria" },
            { "data": "entidad" },
            { "data": "tipo" },
            { "data": "codigoDiagnostico" },
            { "data": "descripcion" },
            { "data": "sistemaAfectado" },
            { "data": "fechaInicial" },
            { "data": "fechaFinal" },
            { "data": "totalDias" },
            { "data": "lugarDeTrabajo" },
            { "data": "salario" },
            { "data": "recobro" },
            { "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button></div></div>" }
        ]
    });
    //Creamos una fila en el head de la tabla y lo clonamos para cada columna
    $('#tabladatos10 thead tr').clone(true).appendTo('#tabladatos10 thead');

    $('#tabladatos10 thead tr:eq(1) th').each(function(i) {
        var title = $(this).text(); //es el nombre de la columna
        $(this).html('<input type="text" placeholder="Buscar en..' + title + '" />');

        $('input', this).on('keyup change', function() {
            if (tablaUsuarios10.column(i).search() !== this.value) {
                tablaUsuarios10
                    .column(i)
                    .search(this.value)
                    .draw();
            }
        });
    });
    var fila; //captura la fila, para editar o eliminar
    //submit para el Alta y Actualización
    $('#formUsuarios10').submit(function(e) {
        e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
        fecha = $.trim($('#fecha').val());
        mes = $.trim($('#mes').val());
        cedula = $.trim($('#cedula').val());
        datosDelTrabajador = $.trim($('#datosDelTrabajador').val());
        fechaIngreso = $.trim($('#fechaIngreso').val());
        razonSocial = $.trim($('#razonSocial').val());
        empresaUsuaria = $.trim($('#empresaUsuaria').val());
        entidad = $.trim($('#entidad').val());
        tipo = $.trim($('#tipo').val());
        codigoDiagnostico = $.trim($('#codigoDiagnostico').val());
        descripcion = $.trim($('#descripcion').val());
        sistemaAfectado = $.trim($('#sistemaAfectado').val());
        fechaInicial = $.trim($('#fechaInicial').val());
        fechaFinal = $.trim($('#fechaFinal').val());
        totalDias = $.trim($('#totalDias').val());
        lugarDeTrabajo = $.trim($('#lugarDeTrabajo').val());
        salario = $.trim($('#salario').val());
        recobro = $.trim($('#recobro').val());

        $.ajax({
            url: "bd/crud10.php",
            type: "POST",
            datatype: "json",
            data: { user_id: user_id, fecha: fecha, mes: mes, cedula: cedula, datosDelTrabajador: datosDelTrabajador, fechaIngreso: fechaIngreso, razonSocial: razonSocial, empresaUsuaria: empresaUsuaria, entidad: entidad, tipo: tipo, codigoDiagnostico: codigoDiagnostico, descripcion: descripcion, sistemaAfectado: sistemaAfectado, fechaInicial: fechaInicial, fechaFinal: fechaFinal, totalDias: totalDias, lugarDeTrabajo: lugarDeTrabajo, salario: salario, recobro: recobro, opcion: opcion },
            success: function(data) {
                tablaUsuarios10.ajax.reload(null, false);
            }
        });
        $('#modalCRUD').modal('hide');
    });

    //para limpiar los campos antes de dar de Alta una Persona
    $("#btnNuevo").click(function() {
        opcion = 1; //alta           
        user_id = null;
        $("#formUsuarios10").trigger("reset");
        $(".modal-header").css("background-color", "#17a2b8");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("INGRESAR NUEVO DATO");
        $('#modalCRUD').modal('show');
    });
    //Editar        
    $(document).on("click", ".btnEditar", function() {
        opcion = 2; //editar
        fila = $(this).closest("tr");
        user_id = parseInt(fila.find('td:eq(0)').text()); //capturo el ID	
        fecha = fila.find('td:eq(1)').text();
        mes = fila.find('td:eq(2)').text();
        cedula = fila.find('td:eq(3)').text();
        datosDelTrabajador = fila.find('td:eq(4)').text();
        fechaIngreso = fila.find('td:eq(5)').text();
        razonSocial = fila.find('td:eq(6)').text();
        empresaUsuaria = fila.find('td:eq(7)').text();
        entidad = fila.find('td:eq(8)').text();
        tipo = fila.find('td:eq(9)').text();
        codigoDiagnostico = fila.find('td:eq(10)').text();
        descripcion = fila.find('td:eq(11)').text();
        sistemaAfectado = fila.find('td:eq(12)').text();
        fechaInicial = fila.find('td:eq(13)').text();
        fechaFinal = fila.find('td:eq(14)').text();
        totalDias = fila.find('td:eq(15)').text();
        lugarDeTrabajo = fila.find('td:eq(16)').text();
        salario = fila.find('td:eq(17)').text();
        recobro = fila.find('td:eq(18)').text();
        $("#fecha").val(fecha);
        $("#mes").val(mes);
        $("#cedula").val(cedula);
        $("#datosDelTrabajador").val(datosDelTrabajador);
        $("#fechaIngreso").val(fechaIngreso);
        $("#razonSocial").val(razonSocial);
        $("#empresaUsuaria").val(empresaUsuaria);
        $("#entidad").val(entidad);
        $("#tipo").val(tipo);
        $("#codigoDiagnostico").val(codigoDiagnostico);
        $("#descripcion").val(descripcion);
        $("#sistemaAfectado").val(sistemaAfectado);
        $("#fechaInicial").val(fechaInicial);
        $("#fechaFinal").val(fechaFinal);
        $("#totalDias").val(totalDias);
        $("#lugarDeTrabjao").val(lugarDeTrabajo);
        $("#salario").val(salario);
        $("#recobro").val(recobro);
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("EDITAR FILA");
        $('#modalCRUD').modal('show');
    });
    //Borrar
    $(document).on("click", ".btnBorrar", function() {
        fila = $(this);
        user_id = parseInt($(this).closest('tr').find('td:eq(0)').text());
        opcion = 3; //eliminar        
        var respuesta = confirm("¿Está seguro de borrar el registro " + user_id + "? luego no habrá forma de recuperarlo");
        if (respuesta) {
            $.ajax({
                url: "bd/crud10.php",
                type: "POST",
                datatype: "json",
                data: { opcion: opcion, user_id: user_id },
                success: function() {
                    tablaUsuarios10.row(fila.parents('tr')).remove().draw();
                }
            });
        }
    });


});