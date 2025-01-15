<?php

    // keep get params for the case the user wants to access a certain page
    session_start();
    $_SESSION["plugin_MantisOIDC_get_param_stash"] = $_GET;

    require_once 'assets/lib/OpenID-Connect-PHP/vendor/autoload.php';
    use Jumbojett\OpenIDConnectClient;


    plugin_register('MantisOIDC');


    $oidc = new OpenIDConnectClient(
        plugin_config_get('openIDAuthURL' ),
        plugin_config_get('openIDClientID' ),
        plugin_config_get('openIDClientSecret' )
    );


    $oidc->setRedirectUrl(substr(config_get('path'), 0, -1).plugin_page( 'redirect'));


    $oidc->authenticate();
