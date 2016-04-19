<?php
    class Lnrd_Css_Margin extends Lnrd_Customizer_Base {
        /*
         * --------------------------------------------------------------------
         * INSTANCE VARIABLES
         * --------------------------------------------------------------------
         */

        /**
         * @var string $section_id The unique name(id) of the Lnrd_Css_Section
         * object that this Lnrd_Css_Margin object will be linked to.
         */
        private $section_id;


        /**
         * @var mixed[] $margin_default_values The default values for the
         * css margin properties.
         */
        private $margin_default_values;


        /**
         * @var string[] $required_margin_properties The required css
         * margin properties to render. Expected values -> 'margin-top',
         * 'margin-right', 'margin-bottom', 'margin-left' or 'all'.
         */
        private $required_margin_properties;

        /**
         * @var string[] $legal_margin_values The legal values for the css
         * margin property. Legal values are: 'auto', 'inherit' or a number. 
         */
        private $legal_margin_values;


        /**
         * @var string[] $legal_margin_units The legal css length values for
         * the margin property. Legal values are: 'px', '%', 'em', 'ex',
         * 'rem', 'cm', 'mm', 'in', 'pt' and 'pc'. 
         */
        private $legal_margin_units;


        /**
         * Creates a new css margin object.
         *
         * Creates a instance of the Lnrd_Css_Margin class. Sets the $section_id
         * instance variable to the unique id(name) of the calling Lnrd_Css_Section
         * object. Sets the $required_margin_properties to an array containing
         * the names of the required css margin properties to render. Sets the
         * $legal_margin_values array to the legal string values for the css margin property.
         *<pre>Example call:
         *    new Lnrd_Css_Margin('post_text', array('margin-top','margin-bottom'));
         *    -> Creates a new Lnrd_Css_Margin object that will render a WordPress
         *    setting and control for the css margin top property and the margin
         *    bottom property.
         *
         *    new Lnrd_Css_Margin('post_text', array('all'));
         *    -> Creates a new Lnrd_Css_Margin object that will render a WordPress
         *    setting and control for the css margin top property, margin bottom
         *    property, margin left property and the margin right property.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @used-by Lnrd_Css_Section::get_css_property_objs() To create a new
         * Lnrd_Css_Margin object for the calling Lnrd_Css_Section object.
         *
         * @param string $section_id The unique section id(name) of the calling
         * Lnrd_Css_Section object.
         * @param string[] $required_margin_properties The required css margin
         * properties to render within the WordPress theme customizer page.
         * Legal values are: 'margin-top', 'margin-right', 'margin-bottom',
         * 'margin-left' and 'all'.
         *
         * @return self
         */
        function __construct($section_id, $required_margin_properties) {
            $this->section_id = $section_id;
            $this->required_margin_properties = $required_margin_properties;
            $this->margin_default_values = array(
                'margin-top' => 0,
                'margin-right' => 0,
                'margin-bottom' => 0,
                'margin-left' => 0,
                'margin-top-unit' => 'value1',
                'margin-right-unit' => 'value1',
                'margin-bottom-unit' => 'value1',
                'margin-left-unit' => 'value1',
            );

            $this->legal_margin_values = array(
                'auto', 'inherit'
            );

            $this->legal_margin_units = array(
                'value1' => 'px',
                'value2' => '%',
                'value3' => 'em',
                'value4' => 'ex',
                'value5' => 'rem',
                'value6' => 'cm',
                'value7' => 'mm',
                'value8' => 'in',
                'value9' => 'pt',
                'value10' => 'pc',
            );
            //echo 'Section ID: ' . $this->get_section_id() . '<br>';
            //print_r($this->get_required_margin_properties());
            //echo '<br>';
            //print_r($this->get_margin_default_values());
            //echo '<br>';
            //$this->set_margin_left(array(
                //'margin-left', 50,
                //'margin-left-unit', 'em'
            //));
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
         * Lnrd_Css_Margin object is associated with.
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @return string The unique id of the Lnrd_Css_Section object to which
         * this Lnrd_Css_Margin object is associated with.
         */
        public function get_section_id() {
            return $this->section_id;
        } // CHECKED.


        /**
         * Gets the required css margin properties.
         *
         * Gets the names of the required margin properties that were
         * requested by the Lnrd_Css_Section object to which this Lnrd_Css_Margin
         * object is associated with.
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @return string[] The names of the margin properties that this margin
         * object has rendered.
         */
        private function get_required_margin_properties() {
            return $this->required_margin_properties;
        } // CHECKED.


        /**
         * Gets the margin properties default values.
         *
         * Gets the default values of the margin properties for this
         * Lnrd_Css_Margin object.
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @return mixed[] The default values for the margin
         * properties for this Lnrd_Css_Margin object.
         */
        private function get_margin_default_values() {
            return $this->margin_default_values;
        } //CHECKED.


        /**
         * Renders the margin properties.
         * 
         * Renders all of the required css margin property settings and
         * controllers for the calling Lnrd_Css_Section.
         *<pre>Example call:
         *    get_margin_properties($wp_customize)
         *    $wp_customize __must__ be an instance of the WordPress WP_Customize_Manager class</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Css_Font::get_margin_top() To render the
         * css margin top setting and controller.
         * @uses Lnrd_Css_Font::get_margin_right() To render the
         * css margin right setting and controller.
         * @uses Lnrd_Css_Font::get_margin_bottom() To render the
         * css margin bottom setting and controller.
         * @uses Lnrd_Css_Font::get_margin_left() To render the
         * css margin left setting and controller.
         *
         * @used-by Lnrd_Css_Section::lnrd_render_section To render the css
         * margin properties for the calling section.
         *
         * @param object $wp_customize Instance of the WordPress WP_Customize_Manager class.
         *
         * @return void
         */
        public function get_margin_properties($wp_customize) {
            if (is_a($wp_customize, 'WP_Customize_Manager')) {
                foreach ($this->required_margin_properties as $property) {
                    switch ($property) {
                        case 'margin-top':
                            $this->get_margin_top($wp_customize);
                            break;
                        case 'margin-right':
                            $this->get_margin_right($wp_customize);
                            break;
                        case 'margin-bottom':
                            $this->get_margin_bottom($wp_customize);
                            break;
                        case 'margin-left':
                            $this->get_margin_left($wp_customize);
                            break;
                        case 'all':
                            if (count($this->required_margin_properties) == 1) {
                                $this->get_margin_top($wp_customize);
                                $this->get_margin_right($wp_customize);
                                $this->get_margin_bottom($wp_customize);
                                $this->get_margin_left($wp_customize);
                            }
                            break;
                    } // END switch statement.
                } // END foreach staement.
            } // END if statement.
        }


        /**
         * Gets a margin style rule.
         *
         * Gets an individual margin style rule.
         *<pre>Example call:
         *    get_css('margin-top', '_css_margin_top', '_css_margin_top_unit');
         *    -> returns 'margin-top:10px;' if the value is 10px.
         *
         *    get_css('margin-top', '_css_margin_top', '_css_margin_top_unit');
         *    -> returns 'margin-top:inherit;' if the value is inherit.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Customizer_Base::select_value_to_css_percentage() To convert
         * a WordPress theme customizer HTML select list value to a css length value.
         *
         * @used-by Lnrd_Css_Margin::get_margin_css() To get the desired css
         * margin style rule.
         *
         * @param string $margin_name The margin property name. Legal values
         * are: 'margin-top', 'margin-right', 'margin-bottom', 'margin-left'.
         * @param string $margin_value_id The unique id for the margin setting.
         * Legal values are: '_css_margin_top', '_css_margin_right',
         * '_css_margin_bottom', '_css_margin_left'.
         * @param string $margin_unit_id The unique id for the margin unit setting.
         * Legal values are: '_css_margin_top_unit', '_css_margin_right_unit',
         * '_css_margin_bottom_unit', '_css_margin_left_unit'.
         *
         * @return string The desired css margin style rule.
         */
        private function get_css($margin_name, $margin_value_id, $margin_unit_id) {
            $margin_css = '';
            if (is_numeric(get_theme_mod($this->section_id . $margin_value_id))) {
                $margin_css .= $margin_name . ':' . get_theme_mod($this->section_id . $margin_value_id) . $this->select_value_to_css_percentage(get_theme_mod($this->section_id . $margin_unit_id)) . ';';
            } else {
                $margin_css .= $margin_name . ':' . get_theme_mod($this->section_id . $margin_value_id) . ';';    
            }
            return $margin_css;
        } // CHECKED.

        /**
         * Gets the css for this margin object.
         *
         * Gets the css style rules for the required css margin properties for
         * this Lnrd_Css_Margin object.
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @used-by Lnrd_Css_Section::get_section_css() To render the margin css
         * for the calling Lnrd_Css_Section object.
         *
         * @return string The css margin style rules for this Lnrd_Css_Margin object.
         */
        public function get_margin_css() {
            $css = '';

            foreach ($this->required_margin_properties as $property) {
                switch ($property) {
                    case 'margin-top':
                        $css .= $this->get_css('margin-top', '_css_margin_top', '_css_margin_top_unit');
                        break;
                    case 'margin-right':
                        $css .= $this->get_css('margin-right', '_css_margin_right', '_css_margin_right_unit');
                        break;
                    case 'margin-bottom':
                        $css .= $this->get_css('margin-bottom', '_css_margin_bottom', '_css_margin_bottom_unit');
                        break;
                    case 'margin-left':
                        $css .= $this->get_css('margin-left', '_css_margin_left', '_css_margin_left_unit');
                        break;
                    case 'all':
                        $css .= $this->get_css('margin-top', '_css_margin_top', '_css_margin_top_unit');
                        $css .= $this->get_css('margin-right', '_css_margin_right', '_css_margin_right_unit');
                        $css .= $this->get_css('margin-bottom', '_css_margin_bottom', '_css_margin_bottom_unit');
                        $css .= $this->get_css('margin-left', '_css_margin_left', '_css_margin_left_unit');
                        break;
                } // END switch statement.
            } // END foreach statement.
            return $css;
        } // CHECKED.


        /**
         * Creates a margin top setting and control.
         *
         * Creates a WordPress theme customizer setting and control for the css
         * margin top property. The control will be visible on the theme
         * customizer screen.
         *<pre>Example call:
         *    get_margin_top($wp_customize)
         *    $wp_customize __must__ be an instance of the WordPress WP_Customize_Manager class</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Customizer_Base::get_setting() To create a new WordPress
         * theme customizer setting.
         * @uses Lnrd_Customizer_Base::get_input_control() To create
         * a new WordPress theme customizer input control.
         * @uses Lnrd_Customizer_Base::get_select_control_css_percentage() To
         * create a new WordPress theme customizer select list control.
         *
         * @used-by Lnrd_Css_Margin::get_margin_properties() To create a margin top
         * setting and control.
         *
         * @param object $manager Instance of the WordPress WP_Customize_Manager class.
         *
         * @return void
         */
        private function get_margin_top($wp_customize) {
            $this->get_setting(
                $wp_customize,
                $this->section_id . '_css_margin_top',
                $this->margin_default_values['margin-top'],
                'sanitize_margin_value'
            );

            $this->get_input_control(
                $wp_customize,
                $this->section_id . '_css_margin_top',
                'Margin top',
                $this->section_id,
                63
            );

            $this->get_setting(
                $wp_customize,
                $this->section_id . '_css_margin_top_unit',
                $this->margin_default_values['margin-top-unit'],
                'sanitize_margin_unit'
            );

            $this->get_select_control_css_percentage(
                $wp_customize,
                $this->section_id . '_css_margin_top_unit',
                '',
                $this->section_id,
                64
            );
        } // CHECKED.


        /**
         * Creates a margin right setting and control.
         *
         * Creates a WordPress theme customizer setting and control for the css
         * margin right property. The control will be visible on the theme
         * customizer screen.
         *<pre>Example call:
         *    get_margin_right($wp_customize)
         *    $wp_customize __must__ be an instance of the WordPress WP_Customize_Manager class</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Customizer_Base::get_setting() To create a new WordPress
         * theme customizer setting.
         * @uses Lnrd_Customizer_Base::get_input_control() To create
         * a new WordPress theme customizer input control.
         * @uses Lnrd_Customizer_Base::get_select_control_css_percentage() To
         * create a new WordPress theme customizer select list control.
         *
         * @used-by Lnrd_Css_Margin::get_margin_properties() To create a margin right
         * setting and control.
         *
         * @param object $manager Instance of the WordPress WP_Customize_Manager class.
         *
         * @return void
         */
        private function get_margin_right($wp_customize) {
            $this->get_setting(
                $wp_customize,
                $this->section_id . '_css_margin_right',
                $this->margin_default_values['margin-right'],
                'sanitize_margin_value'
            );

            $this->get_input_control(
                $wp_customize,
                $this->section_id . '_css_margin_right',
                'Margin right',
                $this->section_id,
                65
            );

            $this->get_setting(
                $wp_customize,
                $this->section_id . '_css_margin_right_unit',
                $this->margin_default_values['margin-right-unit'],
                'sanitize_margin_unit'
            );

            $this->get_select_control_css_percentage(
                $wp_customize,
                $this->section_id . '_css_margin_right_unit',
                '',
                $this->section_id,
                66
            );
        } // CHECKED.


        /**
         * Creates a margin bottom setting and control.
         *
         * Creates a WordPress theme customizer setting and control for the css
         * margin bottom property. The control will be visible on the theme
         * customizer screen.
         *<pre>Example call:
         *    get_margin_bottom($wp_customize)
         *    $wp_customize __must__ be an instance of the WordPress WP_Customize_Manager class</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Customizer_Base::get_setting() To create a new WordPress
         * theme customizer setting.
         * @uses Lnrd_Customizer_Base::get_input_control() To create
         * a new WordPress theme customizer input control.
         * @uses Lnrd_Customizer_Base::get_select_control_css_percentage() To
         * create a new WordPress theme customizer select list control.
         *
         * @used-by Lnrd_Css_Margin::get_margin_properties() To create a margin bottom
         * setting and control.
         *
         * @param object $manager Instance of the WordPress WP_Customize_Manager class.
         *
         * @return void
         */
        private function get_margin_bottom($wp_customize) {
            $this->get_setting(
                $wp_customize,
                $this->section_id . '_css_margin_bottom',
                $this->margin_default_values['margin-bottom'],
                'sanitize_margin_value'
            );

            $this->get_input_control(
                $wp_customize,
                $this->section_id . '_css_margin_bottom',
                'Margin bottom',
                $this->section_id,
                67
            );

            $this->get_setting(
                $wp_customize,
                $this->section_id . '_css_margin_bottom_unit',
                $this->margin_default_values['margin-bottom-unit'],
                'sanitize_margin_unit'
            );

            $this->get_select_control_css_percentage(
                $wp_customize,
                $this->section_id . '_css_margin_bottom_unit',
                '',
                $this->section_id,
                68
            );
        } // CHECKED.


        /**
         * Creates a margin left setting and control.
         *
         * Creates a WordPress theme customizer setting and control for the css
         * margin left property. The control will be visible on the theme
         * customizer screen.
         *<pre>Example call:
         *    get_margin_left($wp_customize)
         *    $wp_customize __must__ be an instance of the WordPress WP_Customize_Manager class</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @uses Lnrd_Customizer_Base::get_setting() To create a new WordPress
         * theme customizer setting.
         * @uses Lnrd_Customizer_Base::get_input_control() To create
         * a new WordPress theme customizer input control.
         * @uses Lnrd_Customizer_Base::get_select_control_css_percentage() To
         * create a new WordPress theme customizer select list control.
         *
         * @used-by Lnrd_Css_Margin::get_margin_properties() To create a margin left
         * setting and control.
         *
         * @param object $manager Instance of the WordPress WP_Customize_Manager class.
         *
         * @return void
         */
        private function get_margin_left($wp_customize) {
            $this->get_setting(
                $wp_customize,
                $this->section_id . '_css_margin_left',
                $this->margin_default_values['margin-left'],
                'sanitize_margin_value'
            );

            $this->get_input_control(
                $wp_customize,
                $this->section_id . '_css_margin_left',
                'Margin left',
                $this->section_id,
                69
            );

            $this->get_setting(
                $wp_customize,
                $this->section_id . '_css_margin_left_unit',
                $this->margin_default_values['margin-left-unit'],
                'sanitize_margin_unit'
            );

            $this->get_select_control_css_percentage(
                $wp_customize,
                $this->section_id . '_css_margin_left_unit',
                '',
                $this->section_id,
                70
            );
        } // CHECKED.


        /* 
         * --------------------------------------------------------------------------------
         * SETTERS
         * --------------------------------------------------------------------------------
         */

        /**
         * Sets the margin css default value.
         *
         * Sets the default value for the desired css margin property.
         *<pre>Example call:
         *    set_margin(array('margin name', 'margin value', 'margin unit name', 'magrin unit value'));
         *    $this->set_margin_top(array('margin-top','10','margin-top-unit','em'));
         *
         *    set_margin(array('margin name', 'margin value', 'margin unit name'));
         *    $this->set_margin_top(array('margin-top','10'));
         *    $this->set_margin_top(array('margin-top','auto'));
         *
         *    Legal margin name values: 'margin-top', 'margin-right', 'margin-bottom', 'margin-left'.
         *    Legal margin values: 'auto', 'inherit' or a number.
         *    Legal margin unit values: 'margin-top-unit', 'margin-right-unit', 'margin-bottom-unit', 'margin-left-unit'.
         *    Legal margin unit values: 'px', '%', 'em', 'ex', 'rem', 'cm', 'mm', 'in', 'pt', 'pc'.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @param mixed[] $margin_value The new default values. See examples above.
         *
         * @return void
         */
        private function set_margin($margin_value) {
            $legal_margin_units = array();

            foreach ($this->legal_margin_units as $unit) {
                array_push($legal_margin_units, $unit);
            }
          
            if (count($margin_value) == 4) {
                if (is_numeric($margin_value[1])) {
                    $this->margin_default_values[$margin_value[0]] = $margin_value[1];
                } else if (in_array(strtolower($margin_value[1]), $this->legal_margin_values)) {
                    $this->margin_default_values[$margin_value[0]] = strtolower($margin_value[1]);
                }
                if (in_array($margin_value[3], $legal_margin_units)) {
                    $this->margin_default_values[$margin_value[2]] = $this->css_pecentage_to_select_value($margin_value[3]);
                }
            } else if (count($margin_value) == 2) {
                if (is_numeric($margin_value[1])) {
                    $this->margin_default_values[$margin_value[0]] = $margin_value[1];
                } else if (in_array(strtolower($margin_value[1]), $this->legal_margin_values)) {
                    $this->margin_default_values[$margin_value[0]] = strtolower($margin_value[1]);
                }
            }
        } // CHECKED.


        /**
         * Sets the margin top default value.
         *
         * Sets the default value for the margin top setting.
         *<pre>Example call:
         *    set_margin_top(array('margin-top', 50, 'margin-top-unit', '%'));
         *    -> sets the $margin_default_values['margin-top'] to 50
         *    -> sets the $margin_default_values['margin-top-unit'] to '%'
         *
         *    set_margin_top(array('margin-top', 'auto'));
         *    -> sets the $margin_default_values['margin-top'] to 'auto'
         *    set_margin_top(array('margin-top', 'inherit'));
         *    -> sets the $margin_default_values['margin-top'] to 'inherit'</pre>
         *
         *  @author Marc Kennedy
         *
         *  @since 1.0.0
         *
         *  @param mixed[] $margin_top_value The desired default margin values.
         *
         *  @return void
         */
        public function set_margin_top($margin_top_value) {
            $this->set_margin($margin_top_value);
        }


        /**
         * Sets the margin right default value.
         *
         * Sets the default value for the margin right setting.
         *<pre>Example call:
         *    set_margin_right(array('margin-right', 50, 'margin-right-unit', '%'));
         *    -> sets the $margin_default_values['margin-right'] to 50
         *    -> sets the $margin_default_values['margin-right-unit'] to '%'
         *
         *    set_margin_right(array('margin-right', 'auto'));
         *    -> sets the $margin_default_values['margin-right'] to 'auto'
         *    set_margin_right(array('margin-right', 'inherit'));
         *    -> sets the $margin_default_values['margin-right'] to 'inherit'</pre>
         *
         * @author Marc Kennedy
         *
         *  @since 1.0.0
         *
         *  @param mixed[] $margin_right_value The desired default margin values.
         *
         *  @return void
         */
        public function set_margin_right($margin_right_value) {
            $this->set_margin($margin_right_value);
        }


        /**
         * Sets the margin bottom default value.
         *
         * Sets the default value for the margin bottom setting.
         *<pre>Example call:
         *    set_margin_bottom(array('margin-bottom', 50, 'margin-bottom-unit', '%'));
         *    -> sets the $margin_default_values['margin-bottom'] to 50
         *    -> sets the $margin_default_values['margin-top-bottom'] to '%'
         *
         *    set_margin_bottom(array('margin-bottom', 'auto'));
         *    -> sets the $margin_default_values['margin-bottom'] to 'auto'
         *    set_margin_top(array('margin-bottom', 'inherit'));
         *    -> sets the $margin_default_values['margin-bottom'] to 'inherit'</pre>
         *
         * @author Marc Kennedy
         *
         *  @since 1.0.0
         *
         *  @param mixed[] $margin_bottom_value The desired default margin values.
         *
         *  @return void
         */
        public function set_margin_bottom($margin_bottom_value) {
            $this->set_margin($margin_bottom_value);
        }


        /**
         * Sets the margin left default value.
         *
         * Sets the default value for the margin left setting.
         *<pre>Example call:
         *    set_margin_left(array('margin-left', 50, 'margin-left-unit', '%'));
         *    -> sets the $margin_default_values['margin-left'] to 50
         *    -> sets the $margin_default_values['margin-left-unit'] to '%'
         *
         *    set_margin_left(array('margin-left', 'auto'));
         *    -> sets the $margin_default_values['margin-left'] to 'auto'
         *    set_margin_left(array('margin-left', 'inherit'));
         *    -> sets the $margin_default_values['margin-left'] to 'inherit'</pre>
         *
         * @author Marc Kennedy
         *
         *  @since 1.0.0
         *
         *  @param mixed[] $margin_left_value The desired default margin values.
         *
         *  @return void
         */
        public function set_margin_left($margin_left_value) {
            $this->set_margin($margin_left_value);
        }


        /* 
         * --------------------------------------------------------------------------------
         * USER INPUT SANITIZERS
         * --------------------------------------------------------------------------------
         */

        /**
         * Checks user input for the margin value.
         *
         * Checks the input coming from the WordPress theme customizer margin
         * value for a legal margin css value.
         *<pre>Example call:
         *    sanitize_margin_value('auto') -> returns 'auto'
         *    sanitize_margin_value('inherit') -> returns 'inherit'
         *    sanitize_margin_value('22') -> returns '22'
         *    sanitize_margin_value('3.1415') -> returns '3.1415'
         *    sanitize_margin_value('foo') -> returns nothing as 'foo' is not a
         *    valid margin property value.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @param mixed $margin_value The css margin value to check.
         *
         * @return mixed The valid css margin property value.
         */
        public function sanitize_margin_value($margin_value) {
            if (in_array($margin_value, $this->legal_margin_values)) {
                return $margin_value;
            } else if (is_numeric($margin_value)) {
                return $margin_value;
            }
        } // CHECKED.


        /**
         * Checks user input for the margin length value.
         *
         * Checks the user input coming from the WordPress theme customizer
         * HTML select list for a valid css margin length value.
         *<pre>Examole call:
         *    sanitize_margin_unit('value1') -> returns 'value1'
         *    sanitize_margin_unit('value10') -> returns 'value10'
         *    sanitize_margin_unit('foo') -> returns nothing as 'foo' is not a
         *    legal css length value.</pre>
         *
         * @author Marc Kennedy
         *
         * @since 1.0.0
         *
         * @param string $margin_unit The css length value to check. Legal
         * values are: 'px', '%', 'em', 'ex', 'rem', 'cm', 'mm', 'in',
         * 'pt', 'pc'.
         *
         * @return string The valid css length value.
         */
        public function sanitize_margin_unit($margin_unit) {
            if (array_key_exists($margin_unit, $this->legal_margin_units)) {
                return $margin_unit;
            }
        } // CHECKED.

    } // END Lnrd_Css_Margin class.
?>
