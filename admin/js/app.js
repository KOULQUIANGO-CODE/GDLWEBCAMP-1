$(document).ready(function() {
    // DataTable
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "loadingRecords": "Cargando...",
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
            "language": {
                paginate: {
                    next: 'Siguiente',
                    previous: 'Anterior',
                    last: 'Último',
                    first: 'Primero'
                },
                lengthMenu: "Display _MENU_ records per page",
                info: 'Mostrando _START_ a _END_ de _TOTAL_ resultados',
                emptyTable: 'No hay registros',
                infoEmpty: '0 Registros',
                search: 'Buscar',
                infoFiltered: "(ningún dato coincide con su búsqueda)",
                zeroRecords: "0 Registros Encontrados"
            }

        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    });
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })
    $('select').select2({
        language: {

            noResults: function() {

                return "No hay resultados";
            },
            searching: function() {

                return "Buscando..";
            }
        }
    });
    //Date range picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
    //Timepicker
    $('#timepicker').datetimepicker({
        format: 'LT'
    })
    $('#icono').iconpicker({
        //...
        title: 'El nombre debe ser en ingles'
    });
    $('.iconpicker-items').on('click', function() {
        $('.popover').removeClass('in');
        $('.popover').css('display', 'none');
    });
    //  Page specific script 

    $(function() {
        bsCustomFileInput.init();
    });

});