<?php 
// video 667

define('URL_SITIO','https://gdlwebcamp1.herokuapp.com/');
require('includes/paypal/autoload.php');
$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        
        'AW-L0mdXG-xcmAWZllIQywFWMO1sYjmZRWHsZyvmVVmVEIANpurXIu-jd-cyoSTZNtAA28HLUp7ukYSg',// cliente DI
        'EHk7060VoJcEn8q0wWyi0KvUjS7qdWuIUCJXu2BU3zjg8YC1asaVv5D1HEaR-bMHdVGBKnxUY-qy8vpe'// Secret
    )
);
?>