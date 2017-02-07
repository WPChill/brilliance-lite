jQuery(document).ready(function () {

    /* If there are required actions, add an icon with the number of required actions in the About theme_name page -> Actions required tab */
    var theme_name_nr_actions_required = theme_nameWelcomeScreenObject.nr_actions_required;

    if ((typeof theme_name_nr_actions_required !== 'undefined') && (theme_name_nr_actions_required != '0')) {
        jQuery('li.theme_name-w-red-tab a').append('<span class="theme_name-actions-count">' + theme_name_nr_actions_required + '</span>');
    }

    /* Dismiss required actions */
    jQuery(".theme_name-dismiss-required-action").click(function () {

        var id = jQuery(this).attr('id');
        jQuery.ajax({
            type: "GET",
            data: {action: 'theme_name_dismiss_required_action', dismiss_id: id},
            dataType: "html",
            url: theme_nameWelcomeScreenObject.ajaxurl,
            beforeSend: function (data, settings) {
                jQuery('.theme_name-tab-pane#actions_required h1').append('<div id="temp_load" style="text-align:center"><img src="' + theme_nameWelcomeScreenObject.template_directory + '/inc/admin/welcome-screen/img/ajax-loader.gif" /></div>');
            },
            success: function (data) {
                location.reload();
                jQuery("#temp_load").remove();
                /* Remove loading gif */
                jQuery('#' + data).parent().slideToggle().remove();
                /* Remove required action box */
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
            }
        });
    });
});
