<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GDLWEBCAMP | Admin</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
<style>
html{
    font-family: 'Open Sans', sans-serif;
    background-image: url(../../../img/encabezado.jpg);
    height: 100vh;
}
</style>

</head>
<body>

    <input type="hidden" id="borrarRegistro" value="<?php echo $_GET['id'];?>" data-tipo="<?php echo $_GET['tipo'];?>">

</body>

<!-- sweetalert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!-- jQuery -->
<script src="../../js/jquery.min.js"></script>
<script>
if(document.querySelector('#borrarRegistro')){
    eliminarRegistro();
}

// Funcion eliminar el registro de todos los formularios del proyecto (para la versión móvil)
function eliminarRegistro() {

    // Alerta de confirmación de eliminar registro
    Swal.fire({
            title: '¿Seguro(a)?',
            text: "¡Esta acción no se puede deshacer!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {

            // En caso de confirmar la eliminación
            if (result.isConfirmed) {
                
                // Desabilitar Botones del Formulario 
                id = document.querySelector('#borrarRegistro').value,
                tipo = $('#borrarRegistro').attr('data-tipo');
                // Fin Desabilitar Botones del Formulario

                // Llamado a AJAX
                $.ajax({
                    type: 'post',
                    data: {
                        'id': id,
                        'registro': 'eliminar'
                    },
                    url: '../models/modelo-' + tipo + '.php',
                    success: function(data) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Eliminado',
                            text: '¡Eliminado Exitosamente!'
                        })
                        setTimeout(() => {
                    window.location.href = '../../lista-'+tipo+'.php';
                    }, 1000);
                    }
                })
              // Fin Llamado a AJAX
                  
            }else{
                // Redireccionar de nuevo a la pagina de editar y eliminar el registro
                const tipo = $('#borrarRegistro').attr('data-tipo');
                window.location.href = '../../lista-'+tipo+'.php';
        }
        })
}
// Fin Funcion eliminar el registro de todos los formularios del proyecto (para la versión móvil)
</script>

</html>