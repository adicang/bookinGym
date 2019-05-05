<?php
    require 'vendor/autoload.php';

    define('SITE_URL','http://adica.mtacloud.co.il/');

    $paypal = new \PayPal\Rest\ApiContext(
        new \PayPal\Auth\OAuthTokenCredential(
            'AcllgnLrMDTHlgK51tNwNgTW22QBy9M-9AJLvMjk4RIWUP7_uYqtZeGBN1aZnNffcczYeWSxLtiOJXGK',
            'EOIpiJkjC4WC2fLpxOiIiqOnUzuj62SFyzdtkzPHvjoEjrqlBY4Z7LEP4fZ3t_fiU0tDeOTWqM6P1UiV'
        )
    );
?>