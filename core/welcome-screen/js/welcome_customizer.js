jQuery(document).ready(function () {
    var theme_name_aboutpage = theme_nameWelcomeScreenCustomizerObject.aboutpage;
    var theme_name_nr_actions_required = theme_nameWelcomeScreenCustomizerObject.nr_actions_required;

    /* Number of required actions */
    if ((typeof theme_name_aboutpage !== 'undefined') && (typeof theme_name_nr_actions_required !== 'undefined') && (theme_name_nr_actions_required != '0')) {
        jQuery('#accordion-section-themes .accordion-section-title').append('<a href="' + theme_name_aboutpage + '"><span class="theme_name-actions-count">' + theme_name_nr_actions_required + '</span></a>');
    }


});
