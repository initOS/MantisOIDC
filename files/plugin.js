$(document).ready(function () {
    //allow admin to set password directly
    //include input for new password
    var redirectUri = $("meta[name='redirectUri']").attr('content');
    var clientId = $("meta[name='clientId']").attr('content');
    // (disabled) Send all the params
    //var url = window.location.href
    //var state = ( url.match(/\?(.+)$/) || [,''])[1];
    // Send just the return param value
    var keycloak_gate = "blank_";

    var html = '<div id="plugin_mantisoic_separator">ODER</div>' +
        '<a id="plugin_mantisoic_keycloak_button" href="' + keycloak_gate + '">Login with KeyCloak</a>' +
    '';
    $(html).insertAfter('#login-form');
});