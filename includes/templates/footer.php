<footer class="site-footer">
    <div class="contenedor clearfix">
        <div class="footer-informacion">
            <h3>Sobre <span>gdlwebcamp</span></h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur ut sapiente id repellendus,
                accusantium est veritatis molestiae at temporibus, voluptates, fugit magnam necessitatibus voluptas
                quod? Labore praesentium officia sed suscipit.</p>
        </div>
        <div class="ultimos-tweets">
            <h3>Ultimos <span>tweets</span></h3>
            <ul>
                <li>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat alias ad, unde nam, quos
                        repellendus voluptatem totam exercitationem in obcaecati ratione. Harum voluptatibus officiis
                        deleniti eos itaque, amet reiciendis repudiandae.</p>
                </li>
                <li>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat alias ad, unde nam, quos
                        repellendus voluptatem totam exercitationem in obcaecati ratione. Harum voluptatibus officiis
                        deleniti eos itaque, amet reiciendis repudiandae.</p>
                </li>
                <li>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat alias ad, unde nam, quos
                        repellendus voluptatem totam exercitationem in obcaecati ratione. Harum voluptatibus officiis
                        deleniti eos itaque, amet reiciendis repudiandae.</p>
                </li>
            </ul>
        </div>
        <div class="menu">
            <h3>Redes <span>Sociales</span></h3>
            <nav class="redes-sociales">
                <a href=""><i class="fab fa-facebook-square"></i></a>
                <a href=""><i class="fab fa-twitter"></i></a>
                <a href=""><i class="fab fa-pinterest"></i></a>
                <a href=""><i class="fab fa-youtube"></i></a>
                <a href=""><i class="fab fa-instagram"></i></a>
            </nav>
        </div>
    </div>
    <p class="copyright">
        &copy;Todos los Derechos Reservados GdlWebCamp 2020
    </p>
</footer>
<script src="js/vendor/modernizr-2.8.3.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script>
window.jQuery || document.write('<script src="js/vendor/jquery-3.4.1.min.js"><\/script>')
</script>
<script src="js/plugins.js"></script>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="js/jquery.animateNumber.min.js"></script>
<script src="js/jquery.countdown.min.js"></script>
<script src="js/jquery.lettering.js"></script>
<?php
$archivo = basename($_SERVER['PHP_SELF']);
$pagina = str_replace('.php','',$archivo);
if ($pagina == 'invitados' || $pagina == 'index'){
    echo '<script src="js/jquery.colorbox-min.js"></script>';
}else if ($pagina == 'conferencia'){
    echo '<script src="js/lightbox.js"></script>';
}
?>



<script src="js/cotizador.js"></script>
<script src="js/main.js"></script>


<!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
<script>
window.ga = function() {
    ga.q.push(arguments)
};
ga.q = [];
ga.l = +new Date;
ga('create', 'UA-XXXXX-Y', 'auto');
ga('set', 'transport', 'beacon');
ga('send', 'pageview')
</script>
<script src="https://www.google-analytics.com/analytics.js" async></script>

</body>

</html>