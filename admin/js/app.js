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
    if (document.getElementById('grafica-registrados')) {


        $(function() {
            var grafica = document.getElementById('grafica-registrados').getContext('2d');
            $.getJSON('servicios-registrados.php', function(data) {
                console.log(data);
                var myChart = new Chart(grafica, {
                    type: 'line',
                    data: {
                        labels: data.map(item => item.fecha),
                        datasets: [{
                            label: ['Registrados'],
                            data: data.map(item => item.cantidad),
                            backgroundColor: ['rgb(23, 162, 184)']

                        }],
                    },
                    options: {
                        responsive: true,
                        tooltips: {
                            mode: 'index',
                            intersect: false,
                        },
                        hover: {
                            mode: 'nearest',
                            intersect: true
                        },
                        scales: {
                            xAxes: [{
                                display: true,
                                scaleLabel: {
                                    display: true,
                                    labelString: 'REGISTROS'
                                }
                            }],
                            yAxes: [{
                                display: true,
                                ticks: {
                                    beginAtZero: true
                                },
                                scaleLabel: {
                                    display: true,
                                    labelString: 'BOLETOS'
                                }
                            }]
                        }
                    }

                });
            });

        });
        $(function() {
            var grafica = document.getElementById('grafica-pagado').getContext('2d');
            $.getJSON('servicios-registrados-pagados.php', function(data) {
                var myChart = new Chart(grafica, {
                    type: 'line',
                    data: {
                        labels: data.map(item => item.fecha_pagado),
                        datasets: [{
                            label: ['Registrados Pagados'],
                            data: data.map(item => item.pagado),
                            backgroundColor: ['rgb(25, 191, 89)']

                        }],
                    },
                    options: {
                        responsive: true,
                        tooltips: {
                            mode: 'index',
                            intersect: false,
                        },
                        hover: {
                            mode: 'nearest',
                            intersect: true
                        },
                        scales: {
                            xAxes: [{
                                display: true,
                                scaleLabel: {
                                    display: true,
                                    labelString: 'REGISTROS'
                                }
                            }],
                            yAxes: [{
                                display: true,
                                ticks: {
                                    beginAtZero: true
                                },
                                scaleLabel: {
                                    display: true,
                                    labelString: 'BOLETOS'
                                }
                            }]
                        }
                    }

                });
            });

        });
        $(function() {
            var grafica = document.getElementById('grafica-no-pagado').getContext('2d');
            $.getJSON('servicios-registrados-no-pagados.php', function(data) {
                var myChart = new Chart(grafica, {
                    type: 'line',
                    data: {
                        labels: data.map(item => item.fecha_pagado),
                        datasets: [{
                            label: ['Registrados No Pagados'],
                            data: data.map(item => item.pagado),
                            backgroundColor: ['rgb(207, 35, 52)']

                        }],
                    },
                    options: {
                        responsive: true,
                        tooltips: {
                            mode: 'index',
                            intersect: false,
                        },
                        hover: {
                            mode: 'nearest',
                            intersect: true
                        },
                        scales: {
                            xAxes: [{
                                display: true,
                                scaleLabel: {
                                    display: true,
                                    labelString: 'REGISTROS'
                                }
                            }],
                            yAxes: [{
                                display: true,
                                ticks: {
                                    beginAtZero: true
                                },
                                scaleLabel: {
                                    display: true,
                                    labelString: 'BOLETOS'
                                }
                            }]
                        }
                    }

                });
            });

        });




    }
});