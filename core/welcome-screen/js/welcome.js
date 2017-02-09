jQuery(document).ready(function () {

    /* If there are required actions, add an icon with the number of required actions in the About brilliance page -> Actions required tab */
    var brilliance_nr_actions_required = brillianceWelcomeScreenObject.nr_actions_required;

    if ((typeof brilliance_nr_actions_required !== 'undefined') && (brilliance_nr_actions_required != '0')) {
        jQuery('li.brilliance-w-red-tab a').append('<span class="brilliance-actions-count">' + brilliance_nr_actions_required + '</span>');
    }

    /* Dismiss required actions */
    jQuery(".brilliance-dismiss-required-action").click(function () {

        var id = jQuery(this).attr('id');
        jQuery.ajax({
            type: "GET",
            data: {action: 'brilliance_dismiss_required_action', dismiss_id: id},
            dataType: "html",
            url: brillianceWelcomeScreenObject.ajaxurl,
            beforeSend: function (data, settings) {
                jQuery('.brilliance-tab-pane#actions_required h1').append('<div id="temp_load" style="text-align:center"><img src="' + brillianceWelcomeScreenObject.template_directory + '/inc/admin/welcome-screen/img/ajax-loader.gif" /></div>');
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
