<?php
    /**
     *
     *
     * @method void get_setting(object $manager, string $id, string $default, string $sanitizer, string $transport = 'refresh')
     * @method void get_input_control(object $manager, string $id, string $label, string $section_id, integer $priority)
     * @method void get_select_control_css_length(object $manager, string $id, string $label, string $section_id, integer $priority)
     */
    class Lnrd_Css_Border extends Lnrd_Customizer_Base {
         /* 
         * --------------------------------------------------------------------------------
         * INSTANCE VARIABLES
         * --------------------------------------------------------------------------------
         */

        /**
         * @var string $section_id The name of the Lnrd_Css_Section object
         * that this Lnrd_Css_Border object will be linked to.
         */
        private $section_id;

        /**
         * @var mixed[] $border_default_values The default values for the
         * css border properties.
         */
        private $border_default_values;

        /**
         * @var string[] $required_border_properties The required css
         * border properties to render. Expected values -> 'border_top',
         * 'border_right', 'border_bottom', 'border_left' or 'all'. 
         */
        private $required_border_properties;

        /**
         * @var string[] $legal_width_values The legal string values for the
         * border width css property. Legal values are: 'thin', 'medium',
         * 'thick', 'inherit'.
         */
        private $legal_width_values;

        /**
         * @var string[] $legal_width_units The legal css length values for the
         * border width css property. Legal values are: 'px', 'em', 'ex', 'rem',
         * 'cm', 'mm', 'in', 'pt', 'pc'.
         */
        private $legal_width_units;

        /**
         *  @var string[] $legal_style_values The legal string values for the
         *  css border style property. Legal values are: 'none', 'hidden',
         *  'dotted', 'dashed', 'solid', 'double', 'ridge', 'inset',
         *  'outset', 'groove', 'inherit'.
         */
        private $legal_style_values;


        /* 
         * --------------------------------------------------------------------------------
         * INSTANCE METHODS
         * --------------------------------------------------------------------------------
         */


        /**
         * Creates a new css border object.
         *
         * Creates a new instance of the Lnrd_Css_Border class. Sets the $section_id instance variable to the desired value, sets the $required_border_properties to the desired value and sets the $border_default_values instance variable to the correct css border standard default values.
         *<pre>Example call:
         *    new Lnrd_Css_Border('post_text', array('border-top','border-right','border-bottom')); -> creates a new css border object and sets the $section_id instance variable to the value 'post_text' and sets the $required_border_properties instance variable with the values 'border-top', 'border-right', 'border-bottom'.
         *    new Lnrd_Css_Border('post_text', array('all')); -> creates a new css border object that will render all of the border css properties.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @used-by Lnrd_Css_Section::get_css_property_objs() To create a new Lnrd_Css_Border object for the calling Lnrd_Css_Section.
         *
         * @param string $section_id The unique section id(name) of the calling Lnrd_Css_Section object.
         * @param string[] $required_border_properties The required css border properties to render within the WordPress theme customizer page.
         *
         * @return self
         */
        function __construct($section_id, $required_border_properties) {
            $this->section_id = $section_id;
            $this->required_border_properties = $required_border_properties;
            $this->border_default_values = array(
                'border_top_width' => 'medium',
                'border_right_width' => 'medium',
                'border_bottom_width' => 'medium',
                'border_left_width' => 'medium',
                'border_top_width_units' => 'value1',// value1 = 'px'
                'border_right_width_units' => 'value1',// value1 = 'px'
                'border_bottom_width_units' => 'value1',// value1 = 'px'
                'border_left_width_units' => 'value1',// value1 = 'px'
                'border_top_style' => 'value1', // value1 = none.
                'border_right_style' => 'value1', // value1 = none.
                'border_bottom_style' => 'value1', // value1 = none.
                'border_left_style' => 'value1', // value1 = none.
                'border_top_color' => '#000000',
                'border_right_color' => '#000000',
                'border_bottom_color' => '#000000',
                'border_left_color' => '#000000',
            );
            $this->legal_width_values = array(
                'thin', 'medium', 'thick', 'inherit'
            );
            $this->legal_width_units = array(
                'px', 'em', 'ex', 'rem', 'cm', 'mm', 'in', 'pt', 'pc'
            );
            $this->legal_style_values = array(
                'none', 'hidden', 'dotted', 'dashed', 'solid',
                'double', 'ridge', 'inset', 'outset', 'groove', 'inherit'
            );
            //$this->set_border_top( array('5', 'px', 'solid', '#6756fd') );
            //$this->set_border_right( array('5', 'px', 'solid', '#6756fd') );
            //$this->set_border_bottom( array('5', 'px', 'solid', '#6756fd') );
            //$this->set_border_left( array('5', 'px', 'solid', '#6756fd') );
        } // CHECKED.


        /* 
         * --------------------------------------------------------------------------------
         * GETTERS
         * --------------------------------------------------------------------------------
         */

        /**
         * Gets the unique section id.
         *
         * Gets the unique section id of the Lnrd_Css_Section object to which this
         * Lnrd_Css_Border object is associated with.
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @return string The unique id of the Lnrd_Css_Section object to which
         * this Lnrd_Css_Border object is associated with. 
         */
        public function get_section_id() {
            return $this->section_id;
        } // CHECKED.


        /**
         * Gets the required css border properties.
         *
         * Gets the names of the required border properties that were
         * requested by the Lnrd_Css_Section object to which this Lnrd_Css_Border
         * object is associated with.
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @return string[] The names of the border properties that this border
         * object has rendered.
         */
        public function get_required_border_properties() {
            return $this->required_border_properties;
        } // CHECKED.


        /**
         * Gets the border properties default values.
         *
         * Gets the default values of the border properties for this
         * Lnrd_Css_Border object.
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @return mixed[] The default values for the border
         * properties for this Lnrd_Css_Border object.
         */
        public function get_border_default_values() {
            return $this->border_default_values;
        } // CHECKED.


        /**
         * Renders the border properties.
         * 
         * Renders all of the required css border property settings and
         * controllers for the calling Lnrd_Css_Section.
         *<pre>Example call:
         *    get_border_properties($wp_customize)
         *    $wp_customize __must__ be an instance of the WordPress WP_Customize_Manager class</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Css_Border::get_border_top_width() To render the
         * css border top width setting and controller.
         * @uses Lnrd_Css_Border::get_border_right_width() To render the
         * css border right width setting and controller.
         * @uses Lnrd_Css_Border::get_border_bottom_width() To render the
         * css border bottom width setting and controller.
         * @uses Lnrd_Css_Border::get_border_left_width() To render the
         * css border left width setting and controller.
         * @uses Lnrd_Css_Border::get_border_top_style() To render the
         * css border top style setting and controller.
         * @uses Lnrd_Css_Border::get_border_right_style() To render the
         * css border right style setting and controller.
         * @uses Lnrd_Css_Border::get_border_bottom_style() To render the
         * css border bottom style setting and controller.
         * @uses Lnrd_Css_Border::get_border_left_style() To render the
         * css border left style setting and controller.
         * @uses Lnrd_Css_Border::get_border_top_color() To render the
         * css border top color setting and controller.
         * @uses Lnrd_Css_Border::get_border_right_color() To render the
         * css border right color setting and controller.
         * @uses Lnrd_Css_Border::get_border_bottom_color() To render the
         * css border bottom color setting and controller.
         * @uses Lnrd_Css_Border::get_border_left_color() To render the
         * css border left color setting and controller.
         *
         * @used-by Lnrd_Css_Section::lnrd_render_section To render the css
         * border properties for the calling section.
         *
         * @param object $wp_customize Instance of the WordPress WP_Customize_Manager class.
         *
         * @return void
         */
        public function get_border_properties($wp_customize) {
            if (is_a($wp_customize, 'WP_Customize_Manager')) {
                foreach ($this->required_border_properties as $property) {
                    switch ($property) {
                        case 'border-top':
                            $this->get_border_top_width($wp_customize);
                            $this->get_border_top_style($wp_customize);
                            $this->get_border_top_color($wp_customize);
                            break;
                        case 'border-right':
                            $this->get_border_right_width($wp_customize);
                            $this->get_border_right_style($wp_customize);
                            $this->get_border_right_color($wp_customize);
                            break;
                        case 'border-bottom':
                            $this->get_border_bottom_width($wp_customize);
                            $this->get_border_bottom_style($wp_customize);
                            $this->get_border_bottom_color($wp_customize);
                            break;
                        case 'border-left':
                            $this->get_border_left_width($wp_customize);
                            $this->get_border_left_style($wp_customize);
                            $this->get_border_left_color($wp_customize);
                            break;
                        case 'all':
                            if (count($this->required_border_properties) == 1) {
                                $this->get_border_top_width($wp_customize);
                                $this->get_border_top_style($wp_customize);
                                $this->get_border_top_color($wp_customize);
                                $this->get_border_right_width($wp_customize);
                                $this->get_border_right_style($wp_customize);
                                $this->get_border_right_color($wp_customize);
                                $this->get_border_bottom_width($wp_customize);
                                $this->get_border_bottom_style($wp_customize);
                                $this->get_border_bottom_color($wp_customize);
                                $this->get_border_left_width($wp_customize);
                                $this->get_border_left_style($wp_customize);
                                $this->get_border_left_color($wp_customize);
                            }
                            break;     
                    } // END switch statement.   
                } // END foreach statement.
            } // END if statement.    
        } // CHECKED.


        /**
         * Generates the css for this border object.
         *
         * Returns a string which is the css that is required for this border
         * object. The css will enable the WordPress theme customizer preview window
         * to update the css to reflect the new changes, and also output the css
         * in the head of the live site once the changes have been saved to the WordPress database.
         *<pre>Example:
         *    get_border_css() -> string 'border-top-width:medium;border-top-color:#FFFFFF;' etc.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Css_Border::get_border_size_css() To correctly output
         * the border-width css value. 
         * @uses Lnrd_Css_Border::get_border_style_value() To convert the
         * WordPress theme customizer HTML select value to a valid border
         * style css value. 
         *
         * @used-by Lnrd_Css_Section::get_section_css() To render the css
         * border styles for the calling section.
         *
         * @return string $css The css border property rules for this border
         * object. See example above.
         */
        public function get_border_css() {
            $css = '';

            foreach ($this->required_border_properties as $property) {
                switch ($property) {
                    case 'border-top':
                        $css .= 'border-top:' . $this->get_border_size_css('_css_border_top_width', '_css_border_top_width_units') . ' ' . $this->get_border_style_value(get_theme_mod($this->section_id . '_css_border_top_style')) . ' ' . get_theme_mod($this->section_id . '_css_border_top_color') . ';';
                        break;
                    case 'border-right':
                        $css .= 'border-right:' . $this->get_border_size_css('_css_border_right_width', '_css_border_right_width_units') . ' ' . $this->get_border_style_value(get_theme_mod($this->section_id . '_css_border_right_style')) . ' ' . get_theme_mod($this->section_id . '_css_border_right_color') . ';';
                        break;
                    case 'border-bottom':
                        $css .= 'border-bottom:' . $this->get_border_size_css('_css_border_bottom_width', '_css_border_bottom_width_units') . ' ' . $this->get_border_style_value(get_theme_mod($this->section_id . '_css_border_bottom_style')) . ' ' . get_theme_mod($this->section_id . '_css_border_bottom_color') . ';';
                        break;
                    case 'border-left':
                        $css .= 'border-left:' . $this->get_border_size_css('_css_border_left_width', '_css_border_left_width_units') . ' ' . $this->get_border_style_value(get_theme_mod($this->section_id . '_css_border_left_style')) . ' ' . get_theme_mod($this->section_id . '_css_border_left_color') . ';';
                        break;
                    case 'all':
                        $css .= 'border-top:' . $this->get_border_size_css('_css_border_top_width', '_css_border_top_width_units') . ' ' . $this->get_border_style_value(get_theme_mod($this->section_id . '_css_border_top_style')) . ' ' . get_theme_mod($this->section_id . '_css_border_top_color') . ';';
                        $css .= 'border-right:' . $this->get_border_size_css('_css_border_right_width', '_css_border_right_width_units') . ' ' . $this->get_border_style_value(get_theme_mod($this->section_id . '_css_border_right_style')) . ' ' . get_theme_mod($this->section_id . '_css_border_right_color') . ';';
                        $css .= 'border-bottom:' . $this->get_border_size_css('_css_border_bottom_width', '_css_border_bottom_width_units') . ' ' . $this->get_border_style_value(get_theme_mod($this->section_id . '_css_border_bottom_style')) . ' ' . get_theme_mod($this->section_id . '_css_border_bottom_color') . ';';
                        $css .= 'border-left:' . $this->get_border_size_css('_css_border_left_width', '_css_border_left_width_units') . ' ' . $this->get_border_style_value(get_theme_mod($this->section_id . '_css_border_left_style')) . ' ' . get_theme_mod($this->section_id . '_css_border_left_color') . ';';
                        break;
                } // END switch statement.
            } // END foreach statement.
           return $css;
        } // CHECKED.


        /**
         * Converts the border width select value to a css length.
         *
         * Converts the WordPress theme customizer HTML select value for the
         * border width units into a valid css length value.
         *<pre>Example call:
         *    get_border_size_units('value1') -> returns the value 'px'.
         *    get_border_size_units('value4') -> returns the value 'rem'.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Customizer_Base::select_value_to_css_length() To convert
         * the WordPress theme customizer HTML select list value to a valid css
         * length value.
         *
         * @used-by Lnrd_Css_Border::get_border_size_css() To correctly output
         * the border-width css value.
         *
         * @param string $border_value The WordPress theme customizer HTML select
         * list value to convert.
         *
         * @return string The converted WordPress theme customizer HTML select
         * list value. See above example.
         */
        private function get_border_size_units($border_value) {
            $border_unit = $this->select_value_to_css_length($border_value);
            return $border_unit;
        } // CHECKED.


        /**
         *
         */
        private function get_border_style_value($style_value) {
            $border_style;
            switch ($style_value) {
                case 'value1':
                    $border_style = 'none';
                    break;
                case 'value2':
                    $border_style = 'hidden';
                    break;
                case 'value3':
                    $border_style = 'dotted';
                    break;
                case 'value4':
                    $border_style = 'dashed';
                    break;
                case 'value5':
                    $border_style = 'solid';
                    break;
                case 'value6':
                    $border_style = 'double';
                    break;
                case 'value7':
                    $border_style = 'groove';
                    break;
                case 'value8':
                    $border_style = 'ridge';
                    break;
                case 'value9':
                    $border_style = 'inset';
                    break;
                case 'value10':
                    $border_style = 'outset';
                    break;
                case 'value11':
                    $border_style = 'inherit';
                    break;
            }
           return $border_style;
        }


        /**
         * Returns the correct border width css rule.
         *
         * Returns the correct css style rule for the desired border width
         * property. If the border width value is numeric it will append
         * the css length value.
         *<pre>Example call:
         *    get_border_size_css('_css_border_top_width', '_css_border_top_width_units'); -> returns 'medium' if that is the value stored in the WordPress database.
         *    get_border_size_css('_css_border_top_width', '_css_border_top_width_units'); -> returns '10px' if that is the value stored in the WordPress database.
         *    Appends the css length value if the value is numeric, if not it returns the value without the length.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Css_Border::get_border_size_units() To convert WordPress
         * theme customizer HTML select list values to a corresponding css
         * length value.
         *
         * @used-by Lnrd_Css_Border::get_border_css() To render the css for the
         * required border properties.
         *
         * @param string $border_size_id The id of the border width setting to
         * retrieve. Legal values are: '_css_border_top_width',
         * '_css_border_right_width', '_css_border_bottom_width',
         * '_css_border_left_width'.
         * @param string $border_unit_id The id of the border width unit setting
         * to retrieve. Legal values are: '_css_border_top_width_units',
         * '_css_border_right_width_units', '_css_border_bottom_width_units',
         * '_css_border_left_width_units'.
         *
         * @return string The desired border width css value. See above example. 
         */
        private function get_border_size_css($border_size_id, $border_unit_id) {
            $css = '';
            if (is_numeric(get_theme_mod($this->section_id . $border_size_id))) {
                $css .= get_theme_mod($this->section_id . $border_size_id) . $this->get_border_size_units(get_theme_mod($this->section_id . $border_unit_id));
            } else {
                $css .= get_theme_mod($this->section_id . $border_size_id);
            }
            return $css;
        } // CHECKED.


        /**
         * Creates a border width setting and control.
         * 
         * Creates a border width setting and controller on the
         * WordPress theme customizer page for choosing the required css
         * border width values.
         *<pre>Example call:
         *    get_border_width(
         *       $wp_customize,
         *       array('_css_border_top_width', '_css_border_top_width_units'),
         *       array(10, 'em'),
         *       array('sanitize_border_width_input', 'sanitize_border_width_unit'),
         *       array('Border top width', ''),
         *       array(18, 19)
         *   );</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Customizer_Base::get_setting() To create a new WordPress
         * theme customizer setting.
         * @uses Lnrd_Customizer_Base::get_input_control() To create a new
         * WordPress theme customizer input control.
         * @uses Lnrd_Customizer_Base::get_select_control_css_length() To create
         * a new WordPress theme customizer select list control pre-populated with
         * css length values.
         *
         * @used-by Lnrd_Css_Border::get_border_top_width() To create a new
         * WordPress theme customizer setting and control for the border top width css property.
         * @used-by Lnrd_Css_Border::get_border_right_width() To create a new
         * WordPress theme customizer setting and control for the border right width css property.
         * @used-by Lnrd_Css_Border::get_border_bottom_width() To create a new
         * WordPress theme customizer setting and control for the border bottom width css property.
         * @used-by Lnrd_Css_Border::get_border_left_width() To create a new
         * WordPress theme customizer setting and control for the border left width css property.
         *
         * @param object $manager Instance of the WordPress WP_Customize_Manager class. 
         * @param string[] $id The unique id's to use for the border with value
         * setting and the border width unit length setting and control.
         * @param mixed[] $default The default settings for the desired border
         * width value and the border width unit.
         * @param string[] $sanitize The method names of the sanitze methods
         * which WordPress will use to check for correct user input for the border
         * width value and the border width unit length.
         * @param string[] $label The labels that will appear above the border
         * width setting control and the border width unit length control on
         * the WordPress theme customizer screen.
         * @param int[] $priority The priority of the border width setting
         * control and the border width unit length control(which order they
         * will display relative to other controls on the WordPress theme
         * customizer screen).
         *
         * @return void
         */
        private function get_border_width($manager, $id, $default, $sanitize, $label, $priority) {
            $this->get_setting(
                $manager,
                $this->section_id . $id[0],
                $default[0],
                $sanitize[0]
            );
            
            $this->get_input_control(
                $manager,
                $this->section_id . $id[0],
                $label[0],
                $this->section_id,
                $priority[0]
            );

            $this->get_setting(
                $manager,
                $this->section_id . $id[1],
                $default[1],
                $sanitize[1]
            );

            $this->get_select_control_css_length(
                $manager,
                $this->section_id . $id[1],
                $label[1],
                $this->section_id,
                $priority[1]
            );
        } // CHECKED.


        /**
         * Creates a border top width setting and control.
         *
         * Creates a border top width setting and control that will display on
         * the WordPress theme customizer page.
         *<pre>Example call:
         *    get_border_top_width($wp_customize)
         *    $wp_customize __must__ be an instance of the WordPress WP_Customize_Manager class</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Css_Border::get_border_width() To create the border top
         * width WordPress setting and control.
         *
         * @used-by Lnrd_Css_Border::get_border_properties() To render the border
         * top width control on the WordPress theme customizer screen.
         *
         * @param object $wp_customize Instance of the WordPress WP_Customize_Manager class.
         *
         * @return void
         */
        private function get_border_top_width($wp_customize) {
            $this->get_border_width(
                $wp_customize,
                array('_css_border_top_width', '_css_border_top_width_units'),
                array($this->border_default_values['border_top_width'], $this->border_default_values['border_top_width_units']),
                array('sanitize_border_width_input', 'sanitize_border_width_unit'),
                array('Border top width', ''),
                array(18, 19)
            );
        } // CHECKED.


        /**
         * Creates a border right width setting and control.
         *
         * Creates a border right width setting and control that will display on
         * the WordPress theme customizer page.
         *<pre>Example call:
         *    get_border_right_width($wp_customize)
         *    $wp_customize __must__ be an instance of the WordPress WP_Customize_Manager class</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Css_Border::get_border_width() To create the border right
         * width WordPress setting and control.
         *
         * @used-by Lnrd_Css_Border::get_border_properties() To render the border
         * right width control on the WordPress theme customizer screen.
         *
         * @param object $wp_customize Instance of the WordPress WP_Customize_Manager class.
         *
         * @return void
         */
        private function get_border_right_width($wp_customize) {
            $this->get_border_width(
                $wp_customize,
                array('_css_border_right_width', '_css_border_right_width_units'),
                array($this->border_default_values['border_right_width'], $this->border_default_values['border_right_width_units']),
                array('sanitize_border_width_input', 'sanitize_border_width_unit'),
                array('Border right width', ''),
                array(22, 23)
            );
        } // CHECKED.


        /**
         * Creates a border bottom width setting and control.
         *
         * Creates a border bottom width setting and control that will display on
         * the WordPress theme customizer page.
         *<pre>Example call:
         *    get_border_bottom_width($wp_customize)
         *    $wp_customize __must__ be an instance of the WordPress WP_Customize_Manager class</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Css_Border::get_border_width() To create the border bottom
         * width WordPress setting and control.
         *
         * @used-by Lnrd_Css_Border::get_border_properties() To render the border
         * bottom width control on the WordPress theme customizer screen.
         *
         * @param object $wp_customize Instance of the WordPress WP_Customize_Manager class.
         *
         * @return void
         */
        private function get_border_bottom_width($wp_customize) {
            $this->get_border_width(
                $wp_customize,
                array('_css_border_bottom_width', '_css_border_bottom_width_units'),
                array($this->border_default_values['border_bottom_width'], $this->border_default_values['border_bottom_width_units']),
                array('sanitize_border_width_input', 'sanitize_border_width_unit'),
                array('Border bottom width', ''),
                array(26, 27)
            );
        } // CHECKED.


        /**
         * Creates a border left width setting and control.
         *
         * Creates a border left width setting and control that will display on
         * the WordPress theme customizer page.
         *<pre>Example call:
         *    get_border_top_width($wp_customize)
         *    $wp_customize __must__ be an instance of the WordPress WP_Customize_Manager class</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Css_Border::get_border_width() To create the border left
         * width WordPress setting and control.
         *
         * @used-by Lnrd_Css_Border::get_border_properties() To render the border
         * left width control on the WordPress theme customizer screen.
         *
         * @param object $wp_customize Instance of the WordPress WP_Customize_Manager class.
         *
         * @return void
         */
        private function get_border_left_width($wp_customize) {
            $this->get_border_width(
                $wp_customize,
                array('_css_border_left_width', '_css_border_left_width_units'),
                array($this->border_default_values['border_left_width'], $this->border_default_values['border_left_width_units']),
                array('sanitize_border_width_input', 'sanitize_border_width_unit'),
                array('Border left width', ''),
                array(30, 31)
            );
        } // CHECKED.


        /**
         * Creates a border style setting and control.
         *
         * Creates a WordPress theme customizer border style setting and control.
         *<pre>Example call:
         *    get_border_style(
         *        $wp_customize,
         *        '_css_border_top_style',
         *        'dashed',
         *        'sanitize_border_style_input',
         *        'Border top style',
         *        20
         *    );</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Customizer_Base::get_setting() To create a new WordPress
         * theme customizer setting.
         * @uses Lnrd_Customizer_Base::get_select_control() To create a new
         * WordPress theme customizer HTML select list control.
         *
         * @used-by Lnrd_Css_Border:: get_border_top_style() To create a
         * WordPress setting and control for the border top style.
         * @used-by Lnrd_Css_Border:: get_border_right_style() To create a
         * WordPress setting and control for the border right style.
         * @used-by Lnrd_Css_Border:: get_border_bottom_style() To create a
         * WordPress setting and control for the border bottom style.
         * @used-by Lnrd_Css_Border:: get_border_left_style() To create a
         * WordPress setting and control for the border left style.
         *
         * @param object $manager Instance of the WordPress WP_Customize_Manager class.
         * @param string $id The unique setting id for this border style setting.
         * @param string $default The default css value for this border style setting. 
         * @param string $sanitize The method name that WordPress will use to
         * check user input for this border style setting. 
         * @param $label The name that will appear above this border style control
         * on the WordPress theme customizer page.
         * @param $priority Where this control will appear relative to other controls
         * on the WordPress theme customizer page.
         *
         * @return void
         */
        private function get_border_style($manager, $id, $default, $sanitize, $label, $priority) {
            $this->get_setting(
                $manager,
                $this->section_id . $id,
                $default,
                $sanitize
            );

            $this->get_select_control(
                $manager,
                $this->section_id . $id,
                $label,
                $this->section_id,
                $priority,
                array(
                    'value1' => 'none',
                    'value2' => 'hidden',
                    'value3' => 'dotted',
                    'value4' => 'dashed',
                    'value5' => 'solid',
                    'value6' => 'double',
                    'value7' => 'groove',
                    'value8' => 'ridge',
                    'value9' => 'inset',
                    'value10' => 'outset',
                    'value11' => 'inherit',    
                )
            );
        } // CHECKED.


        /**
         * Creates a border top style setting and control.
         *
         * Creates a WordPress setting and control for the css border top style
         * property that will appear on the theme customizer page.
         *<pre>Example call:
         *    get_border_top_style($wp_customize);
         *    $wp_customize __must__ be an instance of the WordPress WP_Customize_Manager class.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Css_Border::get_border_style() To create a new border top
         * style WordPress setting and control.
         *
         * @used-by Lnrd_Css_Border::get_border_properties() To render the border
         * top style control on the WordPress theme customizer screen.
         *
         * @param object $wp_customize Instance of the WordPress WP_Customize_Manager class.
         *
         * @return void
         */
        private function get_border_top_style($wp_customize) {
            $this->get_border_style(
                $wp_customize,
                '_css_border_top_style',
                $this->border_default_values['border_top_style'],
                'sanitize_border_style_input',
                'Border top style',
                20
            );
        } // CHECKED.


        /**
         * Creates a border right style setting and control.
         *
         * Creates a WordPress setting and control for the css border right style
         * property that will appear on the theme customizer page.
         *<pre>Example call:
         *    get_border_right_style($wp_customize);
         *    $wp_customize __must__ be an instance of the WordPress WP_Customize_Manager class.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Css_Border::get_border_style() To create a new border right
         * style WordPress setting and control.
         *
         * @used-by Lnrd_Css_Border::get_border_properties() To render the border
         * right style control on the WordPress theme customizer screen.
         *
         * @param object $wp_customize Instance of the WordPress WP_Customize_Manager class.
         *
         * @return void
         */
        private function get_border_right_style($wp_customize) {
            $this->get_border_style(
                $wp_customize,
                '_css_border_right_style',
                $this->border_default_values['border_right_style'],
                'sanitize_border_style_input',
                'Border right style',
                24 
            );
        } // CHECKED.


        /**
         * Creates a border bottom style setting and control.
         *
         * Creates a WordPress setting and control for the css border bottom style
         * property that will appear on the theme customizer page.
         *<pre>Example call:
         *    get_border_bottom_style($wp_customize);
         *    $wp_customize __must__ be an instance of the WordPress WP_Customize_Manager class.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Css_Border::get_border_style() To create a new border bottom
         * style WordPress setting and control.
         *
         * @used-by Lnrd_Css_Border::get_border_properties() To render the border
         * bottom style control on the WordPress theme customizer screen.
         *
         * @param object $wp_customize Instance of the WordPress WP_Customize_Manager class.
         *
         * @return void
         */
        private function get_border_bottom_style($wp_customize) {
            $this->get_border_style(
                $wp_customize,
                '_css_border_bottom_style',
                $this->border_default_values['border_bottom_style'],
                'sanitize_border_style_input',
                'Border bottom style',
                28 
            );
        } // CHECKED.
        
        /**
         * Creates a border left style setting and control.
         *
         * Creates a WordPress setting and control for the css border left style
         * property that will appear on the theme customizer page.
         *<pre>Example call:
         *    get_border_left_style($wp_customize);
         *    $wp_customize __must__ be an instance of the wordpress wp_customize_manager class.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Css_Border::get_border_style() To create a new border left
         * style WordPress setting and control.
         *
         * @used-by Lnrd_Css_Border::get_border_properties() To render the border
         * left style control on the WordPress theme customizer screen.
         *
         * @param object $wp_customize Instance of the WordPress WP_Customize_Manager class.
         *
         * @return void
         */
        private function get_border_left_style($wp_customize) {
            $this->get_border_style(
                $wp_customize,
                '_css_border_left_style',
                $this->border_default_values['border_left_style'],
                'sanitize_border_style_input',
                'Border left style',
                32 
            );
        } // CHECKED.

        
        /**
         * Creates a border color setting and control.
         *
         * Creates the required WordPress theme customizer border color setting
         * and control.
         *<pre>Example call:
         *    get_border_color(
         *        $wp_customize,
         *        '_css_border_top_color',
         *        '#000000',
         *        'sanitize_border_color_input',
         *        'Border top color',
         *        21
         *    );</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Customizer_Base::get_setting() To create a WordPress
         * theme customizer setting.
         * @uses Lnrd_Customizer_Baes::get_color_control() To create a WordPress
         * theme customizer color control.
         *
         * @used-by Lnrd_Css_Border::get_border_top_color() To create a WordPress
         * theme customizer setting and control for the border top color css property. 
         * @used-by Lnrd_Css_Border::get_border_right_color() To create a WordPress
         * theme customizer setting and control for the border right color css property. 
         * @used-by Lnrd_Css_Border::get_border_bottom_color() To create a WordPress
         * theme customizer setting and control for the border bottom color css property. 
         * @used-by Lnrd_Css_Border::get_border_left_color() To create a WordPress
         * theme customizer setting and control for the border left color css property.
         *
         * @param object $manager Instance of the WordPress WP_Customize_Manager class.
         * @param string $id The unique id for the new border color setting.
         * @param string $default The default value for the border color setting.
         * @param string $sanitize The method name that WordPress will use to
         * sanitize the user input from the customizer screen.
         * @param string $label The label that will appear above the color
         * control on the WordPress theme customizer screen.
         * @param int $priority The priority of this border color control. Where
         * the control will be placed on the WorPress theme customizer screen
         * in relation to other controls.
         *
         * @return void
         */
        private function get_border_color($manager, $id, $default, $sanitize, $label, $priority) {
            $this->get_setting(
                $manager,
                $this->section_id . $id,
                $default,
                $sanitize
            );

            $this->get_color_control(
                $manager,
                $this->section_id . $id,
                $label,
                $this->section_id,
                $priority
            );
        } // CHECKED.


        /**
         * Creates a setting and control for the border top color.
         *
         * Creates a WordPress theme customizer setting and control for the
         * border top color css property.
         *<pre>Example call:
         *    get_border_top_color($wp_customize);
         *    $wp_customize __must__ be an instance of the wordpress wp_customize_manager class.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Css_Border::get_border_color() To create a WordPress theme
         * customizer setting and control for the border top css property.
         *
         * @param object $wp_customize Instance of the WordPress WP_Customize_Manager class.
         *
         * @return void
         */
        private function get_border_top_color($wp_customize) {
            $this->get_border_color(
                $wp_customize,
                '_css_border_top_color',
                $this->border_default_values['border_top_color'],
                'sanitize_border_color_input',
                'Border top color',
                21
            );
        } // CHECKED.


        /**
         * Creates a setting and control for the border right color.
         *
         * Creates a WordPress theme customizer setting and control for the
         * border right color css property.
         *<pre>Example call:
         *    get_border_right_color($wp_customize);
         *    $wp_customize __must__ be an instance of the wordpress wp_customize_manager class.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Css_Border::get_border_color() To create a WordPress theme
         * customizer setting and control for the border right css property.
         *
         * @param object $wp_customize Instance of the WordPress WP_Customize_Manager class.
         *
         * @return void
         */
        private function get_border_right_color($wp_customize) {
            $this->get_border_color(
                $wp_customize,
                '_css_border_right_color',
                $this->border_default_values['border_right_color'],
                'sanitize_border_color_input',
                'Border right color',
                25 
            );
        } // CHECKED.


        /**
         * Creates a setting and control for the border bottom color.
         *
         * Creates a WordPress theme customizer setting and control for the
         * border bottom color css property.
         *<pre>Example call:
         *    get_border_bottom_color($wp_customize);
         *    $wp_customize __must__ be an instance of the wordpress wp_customize_manager class.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Css_Border::get_border_color() To create a WordPress theme
         * customizer setting and control for the border bottom css property.
         *
         * @param object $wp_customize Instance of the WordPress WP_Customize_Manager class.
         *
         * @return void
         */
        private function get_border_bottom_color($wp_customize) {
            $this->get_border_color(
                $wp_customize,
                '_css_border_bottom_color',
                $this->border_default_values['border_bottom_color'],
                'sanitize_border_color_input',
                'Border bottom color',
                29 
            );
        } // CHECKED.


        /**
         * Creates a setting and control for the border left color.
         *
         * Creates a WordPress theme customizer setting and control for the
         * border left color css property.
         *<pre>Example call:
         *    get_border_left_color($wp_customize);
         *    $wp_customize __must__ be an instance of the wordpress wp_customize_manager class.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Css_Border::get_border_color() To create a WordPress theme
         * customizer setting and control for the border left css property.
         *
         * @param object $wp_customize Instance of the WordPress WP_Customize_Manager class.
         *
         * @return void
         */
        private function get_border_left_color($wp_customize) {
            $this->get_border_color(
                $wp_customize,
                '_css_border_left_color',
                $this->border_default_values['border_left_color'],
                'sanitize_border_color_input',
                'Border left color',
                33
            );
        } // CHECKED.


        /* 
         * --------------------------------------------------------------------------------
         * SETTERS
         * --------------------------------------------------------------------------------
         */

        /**
         * Sets the border width value.
         *
         * Sets the border width and border width length to the new default values.
         *<pre>Example call:
         *    set_border_width('border_top_width', 'medium');
         *    set_border_width('border_top_width', 'medium', 'border_top_width_units', 'em');</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Css_Border::convert_width_values() To convert the WordPress
         * theme customizer HTML select list value to the corresponding css value.
         *
         * @used-by Lnrd_Css_Border::set_border_top() To set the border top width default values.
         * @used-by Lnrd_Css_Border::set_border_right() To set the border right width default values.
         * @used-by Lnrd_Css_Border::set_border_bottom() To set the border bottom width default values.
         * @used-by Lnrd_Css_Border::set_border_left() To set the border left width default values.
         *
         * @param string $border_property_width The border width property to set.
         * Legal values are: 'border_top_width', 'border_right_width', 'border_bottom_width',
         * 'border_left_width'.
         * @param mixed $border_value The border width value. Legal values are: 'thin', 'medium',
         * 'thick' or a number.
         * @param string $border_property_unit The border width unit length property to set. Legal
         * values are: 'border_top_width_units', 'border_right_width_units', 'border_bottom_width_units',
         * 'border_left_width'.
         * @param string $border_unit The border unit length value. Legal values are: 'px', 'em', 'ex', 'rem',
         * 'cm', 'mm', 'in', 'pt', 'pc'. 
         *
         * @return void
         */
        private function set_border_width($border_property_width, $border_value, $border_property_unit = '', $border_unit = '') {
            if ($border_property_unit) {
                $this->border_default_values[$border_property_width] = $border_value;
                $this->border_default_values[$border_property_unit] = $this->convert_width_values($border_unit);
            } else {
                $this->border_default_values[$border_property_width] = $border_value;
            }
        } // CHECKED.


        /**
         * Sets the border style default value.
         *
         * Sets the default value for the border style setting.
         *<pre>Example call:
         *    set_border_style('border_top_style', 'solid');
         *    set_border_style('border_bottom_style', 'dashed');</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Css_Border::convert_style_values() To convert the WordPress
         * theme customizer HTML select list value to its corresponding css value.
         *
         * @used-by Lnrd_Css_Border::set_border_top() To set the default border top style.
         * @used-by Lnrd_Css_Border::set_border_right() To set the default border right style.
         * @used-by Lnrd_Css_Border::set_border_bottom() To set the default border bottom style.
         * @used-by Lnrd_Css_Border::set_border_left() To set the default border left style.
         *
         * @param string $border_property_style The border style property to set. Legal values
         * are: 'border_top_style', 'border_right_style', 'border_bottom_style',
         * 'border_left_style'.
         * @param string $style_value The new border style default value. Legal values
         * are: 'none', 'hidden', 'dotted', 'dashed', 'solid', 'double', 'groove', 'ridge',
         * 'inset', 'outset', 'inherit'.
         *
         * @return void
         */
       private function set_border_style($border_property_style, $style_value) {
            if ($style_value) {
                    $this->border_default_values[$border_property_style] = $this->convert_style_values($style_value);
            }
       } // CHECKED.


        /**
         * Sets the default border color.
         * Sets the border colors default value.
         *<pre>Example call:
         *    set_border_color('border_right_color', '#EEEEEE');
         *    set_border_color('border_bottom_color', '#56DF89');</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @used-by Lnrd_Css_Border::set_border_top() To set the default border top color.
         * @used-by Lnrd_Css_Border::set_border_right() To set the default border right color.
         * @used-by Lnrd_Css_Border::set_border_bottom() To set the default border bottom color.
         * @used-by Lnrd_Css_Border::set_border_left() To set the default border left color.
         *
         * @param string $border_property_color the name of the border color property to set.
         * Legal values are: 'border_top_color', 'border_right_color', 'border_bottom_color',
         * 'border_left_color'.
         * @param string $color_value The new default border color. Leagl values are: any
         * valid hex color.
         *
         * @return void
         */
        private function set_border_color($border_property_color, $color_value) {
            if ($this->sanitize_color_input($color_value)) {
                $this->border_default_values[$border_property_color] = $color_value;
            }
        } // CHECKED.


        /**
         * Sets the default values for the border top setting.
         *
         * Sets the default values for the WordPress theme customizer border
         * top settings.
         *<pre>Example call:
         *    set_border_top(array([<border width>], [<border width length>], <border style>, <border color>));
         *    set_border_top(array(
         *        10,
         *        'em',
         *        'solid',
         *        '#EEEEEE'
         *    ));
         *    set_border_top(array(
         *        'thick',
         *        'solid',
         *        '#EEEEEE'
         *    ));
         *    set_border_top(array(
         *        'solid',
         *        '#EEEEEE'
         *    ));
         *    note that border style and color are required while width and widthlength are optional.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Css_Border::extract_border_values() To separate the border
         * property css values in the array.
         * @uses Lnrd_Css_Border::set_border_width() To set the default value
         * for the border width and border width unit length.
         * @uses Lnrd_Css_Border::set_border_style() To set the default
         * border style value.
         * @uses Lnrd_Css_Border::set_border_color() To set the default
         * border color value.
         *
         * @used-by Lnrd_Css_Section::set_border_default_values() To set the
         * default css border properties.
         *
         * @param int|string[] $border_top_values The new default values for the
         * border top css property. Legal values for $border_top_values[0] are:
         * 'thin', 'medium', 'thick' or a number.
         * Legal values for $border_top_values[1] are: 'px', 'em', 'ex', 'rem',
         * 'cm', 'mm', 'in', 'pt', 'pc'.
         * Legal values for $border_top_values[2] are: 'none', 'hidden', 'dotted',
         * 'dashed', 'solid', 'double', 'groove', 'ridge', 'inset', 'outset', 'inherit'.
         * Legal values for $border_top_values[3] are any legal hex color.
         *
         * @return void
         */
        public function set_border_top($border_top_values) {
            $values = $this->extract_border_values($border_top_values);
            if ($values[0] != '' && $values[1] != '') {
                $this->set_border_width('border_top_width', $values[0], 'border_top_width_units', $values[1]);   
            } else if ($values[0] != '') {
                $this->set_border_width('border_top_width', $values[0]);
            }
            $this->set_border_style('border_top_style', $values[2]);
            $this->set_border_color('border_top_color', $values[3]); 
        } // CHECKED.


        /**
         * Sets the default values for the border right setting.
         *
         * Sets the default values for the WordPress theme customizer border
         * right settings.
         *<pre>Example call:
         *    set_border_right(array([<border width>], [<border width length>], <border style>, <border color>));
         *    set_border_right(array(
         *        10,
         *        'em',
         *        'solid',
         *        '#EEEEEE'
         *    ));
         *    set_border_right(array(
         *        'thick',
         *        'solid',
         *        '#EEEEEE'
         *    ));
         *    set_border_right(array(
         *        'solid',
         *        '#EEEEEE'
         *    ));
         *    note that border style and color are required while width and widthlength are optional.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Css_Border::extract_border_values() To separate the border
         * property css values in the array.
         * @uses Lnrd_Css_Border::set_border_width() To set the default value
         * for the border width and border width unit length.
         * @uses Lnrd_Css_Border::set_border_style() To set the default
         * border style value.
         * @uses Lnrd_Css_Border::set_border_color() To set the default
         * border color value.
         *
         * @used-by Lnrd_Css_Section::set_border_default_values() To set the
         * default css border properties.
         *
         * @param int|string[] $border_top_values The new default values for the
         * border top css property. Legal values for $border_right_values[0] are:
         * 'thin', 'medium', 'thick' or a number.
         * Legal values for $border_right_values[1] are: 'px', 'em', 'ex', 'rem',
         * 'cm', 'mm', 'in', 'pt', 'pc'.
         * Legal values for $border_right_values[2] are: 'none', 'hidden', 'dotted',
         * 'dashed', 'solid', 'double', 'groove', 'ridge', 'inset', 'outset', 'inherit'.
         * Legal values for $border_right_values[3] are any legal hex color.
         *
         * @return void
         */
        public function set_border_right($border_right_values) {
            $values = $this->extract_border_values($border_right_values);
            if ($values[0] != '' && $values[1] != '') {
                $this->set_border_width('border_right_width', $values[0], 'border_right_width_units', $values[1]);   
            } else if ($values[0] != '') {
                $this->set_border_width('border_right_width', $values[0]);
            }
            $this->set_border_style('border_right_style', $values[2]);
            $this->set_border_color('border_right_color', $values[3]); 
        } // CHECKED.


        /**
         * Sets the default values for the border bottom setting.
         *
         * Sets the default values for the WordPress theme customizer border
         * bottom settings.
         *<pre>Example call:
         *    set_border_bottom(array([<border width>], [<border width length>], <border style>, <border color>));
         *    set_border_bottom(array(
         *        10,
         *        'em',
         *        'solid',
         *        '#EEEEEE'
         *    ));
         *    set_border_bottom(array(
         *        'thick',
         *        'solid',
         *        '#EEEEEE'
         *    ));
         *    set_border_bottom(array(
         *        'solid',
         *        '#EEEEEE'
         *    ));
         *    note that border style and color are required while width and widthlength are optional.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Css_Border::extract_border_values() To separate the border
         * property css values in the array.
         * @uses Lnrd_Css_Border::set_border_width() To set the default value
         * for the border width and border width unit length.
         * @uses Lnrd_Css_Border::set_border_style() To set the default
         * border style value.
         * @uses Lnrd_Css_Border::set_border_color() To set the default
         * border color value.
         *
         * @used-by Lnrd_Css_Section::set_border_default_values() To set the
         * default css border properties.
         *
         * @param int|string[] $border_top_values The new default values for the
         * border top css property. Legal values for $border_bottom_values[0] are:
         * 'thin', 'medium', 'thick' or a number.
         * Legal values for $border_bottom_values[1] are: 'px', 'em', 'ex', 'rem',
         * 'cm', 'mm', 'in', 'pt', 'pc'.
         * Legal values for $border_bottom_values[2] are: 'none', 'hidden', 'dotted',
         * 'dashed', 'solid', 'double', 'groove', 'ridge', 'inset', 'outset', 'inherit'.
         * Legal values for $border_bottom_values[3] are any legal hex color.
         *
         * @return void
         */
        public function set_border_bottom($border_bottom_values) {
            $values = $this->extract_border_values($border_bottom_values);
            if ($values[0] != '' && $values[1] != '') {
                $this->set_border_width('border_bottom_width', $values[0], 'border_bottom_width_units', $values[1]);   
            } else if ($values[0] != '') {
                $this->set_border_width('border_bottom_width', $values[0]);
            }
            $this->set_border_style('border_bottom_style', $values[2]);
            $this->set_border_color('border_bottom_color', $values[3]); 
        } // CHECKED.


        /**
         * Sets the default values for the border left setting.
         *
         * Sets the default values for the WordPress theme customizer border
         * left settings.
         *<pre>Example call:
         *    set_border_left(array([<border width>], [<border width length>], <border style>, <border color>));
         *    set_border_left(array(
         *        10,
         *        'em',
         *        'solid',
         *        '#EEEEEE'
         *    ));
         *    set_border_left(array(
         *        'thick',
         *        'solid',
         *        '#EEEEEE'
         *    ));
         *    set_border_left(array(
         *        'solid',
         *        '#EEEEEE'
         *    ));
         *    note that border style and color are required while width and widthlength are optional.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Css_Border::extract_border_values() To separate the border
         * property css values in the array.
         * @uses Lnrd_Css_Border::set_border_width() To set the default value
         * for the border width and border width unit length.
         * @uses Lnrd_Css_Border::set_border_style() To set the default
         * border style value.
         * @uses Lnrd_Css_Border::set_border_color() To set the default
         * border color value.
         *
         * @used-by Lnrd_Css_Section::set_border_default_values() To set the
         * default css border properties.
         *
         * @param int|string[] $border_top_values The new default values for the
         * border top css property. Legal values for $border_left_values[0] are:
         * 'thin', 'medium', 'thick' or a number.
         * Legal values for $border_left_values[1] are: 'px', 'em', 'ex', 'rem',
         * 'cm', 'mm', 'in', 'pt', 'pc'.
         * Legal values for $border_left_values[2] are: 'none', 'hidden', 'dotted',
         * 'dashed', 'solid', 'double', 'groove', 'ridge', 'inset', 'outset', 'inherit'.
         * Legal values for $border_left_values[3] are any legal hex color.
         *
         * @return void
         */
        public function set_border_left($border_left_values) {
            $values = $this->extract_border_values($border_left_values);
            if ($values[0] != '' && $values[1] != '') {
                $this->set_border_width('border_left_width', $values[0], 'border_left_width_units', $values[1]);   
            } else if ($values[0] != '') {
                $this->set_border_width('border_left_width', $values[0]);
            }
            $this->set_border_style('border_left_style', $values[2]);
            $this->set_border_color('border_left_color', $values[3]); 
        } // CHECKED.


        /* 
         * --------------------------------------------------------------------------------
         * USER INPUT SANITIZERS
         * --------------------------------------------------------------------------------
         */

        /**
         * Checks border color input.
         *
         * Checks and validates the user input from the WordPress theme
         * customizer screen for the border color setting.
         *<pre>Example call:
         *    sanitize_border_color_input('#CCCCCC') -> returns '#CCCCCC'.
         *    sanitize_border_color_input('hello') -> returns void as 'hello' is not a valid hex color.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Customizer_Base::sanitize_color_input() To check the user
         * input for the border color setting.
         *
         * @used-by Lnrd_Css_Border::get_border_top_color() To check for valid
         * user input for the border top color setting.
         * @used-by Lnrd_Css_Border::get_border_right_color() To check for valid
         * user input for the border right color setting.
         * @used-by Lnrd_Css_Border::get_border_bottom_color() To check for valid
         * user input for the border bottom color setting.
         * @used-by Lnrd_Css_Border::get_border_left_color() To check for valid
         * user input for the border left color setting.
         *
         * @param string $border_color_input The color value to check.
         *
         * @return string a valid hex color
         */
        public function sanitize_border_color_input($border_color_input) {
            $legal = $this->sanitize_color_input($border_color_input);
            if ($legal) return $border_color_input;
        } 


        /**
         * Validates border style input.
         *
         * Validates the user input from the WordPress theme customizer page for
         * the border style setting.
         *<pre>Example call:
         *    sanitize_border_style_input('value1'); -> returns 'value1'.
         *    sanitize_border_style_input('foo') -> returns void as 'foo' is not a valid value for the border style property.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @used-by Lnrd_Css_Border::get_border_top_style() To validate user
         * input for the border top style setting.
         * @used-by Lnrd_Css_Border::get_border_right_style() To validate user
         * input for the border right style setting.
         * @used-by Lnrd_Css_Border::get_border_bottom_style() To validate user
         * input for the border bottom style setting.
         * @used-by Lnrd_Css_Border::get_border_left_style() To validate user
         * input for the border left style setting.
         *
         * @param string $border_style_input The border style input to validate.
         *
         * @return string The validated WordPress theme customizer HTML select list value.
         */
        public function sanitize_border_style_input($border_style_input) {
            $legal_values = array(
                'value1' => 'none',
                'value2' => 'hidden',
                'value3' => 'dotted',
                'value4' => 'dashed',
                'value5' => 'solid',
                'value6' => 'double',
                'value7' => 'groove',
                'value8' => 'ridge',
                'value9' => 'inset',
                'value10' => 'outset',
                'value11' => 'inherit',   
            );
            if (array_key_exists($border_style_input, $legal_values)) {
                return $border_style_input;
            }
        } // CHECKED.


        /**
         * Validates border width input.
         *
         * Validates the user input from the WordPress theme customizer page for
         * the border width setting.
         *<pre>Example call:
         *    sanitize_border_width_input('medium'); -> returns 'medium'.
         *    sanitize_border_width_input(32); -> returns '32'.
         *    sanitize_border_width_input(3.1415); -> returns '3.1415'.
         *    sanitize_border_width_input('foo') -> returns void as 'foo' is not a valid value for the border width property.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @used-by Lnrd_Css_Border::get_border_top_style() To validate user
         * input for the border top width setting.
         * @used-by Lnrd_Css_Border::get_border_right_style() To validate user
         * input for the border right width setting.
         * @used-by Lnrd_Css_Border::get_border_bottom_style() To validate user
         * input for the border bottom width setting.
         * @used-by Lnrd_Css_Border::get_border_left_style() To validate user
         * input for the border left width setting.
         *
         * @param string $border_width_input The border width input to validate.
         *
         * @return string The validated border width value.
         */
        public function sanitize_border_width_input($border_width_input) {
            if (in_array(strtolower($border_width_input), $this->legal_width_values)) {
                return strtolower($border_width_input);
            } else if (is_numeric($border_width_input)) {
                return $border_width_input;
            }
        } // CHECKED.


        /**
         * Validates border width unit length input.
         *
         * Validates the user input from the WordPress theme customizer page for
         * the border width unit css length setting.
         *<pre>Example call:
         *    sanitize_border_width_unit('value1'); -> returns 'px'.
         *    sanitize_border_width_input('foo') -> returns void as 'foo' is not a valid value for the border width property.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @used-by Lnrd_Css_Border::get_border_top_style() To validate user
         * input for the border top width unit setting.
         * @used-by Lnrd_Css_Border::get_border_right_style() To validate user
         * input for the border right width unit setting.
         * @used-by Lnrd_Css_Border::get_border_bottom_style() To validate user
         * input for the border bottom width unit setting.
         * @used-by Lnrd_Css_Border::get_border_left_style() To validate user
         * input for the border left width unit setting.
         *
         * @param string $border_unit_input The border width unit length input to validate.
         *
         * @return string The validated border width unit length value.
         */
        public function sanitize_border_width_unit($border_unit_input) {
            $legal_values = array(
                'value1' => 'px',
                'value2' => 'em',
                'value3' => 'ex',
                'value4' => 'rem',
                'value5' => 'cm',
                'value6' => 'mm',
                'value7' => 'in',
                'value8' => 'pt',
                'value9' => 'pc',    
            );

            if (array_key_exists($border_unit_input, $legal_values)) {
                return $border_unit_input;
            }     
        }// CHECKED.


        /* 
         * --------------------------------------------------------------------------------
         * HELPERS
         * --------------------------------------------------------------------------------
         */

        /**
         * Separates the border values.
         *
         * Separates the border values into individual border width, border
         * width unit, border style and border color values. Sets the optional
         * border width and border width unit values to empty strings if they are not present.
         *<pre>Example call:
         *    extract_border_values(array(10, 'em', 'solid', '#4739FF')); -> returns array(10, 'em', 'solid', '#4739FF').
         *    extract_border_values(array('thick', 'solid', '#4739FF')); -> returns array('thick', '', 'solid', '#4739FF').
         *    extract_border_values(array('solid', '#4739FF')); -> returns array('', '', 'solid', '#4739FF').
         *    extract_border_values(array('foo', 'baz', 'bif', 'bof')); -> returns array('', '', '', '') as these are not legal values.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @used-by Lnrd_Css_Border::set_border_top() To set separate the border top values.
         * @used-by Lnrd_Css_Border::set_border_right() To set separate the border top values.
         * @used-by Lnrd_Css_Border::set_border_bottom() To set separate the border top values.
         * @used-by Lnrd_Css_Border::set_border_left() To set separate the border top values.
         *
         * @param mixed[] $border_values The border values to separate.
         *
         * @return mixed[] The separated border values.
         */
        private function extract_border_values($border_values) {
            $width = ''; $unit = ''; $style = ''; $color = '';
            foreach ($border_values as $value) {
                if (in_array($value, $this->legal_width_values) || is_numeric($value)) {
                    $width = $value;
                } else if (in_array($value, $this->legal_width_units)) {
                    $unit = $value;
                } else if (in_array($value, $this->legal_style_values)) {
                    $style = $value;
                } else if ($value[0] == '#') {
                    $color = $value;
                }
            }
            return array($width, $unit, $style, $color);
        } // CHECKED.


        /**
         * Converts border width style.
         *
         * Converts a css value to a WordPress theme customizer HTHL select list value.
         *<pre>Example call:
         *    convert_style_values('hidden'); -> returns 'value2'</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @used-by Lnrd_Css_Border::set_border_style() To set the default border style value.
         *
         * @param string $border_style_value The border style value. Legal values are: 'none',
         * 'hidden', 'dotted', 'dashed', 'solid', 'double', 'groove', 'ridge', 'inset',
         * 'outset', 'inherit'.
         *
         * @return string The border style value converted to a WordPress theme customizer
         * HTML select list value. See example call above.
         */
        private function convert_style_values($border_style_value) {
            $border_style;
            switch ($border_style_value) {
                case 'none':
                    $border_style = 'value1';
                    break;
                case 'hidden':
                    $border_style = 'value2';
                    break;
                case 'dotted':
                    $border_style = 'value3';
                    break;
                case 'dashed':
                    $border_style = 'value4';
                    break;
                case 'solid':
                    $border_style = 'value5';
                    break;
                case 'double':
                    $border_style = 'value6';
                    break;
                case 'groove':
                    $border_style = 'value7';
                    break;
                case 'ridge':
                    $border_style = 'value8';
                    break;
                case 'inset':
                    $border_style = 'value9';
                    break;
                case 'outset':
                    $border_style = 'value10';
                    break;
                case 'inherit':
                    $border_style = 'value11';
                    break;
            }
            return $border_style;
        } // CHECKED.
        

        /**
         * Converts border width units.
         *
         * Converts a css value to a WordPress theme customizer HTHL select list value.
         *<pre>Example call:
         *    convert_width_values('em'); -> returns 'value2'</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Customizer_Base::css_length_to_select_value() To convert a css value
         * to a WordPress theme customizer HTHL select list value.
         *
         * @used-by Lnrd_Css_Border::set_border_width() To set the default border width values.
         *
         * @param string $border_unit_value The border width unit value. Legal values are: 'px',
         * 'em', 'ex', 'rem', 'cm', 'mm', 'in', 'pt', 'pc'.
         *
         * @return string The border width unit value converted to a WordPress theme customizer
         * HTML select list value. See example call above.
         */
        private function convert_width_values($border_unit_value) {
            $border_unit = $this->css_length_to_select_value($border_unit_value);
            return $border_unit;
        } // CHECKED.

    } // END Lnrd_Css_Border class.
?>
