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
    <!-- Begin Mailchimp Signup Form -->
    <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
    <style type="text/css">
    #mc_embed_signup {
        background: #fff;
        clear: left;
        font: 14px Helvetica, Arial, sans-serif;
    }

    /* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
	   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
    </style>
    <div style="display:none">
        <div id="mc_embed_signup">
            <form
                action="https://gmail.us7.list-manage.com/subscribe/post?u=79306f7ac290f7a8a896d0152&amp;id=58769c4d2a"
                method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate"
                target="_blank" novalidate>
                <div id="mc_embed_signup_scroll">
                    <h2>SUBSCRIBETE AL NEWSLETTER Y NO TE PIERDAS NADA DE ESTE EVENTO</h2>
                    <div class="indicates-required"><span class="asterisk">*</span> indicates required</div>
                    <div class="mc-field-group">
                        <label for="mce-EMAIL">Correo Electrónico <span class="asterisk">*</span>
                        </label>
                        <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
                    </div>
                    <div class="mc-field-group">
                        <label for="mce-FNAME">Nombre </label>
                        <input type="text" value="" name="FNAME" class="" id="mce-FNAME">
                    </div>
                    <div class="mc-field-group">
                        <label for="mce-LNAME">Apellido </label>
                        <input type="text" value="" name="LNAME" class="" id="mce-LNAME">
                    </div>
                    <div id="mce-responses" class="clear">
                        <div class="response" id="mce-error-response" style="display:none"></div>
                        <div class="response" id="mce-success-response" style="display:none"></div>
                    </div>
                    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text"
                            name="b_79306f7ac290f7a8a896d0152_58769c4d2a" tabindex="-1" value=""></div>
                    <div class="clear"><input type="submit" value="Subscribe" name="subscribe"
                            id="mc-embedded-subscribe" class="button"></div>
                </div>

            </form>
        </div>
    </div>
    <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script>
    <script type='text/javascript'>
    (function($) {
        window.fnames = new Array();
        window.ftypes = new Array();
        fnames[0] = 'EMAIL';
        ftypes[0] = 'email';
        fnames[1] = 'FNAME';
        ftypes[1] = 'text';
        fnames[2] = 'LNAME';
        ftypes[2] = 'text';
        fnames[3] = 'ADDRESS';
        ftypes[3] = 'address';
        fnames[4] = 'PHONE';
        ftypes[4] = 'phone';
        fnames[5] = 'BIRTHDAY';
        ftypes[5] = 'birthday';
    }(jQuery));
    var $mcj = jQuery.noConflict(true);
    </script>
    <!--End mc_embed_signup-->
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