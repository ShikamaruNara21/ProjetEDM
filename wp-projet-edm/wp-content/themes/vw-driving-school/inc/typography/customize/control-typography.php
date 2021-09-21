<?php
/**
 * Typography control class.
 *
 * @since  1.0.0
 * @access public
 */

class VW_Driving_School_Control_Typography extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'typography';

	/**
	 * Array 
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $l10n = array();

	/**
	 * Set up our control.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @param  string  $id
	 * @param  array   $args
	 * @return void
	 */
	public function __construct( $manager, $id, $args = array() ) {

		// Let the parent class do its thing.
		parent::__construct( $manager, $id, $args );

		// Make sure we have labels.
		$this->l10n = wp_parse_args(
			$this->l10n,
			array(
				'color'       => esc_html__( 'Font Color', 'vw-driving-school' ),
				'family'      => esc_html__( 'Font Family', 'vw-driving-school' ),
				'size'        => esc_html__( 'Font Size',   'vw-driving-school' ),
				'weight'      => esc_html__( 'Font Weight', 'vw-driving-school' ),
				'style'       => esc_html__( 'Font Style',  'vw-driving-school' ),
				'line_height' => esc_html__( 'Line Height', 'vw-driving-school' ),
				'letter_spacing' => esc_html__( 'Letter Spacing', 'vw-driving-school' ),
			)
		);
	}

	/**
	 * Enqueue scripts/styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue() {
		wp_enqueue_script( 'vw-driving-school-ctypo-customize-controls' );
		wp_enqueue_style(  'vw-driving-school-ctypo-customize-controls' );
	}

	/**
	 * Add custom parameters to pass to the JS via JSON.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function to_json() {
		parent::to_json();

		// Loop through each of the settings and set up the data for it.
		foreach ( $this->settings as $setting_key => $setting_id ) {

			$this->json[ $setting_key ] = array(
				'link'  => $this->get_link( $setting_key ),
				'value' => $this->value( $setting_key ),
				'label' => isset( $this->l10n[ $setting_key ] ) ? $this->l10n[ $setting_key ] : ''
			);

			if ( 'family' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_families();

			elseif ( 'weight' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_weight_choices();

			elseif ( 'style' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_style_choices();
		}
	}

	/**
	 * Underscore JS template to handle the control's output.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function content_template() { ?>

		<# if ( data.label ) { #>
			<span class="customize-control-title">{{ data.label }}</span>
		<# } #>

		<# if ( data.description ) { #>
			<span class="description customize-control-description">{{{ data.description }}}</span>
		<# } #>

		<ul>

		<# if ( data.family && data.family.choices ) { #>

			<li class="typography-font-family">

				<# if ( data.family.label ) { #>
					<span class="customize-control-title">{{ data.family.label }}</span>
				<# } #>

				<select {{{ data.family.link }}}>

					<# _.each( data.family.choices, function( label, choice ) { #>
						<option value="{{ choice }}" <# if ( choice === data.family.value ) { #> selected="selected" <# } #>>{{ label }}</option>
					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.weight && data.weight.choices ) { #>

			<li class="typography-font-weight">

				<# if ( data.weight.label ) { #>
					<span class="customize-control-title">{{ data.weight.label }}</span>
				<# } #>

				<select {{{ data.weight.link }}}>

					<# _.each( data.weight.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.weight.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.style && data.style.choices ) { #>

			<li class="typography-font-style">

				<# if ( data.style.label ) { #>
					<span class="customize-control-title">{{ data.style.label }}</span>
				<# } #>

				<select {{{ data.style.link }}}>

					<# _.each( data.style.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.style.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.size ) { #>

			<li class="typography-font-size">

				<# if ( data.size.label ) { #>
					<span class="customize-control-title">{{ data.size.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.size.link }}} value="{{ data.size.value }}" />

			</li>
		<# } #>

		<# if ( data.line_height ) { #>

			<li class="typography-line-height">

				<# if ( data.line_height.label ) { #>
					<span class="customize-control-title">{{ data.line_height.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.line_height.link }}} value="{{ data.line_height.value }}" />

			</li>
		<# } #>

		<# if ( data.letter_spacing ) { #>

			<li class="typography-letter-spacing">

				<# if ( data.letter_spacing.label ) { #>
					<span class="customize-control-title">{{ data.letter_spacing.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.letter_spacing.link }}} value="{{ data.letter_spacing.value }}" />

			</li>
		<# } #>

		</ul>
	<?php }

	/**
	 * Returns the available fonts.  Fonts should have available weights, styles, and subsets.
	 *
	 * @todo Integrate with Google fonts.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_fonts() { return array(); }

	/**
	 * Returns the available font families.
	 *
	 * @todo Pull families from `get_fonts()`.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	function get_font_families() {

		return array(
			'' => __( 'No Fonts', 'vw-driving-school' ),
        'Abril Fatface' => __( 'Abril Fatface', 'vw-driving-school' ),
        'Acme' => __( 'Acme', 'vw-driving-school' ),
        'Anton' => __( 'Anton', 'vw-driving-school' ),
        'Architects Daughter' => __( 'Architects Daughter', 'vw-driving-school' ),
        'Arimo' => __( 'Arimo', 'vw-driving-school' ),
        'Arsenal' => __( 'Arsenal', 'vw-driving-school' ),
        'Arvo' => __( 'Arvo', 'vw-driving-school' ),
        'Alegreya' => __( 'Alegreya', 'vw-driving-school' ),
        'Alfa Slab One' => __( 'Alfa Slab One', 'vw-driving-school' ),
        'Averia Serif Libre' => __( 'Averia Serif Libre', 'vw-driving-school' ),
        'Bangers' => __( 'Bangers', 'vw-driving-school' ),
        'Boogaloo' => __( 'Boogaloo', 'vw-driving-school' ),
        'Bad Script' => __( 'Bad Script', 'vw-driving-school' ),
        'Bitter' => __( 'Bitter', 'vw-driving-school' ),
        'Bree Serif' => __( 'Bree Serif', 'vw-driving-school' ),
        'BenchNine' => __( 'BenchNine', 'vw-driving-school' ),
        'Cabin' => __( 'Cabin', 'vw-driving-school' ),
        'Cardo' => __( 'Cardo', 'vw-driving-school' ),
        'Courgette' => __( 'Courgette', 'vw-driving-school' ),
        'Cherry Swash' => __( 'Cherry Swash', 'vw-driving-school' ),
        'Cormorant Garamond' => __( 'Cormorant Garamond', 'vw-driving-school' ),
        'Crimson Text' => __( 'Crimson Text', 'vw-driving-school' ),
        'Cuprum' => __( 'Cuprum', 'vw-driving-school' ),
        'Cookie' => __( 'Cookie', 'vw-driving-school' ),
        'Chewy' => __( 'Chewy', 'vw-driving-school' ),
        'Days One' => __( 'Days One', 'vw-driving-school' ),
        'Dosis' => __( 'Dosis', 'vw-driving-school' ),
        'Droid Sans' => __( 'Droid Sans', 'vw-driving-school' ),
        'Economica' => __( 'Economica', 'vw-driving-school' ),
        'Fredoka One' => __( 'Fredoka One', 'vw-driving-school' ),
        'Fjalla One' => __( 'Fjalla One', 'vw-driving-school' ),
        'Francois One' => __( 'Francois One', 'vw-driving-school' ),
        'Frank Ruhl Libre' => __( 'Frank Ruhl Libre', 'vw-driving-school' ),
        'Gloria Hallelujah' => __( 'Gloria Hallelujah', 'vw-driving-school' ),
        'Great Vibes' => __( 'Great Vibes', 'vw-driving-school' ),
        'Handlee' => __( 'Handlee', 'vw-driving-school' ),
        'Hammersmith One' => __( 'Hammersmith One', 'vw-driving-school' ),
        'Inconsolata' => __( 'Inconsolata', 'vw-driving-school' ),
        'Indie Flower' => __( 'Indie Flower', 'vw-driving-school' ),
        'IM Fell English SC' => __( 'IM Fell English SC', 'vw-driving-school' ),
        'Julius Sans One' => __( 'Julius Sans One', 'vw-driving-school' ),
        'Josefin Slab' => __( 'Josefin Slab', 'vw-driving-school' ),
        'Josefin Sans' => __( 'Josefin Sans', 'vw-driving-school' ),
        'Kanit' => __( 'Kanit', 'vw-driving-school' ),
        'Lobster' => __( 'Lobster', 'vw-driving-school' ),
        'Lato' => __( 'Lato', 'vw-driving-school' ),
        'Lora' => __( 'Lora', 'vw-driving-school' ),
        'Libre Baskerville' => __( 'Libre Baskerville', 'vw-driving-school' ),
        'Lobster Two' => __( 'Lobster Two', 'vw-driving-school' ),
        'Merriweather' => __( 'Merriweather', 'vw-driving-school' ),
        'Monda' => __( 'Monda', 'vw-driving-school' ),
        'Montserrat' => __( 'Montserrat', 'vw-driving-school' ),
        'Muli' => __( 'Muli', 'vw-driving-school' ),
        'Marck Script' => __( 'Marck Script', 'vw-driving-school' ),
        'Noto Serif' => __( 'Noto Serif', 'vw-driving-school' ),
        'Open Sans' => __( 'Open Sans', 'vw-driving-school' ),
        'Overpass' => __( 'Overpass', 'vw-driving-school' ),
        'Overpass Mono' => __( 'Overpass Mono', 'vw-driving-school' ),
        'Oxygen' => __( 'Oxygen', 'vw-driving-school' ),
        'Orbitron' => __( 'Orbitron', 'vw-driving-school' ),
        'Patua One' => __( 'Patua One', 'vw-driving-school' ),
        'Pacifico' => __( 'Pacifico', 'vw-driving-school' ),
        'Padauk' => __( 'Padauk', 'vw-driving-school' ),
        'Playball' => __( 'Playball', 'vw-driving-school' ),
        'Playfair Display' => __( 'Playfair Display', 'vw-driving-school' ),
        'PT Sans' => __( 'PT Sans', 'vw-driving-school' ),
        'Philosopher' => __( 'Philosopher', 'vw-driving-school' ),
        'Permanent Marker' => __( 'Permanent Marker', 'vw-driving-school' ),
        'Poiret One' => __( 'Poiret One', 'vw-driving-school' ),
        'Quicksand' => __( 'Quicksand', 'vw-driving-school' ),
        'Quattrocento Sans' => __( 'Quattrocento Sans', 'vw-driving-school' ),
        'Raleway' => __( 'Raleway', 'vw-driving-school' ),
        'Rubik' => __( 'Rubik', 'vw-driving-school' ),
        'Rokkitt' => __( 'Rokkitt', 'vw-driving-school' ),
        'Russo One' => __( 'Russo One', 'vw-driving-school' ),
        'Righteous' => __( 'Righteous', 'vw-driving-school' ),
        'Slabo' => __( 'Slabo', 'vw-driving-school' ),
        'Source Sans Pro' => __( 'Source Sans Pro', 'vw-driving-school' ),
        'Shadows Into Light Two' => __( 'Shadows Into Light Two', 'vw-driving-school'),
        'Shadows Into Light' => __( 'Shadows Into Light', 'vw-driving-school' ),
        'Sacramento' => __( 'Sacramento', 'vw-driving-school' ),
        'Shrikhand' => __( 'Shrikhand', 'vw-driving-school' ),
        'Tangerine' => __( 'Tangerine', 'vw-driving-school' ),
        'Ubuntu' => __( 'Ubuntu', 'vw-driving-school' ),
        'VT323' => __( 'VT323', 'vw-driving-school' ),
        'Varela Round' => __( 'Varela Round', 'vw-driving-school' ),
        'Vampiro One' => __( 'Vampiro One', 'vw-driving-school' ),
        'Vollkorn' => __( 'Vollkorn', 'vw-driving-school' ),
        'Volkhov' => __( 'Volkhov', 'vw-driving-school' ),
        'Yanone Kaffeesatz' => __( 'Yanone Kaffeesatz', 'vw-driving-school' )
		);
	}

	/**
	 * Returns the available font weights.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_weight_choices() {

		return array(
			'' => esc_html__( 'No Fonts weight', 'vw-driving-school' ),
			'100' => esc_html__( 'Thin',       'vw-driving-school' ),
			'300' => esc_html__( 'Light',      'vw-driving-school' ),
			'400' => esc_html__( 'Normal',     'vw-driving-school' ),
			'500' => esc_html__( 'Medium',     'vw-driving-school' ),
			'700' => esc_html__( 'Bold',       'vw-driving-school' ),
			'900' => esc_html__( 'Ultra Bold', 'vw-driving-school' ),
		);
	}

	/**
	 * Returns the available font styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_style_choices() {

		return array(
			'normal'  => esc_html__( 'Normal', 'vw-driving-school' ),
			'italic'  => esc_html__( 'Italic', 'vw-driving-school' ),
			'oblique' => esc_html__( 'Oblique', 'vw-driving-school' )
		);
	}
}
