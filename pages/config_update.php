<?php

form_security_validate( 'plugin_MantisOIC_config_update' );
auth_reauthenticate( );
access_ensure_global_level( config_get( 'manage_plugin_threshold' ) );

plugin_config_set('openIDAuthURL', strip_tags(gpc_get_string('oidaurl')));
plugin_config_set('openIDClientID', strip_tags(gpc_get_string('oidclientid')));
plugin_config_set('openIDClientSecret', strip_tags(gpc_get_string('oidsecret')));

$redirecturi = config_get('path');
if(substr($redirecturi, -1) == '/') $redirecturi = rtrim($redirecturi,'/');
plugin_config_set('redirect_uri', $redirecturi.plugin_page( 'redirect'));

form_security_purge( 'plugin_MantisOIC_config_update' );
print_successful_redirect( plugin_page( 'config', true ) );
