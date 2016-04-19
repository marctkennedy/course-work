<?php
    class Lnrd_Css_Font extends Lnrd_Customizer_Base {
        /*
         * --------------------------------------------------------------------
         * INSTANCE VARIABLES
         * --------------------------------------------------------------------
         */

        /**
         * @var string $section_id The unique name(id) of the Lnrd_Css_Section
         * object that this Lnrd_Css_Font object will be linked to.
         */
        private $section_id;


        /**
         * @var mixed[] $font_default_values The default values for the
         * css font properties.
         */
        private $font_default_values;


        /**
         * @var string[] $required_font_properties The required css
         * font properties to render. Expected values -> 'font-family',
         * 'font-size', 'font-style', 'font-variant', 'font-weight' or 'all'.
         */
        private $required_font_properties;

        /**
         * @var string[] $legal_font_family_values The legal values for the css
         * font family select list. 
         */
        private $legal_font_family_values;

        /**
         * @var string[] $legal_font_size_values The legal values for the css
         * font size input. Legal values are: 'xx-small', 'x-small', 'small',
         * 'medium', 'large', 'x-large', 'xx-large', 'smaller', 'larger', 'inherit'.
         */
        private $legal_font_size_values;


        /**
         * @var string[] $legal_font_size_unit_values The legal values for the css
         * font size unit input. Legal values are: 'px', 'em', 'ex', 'rem',
         * 'cm', 'mm', 'in', 'pt', 'pc'.
         */
        private $legal_font_size_unit_values;


        /**
         * @var string[] $legal_font_style_values The legal values for the css
         * font style select list. Legal values are: 'normal', 'italic',
         * 'oblique', 'inherit'.
         */
        private $legal_font_style_values;


        /**
         * @var string[] $legal_font_variant_values The legal values for the css
         * font variant select list. Legal values are: 'normal', 'small-caps',
         * 'inherit'.
         */
        private $legal_font_variant_values;


        /**
         * @var string[] $legal_font_weight_values The legal values for the css
         * font weight select list. Legal values are: 'normal', 'bold', 'bolder',
         * 'lighter', '100', '200', '300', '400', '500', '600', '700', '800',
         * '900' and 'inherit'.
         */
        private $legal_font_weight_values;



        /**
         * Creates a new css font object.
         *
         * Creates a new instance of the Lnrd_Css_Font class. Sets the
         * $section_id instance variable to the desired value, sets the
         * $required_font_properties to the desired value and sets the
         * $font_default_values instance variable to the correct css font
         * standard default values.
         *<pre>Example call:
         *    new Lnrd_Css_Font('post_text', array('font-family', 'font-size', 'font-weight')); ->
         *    Creates a new font object that will render a setting for font-family,
         *    font-size and font-weight, on the WordPress theme customizer page within the
         *    requested section. In this case post_text.
         *
         *    new Lnrd_Css_Font('post_text', array('all')); ->
         *    Creates a new font object that will render a setting for font-family,
         *    font-size, font-style, font-variant and font-weight, on the WordPress
         *    theme customizer page within the requested section. In this case
         *    post_text.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @used-by Lnrd_Css_Section::get_css_property_objs() To create a new
         * Lnrd_Css_Font object for the calling Lnrd_Css_Section object.
         *
         * @param string $section_id The unique section id(name) of the calling
         * Lnrd_Css_Section object.
         * @param string[] $required_font_properties The required css font
         * properties to render within the WordPress theme customizer page.
         *
         * @return self
         */
        function __construct($section_id, $required_font_properties) {
            $this->section_id = $section_id;
            $this->required_font_properties = $required_font_properties;
            $this->font_default_values = array(
                'font-family' => 'value1',
                'font-size' => 'medium',
                'font-style' => 'value1',
                'font-size-unit' => 'value1',
                'font-variant' => 'value1',
                'font-weight' => 'value1'
            );
            $this->legal_font_family_values = array(
                'value1' => 'Arial',
                'value2' => 'Arial Black',
                'value3' => 'Book Antiqua',
                'value4' => 'Calibri',
                'value5' => 'Cambria',
                'value6' => 'Charcoal',
                'value7' => 'Comic Sans MS',
                'value8' => 'Courier',
                'value9' => 'Courier New',
                'value10' => 'Gadget',
                'value11' => 'Geneva',
                'value12' => 'Georgia',
                'value13' => 'Helvetica',
                'value14' => 'Impact',
                'value15' => 'Lucida Console',
                'value16' => 'Lucida Grande',
                'value17' => 'Lucida Sans Unicode',
                'value18' => 'Monaco',
                'value19' => 'Palatino',
                'value20' => 'Palatino Linotype',
                'value21' => 'Segoe UI',
                'value22' => 'Tahoma',
                'value23' => 'Times',
                'value24' => 'Times New Roman',
                'value25' => 'Trebuchet MS',
                'value26' => 'Verdana',
            );

            $this->legal_font_size_values = array(
                'xx-small',
                'x-small',
                'small',
                'medium',
                'large',
                'x-large',
                'xx-large',
                'smaller',
                'larger',
                'inherit',
            );

            $this->legal_font_size_unit_values = array(
                'value1' => 'px',
                'value2' => '%',
                'value3' => 'em',
                'value4' => 'ex',
                'value5' => 'rem',
                'value6' => 'cm',
                'value7' => 'mm',
                'value8' => 'in',
                'value9' => 'pt',
                'value10' => 'pc'
            );

            $this->legal_font_style_values = array(
                'value1' => 'normal',
                'value2' => 'italic',
                'value3' => 'oblique',
                'value4' => 'inherit',
            );

            $this->legal_font_variant_values = array(
                'value1' => 'normal',
                'value2' => 'small-caps',
                'value3' => 'inherit',
            );

            $this->legal_font_weight_values = array(
                'value1' => 'normal',
                'value2' => 'bold',
                'value3' => 'bolder',
                'value4' => 'lighter',
                'value5' => '100',
                'value6' => '200',
                'value7' => '300',
                'value8' => '400',
                'value9' => '500',
                'value10' => '600',
                'value11' => '700',
                'value12' => '800',
                'value13' => '900',
                'value14' => 'inherit',
            );
            //echo 'The section ID is: ' . $this->get_section_id() . '<br>';
            //print_r($this->get_required_font_properties());
            //echo '<br>';
            //print_r($this->get_font_default_values());
            //$this->set_font_family('MaRc');
            //$this->set_font_size(array('x-large'));
            //$this->set_font_style('Marc');
            //$this->set_font_variant('Marc');
            ///$this->set_font_weight(1900);
        } // CHECKED.


        /*
         * --------------------------------------------------------------------
         * GETTERS
         * --------------------------------------------------------------------
         */

        /**
         * Gets the unique section id.
         *
         * Gets the unique section id of the Lnrd_Css_Section object to which this
         * Lnrd_Css_Font object is associated with.
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @return string The unique id of the Lnrd_Css_Section object to which
         * this Lnrd_Css_Font object is associated with.
         */
        public function get_section_id() {
            return $this->section_id;
        } // CHECKED.


        /**
         * Gets the required css font properties.
         *
         * Gets the names of the required font properties that were
         * requested by the Lnrd_Css_Section object to which this Lnrd_Css_Font
         * object is associated with.
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @return string[] The names of the font properties that this font
         * object has rendered.
         */
        private function get_required_font_properties() {
            return $this->required_font_properties;
        } // CHECKED.


        /**
         * Gets the font properties default values.
         *
         * Gets the default values of the font properties for this
         * Lnrd_Css_Font object.
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @return mixed[] The default values for the font
         * properties for this Lnrd_Css_Font object.
         */
        private function get_font_default_values() {
            return $this->font_default_values;
        } //CHECKED. 


        /**
         * Renders the font properties.
         * 
         * Renders all of the required css font property settings and
         * controllers for the calling Lnrd_Css_Section.
         *<pre>Example call:
         *    get_font_properties($wp_customize)
         *    $wp_customize __must__ be an instance of the WordPress WP_Customize_Manager class</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Css_Font::get_font_family() To render the
         * css font family setting and controller.
         * @uses Lnrd_Css_Font::get_font_size() To render the
         * css font size setting and controller.
         * @uses Lnrd_Css_Font::get_font_style() To render the
         * css font style setting and controller.
         * @uses Lnrd_Css_Font::get_font_variant() To render the
         * css font variant setting and controller.
         * @uses Lnrd_Css_Font::get_font_weight() To render the
         * css font weight setting and controller.
         *
         * @used-by Lnrd_Css_Section::lnrd_render_section To render the css
         * font properties for the calling section.
         *
         * @param object $wp_customize Instance of the WordPress WP_Customize_Manager class.
         *
         * @return void
         */
        public function get_font_properties($wp_customize) {
            if (is_a($wp_customize, 'WP_Customize_Manager')) {
                foreach ($this->required_font_properties as $property) {
                    switch ($property) {
                        case 'font-family':
                            $this->get_font_family($wp_customize);
                            break;
                        case 'font-size':
                            $this->get_font_size($wp_customize);
                            break;
                        case 'font-style':
                            $this->get_font_style($wp_customize);
                            break;
                        case 'font-variant':
                            $this->get_font_variant($wp_customize);
                            break;
                        case 'font-weight':
                            $this->get_font_weight($wp_customize);
                            break;
                        case 'all':
                            if (count($this->required_font_properties) == 1) {
                                $this->get_font_family($wp_customize);
                                $this->get_font_size($wp_customize);
                                $this->get_font_style($wp_customize);
                                $this->get_font_variant($wp_customize);
                                $this->get_font_weight($wp_customize);
                            }
                            break;
                    } // END switch statement.
                } // END foreach statement.
            } // END if statement.  
        } // CHECKED.


        /**
         * Converts a select list value to a css style rule value.
         *
         * Converts the WordPress theme customizer HTML select list value stored
         * in the database to a valid css font family rule value.
         *<pre>Example call:
         *    get_font_family_css('value2') -> returns '"Arial Black", Gadget, sans-serif'</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @used-by Lnrd_Css_Font::get_font_css() To convert the database stored
         * select list value to a valid css font family style rule value.
         *
         * @param string $font The WordPress theme customizer select list value.
         *
         * @return string The valid css font family style rule value.
         */
        private function get_font_family_css($font) {
            $font_css = '';
            switch($font) {
                case 'value1':
                    $font_css = 'Arial, Helvetica, sans-serif';
                    break;
                case 'value2':
                    $font_css = '"Arial Black", Gadget, sans-serif';
                    break;
                case 'value3':
                    $font_css = '"Book Antiqua", "Palatino Linotype", Palatino, serif';
                    break;
                case 'value4':
                    $font_css = 'Calibri, Arial, Helvetica, sans-serif';
                    break;
                case 'value5':
                    $font_css = 'Cambria, Times, serif';
                    break;
                case 'value6':
                    $font_css = 'Charcoal, Impact, sans-serif';
                    break;
                case 'value7':
                    $font_css = '"Comic Sans MS", cursive, sans-serif';
                    break;
                case 'value8':
                    $font_css = 'Courier, "Courier New", monospace';
                    break;
                case 'value9':
                    $font_css = '"Courier New", Courier, monospace';
                    break;
                case 'value10':
                    $font_css = 'Gadget, "Arial Black", sans-serif';
                    break;
                case 'value11':
                    $font_css = 'Geneva, Verdana, sans-serif';
                    break;
                case 'value12':
                    $font_css = 'Georgia, serif';
                    break;
                case 'value13':
                    $font_css = 'Helvetica, Arial, sans-serif';
                    break;
                case 'value14':
                    $font_css = 'Impact, Charcoal, sans-serif';
                    break;
                case 'value15':
                    $font_css = '"Lucida Console", Monaco, monospace';
                    break;
                case 'value16':
                    $font_css = '"Lucida Grande", "Lucida Sans Unicode", sans-serif';
                    break;
                case 'value17':
                    $font_css = '"Lucida Sans Unicode", "Lucida Grande", sans-serif';
                    break;
                case 'value18':
                    $font_css = 'Monaco, "Lucida Console", monospace';
                    break;
                case 'value19':
                    $font_css = 'Palatino, "Palatino Linotype", "Book Antiqua", serif';
                    break;
                case 'value20':
                    $font_css = '"Palatino Linotype", "Book Antiqua", Palatino, serif';
                    break;
                case 'value21':
                    $font_css = '"Segoe UI", Segoe, "DejaVu Sans", "Trebuchet MS", Verdana, sans-serif';
                    break;
                case 'value22':
                    $font_css = 'Tahoma, Geneva, sans-serif';
                    break;
                case 'value23':
                    $font_css = 'Times, "Times New Roman", serif';
                    break;
                case 'value24':
                    $font_css = '"Times New Roman", Times, serif';
                    break;
                case 'value25':
                    $font_css = '"Trebuchet MS", Helvetica, sans-serif';
                    break;
                case 'value26':
                    $font_css = 'Verdana, Geneva, sans-serif';
                    break;
            }
            return $font_css;
        } // CHECKED.


        /**
         * Converts the WordPress settings into css.
         *
         * Converts the WordPress theme customizer settings values for the font
         * size and font size unit into a valid css style rule.
         *<pre>Example call:
         *    get_font_size_css('xx-large'); -> returns 'font-size:xx-large;'
         *    get_font_size_css(30); -> returns 'font-size:30px', id the font size unit is set to px.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Customizer_Base::select_value_to_css_percentage() To convert
         * the WordPress theme customizer HTML select list value into a valid css
         * length value.
         *
         * @used-by Lnrd_Css_Font::get_font_css() To convert the WordPress theme
         * customizer HTML stored values into a valid css font size style rule.
         *
         * @param string|int $size The value of the font size setting on the
         * WordPress theme customizer page.
         *
         * @return string A valid css font size style rule.
         */
        private function get_font_size_css($size) {
            $font_size_css = '';
            if (is_numeric($size)) {
                $font_size_css = 'font-size:' . $size . $this->select_value_to_css_percentage(get_theme_mod($this->section_id . '_css_font_size_unit')) . ';';
            } else {
                $font_size_css = 'font-size:' . $size . ';';
            }
            return $font_size_css;
        } // CHECKED.


        /**
         * Converts a select list value to a css style rule value.
         *
         * Converts the WordPress theme customizer HTML select list value stored
         * in the database to a valid css font style rule value.
         *<pre>Example call:
         *    get_font_style_css('value2') -> returns 'font-style:italic;'</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @used-by Lnrd_Css_Font::get_font_css() To convert the database stored
         * select list value to a valid font style css style rule value.
         *
         * @param string $style The WordPress theme customizer select list value.
         *
         * @return string The valid font style css style rule value.
         */
        private function get_font_style_css($style) {
            $font_style_css = 'font-style:';
            switch ($style) {
                case 'value1':
                    $font_style_css .= 'normal;';
                    break;
                case 'value2':
                    $font_style_css .= 'italic;';
                    break;
                case 'value3':
                    $font_style_css .= 'oblique;';
                    break;
                case 'value4':
                    $font_style_css .= 'inherit;';
                    break;
            }
            return $font_style_css;
        } // CHECKED.


        /**
         * Converts a select list value to a css style rule value.
         *
         * Converts the WordPress theme customizer HTML select list value stored
         * in the database to a valid css font style rule value.
         *<pre>Example call:
         *    get_font_variant_css('value2') -> returns 'font-variant:small-caps;'</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @used-by Lnrd_Css_Font::get_font_css() To convert the database stored
         * select list value to a valid font variant css style rule value.
         *
         * @param string $variant The WordPress theme customizer select list value.
         *
         * @return string The valid font variant css style rule value.
         */
        private function get_font_variant_css($variant) {
            $font_variant_css = 'font-variant:';
            switch ($variant) {
                case 'value1':
                    $font_variant_css .= 'normal;';
                    break;
                case 'value2':
                    $font_variant_css .= 'small-caps;';
                    break;
                case 'value3':
                    $font_variant_css .= 'inherit;';
                    break;
            }
            return $font_variant_css;
        } // CHECKED.


         /**
         * Converts a select list value to a css style rule value.
         *
         * Converts the WordPress theme customizer HTML select list value stored
         * in the database to a valid css font style rule value.
         *<pre>Example call:
         *    get_font_weight_css('value2') -> returns 'font-weight:bold;'
         *    get_font_weight_css('value11') -> returns 'font-weight:700;'
         *    get_font_weight_css('value14') -> returns 'font-weight:inherit;'</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @used-by Lnrd_Css_Font::get_font_css() To convert the database stored
         * select list value to a valid font weight css style rule value.
         *
         * @param string $weight The WordPress theme customizer select list value.
         *
         * @return string The valid font weight css style rule value.
         */
        private function get_font_weight_css($weight) {
            $font_weight_css = 'font-weight:';
            switch ($weight) {
                case 'value1':
                    $font_weight_css .= 'normal;';
                    break;
                case 'value2':
                    $font_weight_css .= 'bold;';
                    break;
                case 'value3':
                    $font_weight_css .= 'bolder;';
                    break;
                case 'value4':
                    $font_weight_css .= 'lighter;';
                    break;
                case 'value5':
                    $font_weight_css .= '100;';
                    break;
                case 'value6':
                    $font_weight_css .= '200;';
                    break;
                case 'value7':
                    $font_weight_css .= '300;';
                    break;
                case 'value8':
                    $font_weight_css .= '400;';
                    break;
                case 'value9':
                    $font_weight_css .= '500;';
                    break;
                case 'value10':
                    $font_weight_css .= '600;';
                    break;
                case 'value11':
                    $font_weight_css .= '700;';
                    break;
                case 'value12':
                    $font_weight_css .= '800;';
                    break;
                case 'value13':
                    $font_weight_css .= '900;';
                    break;
                case 'value14':
                    $font_weight_css .= 'inherit;';
                    break;
            }
            return $font_weight_css;
        } // CHECKED.


        /**
         * TODO
         */
        public function get_font_css() {
            $css = '';
            foreach ($this->required_font_properties as $property) {
                switch ($property) {
                    case 'font-family':
                        $css .= 'font-family:' . $this->get_font_family_css(get_theme_mod($this->section_id . '_css_font_family')) . ';';
                        break;
                    case 'font-size':
                        $css .= $this->get_font_size_css(get_theme_mod($this->section_id . '_css_font_size'));
                        break;
                    case 'font-style':
                        $css .= $this->get_font_style_css(get_theme_mod($this->section_id . '_css_font_style'));
                        break;
                     case 'font-variant':
                        $css .= $this->get_font_variant_css(get_theme_mod($this->section_id . '_css_font_variant'));
                        break;
                    case 'font-weight':
                        $css .= $this->get_font_weight_css(get_theme_mod($this->section_id . '_css_font_weight'));
                        break;
                    case 'all':
                        $css .= 'font-family:' . $this->get_font_family_css(get_theme_mod($this->section_id . '_css_font_family')) . ';';
                        $css .= $this->get_font_size_css(get_theme_mod($this->section_id . '_css_font_size'));
                        $css .= $this->get_font_style_css(get_theme_mod($this->section_id . '_css_font_style'));
                        $css .= $this->get_font_variant_css(get_theme_mod($this->section_id . '_css_font_variant'));
                        $css .= $this->get_font_weight_css(get_theme_mod($this->section_id . '_css_font_weight'));
                        break;
                }   
            }
            return $css;
        }


        /**
         * Creates a font family setting and control.
         *
         * Creates a WordPress theme customizer setting and control for the css
         * font family property. The control will be visible on the theme
         * customizer screen.
         *<pre>Example call:
         *    get_font_family($wp_customize)
         *    $wp_customize __must__ be an instance of the WordPress WP_Customize_Manager class</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Customizer_Base::get_setting() To create a new WordPress
         * theme customizer setting.
         * @uses Lnrd_Customizer_Base::get_select_control() To create
         * a new WordPress theme customizer select list control.
         *
         * @used-by Lnrd_Css_Font::get_font_properties() To create a font family
         * setting and control.
         *
         * @param object $manager Instance of the WordPress WP_Customize_Manager class.
         *
         * @return void
         */
        private function get_font_family($wp_customize) {
            $this->get_setting(
                $wp_customize,
                $this->section_id . '_css_font_family',
                $this->font_default_values['font-family'],
                'sanitize_font_family_input'   
            );

            $this->get_select_control(
                $wp_customize,
                $this->section_id . '_css_font_family',
                'Font family',
                $this->section_id,
                54,
               $this->legal_font_family_values 
            );
        } // CHECKED.


        /**
         * Creates a font size setting and control.
         *
         * Creates a WordPress theme customizer setting and control for the css
         * font size property. The control will be visible on the theme
         * customizer screen.
         *<pre>Example call:
         *    get_font_size($wp_customize)
         *    $wp_customize __must__ be an instance of the WordPress WP_Customize_Manager class</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Customizer_Base::get_setting() To create a new WordPress
         * theme customizer setting.
         * @uses Lnrd_Customizer_Base::get_input_control() To create a new WordPress
         * theme customizer input control.
         * @uses Lnrd_Customizer_Base::get_select_control_css_percentage() To create
         * a new WordPress theme customizer select list control.
         *
         * @used-by Lnrd_Css_Font::get_font_properties() To create a font size
         * setting and control.
         *
         * @param object $manager Instance of the WordPress WP_Customize_Manager class.
         *
         * @return void
         */
        private function get_font_size($wp_customize) {
            $this->get_setting(
                $wp_customize,
                $this->section_id . '_css_font_size',
                $this->font_default_values['font-size'],
                'sanitize_font_size_input'   
            );

            $this->get_input_control(
                $wp_customize,
                $this->section_id . '_css_font_size',
                'Font size',
                $this->section_id,
                55
            );

            $this->get_setting(
                $wp_customize,
                $this->section_id . '_css_font_size_unit',
                $this->font_default_values['font-size-unit'],
                'sanitize_font_size_unit_input'   
            );

            $this->get_select_control_css_percentage(
                $wp_customize,
                $this->section_id . '_css_font_size_unit',
                '',
                $this->section_id,
                56
            );
        } // CHECKED.


        /**
         * Creates a font style setting and control.
         *
         * Creates a WordPress theme customizer setting and control for the css
         * font style property. The control will be visible on the theme
         * customizer screen.
         *<pre>Example call:
         *    get_font_style($wp_customize)
         *    $wp_customize __must__ be an instance of the WordPress WP_Customize_Manager class</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Customizer_Base::get_setting() To create a new WordPress
         * theme customizer setting.
         * @uses Lnrd_Customizer_Base::get_select_control() To create
         * a new WordPress theme customizer select list control.
         *
         * @used-by Lnrd_Css_Font::get_font_properties() To create a font style
         * setting and control.
         *
         * @param object $manager Instance of the WordPress WP_Customize_Manager class.
         *
         * @return void
         */
        private function get_font_style($wp_customize) {
            $this->get_setting(
                $wp_customize,
                $this->section_id . '_css_font_style',
                $this->font_default_values['font-style'],
                'sanitize_font_style_input'   
            );

            $this->get_select_control(
                $wp_customize,
                $this->section_id . '_css_font_style',
                'Font style',
                $this->section_id,
                57,
               $this->legal_font_style_values 
            );
        } // CHECKED.


        /**
         * Creates a font variant setting and control.
         *
         * Creates a WordPress theme customizer setting and control for the css
         * font variant property. The control will be visible on the theme
         * customizer screen.
         *<pre>Example call:
         *    get_font_variant($wp_customize)
         *    $wp_customize __must__ be an instance of the WordPress WP_Customize_Manager class</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Customizer_Base::get_setting() To create a new WordPress
         * theme customizer setting.
         * @uses Lnrd_Customizer_Base::get_select_control() To create
         * a new WordPress theme customizer select list control.
         *
         * @used-by Lnrd_Css_Font::get_font_properties() To create a font variant
         * setting and control.
         *
         * @param object $manager Instance of the WordPress WP_Customize_Manager class.
         *
         * @return void
         */
        private function get_font_variant($wp_customize) {
            $this->get_setting(
                $wp_customize,
                $this->section_id . '_css_font_variant',
                $this->font_default_values['font-variant'],
                'sanitize_font_variant_input'   
            );

            $this->get_select_control(
                $wp_customize,
                $this->section_id . '_css_font_variant',
                'Font variant',
                $this->section_id,
                58,
               $this->legal_font_variant_values 
            );
        } // CHECKED.


        /**
         * Creates a font weight setting and control.
         *
         * Creates a WordPress theme customizer setting and control for the css
         * font weight property. The control will be visible on the theme
         * customizer screen.
         *<pre>Example call:
         *    get_font_weight($wp_customize)
         *    $wp_customize __must__ be an instance of the WordPress WP_Customize_Manager class</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Customizer_Base::get_setting() To create a new WordPress
         * theme customizer setting.
         * @uses Lnrd_Customizer_Base::get_select_control() To create
         * a new WordPress theme customizer select list control.
         *
         * @used-by Lnrd_Css_Font::get_font_properties() To create a font weight
         * setting and control.
         *
         * @param object $manager Instance of the WordPress WP_Customize_Manager class.
         *
         * @return void
         */
        private function get_font_weight($wp_customize) {
            $this->get_setting(
                $wp_customize,
                $this->section_id . '_css_font_weight',
                $this->font_default_values['font-weight'],
                'sanitize_font_weight_input'   
            );

            $this->get_select_control(
                $wp_customize,
                $this->section_id . '_css_font_weight',
                'Font weight',
                $this->section_id,
                59,
                $this->legal_font_weight_values 
            );
        } // CHECKED.



        /* 
         * --------------------------------------------------------------------------------
         * SETTERS
         * --------------------------------------------------------------------------------
         */

        /**
         * Sets the default font family value.
         *
         * Sets the default value for the css font family control on the
         * WordPress theme customizer screen.
         *<pre>Example call:
         *    set_font_family('Verdana'); -> sets the $font_default_values['font-family'] instance variable to the value 'Verdana'
         *    set_font_family('Segoe UI'); -> sets the $font_default_values['font-family'] instance variable to the value 'Segoe UI'
         *    set_font_family('Open Sans'); -> does nothing as 'Open Sans' is not a legal value in this theme.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Css_Font::css_family_name_to_select_value() To convert a
         * css font family name into a legal value for the WorPress HTML select
         * list on the theme customizer page.
         *
         * @used-by Lnrd_Css_Select:: TODO
         *
         * @param string $font_family The name of the new default font family.
         * Legal values are: 'Arial', 'Arial Black', 'Book Antiqua', 'Calibri',
         * 'Cambria', 'Charcoal', 'Comic Sans MS', 'Courier', 'Courier New',
         * 'Gadget', 'Geneva', 'Georgia', 'Helvetica', 'Impact', 'Lucida Console',
         * 'Lucida Grande', 'Lucida Sans Unicode', 'Monaco', 'Palatino',
         * 'Palatino Linotype', 'Segoe UI', 'Tahoma', 'Times', 'Times New Roman',
         * 'Trebuchet MS', 'Verdana'.
         *
         * @return void
         */
        public function set_font_family($font_family) {
            $font_family = ucwords(strtolower($font_family));

            if ($font_family == 'Segoe Ui') {
                $font_family = 'Segoe UI';
            } else if ($font_family == 'Trebuchet Ms') {
                $font_family = 'Trebuchet MS';
            } else if ($font_family == 'Comic Sans Ms') {
                $font_family = 'Comic Sans MS';
            }

            echo $font_family;
            $legal_font_family_values = array();

            foreach ($this->legal_font_family_values as $font) {
                array_push($legal_font_family_values, $font);
            }

            if (in_array($font_family, $legal_font_family_values)) {
                $this->font_default_values['font-family'] = $this->css_family_name_to_select_value($font_family);
            }
        } // CHECKED.


        /**
         * Sets the default font size value.
         *
         * Sets the default value for the css font size control on the
         * WordPress theme customizer screen.
         *<pre>Example call:
         *     set_font_size(array(10, 'em')) -> Sets the $font_default_values['font-size']
         *     variable to the value 10 and the $font_default_values['font-size-unit'] to
         *     the value 'value3' as px is converted to a select list value.
         *
         *     set_font_size(array('xx-large')) -> Sets the $font_default_values['font-size']
         *     variable to the value 'xx-large' and leaves $font_default_values['font-size-unit']
         *     at the default setting.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Css_Font::css_size_unit_to_select_value() To convert the  css length
         * to a valid WordPress theme customizer HTML select list value.
         *
         * @used-by Lnrd_Css_Section:: TODO
         *
         * @param mixed[] $font_size The font size value followed by the font
         * size length.
         *
         * @return void
         */
        public function set_font_size($font_size) {
            if (is_string($font_size)) {
                $font_size = strtolower($font_size);
            }

            $legal_font_size_values = array();
            $legal_font_size_units = array();

            foreach ($this->legal_font_size_values as $size) {
                array_push($legal_font_size_values, $size);   
            }

            foreach ($this->legal_font_size_unit_values as $unit) {
                array_push($legal_font_size_units, $unit);
            }

            // If we have a count of 2 then we have a font size value and a font size unit.
            if (count($font_size) == 2) {
                if (in_array($font_size[0], $legal_font_size_values)) {
                    $this->font_default_values['font-size'] = $font_size[0];
                } else if (is_numeric($font_size[0])) {
                    $this->font_default_values['font-size'] = $font_size[0];
                }

                if (in_array($font_size[1], $legal_font_size_units)) {
                    $this->font_default_values['font-size-unit'] = $this->css_size_unit_to_select_value($font_size[1]);
                }
            } else if (count($font_size) == 1) { // if we have a count of 1 then we only have a font size value.
                if (in_array($font_size[0], $legal_font_size_values)) {
                    $this->font_default_values['font-size'] = $font_size[0];
                }
            }
        } // CHECKED.


        /**
         * Sets the default font style value.
         *
         * Sets the default value for the css font style control on the
         * WordPress theme customizer screen.
         *<pre>Example call:
         *    set_font_style('italic'); -> sets the $font_default_values['font-style'] instance variable to the value 'italic'
         *    set_font_style('oblique'); -> sets the $font_default_values['font-style'] instance variable to the value 'oblique'
         *    set_font_style('foo'); -> does nothing as 'foo' is not a legal value for the css font style property.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Css_Font::css_style_name_to_select_value() To convert a
         * css font style value into a legal value for the WordPress HTML select
         * list on the theme customizer page.
         *
         * @used-by Lnrd_Css_Select:: TODO
         *
         * @param string $font_style The name of the new default font style.
         * Legal values are: 'normal', 'italic', 'oblique' and 'inherit'.
         *
         * @return void
         */
        public function set_font_style($font_style) {
            $font_style = strtolower($font_style);

            $legal_font_style_values = array();

            foreach ($this->legal_font_style_values as $style) {
                array_push($legal_font_style_values, $style);
            }

            if (in_array($font_style, $legal_font_style_values)) {
                $this->font_default_values['font-style'] = $this->css_style_name_to_select_value($font_style);
            }
        } // CHECKED.


        /**
         * Sets the default font variant value.
         *
         * Sets the default value for the css font variant control on the
         * WordPress theme customizer screen.
         *<pre>Example call:
         *    set_font_variant('normal'); -> sets the $font_default_values['font-variant'] instance variable to the value 'value1'
         *    set_font_variant('small-caps'); -> sets the $font_default_values['font-variant'] instance variable to the value 'value2'
         *    set_font_variant('foo'); -> does nothing as 'foo' is not a legal value for the css font variant property.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Css_Font::css_variant_name_to_select_value() To convert a
         * css font variant value into a legal value for the WordPress HTML select
         * list on the theme customizer page.
         *
         * @used-by Lnrd_Css_Select:: TODO
         *
         * @param string $font_variant The name of the new default font variant.
         * Legal values are: 'normal', 'small-caps' and 'inherit'.
         *
         * @return void
         */
        public function set_font_variant($font_variant) {
            $font_variant = strtolower($font_variant);

            $legal_font_variant_values = array();

            foreach ($this->legal_font_variant_values as $variant) {
                array_push($legal_font_variant_values, $variant);
            }

            if (in_array($font_variant, $legal_font_variant_values)) {
                $this->font_default_values['font-variant'] = $this->css_variant_name_to_select_value($font_variant);
            }
        }


         /**
         * Sets the default font weight value.
         *
         * Sets the default value for the css font weight control on the
         * WordPress theme customizer screen.
         *<pre>Example call:
         *    set_font_weight('normal'); -> sets the $font_default_values['font-weight'] instance variable to the value 'value1'
         *    set_font_weight('500'); -> sets the $font_default_values['font-weight'] instance variable to the value 'value9'
         *    set_font_weight('foo'); -> does nothing as 'foo' is not a legal value for the css font weight property.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Css_Font::css_weight_name_to_select_value() To convert a
         * css font weight value into a legal value for the WordPress HTML select
         * list on the theme customizer page.
         *
         * @used-by Lnrd_Css_Select:: TODO
         *
         * @param string $font_weight The name of the new default font weight.
         * Legal values are: 'normal', 'bold', 'bolder', 'lighter', '100', '200',
         * '300', '400', '500', '600', '700', '800', '900' and 'inherit'.
         *
         * @return void
         */
        public function set_font_weight($font_weight) {
            if (is_string($font_weight)) {
                $font_weight = strtolower($font_weight);
            }

            $legal_font_weight_values = array();

            foreach ($this->legal_font_weight_values as $weight) {
                array_push($legal_font_weight_values, $weight);
            }

            if (in_array($font_weight, $legal_font_weight_values)) {
                $this->font_default_values['font-weight'] = $this->css_weight_name_to_select_value($font_weight);
            }
        } // CHECKED.



        /* 
         * --------------------------------------------------------------------------------
         * USER INPUT SANITIZERS
         * --------------------------------------------------------------------------------
         */

        /**
         * Checks the user input for the font family setting.
         *
         * Checks the user input coming from the HTML select list on the
         * WordPress theme customizer page.
         *<pre>Example call:
         *    sanitize_font_family_input('value1') -> returns 'value1' as value1 is a valid value for the select list.
         *    sanitize_font_family_input('value20') -> returns 'value20' as value20 is a valid value for the select list.
         *    sanitize_font_family_input('foo') -> does nothing as 'foo' is not a valid value for the select list.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @used-by Lnrd_Css_Font::get_font_family() To sanitize the user input
         * for the font family control on the WordPress theme customizer page.
         *
         * @param string $font_family_input The value to check. Valid values are: 'value1', upto and including 'value26'.
         *
         * @return string The font family HTML select list value if valid.
         */
        public function sanitize_font_family_input($font_family_input) {
            if (array_key_exists($font_family_input, $this->legal_font_family_values)) {
                return $font_family_input;
            }
        } // CHECKED.


        /**
         * Checks the user input for the font size setting.
         *
         * Checks the user input coming from the HTML input box on the
         * WordPress theme customizer page.
         *<pre>Example call:
         *    sanitize_font_size_input('xx-large') -> returns 'xx-large' as xx-large is a valid value for the font size input.
         *    sanitize_font_size_input(10) -> returns '10' as 10 is a valid value for the font size input.
         *    sanitize_font_size_input(3.1415) -> returns '3.1415' as 3.1415 is a valid value for the font size input.
         *    sanitize_font_size_input('foo') -> does nothing as 'foo' is not a valid value for the font size input.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @used-by Lnrd_Css_Font::get_font_size() To sanitize the user input
         * for the font size control on the WordPress theme customizer page.
         *
         * @param string $font_size_input The value to check. Valid values
         * are: 'xx-small', 'x-small', 'small', 'medium', 'large', 'x-large',
         * 'xx-large', 'smaller', 'larger', 'inherit', or a number.
         *
         * @return string The font size HTML input value if valid.
         */
        public function sanitize_font_size_input($font_size_input) {
            $font_size_input = strtolower($font_size_input);
            if (in_array($font_size_input, $this->legal_font_size_values)) {
                return $font_size_input;
            } else if (is_numeric($font_size_input)) {
                return $font_size_input;
            }
        } // CHECKED.


        /**
         * Checks the user input for the font size unit setting.
         *
         * Checks the user input coming from the HTML select list on the
         * WordPress theme customizer page.
         *<pre>Example call:
         *    sanitize_font_size_unit_input('value2') -> returns 'value2' as value2 is a valid value for the select list.
         *    sanitize_font_size_unit_input('value10') -> returns 'value10' as value10 is a valid value for the select list.
         *    sanitize_font_size_unit_input('foo') -> does nothing as 'foo' is not a valid value for the select list.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @used-by Lnrd_Css_Font::get_font_size() To sanitize the user input
         * for the font size unit control on the WordPress theme customizer page.
         *
         * @param string $font_size_unit_input The value to check. Valid values are: 'value1', upto and including 'value10'.
         *
         * @return string The font size HTML select list value if valid.
         */
        public function sanitize_font_size_unit_input($font_size_unit_input) {
            if (array_key_exists($font_size_unit_input, $this->legal_font_size_unit_values)) {
                return $font_size_unit_input;
            }
        } // CHECKED.


        /**
         * Checks the user input for the font style setting.
         *
         * Checks the user input coming from the HTML select list on the
         * WordPress theme customizer page.
         *<pre>Example call:
         *    sanitize_font_style_input('value1') -> returns 'value1' as value1 is a valid value for the select list.
         *    sanitize_font_style_input('value4') -> returns 'value4' as value4 is a valid value for the select list.
         *    sanitize_font_style_input('foo') -> does nothing as 'foo' is not a valid value for the select list.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @used-by Lnrd_Css_Font::get_font_style() To sanitize the user input
         * for the font style control on the WordPress theme customizer page.
         *
         * @param string $font_style_input The value to check. Valid values are: 'value1', upto and including 'value4'.
         *
         * @return string The font style HTML select list value if valid.
         */
        public function sanitize_font_style_input($font_style_input) {
            if (array_key_exists($font_style_input, $this->legal_font_style_values)) {
                return $font_style_input;
            }
        } // CHECKED.


        /**
         * Checks the user input for the font variant setting.
         *
         * Checks the user input coming from the HTML select list on the
         * WordPress theme customizer page.
         *<pre>Example call:
         *    sanitize_font_variant_input('value1') -> returns 'value1' as value1 is a valid value for the select list.
         *    sanitize_font_variant_input('value3') -> returns 'value3' as value3 is a valid value for the select list.
         *    sanitize_font_variant_input('foo') -> does nothing as 'foo' is not a valid value for the select list.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @used-by Lnrd_Css_Font::get_font_variant() To sanitize the user input
         * for the font variant control on the WordPress theme customizer page.
         *
         * @param string $font_variant_input The value to check. Valid values are: 'value1', upto and including 'value3'.
         *
         * @return string The font variant HTML select list value if valid.
         */
        public function sanitize_font_variant_input($font_variant_input) {
            if (array_key_exists($font_variant_input, $this->legal_font_variant_values)) {
                return $font_variant_input;
            }
        } // CHECKED.


        /**
         * Checks the user input for the font weight setting.
         *
         * Checks the user input coming from the HTML select list on the
         * WordPress theme customizer page.
         *<pre>Example call:
         *    sanitize_font_weight_input('value1') -> returns 'value1' as value1 is a valid value for the select list.
         *    sanitize_font_weight_input('value11') -> returns 'value11' as value11 is a valid value for the select list.
         *    sanitize_font_weight_input('foo') -> does nothing as 'foo' is not a valid value for the select list.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @used-by Lnrd_Css_Font::get_font_weight() To sanitize the user input
         * for the font weight control on the WordPress theme customizer page.
         *
         * @param string $font_weight_input The value to check. Valid values are: 'value1', upto and including 'value14'.
         *
         * @return string The font weight HTML select list value if valid.
         */
        public function sanitize_font_weight_input($font_weight_input) {
            if (array_key_exists($font_weight_input, $this->legal_font_weight_values)) {
                return $font_weight_input;
            }
        } // CHECKED.


        /* 
         * --------------------------------------------------------------------------------
         * HELPERS
         * --------------------------------------------------------------------------------
         */

        /**
         * Converts a css font name to a select list value.
         *
         * Converts a valid theme css font family name to the corresponding
         * WorPress theme customizer HTML select list value.
         *<pre>Example call:
         *    css_family_name_to_select_value('Segoe UI') -> returns 'value21'
         *    css_family_name_to_select_value('Geneva') -> returns 'value11'
         *    css_family_name_to_select_value('Open Sans') -> returns nothing
         *    as 'Open Sans' is not a valid theme font family.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @used-by Lnrd_Css_Font::set_font_family() To convert the css font
         * family name into a WordPress theme customizer HTML select list value.
         *
         * @param string $font_name The font family name to convert.
         *
         * @return string The WordPress theme customizer HTML select list value.
         */
        private function css_family_name_to_select_value($font_name) {
            $font_name_value = '';
            switch ($font_name) {
                case 'Arial' :
                    $font_name_value = 'value1';
                    break;
                case 'Arial Black' :
                    $font_name_value = 'value2';
                    break;
                case 'Book Antiqua' :
                    $font_name_value = 'value3';
                    break;
                case 'Calibri' :
                    $font_name_value = 'value4';
                    break;
                case 'Cambria' :
                    $font_name_value = 'value5';
                    break;
                case 'Charcoal' :
                    $font_name_value = 'value6';
                    break;
                case 'Comic Sans MS' :
                    $font_name_value = 'value7';
                    break;
                case 'Courier' :
                    $font_name_value = 'value8';
                    break;
                case 'Courier New' :
                    $font_name_value = 'value9';
                    break;
                case 'Gadget' :
                    $font_name_value = 'value10';
                    break;
                case 'Geneva' :
                    $font_name_value = 'value11';
                    break;
                case 'Georgia' :
                    $font_name_value = 'value12';
                    break;
                case 'Helvetica' :
                    $font_name_value = 'value13';
                    break;
                case 'Impact' :
                    $font_name_value = 'value14';
                    break;
                case 'Lucida Console' :
                    $font_name_value = 'value15';
                    break;
                case 'Lucida Grande' :
                    $font_name_value = 'value16';
                    break;
                case 'Lucida Sans Unicode' :
                    $font_name_value = 'value17';
                    break;
                case 'Monaco' :
                    $font_name_value = 'value18';
                    break;
                case 'Palatino' :
                    $font_name_value = 'value19';
                    break;
                case 'Palatino Linotype' :
                    $font_name_value = 'value20';
                    break;
                case 'Segoe UI' :
                    $font_name_value = 'value21';
                    break;
                case 'Tahoma' :
                    $font_name_value = 'value22';
                    break;
                case 'Times' :
                    $font_name_value = 'value23';
                    break;
                case 'Times New Roman' :
                    $font_name_value = 'value24';
                    break;
                case 'Trebuchet MS' :
                    $font_name_value = 'value25';
                    break;
                case 'Verdana' :
                    $font_name_value = 'value26';
                    break;
            }
            return $font_name_value;
        } // CHECKED.


        /**
         * Converts a css font size unit length into a select list value.
         *
         * Converts a css font size length value into the corresponding WordPress
         * theme customizer HTML select list value.
         *<pre>Example call:
         *    css_size_unit_to_select_value('%'); -> returns 'value2'
         *    css_size_unit_to_select_value('rem'); -> returns 'value5'
         *    css_size_unit_to_select_value('foo'); -> returns nothing as 'foo' is not a valid css length value</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @param string $font_size_unit A valid css length. Valid values
         * are 'px', 'em', 'ex', 'rem', 'cm', 'mm', 'in', 'pt', 'pc'.
         *
         * @return string The css length converted into a WordPress theme
         * customizer HTML select list value.
         */
        private function css_size_unit_to_select_value($font_size_unit) {
            $font_size_value = '';
            switch ($font_size_unit) {
                case 'px':
                    $font_size_value = 'value1';
                    break;
                case '%':
                    $font_size_value = 'value2';
                    break;
                case 'em':
                    $font_size_value = 'value3';
                    break;
                case 'ex':
                    $font_size_value = 'value4';
                    break;
                case 'rem':
                    $font_size_value = 'value5';
                    break;
                case 'cm':
                    $font_size_value = 'value6';
                    break;
                case 'mm':
                    $font_size_value = 'value7';
                    break;
                case 'in':
                    $font_size_value = 'value8';
                    break;
                case 'pt':
                    $font_size_value = 'value9';
                    break;
                case 'pc':
                    $font_size_value = 'value10';
                    break;
            }
            return $font_size_value;
        } // CHECKED.


        /**
         * Converts a css font style to a select list value.
         *
         * Converts a valid theme css font style value to the corresponding
         * WordPress theme customizer HTML select list value.
         *<pre>Example call:
         *    css_style_name_to_select_value('italic') -> returns 'value2'
         *    css_style_name_to_select_value('oblique') -> returns 'value3'
         *    css_style_name_to_select_value('foo') -> returns nothing
         *    as 'foo' is not a valid font style value.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @used-by Lnrd_Css_Font::set_font_style() To convert the css font
         * style value into a WordPress theme customizer HTML select list value.
         *
         * @param string $font_style The font style value to convert.
         *
         * @return string The WordPress theme customizer HTML select list value.
         */
        private function css_style_name_to_select_value($font_style) {
            $font_style_value = '';
            switch ($font_style) {
                case 'normal' :
                    $font_style_value = 'value1';
                    break;
                case 'italic' :
                    $font_style_value = 'value2';
                    break;
                case 'oblique' :
                    $font_style_value = 'value3';
                    break;
                case 'inherit' :
                    $font_style_value = 'value4';
                    break;
            }
            return $font_style_value;
        } // CHECKED.


        /**
         * Converts a css font variant to a select list value.
         *
         * Converts a valid theme css font variant value to the corresponding
         * WordPress theme customizer HTML select list value.
         *<pre>Example call:
         *    css_variant_name_to_select_value('small-caps') -> returns 'value2'
         *    css_variant_name_to_select_value('inherit') -> returns 'value3'
         *    css_variant_name_to_select_value('foo') -> returns nothing
         *    as 'foo' is not a valid font variant value.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @used-by Lnrd_Css_Font::set_font_variant() To convert the css font
         * variant value into a WordPress theme customizer HTML select list value.
         *
         * @param string $font_variant The font variant value to convert.
         *
         * @return string The WordPress theme customizer HTML select list value.
         */
        private function css_variant_name_to_select_value($font_variant) {
            $font_variant_value = '';
            switch ($font_variant) {
                case 'normal':
                    $font_variant_value = 'value1';
                    break;
                case 'small-caps':
                    $font_variant_value = 'value2';
                    break;
                case 'inherit':
                    $font_variant_value = 'value3';
                    break;
            }
            return $font_variant_value;
        } // CHECKED.


        /**
         * Converts a css font weight to a select list value.
         *
         * Converts a valid theme css font weight value to the corresponding
         * WordPress theme customizer HTML select list value.
         *<pre>Example call:
         *    css_weight_name_to_select_value('lighter') -> returns 'value4'
         *    css_weight_name_to_select_value('inherit') -> returns 'value14'
         *    css_weight_name_to_select_value('foo') -> returns nothing
         *    as 'foo' is not a valid font weight value.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @used-by Lnrd_Css_Font::set_font_weight() To convert the css font
         * weight value into a WordPress theme customizer HTML select list value.
         *
         * @param string $font_weight The font weight value to convert.
         *
         * @return string The WordPress theme customizer HTML select list value.
         */
        private function css_weight_name_to_select_value($font_weight) {
            $font_weight_value = '';
            switch ($font_weight) {
                case 'normal':
                    $font_weight_value = 'value1';
                    break;
                case 'bold':
                    $font_weight_value = 'value2';
                    break;
                case 'bolder':
                    $font_weight_value = 'value3';
                    break;
                case 'lighter':
                    $font_weight_value = 'value4';
                    break;
                case '100':
                    $font_weight_value = 'value5';
                    break;
                case '200':
                    $font_weight_value = 'value6';
                    break;
                case '300':
                    $font_weight_value = 'value7';
                    break;
                case '400':
                    $font_weight_value = 'value8';
                    break;
                case '500':
                    $font_weight_value = 'value9';
                    break;
                case '600':
                    $font_weight_value = 'value10';
                    break;
                case '700':
                    $font_weight_value = 'value11';
                    break;
                case '800':
                    $font_weight_value = 'value12';
                    break;
                case '900':
                    $font_weight_value = 'value13';
                    break;
                case 'inherit':
                    $font_weight_value = 'value14';
                    break;
            }
            return $font_weight_value;
        } // CHECKED.

    } // END Lnrd_Css_Font class.
?>
