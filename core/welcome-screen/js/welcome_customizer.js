( function( api ) {

	// Extends our custom "brilliance-pro-section" section.
	api.sectionConstructor['brilliance-recomended-section'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );