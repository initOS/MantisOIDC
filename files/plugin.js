$(document).ready(function () {

    var oidcStart = $("meta[name='oidcStart']").attr('content');
    var oidcSeperatorText = $("meta[name='oidcSeperatorText']").attr('content');
    var oidcHideCredentialsLogin = $.parseJSON($("meta[name='oidcHideCredentialsLogin']").attr('content').toLowerCase());

    // make to sure to pass through deep link GET params
    var get_stash = window.location.search.substr(1);

    var html = '';

    if(true == oidcHideCredentialsLogin) {

        $("#login-form").hide();

    } else {
        html += '<div id="plugin_mantisoidc_separator">' + oidcSeperatorText + '</div>';
    }

    html += '<a id="plugin_mantisoidc_login_button" href="' + oidcStart + "&" + get_stash + '"></a>';

    $(html).insertAfter('#login-form');

});
