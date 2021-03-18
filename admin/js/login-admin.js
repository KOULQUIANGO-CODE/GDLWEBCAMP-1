$(document).ready(function() {
    $('#login-admin').on('submit', function(e) {
        e.preventDefault();
        // desabilitar boton para evitar mas de una consulta a la base de datos
        const btnCrearAdmin = document.querySelector('#btn-login');
        btnCrearAdmin.value = "Validando Datos...";
        btnCrearAdmin.disabled = true;

        const datos = $(this).serializeArray();
        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url: $(this).attr('action'),
            dataType: 'json',
            success: function(data) {
                console.log(data);
                const respuesta = data;
                if (respuesta.resultado === 'exito') {
                    // notificacion de usuario creado 
                    Swal.fire({
                        icon: 'success',
                        title: 'Login Exitoso ',
                        text: 'Bienvenid@ ' + respuesta.nombre
                    })
                    setTimeout(function() {
                        window.location.href = 'admin-area.php';
                    }, 1500);

                } else {
                    // notificacion de usuario creado 
                    Swal.fire({
                        icon: 'error',
                        title: 'Error ',
                        text: '¡Usuario o Contraseña Incorrecta!'

                    })
                    btnCrearAdmin.value = "Inicia sesión";
                    btnCrearAdmin.disabled = false;
                }

            }
        });
    });
});