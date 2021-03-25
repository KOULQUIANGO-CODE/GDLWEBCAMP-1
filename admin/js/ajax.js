$(document).ready(function() {
    if (document.querySelector('#form-admin')) {
        // expresiones regulares
        const inputs = document.querySelectorAll('.form-horizontal input'),
            expresiones = {
                usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
                nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
                password: /^.{8,12}$/, // 8 a 12 digitos.
                correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
                telefono: /^\d{7,14}$/ // 7 a 14 numeros.
            }
            // validar campos input
        inputs.forEach(function(input) {

            input.addEventListener('keyup', validarFormulario);
            input.addEventListener('blur', validarFormulario);
        });

        function validarFormulario(e) {
            const btnCrearAdmin = document.querySelector('#crearAdmin'),
                password1 = document.querySelector('#password').value,
                confPassword = document.querySelector('#conf-password').value;




            switch (e.target.name) {
                case 'password':
                    btnCrearAdmin.disabled = true;
                    if (expresiones.password.test(e.target.value)) {
                        document.querySelector('.validar-estado p ').classList.remove('inf-error')
                        document.querySelector('.validar-estado i').classList.remove('error')
                        document.querySelector('.validar-estado i').classList.remove('fa-times-circle');
                        document.querySelector('.validar-estado input ').classList.remove('input-color-red');
                        document.querySelector('.validar-estado i').classList.add('success')
                        document.querySelector('.validar-estado i').classList.add('fa-check-circle');


                    } else {
                        document.querySelector('.validar-estado p ').classList.add('inf-error');
                        document.querySelector('.validar-estado i').classList.remove('fa-check-circle');
                        document.querySelector('.validar-estado i').classList.remove('success');
                        document.querySelector('.validar-estado i').classList.add('error');
                        document.querySelector('.validar-estado input ').classList.add('input-color-red');
                        document.querySelector('.validar-estado i').classList.add('fa-times-circle');

                    }
                    if (password1 != confPassword && confPassword != '') {
                        document.querySelector('.validar-estadoconf i').classList.remove('success');
                        document.querySelector('.validar-estadoconf i').classList.add('error');
                        document.querySelector('.validar-estadoconf p ').classList.add('inf-error');
                        document.querySelector('.validar-estadoconf i').classList.remove('fa-check-circle');
                        document.querySelector('.validar-estadoconf i').classList.add('fa-times-circle');
                        document.querySelector('.validar-estadoconf input ').classList.add('input-color-red');
                        btnCrearAdmin.disabled = true;
                    } else if (password1 === confPassword && confPassword != '') {
                        document.querySelector('.validar-estadoconf input ').classList.remove('input-color-red');
                        document.querySelector('.validar-estadoconf p ').classList.remove('inf-error');
                        document.querySelector('.validar-estadoconf i').classList.remove('fa-times-circle');
                        document.querySelector('.validar-estadoconf input ').classList.remove('input-color-red');
                        document.querySelector('.validar-estadoconf i').classList.add('success')
                        document.querySelector('.validar-estadoconf i').classList.add('fa-check-circle');
                        btnCrearAdmin.disabled = false;
                    }
                    break;
                case 'conf-password':
                    if (password1 === confPassword && expresiones.password.test(e.target.value)) {
                        document.querySelector('.validar-estadoconf p ').classList.remove('inf-error');
                        document.querySelector('.validar-estadoconf i').classList.remove('fa-times-circle');
                        document.querySelector('.validar-estadoconf input ').classList.remove('input-color-red');
                        document.querySelector('.validar-estadoconf i').classList.add('success')
                        document.querySelector('.validar-estadoconf i').classList.add('fa-check-circle');

                        btnCrearAdmin.disabled = false;
                    } else if (confPassword === '') {
                        document.querySelector('.validar-estadoconf i').classList.remove('fa-check-circle')
                        document.querySelector('.validar-estadoconf i').classList.remove('fa-times-circle');
                        document.querySelector('.validar-estadoconf p ').classList.remove('inf-error');
                    } else {
                        document.querySelector('.validar-estadoconf p ').classList.add('inf-error');
                        document.querySelector('.validar-estadoconf i').classList.remove('success')
                        document.querySelector('.validar-estadoconf i').classList.remove('fa-check-circle');
                        document.querySelector('.validar-estadoconf input ').classList.add('input-color-red');
                        document.querySelector('.validar-estadoconf i').classList.add('error');
                        document.querySelector('.validar-estadoconf i').classList.add('fa-times-circle');
                        btnCrearAdmin.disabled = true;
                    }

                    break;
            }

        }
    }

    $('#form-admin').on('submit', function(e) {
        e.preventDefault();

        const nombreAdmin = document.querySelector('#nombre').value,
            usuarioAdmin = document.querySelector('#usuario').value,
            passwordAdmin = document.querySelector('#password').value,
            confPassword = document.querySelector('#conf-password').value,
            btnCrearAdmin = document.querySelector('#crearAdmin');
        // desabilitar el boton para evitar mas de una insercion a la base de datos
        btnCrearAdmin.value = "Validando Datos...";
        btnCrearAdmin.disabled = true;

        if (nombreAdmin === '' || usuarioAdmin === '' || passwordAdmin === '' || confPassword === '') {

            // notificacion de todos los campos deben ser llenados
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '¡Todos los campos deben estar llenos!'
            })
            habilitarBtnAñadir();
        } else {
            const datos = $(this).serialize();
            $.ajax({
                type: $(this).attr('method'),
                data: datos,
                url: $(this).attr('action'),
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    const respuesta = data;

                    // crear Usuarios
                    if (respuesta.respuesta === 'UsuarioCreado') {
                        // notificacion de usuario creado 
                        Swal.fire({
                                icon: 'success',
                                title: 'Usuario Creado',
                                text: '¡Usuario Creado Exitosamente!'
                            })
                            // limpiar formulario
                        document.querySelector('#form-admin').reset();
                        // removemos los iconos
                        document.querySelector('.validar-estado i').classList.remove('fa-check-circle');
                        document.querySelector('.validar-estadoconf i').classList.remove('fa-check-circle');
                        btnCrearAdmin.value = "Añadir";
                        btnCrearAdmin.disabled = true;

                    }
                    // Actualizar Usuarios
                    else if (respuesta.respuesta === 'UsuarioActualizado') {
                        // notificacion de usuario creado 
                        Swal.fire({
                                icon: 'success',
                                title: 'Usuario Actualizado',
                                text: '¡Usuario Actualizado Exitosamente!'
                            })
                            // limpiar formulario
                        document.querySelector('#form-admin').reset();
                        // removemos los iconos
                        document.querySelector('.validar-estado i').classList.remove('fa-check-circle');
                        document.querySelector('.validar-estadoconf i').classList.remove('fa-check-circle');
                        btnCrearAdmin.value = "Actualizar";
                        btnCrearAdmin.disabled = true;
                        // Después de 3 segundos redireccionar
                        setTimeout(() => {
                            window.location.href = 'lista-admin.php';
                        }, 2500);

                    } else {
                        // notificacion de usuario creado 
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: '¡El usuario ya se encuentra registrado!'
                        })
                        habilitarBtnAñadir();
                    }

                }
            })
        }

    });
    // -------------------
    // Guadar Registro
    $('#guardar_registro').on('submit', function(e) {
            e.preventDefault();
            btnEvento = document.querySelector('#evento');
            // desabilitar el boton para evitar mas de una insercion a la base de datos
            btnEvento.value = "Validando Datos...";
            btnEvento.disabled = true;
            if (document.querySelector('#tituloEvento')) {
                if (document.querySelector('#tituloEvento').value === '') {
                    // notificacion de usuario creado 
                    Swal.fire({
                        icon: 'error',
                        title: 'ERROR',
                        text: '¡Evento todos los campos deben estar llenos!'
                    })
                    btnEvento.value = "Añadir";
                    btnEvento.disabled = false;
                }
            }
            const datos = $(this).serialize();
            $.ajax({
                type: $(this).attr('method'),
                data: datos,
                url: $(this).attr('action'),
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    const respuesta = data;
                    if (respuesta.respuesta === 'EventoCreado') {
                        // notificacion de evento creado 
                        Swal.fire({
                            icon: 'success',
                            title: 'Evento Creado',
                            text: '¡Evento ' + respuesta.nombreEvento + ' Creado Exitosamente!'
                        })


                    } else if (respuesta.respuesta === 'EventoActualizado') {
                        // notificacion de usuario creado 
                        Swal.fire({
                            icon: 'success',
                            title: 'Evento Actualizado',
                            text: '¡Evento ' + respuesta.nombreEvento + ' Actualizado Exitosamente!'
                        })

                    } else if (respuesta.respuesta === 'CategoriaCreada') {
                        Swal.fire({
                                icon: 'success',
                                title: 'Categoría Creada',
                                text: '¡Categoría ' + respuesta.nombreEvento + ' Creada Exitosamente!'
                            })
                            // limpiar formulario
                        document.querySelector('#guardar_registro').reset();
                    } else if (respuesta.respuesta === 'CategoriaActualizado') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Categoría Actualizada',
                            text: '¡Categoría ' + respuesta.nombreEvento + ' Actualizada Exitosamente!'
                        })
                    } else if (respuesta.respuesta === 'errorActualizacion') {
                        Swal.fire({
                            icon: 'info',
                            title: 'Error de Actualización',
                            text: '¡No se han modificado los datos!'
                        })
                    } else if (respuesta.respuesta === 'RegistradoCreado') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Invitado Registrado',
                            text: '¡Visitante ' + respuesta.nombre + ' ' + respuesta.apellido + ' Registrado Exitosamente!'
                        })
                    } else if (respuesta.respuesta === 'RegistradoActualizado') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Invitado Actualizada',
                            text: '¡Visitante ' + respuesta.nombre + ' ' + respuesta.apellido + ' Actualizada Exitosamente!'
                        })
                    } else if (respuesta.respuesta === 'errorActualizacion') {
                        Swal.fire({
                            icon: 'info',
                            title: 'Error de Actualización',
                            text: '¡No se han modificado los datos!'
                        })
                    } else {
                        // notificacion de usuario creado 
                        Swal.fire({
                            icon: 'error',
                            title: 'ERROR',
                            text: '¡Todos los campos deben estar llenos!'
                        })

                    }
                    btnEvento.value = "Añadir";
                    btnEvento.disabled = false;

                }
            })


        })
        // Guadar Registro con archivo
    $('#guardar_registro-archivo').on('submit', function(e) {
            e.preventDefault();
            btnEvento = document.querySelector('#evento');
            // desabilitar el boton para evitar mas de una insercion a la base de datos
            btnEvento.value = "Validando Datos...";
            btnEvento.disabled = true;
            const datos = new FormData(this);
            $.ajax({
                type: $(this).attr('method'),
                data: datos,
                url: $(this).attr('action'),
                dataType: 'json',
                /* When Ajax*/
                contentType: false,
                //para enviar imagenes processdata debe ser false
                processData: false,
                async: true,
                // no cachear la página al request
                cache: false,
                success: function(data) {
                    console.log(data);
                    const respuesta = data;
                    if (respuesta.respuesta === 'InvitadoCreado') {
                        // notificacion de evento creado 
                        Swal.fire({
                            icon: 'success',
                            title: 'Invitado Creado',
                            text: 'Invitado ' + respuesta.nombreInvitado + ' ' + respuesta.apellidoInvitado + ' Creado Exitosamente!'
                        })


                    } else if (respuesta.respuesta === 'InvitadoActualizado') {
                        // notificacion de usuario creado 
                        Swal.fire({
                            icon: 'success',
                            title: 'Invitado Actualizado',
                            text: 'Invitado ' + respuesta.nombreInvitado + ' ' + respuesta.apellidoInvitado + ' Creado Exitosamente!'
                        })

                    } else if (respuesta.respuesta === 'errorActualizacion') {
                        Swal.fire({
                            icon: 'info',
                            title: 'Error de Actualización',
                            text: '¡No se han modificado los datos!'
                        })
                    } else {
                        // notificacion de usuario creado 
                        Swal.fire({
                            icon: 'error',
                            title: 'ERROR',
                            text: '¡Todos los campos deben estar llenos!'
                        })

                    }
                    btnEvento.value = "Añadir";
                    btnEvento.disabled = false;

                }
            })


        })
        // ---------------------
        // eliminar Registro
    $('.borrar_registro').on('click', function(e) {
        e.preventDefault();
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
            if (result.isConfirmed) {

                const id = $(this).attr('data-id'),
                    tipo = $(this).attr('data-tipo'),
                    img = $(this).attr('data-img');
                $.ajax({
                    type: 'post',
                    data: {
                        'id': id,
                        'registro': 'eliminar'
                    },
                    url: 'includes/models/modelo-' + tipo + '.php',
                    success: function(data) {
                        const resultado = JSON.parse(data);
                        jQuery('[data-id="' + resultado.id_eliminado + '"]').parents('tr').remove();
                        Swal.fire({
                            icon: 'success',
                            title: 'Eliminado',
                            text: '¡Eliminado Exitosamente!'
                        })
                    }
                })
            }
        })
    })

    function habilitarBtnAñadir() {
        const btnCrearAdmin = document.querySelector('#crearAdmin');
        btnCrearAdmin.value = "Añadir";
        btnCrearAdmin.disabled = false;
    }
});