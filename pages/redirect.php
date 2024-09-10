<?php


    require_once 'assets/lib/OpenID-Connect-PHP/vendor/autoload.php';
    use Jumbojett\OpenIDConnectClient;


    plugin_register('MantisOIC');

    $OPENID_CLIENT_ID = plugin_config_get('openIDClientID' );

    $oidc = new OpenIDConnectClient(
        plugin_config_get('openIDAuthURL' ),
        $OPENID_CLIENT_ID,
        plugin_config_get('openIDClientSecret' )
    );

    $oidc->setRedirectUrl(plugin_config_get('redirect_uri' ));

    $oidc->authenticate();

    $sessionUserDisplayName = explode(" ", $oidc->requestUserInfo('name'));


    $access_token = $oidc->getAccessToken();

    $data = $oidc->introspectToken($access_token);




$user_id = user_get_id_by_name($data->username);

# check for disabled account
if( !user_is_enabled( $user_id ) ) {
    echo "<p>Username not registered. Please register new account first. <br/> <a href='/login_page.php'>Login</a>";
    return false;
}

# max. failed login attempts achieved...
if( !user_is_login_request_allowed( $user_id ) ) {
    echo "<p>Username not registered. Please register new account first. <br/> <a href='/login_page.php'>Login</a>";
    return false;
}

# check for anonymous login
if( user_is_anonymous( $user_id ) ) {
    echo "<p>Username not registered. Please register new account first. <br/> <a href='/login_page.php'>Login</a>";
    return false;
}

user_increment_login_count( $user_id );

user_reset_failed_login_count_to_zero( $user_id );
user_reset_lost_password_in_progress_count_to_zero( $user_id );

# set the cookies
auth_set_cookies( $user_id, false );
auth_set_tokens( $user_id );

// Obtain the redicrect url from state param
// Example: state=view.php?id=2222
$redirect_url = '../../../index.php';

print_header_redirect( $redirect_url );
