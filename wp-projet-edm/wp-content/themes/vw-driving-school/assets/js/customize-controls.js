( function( api ) {

	// Extends our custom "vw-driving-school" section.
	api.sectionConstructor['vw-driving-school'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );