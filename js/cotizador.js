let regalo = document.getElementById('regalo');
document.addEventListener('DOMContentLoaded', function() {
    // campos datos usuario

    let nombre = document.getElementById('nombre');
    let apellido = document.getElementById('apellido');
    let email = document.getElementById('email');

    // campos pases
    let pase_dia = document.getElementById('pase_dia');
    let pase_dosdias = document.getElementById('pase_dosdias');
    let pase_completo = document.getElementById('pase_completo');
    // botones y divs
    let calcular = document.getElementById('calcular');
    let errorDiv = document.getElementById('error');
    let botonRegistro = document.getElementById('btnRegistro');
    let lista_productos = document.getElementById('listas-productos');
    let suma = document.getElementById('suma-total');
    // extras

    let etiquetas = document.getElementById('etiquetas');
    if (document.getElementById('registro')) {
        botonRegistro.disabled = true;
    }

    if (document.getElementById('calcular')) {
        calcular.addEventListener('click', calcularMontos);
    };
    if (document.getElementById('pase_dia')) {
        pase_dia.addEventListener('keyup', mostarDias);
        pase_dosdias.addEventListener('keyup', mostarDias);
        pase_completo.addEventListener('keyup', mostarDias);
        pase_dia.addEventListener('click', mostarDias);
        pase_dosdias.addEventListener('click', mostarDias);
        pase_completo.addEventListener('click', mostarDias);
        if (!document.getElementById('nombreregistrado')) {
            nombre.addEventListener('keyup', validarError);
            nombre.addEventListener('blur', validarError);
            apellido.addEventListener('keyup', validarError);
            apellido.addEventListener('blur', validarError);
            email.addEventListener('keyup', validarError);
            email.addEventListener('blur', validarError);
            email.addEventListener('blur', validarEmail);
        }
    };



    function calcularMontos(evento) {
        evento.preventDefault();
        if (regalo.value === '') {
            alert('¡Debes elegir un regalo!');
        } else {
            let boletosDia = parseInt(pase_dia.value) || 0,
                boletosdosDia = parseInt(pase_dosdias.value) || 0,
                boletoCompleto = parseInt(pase_completo.value) || 0,
                cantCamisas = parseInt(camisa_evento.value) || 0,
                cantEtiquetas = parseInt(etiquetas.value) || 0,
                regalogratis = parseInt(regalo.value) || 0;
            botonRegistro.disabled = false;

            let totalPagar = (boletosDia * 30) + (boletosdosDia * 45) + (boletoCompleto * 50) + ((cantCamisas * 10) - ((cantCamisas * 10) * 0.07)) + (cantEtiquetas * 2);
            console.log(totalPagar);
            let ListadoProductos = [];
            if (boletosDia >= 1) {
                ListadoProductos.push(boletosDia + ' Pases por día');
            }
            if (boletosdosDia >= 1) {
                ListadoProductos.push(boletosdosDia + ' Pases por 2 día');
            }
            if (boletoCompleto >= 1) {
                ListadoProductos.push(boletoCompleto + ' Pases Completo');
            }
            if (cantCamisas >= 1) {
                ListadoProductos.push(cantCamisas + ' Camisas');
            }
            if (cantEtiquetas >= 1) {
                ListadoProductos.push(cantEtiquetas + ' Etiquetas');
            }
            if (regalogratis == 1) {
                ListadoProductos.push(1 + ' Equiqueta Gratis');
            }
            if (regalogratis == 2) {
                ListadoProductos.push(1 + ' Pulsera Gratis');
            }
            if (regalogratis == 3) {
                ListadoProductos.push(1 + ' Esfero Gratis');
            }
            lista_productos.style.display = "block";
            lista_productos.innerHTML = '';
            for (var i = 0; i < ListadoProductos.length; i++) {
                lista_productos.innerHTML += '- ' + ListadoProductos[i] + '<br/>';
            }
            suma.innerHTML = '$ ' + totalPagar.toFixed(2);
            document.getElementById('total_pedido').value = totalPagar;
        }
    }


    function mostarDias() {
        let boletosDia = parseInt(pase_dia.value) || 0,
            boletosdosDia = parseInt(pase_dosdias.value) || 0,
            boletoCompleto = parseInt(pase_completo.value) || 0;
        let diasElegidos = [];

        if (boletosDia > 0) {
            diasElegidos.push('viernes');
        }
        if (boletosDia === 0) {

            document.getElementById('viernes').style.display = 'none';
            document.getElementById('sabado').style.display = 'none';
            document.getElementById('domingo').style.display = 'none';
        }
        if (boletosdosDia > 0) {
            diasElegidos.push('viernes', 'sabado');
        }
        if (boletosdosDia === 0) {
            document.getElementById('viernes').style.display = 'none';
            document.getElementById('sabado').style.display = 'none';
            document.getElementById('domingo').style.display = 'none';
        }
        if (boletoCompleto > 0) {
            diasElegidos.push('viernes', 'sabado', 'domingo');
        }
        if (boletoCompleto === 0) {
            document.getElementById('viernes').style.display = 'none';
            document.getElementById('sabado').style.display = 'none';
            document.getElementById('domingo').style.display = 'none';
        }
        for (var i = 0; i < diasElegidos.length; i++) {
            document.getElementById(diasElegidos[i]).style.display = 'block';
        }

    }

    function validarError() {
        if (this.value === '') {
            errorDiv.style.display = 'block';
            errorDiv.innerHTML = '¡Este campo es obligatorio!';
            errorDiv.style.border = '1px solid red';

        } else if (nombre.value != '' || apellido.value != '' || email.value != '') {
            errorDiv.innerHTML = '';
            this.style.border = '1px solid #ccc';
            errorDiv.style.display = 'none';
            errorDiv.style.border = '1px solid transparent';

        }
        if (this.value != '') {
            this.style.border = '1px solid #ccc';
        } else {
            this.style.border = '1px solid red';
        }

    }

    function validarEmail() {
        if (this.value.indexOf('@') > -1) {
            this.style.border = '1px solid #ccc';
            errorDiv.style.display = 'none';

        } else {
            errorDiv.style.display = 'block';
            errorDiv.innerHTML = '¡E-mail no válido, hace falta el carácter @!';
            this.style.border = '1px solid red';
            errorDiv.style.border = '1px solid red';
        }
    }

});