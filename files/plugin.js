$(document).ready(function () {

    var oicStart = $("meta[name='oicStart']").attr('content');

    var get_stash = window.location.search.substr(1);

    var html = '<div id="plugin_mantisoic_separator">' + plugin_MantisOIC_seperator_text + '</div>' +
        '<a id="plugin_mantisoic_login_button" href="' + oicStart + "&" + get_stash + '"></a>' +
    '';

    $(html).insertAfter('#login-form');

});