  (function() {
      "use strict";
      document.addEventListener('DOMContentLoaded', function() {
          // Mapa
          if (document.getElementById('mapa')) {


              let map = L.map('mapa').setView([-0.212393, -78.404242], 17);

              L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                  attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
              }).addTo(map);

              L.marker([-0.212393, -78.404242]).addTo(map)
                  .bindPopup('Visítanos')
                  .openPopup();
          }
      });
      // JQUERY
      //DOM CONT_LEADED
      $(function() {

          // lettering
          $('.nombre-sitio').lettering();

          // Menu fijo
          let windowHeight = $(window).height();
          let barraAltura = $('.barra').innerHeight();

          if (document.getElementById('body')) {
              $(window).scroll(function() {
                  let scroll = $(window).scrollTop();
                  if (scroll > windowHeight) {
                      $('.barra').addClass('fijo');
                      $('body').css({ 'margin-top': barraAltura + 'px' })
                  } else {
                      $('.barra').removeClass('fijo');
                      $('body').css({ 'margin-top': '0px' })
                  }
              });
          }
          // menu responsive
          $('.menu-movil').on('click', function() {
              $('.navegacion-principal').slideToggle();
          });

          // Programa de conferencia
          $('div.ocultar').hide();
          $('.programa-evento .info-curso:first').show();
          $('.menu-programa a:first').addClass('activo');

          $('.menu-programa a').on('click', function() {
              $('.menu-programa a').removeClass('activo');

              $(this).addClass('activo');
              $('.ocultar').hide();
              let enlacePresionado = $(this).attr('href');
              $(enlacePresionado).fadeIn(500);


              return false;
          });
          // Implementacion de clase activo deacuerdo a la pagina en que se encuentre el usuario



          if (document.getElementById('conferencias')) {
              $('.navegacion-principal a:first').addClass('activo');
          } else if (document.getElementById('calendario')) {
              $('.navegacion-principal a:nth-child(2)').addClass('activo');
          } else if (document.getElementById('invitados')) {
              $('.navegacion-principal a:nth-child(3)').addClass('activo');
          }

          // Animaciones para los numeros

          $('.resumen-evento li:nth-child(1) p').animateNumber({
              number: 6
          }, 1200);
          $('.resumen-evento li:nth-child(2) p').animateNumber({
              number: 15
          }, 1200);
          $('.resumen-evento li:nth-child(3) p').animateNumber({
              number: 3
          }, 1200);
          $('.resumen-evento li:nth-child(4) p').animateNumber({
              number: 9
          }, 1500);
          // cuenta regresiva
          $('.cuenta-regresiva').countdown('2021/05/01 00:00:00', function(event) {
              $('#dias').html(event.strftime('%D'));
              $('#horas').html(event.strftime('%H'));
              $('#minutos').html(event.strftime('%M'));
              $('#segundos').html(event.strftime('%S'));
          })
      });

      // colorbox 
      if (document.getElementById('invitados')) {
          $(document).ready(function() {
              $(window).resize(function() {
                  cambio();
              });

              cambio();

              function cambio() {
                  if ($(window).width() >= 760) {
                      $('.invitado-info').colorbox({ inline: true, width: '50%' });
                      $('.ancho_invitados').css({ width: '60%' });
                      $(".sidenav-trigger").click(function() {
                          alert("Handler for .click() called.");
                          $("body").toggleClass("menuclose");
                      });
                  } else {
                      $('.invitado-info').colorbox({ inline: true, width: '75%' });
                      $('.ancho_invitados').css({ width: '100%' });
                  }
              }
          });
      }
      if (document.querySelector('.invitados')) {
          $('.boton_newsletter').colorbox({ inline: true, width: '50%' });
      }
  })();