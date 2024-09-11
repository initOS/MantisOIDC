$(document).ready(function () {

    var oicStart = $("meta[name='oicStart']").attr('content');

    var html = '<div id="plugin_mantisoic_separator">' + plugin_MantisOIC_seperator_text + '</div>' +
        '<a id="plugin_mantisoic_login_button" href="' +oicStart+ '"></a>' +
    '';

    $(html).insertAfter('#login-form');

});